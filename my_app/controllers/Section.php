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

class Section extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->language('section',$this->session->userdata('language'));
		//crud model autoloaded in MY_Controller.php
	}

	public function index()
	{
		$page['subview'] = "section/section";
		$this->load->view('_main_layout',$page);
	}


	/**
	*---------------------------------------------------
	* FUNCTION : SECTION TABLE							|
	*---------------------------------------------------
	*---------------------------------------------------
	* WRITTEN BY : ARIFUL ISLAM							|
	*---------------------------------------------------
	**/
	public function section_table($classesID)
	{
		$this->load->model('section_model','sm');

		$table = $this->sm->section_table($classesID);
		$n=1;
		foreach($table as $t)
		{
			$result = array();
			$result[] = $n++;
			$result[] = $t->section;
			$result[] = $t->classes;
			$result[] = $t->name;
			$result[] =edit_button('edit_section',$t->sectionID)." ".delete_button('delete_section',$t->sectionID);

			$table['data'][] = $result;
		}

		echo json_encode($table);
	}
	//section table end


	/**
	*---------------------------------------------------
	* FUNCTION : ADD SECTION 							|
	*---------------------------------------------------
	*---------------------------------------------------
	* WRITTEN BY : ARIFUL ISLAM							|
	*---------------------------------------------------
	**/
	public function add()
	{
		$this->form_validation->set_rules('section','Section','trim|xss_clean|required');
		$this->form_validation->set_rules('classesID','Class','trim|xss_clean|required');
		$this->form_validation->set_rules('teacherID','Teacher','trim|xss_clean|required');
		$this->form_validation->set_rules('note','Note','trim|xss_clean');

		if($this->form_validation->run() == FALSE)
		{
			echo validation_errors();
		}
		else
		{
			$tdata = $this->cm->array_from_post(array('section','classesID','teacherID','note'));

			$data = array
			(
				'section' => $tdata['section'],
				'classesID' => $tdata['classesID'],
				'teacherID' => $tdata['teacherID'],
				'note' => $tdata['note'],
			);

			$this->cm->_table_name = "section";
			$ins = $this->cm->insert($data);

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
	//add section end


	/**
	*---------------------------------------------------
	* FUNCTION : SINGLE SECTION							|
	*---------------------------------------------------
	*---------------------------------------------------
	* WRITTEN BY : ARIFUL ISLAM							|
	*---------------------------------------------------
	**/
	public function single($id)
	{
		$this->cm->_table_name = "section";
		$this->cm->_field_name = "sectionID";
		$this->cm->_primary_key = $id;

		$section = $this->cm->get_where();

		foreach($section as $s)
		{
			$result = array();
			$result['sectionID'] = $s->sectionID;
			$result['section'] = $s->section;
			$result['classesID'] = $s->classesID;
			$result['teacherID'] = $s->teacherID;
			$result['note'] = $s->note;
		}

		echo json_encode($result);
	}
	//getting single section end


	/**
	*---------------------------------------------------
	* FUNCTION : EDIT SECTION 							|
	*---------------------------------------------------
	*---------------------------------------------------
	* WRITTEN BY : ARIFUL ISLAM							|
	*---------------------------------------------------
	**/
	public function edit($id=null)
	{
		$this->form_validation->set_rules('section','Section','trim|xss_clean|required');
		$this->form_validation->set_rules('classesID','Class','trim|xss_clean|required');
		$this->form_validation->set_rules('teacherID','Teacher','trim|xss_clean|required');
		$this->form_validation->set_rules('note','Note','trim|xss_clean');

		if($this->form_validation->run() == FALSE)
		{
			echo validation_errors();
		}
		else
		{
			$tdata = $this->cm->array_from_post(array('section','classesID','teacherID','note'));

			$data = array
			(
				'section' => $tdata['section'],
				'classesID' => $tdata['classesID'],
				'teacherID' => $tdata['teacherID'],
				'note' => $tdata['note'],
			);

			$this->cm->_table_name = "section";
			$this->cm->_field_name = "sectionID";
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
	//edit section end


	/**
	*---------------------------------------------------
	* FUNCTION : DELETE SECTION							|
	*---------------------------------------------------
	*---------------------------------------------------
	* WRITTEN BY : ARIFUL ISLAM							|
	*---------------------------------------------------
	**/
	public function delete($id=NULL)
	{
		$this->cm->_table_name = "section";
		$this->cm->_field_name = "sectionID";
		$this->cm->_primary_key = $id;

		$delete = $this->cm->delete($id);

		if($delete)
		{
			echo "Deleted";
		}
		else
		{
			echo "Notdeleted";
		}
	}
	//delete section end


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
			echo "<option value=''>".$this->lang->line('section')."</option>";
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

//End of file Section.php
//Location : ./application/controller/Section.php