<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
*---------------------------------------------------
* PRODUCT NAME  : OPTICCODER SCHOOL MANAGEMENT 		|
*---------------------------------------------------
* AUTHOR 		: OPTICCODER DEVELOPMENT TEAM 		|
*---------------------------------------------------
* EMAIL 		: info@opticcoder.com 				|
*---------------------------------------------------
* COPYRIGHT 	: OPTICCODER INC 					|
*---------------------------------------------------
* WEBSITE 		: http://opticcoder.com 			|
*---------------------------------------------------
**/

class Classes extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->language('class',$this->session->userdata('language'));
		//crud Model Autoloaded in MY_Controller.php
	}

	public function index()
	{
		$page['subview'] = "class/classes";
		$this->load->view('_main_layout',$page);
	}


	/**
	*---------------------------------------------------
	* FUNCTION : CLASS TABLE 							|
	*---------------------------------------------------
	*---------------------------------------------------
	* WRITTEN BY : ARIFUL ISLAM							|
	*---------------------------------------------------
	**/
	public function classes_table()
	{
		$this->load->model('classes_model','clm');
		$table = $this->clm->classes_table();
		$n=1;
		foreach($table as $t)
		{
			$result = array();
			$result[] = $n++;
			$result[] = $t->classes;
			$result[] = $t->classes_numeric;
			$result[] = $t->name;
			$result[] = $t->note;
			$result[] =   edit_button('edit_classes',$t->classesID)." ".delete_button('delete_classes',$t->classesID);

			$table['data'][] = $result;
		}

		echo json_encode($table);
	}
	//class table end


	/**
	*---------------------------------------------------
	* FUNCTION : ADD CLASS  							|
	*---------------------------------------------------
	*---------------------------------------------------
	* WRITTEN BY : ARIFUL ISLAM							|
	*---------------------------------------------------
	**/
	public function add()
	{
		//form validation rule
		$this->form_validation->set_rules('classes','Class','trim|xss_clean|required');
		$this->form_validation->set_rules('teacherID','Teacher','trim|xss_clean|required');

		$this->form_validation->set_rules('classes_numeric','Class Numeric','trim|xss_clean|min_length[1]|is_unique[classes.classes_numeric]|required');
		$this->form_validation->set_rules('note','Notes','trim|xss_clean');

		//check validation id there any
		if($this->form_validation->run() == FALSE)
		{
			echo validation_errors();
		}
		else
		{
			//getting submited data
			$tdata = $this->cm->array_from_post(array('classes','classes_numeric','teacherID','note'));

			//make data for inserting into database
			$data = array
			(
				'classes' => $tdata['classes'],
				'classes_numeric' => $tdata['classes_numeric'],
				'teacherID' => $tdata['teacherID'],
				'note' => $tdata['note'],
			);

			//inserting data into database
			$this->cm->_table_name = "classes";
			$ins = $this->cm->insert($data);

			//check data inserted or not
			if($ins)
			{
				echo "Added";
			}
			else
			{
				echo "Notadded";
			}
		}
	}
	//add class end


	/**
	*---------------------------------------------------
	* FUNCTION : SINGLE CLASS 							|
	*---------------------------------------------------
	*---------------------------------------------------
	* WRITTEN BY : ARIFUL ISLAM							|
	*---------------------------------------------------
	**/
	public function single($id=NULL)
	{
		//getting single class
		$this->cm->_table_name = "classes";
		$this->cm->_field_name = "classesID";
		$this->cm->_primary_key = $id;
		$teacher = $this->cm->get_where();

		foreach($teacher as $t)
		{
			$result = array();
			$result['classesID'] = $t->classesID;
			$result['classes'] = ucwords($t->classes);
			$result['classes_numeric'] = $t->classes_numeric;
			$result['teacherID'] = $t->teacherID;
			$result['note'] = $t->note;
		}

		echo json_encode($result);;
	}
	//single class end


	/**
	*---------------------------------------------------
	* FUNCTION : EDIT CLASS 							|
	*---------------------------------------------------
	*---------------------------------------------------
	* WRITTEN BY : ARIFUL ISLAM							|
	*---------------------------------------------------
	**/
	public function edit($id=null)
	{
		//form validation rule
		$this->form_validation->set_rules('classes','Class','trim|xss_clean|required');
		$this->form_validation->set_rules('teacherID','Teacher','trim|xss_clean|required');

		$this->form_validation->set_rules('classes_numeric','Class Numeric','trim|xss_clean|min_length[1]|required');
		$this->form_validation->set_rules('note','Notes','trim|xss_clean');

		//check validation error id there any
		if($this->form_validation->run() == FALSE)
		{
			echo validation_errors();
		}
		else
		{
			//getting submited data
			$tdata = $this->cm->array_from_post(array('classes','teacherID','classes_numeric','note'));

			//making data for updating database
			$data = array
			(
				'classes' => $tdata['classes'],
				'teacherID' => $tdata['teacherID'],
				'classes_numeric' => $tdata['classes_numeric'],
				'note' => $tdata['note'],
			);

			//update database
			$this->cm->_table_name = "classes";
			$this->cm->_field_name = "classesID";
			$this->cm->_primary_key = $id;
			$update = $this->cm->update($data);

			//check if database updated or not
			if($update)
			{
				echo "Updated";
			}
			else
			{
				echo "Notupdated";
			}
		}
	}
	//edit class end


	/**
	*---------------------------------------------------
	* FUNCTION : DELETE CLASS 							|
	*---------------------------------------------------
	*---------------------------------------------------
	* WRITTEN BY : ARIFUL ISLAM							|
	*---------------------------------------------------
	**/
	public function delete($id=NULL)
	{
		//delete class from database
		$this->cm->_table_name = "classes";
		$this->cm->_field_name = "classesID";
		$this->cm->_primary_key = $id;

		$delete = $this->cm->delete($id);

		//chcek i deleted or not 
		if($delete)
		{
			echo "Deleted";
		}
		else
		{
			echo "Notdeleted";
		}
	}
	//delete class end

}

//End of file Classes.php
//Location : ./application/controller/Classes.php