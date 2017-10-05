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

class Grade extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->language('grade',$this->session->userdata('language'));
		//Crud model autoloaded in MY_Controller.php
	}

	public function index()
	{
		$page['subview'] = "exam/grade";
		$this->load->view('_main_layout',$page);
	}

	/**
	*---------------------------------------------------
	* FUNCTION : EXAM ATTEMDANCE TABLE					|
	*---------------------------------------------------
	*---------------------------------------------------
	* WRITTEN BY : ARIFUL ISLAM							|
	*---------------------------------------------------
	**/
	public function grade_table()
	{
		$this->cm->_table_name = "grade";
		$this->cm->_field_name = "gradeID";
		$this->cm->_order_by = "DESC";
		$table = $this->cm->get_by_order();
		$n=1;
		foreach($table as $t)
		{
			$result = array();
			$result[] = $n++;
			$result[] = $t->grade;
			$result[] = $t->point;
			$result[] = $t->gradefrom." - ".$t->gradeupto;
			$result[] = $t->note;
			$result[] = edit_button('edit_grade',$t->gradeID)." ".delete_button('delete_grade',$t->gradeID);

			$table['data'][] = $result;
		}

		echo json_encode($table);
	}
	//grade table end


	/**
	*---------------------------------------------------
	* FUNCTION : EXAM ATTEMDANCE TABLE					|
	*---------------------------------------------------
	*---------------------------------------------------
	* WRITTEN BY : ARIFUL ISLAM							|
	*---------------------------------------------------
	**/
	public function add()
	{
		//form validation rule
		$this->form_validation->set_rules('grade','Grade Name','trim|xss_clean|required');
		$this->form_validation->set_rules('point','Designation','trim|xss_clean|required');
		$this->form_validation->set_rules('gradefrom','Mark From','trim|xss_clean|required');
		$this->form_validation->set_rules('gradeupto','Mark Upto','trim|xss_clean|required');
		$this->form_validation->set_rules('note','Note','trim|xss_clean');

		//check validation error if any
		if($this->form_validation->run() == FALSE)
		{
			echo validation_errors();
		}
		else
		{
			//getting submited data
			$tdata = $this->cm->array_from_post(array('grade','point','gradefrom','gradeupto','note'));

			//make data for inserting into database
			$data = array
			(
				'grade' => $tdata['grade'],
				'point' => $tdata['point'],
				'gradefrom' => $tdata['gradefrom'],
				'gradeupto' => $tdata['gradeupto'],
				'note' => $tdata['note'],
			);

			//insert into database
			$this->cm->_table_name = "grade";
			$ins = $this->cm->insert($data);

			//check if data inserted or not
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
	//add grade end


	/**
	*---------------------------------------------------
	* FUNCTION : EXAM ATTEMDANCE TABLE					|
	*---------------------------------------------------
	*---------------------------------------------------
	* WRITTEN BY : ARIFUL ISLAM							|
	*---------------------------------------------------
	**/
	public function single($id=NULL)
	{
		//getting single grade
		$this->cm->_table_name = "grade";
		$this->cm->_field_name = "gradeID";
		$this->cm->_primary_key = $id;
		$grade = $this->cm->get_where();

		foreach($grade as $g)
		{
			$result = array();
			$result['gradeID'] = $g->gradeID;
			$result['grade'] = $g->grade;
			$result['point'] = $g->point;
			$result['gradefrom'] = $g->gradefrom;
			$result['gradeupto'] = $g->gradeupto;
			$result['note'] = $g->note;
		}

		$teacher = json_encode($result);

		echo $teacher;
	}
	//single grade end


	/**
	*---------------------------------------------------
	* FUNCTION : EXAM ATTEMDANCE TABLE					|
	*---------------------------------------------------
	*---------------------------------------------------
	* WRITTEN BY : ARIFUL ISLAM							|
	*---------------------------------------------------
	**/
	public function edit($id=null)
	{
		//form validation rule
		$this->form_validation->set_rules('grade','Grade Name','trim|xss_clean|required');
		$this->form_validation->set_rules('point','Designation','trim|xss_clean|required');
		$this->form_validation->set_rules('gradefrom','Mark From','trim|xss_clean|required');
		$this->form_validation->set_rules('gradeupto','Mark Upto','trim|xss_clean|required');
		$this->form_validation->set_rules('note','Note','trim|xss_clean');

		//check validation error if there any
		if($this->form_validation->run() == FALSE)
		{
			echo validation_errors();
		}
		else
		{
			//getting submited data
			$tdata = $this->cm->array_from_post(array('grade','point','gradefrom','gradeupto','note'));

			//make data for update database
			$data = array
			(
				'grade' => $tdata['grade'],
				'point' => $tdata['point'],
				'gradefrom' => $tdata['gradefrom'],
				'gradeupto' => $tdata['gradeupto'],
				'note' => $tdata['note'],
			);

			//updating database
			$this->cm->_table_name = "grade";
			$this->cm->_field_name = "gradeID";
			$this->cm->_primary_key = $id;

			//check if database updated or not
			$update = $this->cm->update($data);

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
	//edit teacher end


	/**
	*---------------------------------------------------
	* FUNCTION : EXAM ATTEMDANCE TABLE					|
	*---------------------------------------------------
	*---------------------------------------------------
	* WRITTEN BY : ARIFUL ISLAM							|
	*---------------------------------------------------
	**/
	public function delete($id=NULL)
	{
		//delete from database
		$this->cm->_table_name = "grade";
		$this->cm->_field_name = "gradeID";
		$this->cm->_primary_key = $id;

		$delete = $this->cm->delete($id);

		//check id data deleted or not
		if($delete)
		{
			echo "Deleted";
		}
		else
		{
			echo "Notdeleted";
		}
	}
	//delete grade end

}

//End of file Grade.php
//Location : ./application/controller/Grade.php