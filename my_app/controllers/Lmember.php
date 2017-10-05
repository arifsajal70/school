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


class Lmember extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->language('lmember',$this->session->userdata('language'));
		//crud model autoloaded in MY_Controller.php
	}

	public function index()
	{
		$page['subview'] = "library/lmember";
		$this->load->view('_main_layout',$page);
	}


	/**
	*---------------------------------------------------
	* FUNCTION : LIBRARY MEMBER TABLE					|
	*---------------------------------------------------
	*---------------------------------------------------
	* WRITTEN BY : ARIFUL ISLAM							|
	*---------------------------------------------------
	**/
	public function lmember_table($classesID,$sectionID)
	{
		//Load Student model
		$this->load->model('student_model','sm');
		//Getting all student from student_model
		$table = $this->sm->get_student($classesID,$sectionID);
		$n=1;
		foreach($table as $t)
		{
			$result = array();
			$result[] = $n++;
			$result[] = $t->name;
			$result[] = $t->email;
			$result[] = $t->phone;
			if($t->library == 1)
			{
				$result[] = view_button('view_student',$t->studentID)." ".edit_button('edit_lmember',$t->studentID)." ".delete_button('delete_student',$t->studentID);
			}
			if($t->library == 0)
			{
				$result[] = add_button('add_lmember',$t->studentID);
			}

			$table['data'][] = $result;
		}

		echo json_encode($table);
	}
	//student table end


	/**
	*---------------------------------------------------
	* FUNCTION : ADD LMEMBER 							|
	*---------------------------------------------------
	*---------------------------------------------------
	* WRITTEN BY : ARIFUL ISLAM							|
	*---------------------------------------------------
	**/
	public function add($studentID)
	{
		$this->form_validation->set_rules('lID','Library ID','trim|xss_clean|required|is_unique[lmember.lID]');
		$this->form_validation->set_rules('lbalance','Fee','trim|xss_clean');

		if($this->form_validation->run() == FALSE)
		{
			echo validation_errors();
		}
		else
		{	
			$mdata = $this->cm->array_from_post(array('lID','lbalance'));
			$this->cm->_table_name = "student";
			$this->cm->_field_name = "studentID";
			$this->cm->_primary_key = $studentID;

			$update = $this->cm->update(array('library'=>1));

			$this->cm->_table_name = "lmember";
			$ins = $this->cm->insert(array('studentID'=>$studentID,'lbalance'=>$mdata['lbalance'],'ljoindate'=>date("Y-m-d"),'lID'=>$mdata['lID']));

			if($update && $ins)
			{
				echo "Added";
			}
			else
			{
				echo "Notadded";
			}
		}
	}
	//student table end


	/**
	*---------------------------------------------------
	* FUNCTION : SINGLE LIBRARY MEMBER					|
	*---------------------------------------------------
	*---------------------------------------------------
	* WRITTEN BY : ARIFUL ISLAM							|
	*---------------------------------------------------
	**/
	public function single_lmember($studentID)
	{
		$this->cm->_table_name = "lmember";
		$this->cm->_field_name = "studentID";
		$this->cm->_primary_key = $studentID;
		$lmember = $this->cm->get_where();

		foreach($lmember as $lm)
		{
			$result = array();
			$result['lmemberID'] = $lm->lmemberID;
			$result['lID'] = $lm->lID;
			$result['lbalance'] = $lm->lbalance;
		}

		echo json_encode($result);
	}
	//student table end


	/**
	*---------------------------------------------------
	* FUNCTION : EDIT LIBRARY MEMBER					|
	*---------------------------------------------------
	*---------------------------------------------------
	* WRITTEN BY : ARIFUL ISLAM							|
	*---------------------------------------------------
	**/
	public function edit($lmemberID)
	{
		$this->form_validation->set_rules('lID','Library ID','trim|xss_clean|required');
		$this->form_validation->set_rules('lbalance','Fee','trim|xss_clean');

		if($this->form_validation->run() == FALSE)
		{
			echo validation_errors();
		}
		else
		{	
			$mdata = $this->cm->array_from_post(array('lID','lbalance'));

			$this->cm->_table_name = "lmember";
			$this->cm->_field_name = "lmemberID";
			$this->cm->_primary_key = $lmemberID;
			$update = $this->cm->update(array('lbalance'=>$mdata['lbalance'],'lID'=>$mdata['lID']));

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
	//edit Lmember end


	/**
	*---------------------------------------------------
	* FUNCTION : EDIT LIBRARY MEMBER					|
	*---------------------------------------------------
	*---------------------------------------------------
	* WRITTEN BY : ARIFUL ISLAM							|
	*---------------------------------------------------
	**/
	public function delete($studentID)
	{
		$this->cm->_table_name = "student";
		$this->cm->_field_name = "studentID";
		$this->cm->_primary_key = $studentID;

		$update = $this->cm->update(array('library'=>0));

		$this->cm->_table_name = "lmember";
		$this->cm->_field_name = "studentID";
		$this->cm->_primary_key = $studentID;

		$delete = $this->cm->delete();

		if($delete && $update)
		{
			echo "Deleted";
		}
		else
		{
			echo "Notdeleted";
		}
	}
	//edit Lmember end


	/**
	*---------------------------------------------------
	* FUNCTION : GET SECTION BY ID						|
	*---------------------------------------------------
	*---------------------------------------------------
	* WRITTEN BY : ARIFUL ISLAM							|
	*---------------------------------------------------
	**/
	public function get_section_by_id($id=NULL,$set)
	{
		$this->cm->_table_name = "section";
		$this->cm->_field_name = "classesID";
		$this->cm->_primary_key = $id;
		$section = $this->cm->get_where();

		if($set == "option")
		{
			echo "<option value=''>Section</option>";
			foreach($section as $s)
			{
				echo "<option value=".$s->sectionID.">".$s->section."</option>";
			}
		}
		elseif($set == "link")
		{
			foreach($section as $s)
			{
				echo "<a class=\"dropdown-item\" onclick=\"view_table('$s->sectionID','$s->section')\" style=\"cursor:pointer;\">".$s->section."</option>";
			}
		}
	}
	//get section by id end
}