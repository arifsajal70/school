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

class Subject extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->language('subject',$this->session->userdata('language'));
		//Crud_model autoloaded in MY_Controller.php
	}

	public function index()
	{
		$page['subview'] = "subject/subject";
		$this->load->view('_main_layout',$page);
	}


	/**
	*---------------------------------------------------
	* FUNCTION : SUBJECT TABLE 							|
	*---------------------------------------------------
	*---------------------------------------------------
	* WRITTEN BY : ARIFUL ISLAM							|
	*---------------------------------------------------
	**/
	public function subject_table($id=NULL)
	{
		$this->load->model('subject_model','sm');
		//getting singlesubject from subject model
		$table = $this->sm->get_subjects($id);
		$n=1;
		foreach($table as $t)
		{
			$result = array();
			$result[] = $n++;
			$result[] = $t->subject;
			$result[] = $t->class;
			$result[] = $t->teacher;
			$result[] = $t->subject_code;
			$result[] = $t->subject_author;
			$result[] = edit_button('edit_subject',$t->subjectID)." ".delete_button('delete_subject',$t->subjectID);

			$table['data'][] = $result;
		}

		echo json_encode($table);
	}
	//subject table end


	/**
	*---------------------------------------------------
	* FUNCTION : ADD SUBJECT 							|
	*---------------------------------------------------
	*---------------------------------------------------
	* WRITTEN BY : ARIFUL ISLAM							|
	*---------------------------------------------------
	**/
	public function add()
	{
		//form validation check
		$this->form_validation->set_rules('subject','Subject','trim|xss_clean|required');
		$this->form_validation->set_rules('classesID','Class','trim|xss_clean|required');
		$this->form_validation->set_rules('teacherID','Teacher','trim|xss_clean|required');
		$this->form_validation->set_rules('subject_author','Subject Author','trim|xss_clean');
		$this->form_validation->set_rules('subject_code','Subject Code','trim|xss_clean|is_unique[subject.subject_code]|required');

		//check validation error if there any
		if($this->form_validation->run() == FALSE)
		{
			echo validation_errors();
		}
		else
		{
			//getting submited data
			$tdata = $this->cm->array_from_post(array('subject','classesID','teacherID','subject_author','subject_code'));

			//making data for inserting into database
			$data = array
			(
				'subject' => $tdata['subject'],
				'classesID' => $tdata['classesID'],
				'teacherID' => $tdata['teacherID'],
				'subject_author' => $tdata['subject_author'],
				'subject_code' => $tdata['subject_code'],
			);

			//insert into database
			$this->cm->_table_name = "subject";
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
	//add subject end


	/**
	*---------------------------------------------------
	* FUNCTION : SINGLE STUDENT							|
	*---------------------------------------------------
	*---------------------------------------------------
	* WRITTEN BY : ARIFUL ISLAM							|
	*---------------------------------------------------
	**/
	public function single($id=NULL)
	{
		$this->cm->_table_name = "subject";
		$this->cm->_field_name = "subjectID";
		$this->cm->_primary_key = $id;
		$subject = $this->cm->get_where();

		foreach($subject as $s)
		{
			$result = array();
			$result['subjectID'] = $s->subjectID;
			$result['subject'] = ucwords($s->subject);
			$result['classesID'] = $s->classesID;
			$result['teacherID'] = $s->teacherID;
			$result['subject_author'] = $s->subject_author;
			$result['subject_code'] = $s->subject_code;
		}

		$teacher = json_encode($result);

		echo $teacher;
	}
	//single subject end


	/**
	*---------------------------------------------------
	* FUNCTION : EDIT SUBJECT 							|
	*---------------------------------------------------
	*---------------------------------------------------
	* WRITTEN BY : ARIFUL ISLAM							|
	*---------------------------------------------------
	**/
	public function edit($id=null)
	{
		//form validation rule
		$this->form_validation->set_rules('subject','Subject','trim|xss_clean|required');
		$this->form_validation->set_rules('classesID','Class','trim|xss_clean|required');
		$this->form_validation->set_rules('teacherID','Teacher','trim|xss_clean|required');
		$this->form_validation->set_rules('subject_author','Subject Author','trim|xss_clean');
		$this->form_validation->set_rules('subject_code','Subject Code','trim|xss_clean|required');

		//check form validation if there any
		if($this->form_validation->run() == FALSE)
		{
			echo validation_errors();
		}
		else
		{
			//getting submited data
			$tdata = $this->cm->array_from_post(array('subject','classesID','teacherID','subject_author','subject_code'));

			//making data for updating database
			$data = array
			(
				'subject' => $tdata['subject'],
				'classesID' => $tdata['classesID'],
				'teacherID' => $tdata['teacherID'],
				'subject_author' => $tdata['subject_author'],
				'subject_code' => $tdata['subject_code'],
			);

			//update database
			$this->cm->_table_name = "subject";
			$this->cm->_field_name = "subjectID";
			$this->cm->_primary_key = $id;

			//check if database updated or not
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
	//edit subject end


	/**
	*---------------------------------------------------
	* FUNCTION : DELETE SUBJECT							|
	*---------------------------------------------------
	*---------------------------------------------------
	* WRITTEN BY : ARIFUL ISLAM							|
	*---------------------------------------------------
	**/
	public function delete($id=NULL)
	{
		//deleting data from database
		$this->cm->_table_name = "subject";
		$this->cm->_field_name = "subjectID";
		$this->cm->_primary_key = $id;

		$delete = $this->cm->delete($id);

		//check if database updated or not
		if($delete)
		{
			echo "Deleted";
		}
		else
		{
			echo "Notdeleted";
		}
	}
	//delete subject


	/**
	*---------------------------------------------------
	* FUNCTION : SUBJECT BY ID 							|
	*---------------------------------------------------
	*---------------------------------------------------
	* WRITTEN BY : ARIFUL ISLAM							|
	*---------------------------------------------------
	**/
	public function get_subject_by_id($id=NULL)
	{
		$this->cm->_table_name = "subject";
		$this->cm->_field_name = "classesID";
		$this->cm->_primary_key = $id;
		$subject = $this->cm->get_where();

		echo "<option value=''>Subject</option>";
		foreach($subject as $s)
		{
			echo "<option value=".$s->subjectID.">".$s->subject."</option>";
		}

	}
	//subject by id end
}

//End of file Subject.php
//Location : ./application/controller/Subject.php