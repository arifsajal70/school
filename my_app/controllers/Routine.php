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

class Routine extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->language('routine',$this->session->userdata('language'));
		//Crud Model autoloaded in MY_Controller.php
	}

	public function index()
	{
		$page['subview'] = "routine/routine";
		$this->load->view('_main_layout',$page);
	}

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

	public function routine_table($classesID,$sectionID)
	{
		$this->load->model('routine_model','rm');
		$routine = $this->rm->get_routine($classesID,$sectionID);

		foreach($routine as $r)
		{
			$result = array();
			$result[] = $r->day;
			$result[] = $r->subject;
			$result[] = $r->start_time." - ".$r->end_time;
			$result[] = $r->room;
			$result[] = edit_button('edit_routine',$r->routineID)." ".delete_button('delete_routine',$r->routineID);

			$table['data'][] = $result;
		}

		echo json_encode($table);

	}

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

	//add Routine
	public function add()
	{
		$this->form_validation->set_rules('classesID','Class','trim|xss_clean|required');
		$this->form_validation->set_rules('sectionID','Section','trim|xss_clean|required');
		$this->form_validation->set_rules('subjectID','Subject','trim|xss_clean|required');
		$this->form_validation->set_rules('day','Day','trim|xss_clean|required');
		$this->form_validation->set_rules('start_time','Starting Time','trim|xss_clean|required');
		$this->form_validation->set_rules('end_time','Ending Time','trim|xss_clean|required');
		$this->form_validation->set_rules('room','Room','trim|xss_clean|required');

		if($this->form_validation->run() == FALSE)
		{
			echo validation_errors();
		}
		else
		{
			$tdata = $this->cm->array_from_post(array('classesID','sectionID','subjectID','day','start_time','end_time','room'));

			$data = array
			(
				'classesID' => $tdata['classesID'],
				'sectionID' => $tdata['sectionID'],
				'subjectID' => $tdata['subjectID'],
				'day' => $tdata['day'],
				'start_time' => $tdata['start_time'],
				'end_time' => $tdata['end_time'],
				'room' => $tdata['room'],
				);

			$this->cm->_table_name = "routine";
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

	//single routine
	public function single($id)
	{
		$this->cm->_table_name = "routine";
		$this->cm->_field_name = "routineID";
		$this->cm->_primary_key = $id;
		$routine = $this->cm->get_where();

		foreach($routine as $r)
		{
			$result = array();
			$result['routineID'] = $r->routineID;
			$result['classesID'] = $r->classesID;
			$result['sectionID'] = $r->sectionID;
			$result['subjectID'] = $r->subjectID;
			$result['day'] = $r->day;
			$result['start_time'] = $r->start_time;
			$result['end_time'] = $r->end_time;
			$result['room'] = $r->room;
		}

		echo json_encode($result);
	}

	public function edit($id)
	{
		$this->form_validation->set_rules('classesID','Class','trim|xss_clean|required');
		$this->form_validation->set_rules('sectionID','Section','trim|xss_clean|required');
		$this->form_validation->set_rules('subjectID','Subject','trim|xss_clean|required');
		$this->form_validation->set_rules('day','Day','trim|xss_clean|required');
		$this->form_validation->set_rules('start_time','Starting Time','trim|xss_clean|required');
		$this->form_validation->set_rules('end_time','Ending Time','trim|xss_clean|required');
		$this->form_validation->set_rules('room','Room','trim|xss_clean|required');

		if($this->form_validation->run() == FALSE)
		{
			echo validation_errors();
		}
		else
		{
			$tdata = $this->cm->array_from_post(array('classesID','sectionID','subjectID','day','start_time','end_time','room'));

			$data = array
			(
				'classesID' => $tdata['classesID'],
				'sectionID' => $tdata['sectionID'],
				'subjectID' => $tdata['subjectID'],
				'day' => $tdata['day'],
				'start_time' => $tdata['start_time'],
				'end_time' => $tdata['end_time'],
				'room' => $tdata['room'],
			);

			$this->cm->_table_name = "routine";
			$this->cm->_field_name = "routineid";
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

	public function delete($id)
	{
		$this->cm->_table_name = "routine";
		$this->cm->_field_name = "routineID";
		$this->cm->_primary_key = $id;
		$delete = $this->cm->delete();

		if($delete)
		{
			echo "Deleted";
		}
		else
		{
			echo "Notdeleted";
		}
	}
}