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

class Exam extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->language('exam',$this->session->userdata('language'));
		//Crud model autoloaded in MY_Controller.php
	}

	public function index()
	{
		$page['subview'] = "exam/exam";
		$this->load->view('_main_layout',$page);

	}


	/**
	*---------------------------------------------------
	* FUNCTION : EXAM TABLE 							|
	*---------------------------------------------------
	*---------------------------------------------------
	* WRITTEN BY : ARIFUL ISLAM							|
	*---------------------------------------------------
	**/
	public function exam_table()
	{
		$this->cm->_table_name = "exam";
		$this->cm->_field_name = "examID";
		$this->cm->_order_by = "DESC";
		$table = $this->cm->get_by_order();
		$n=1;
		foreach($table as $t)
		{
			$result = array();
			$result[] = $n++;
			$result[] = $t->exam;
			$result[] = $t->date;
			$result[] = $t->note;
			$result[] = edit_button('edit_exam',$t->examID)." ".delete_button('delete_exam',$t->examID);

			$table['data'][] = $result;
		}

		echo json_encode($table);
	}
	//exam table end


	/**
	*---------------------------------------------------
	* FUNCTION : ADD EXAM 	 							|
	*---------------------------------------------------
	*---------------------------------------------------
	* WRITTEN BY : ARIFUL ISLAM							|
	*---------------------------------------------------
	**/
	public function add()
	{
		//form validation rule
		$this->form_validation->set_rules('exam','Exam Name','trim|xss_clean|required');
		$this->form_validation->set_rules('date','Date','trim|xss_clean|required');
		$this->form_validation->set_rules('Note','Note','trim|xss_clean');

		//check form validation id there any
		if($this->form_validation->run() == FALSE)
		{
			echo validation_errors();
		}
		else
		{	
			//getting submited data
			$tdata = $this->cm->array_from_post(array('exam','date','note'));

			//making data for insert into database
			$data = array
			(
				'exam' => $tdata['exam'],
				'date' => $tdata['date'],
				'note' => $tdata['note'],
			);

			//insert into database
			$this->cm->_table_name = "exam";
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
	//add exam end


	/**
	*---------------------------------------------------
	* FUNCTION : SINGLE EXAM 							|
	*---------------------------------------------------
	*---------------------------------------------------
	* WRITTEN BY : ARIFUL ISLAM							|
	*---------------------------------------------------
	**/
	public function single($id=NULL)
	{
		$this->cm->_table_name = "exam";
		$this->cm->_field_name = "examID";
		$this->cm->_primary_key = $id;
		$exam = $this->cm->get_where();

		foreach($exam as $m)
		{
			$result = array();
			$result['examID'] = $m->examID;
			$result['exam'] = $m->exam;
			$result['date'] = $m->date;
			$result['note'] = $m->note;
		}

		$teacher = json_encode($result);

		echo $teacher;
	}
	//getting single data end


	/**
	*---------------------------------------------------
	* FUNCTION : EDIT EXAM  							|
	*---------------------------------------------------
	*---------------------------------------------------
	* WRITTEN BY : ARIFUL ISLAM							|
	*---------------------------------------------------
	**/
	public function edit($id=null)
	{
		//form validation rule
		$this->form_validation->set_rules('exam','Exam Name','trim|xss_clean|required');
		$this->form_validation->set_rules('date','date','trim|xss_clean|required');
		$this->form_validation->set_rules('note','Note','trim|xss_clean');

		//check validation if there any
		if($this->form_validation->run() == FALSE)
		{
			echo validation_errors();
		}
		else
		{
			//getting submited data
			$tdata = $this->cm->array_from_post(array('exam','date','note'));

			//make data for updating database
			$data = array
			(
				'exam' => $tdata['exam'],
				'date' => $tdata['date'],
				'note' => $tdata['note'],
			);

			//updating database
			$this->cm->_table_name = "exam";
			$this->cm->_field_name = "examID";
			$this->cm->_primary_key = $id;

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
	//edit exam end


	/**
	*---------------------------------------------------
	* FUNCTION : DELETE EXAM 							|
	*---------------------------------------------------
	*---------------------------------------------------
	* WRITTEN BY : ARIFUL ISLAM							|
	*---------------------------------------------------
	**/
	public function delete($id=NULL)
	{
		//delete exam
		$this->cm->_table_name = "exam";
		$this->cm->_field_name = "examID";
		$this->cm->_primary_key = $id;

		$delete = $this->cm->delete($id);

		//check if deleted or not
		if($delete)
		{
			echo "Deleted";
		}
		else
		{
			echo "Notdeleted";
		}
	}
	//delete exam end
}