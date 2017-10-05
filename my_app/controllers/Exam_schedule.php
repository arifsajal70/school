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

class Exam_schedule extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->language('exam_schedule',$this->session->userdata('language'));
		//crud Model autoloaded in MY_Controller.php
	}

	public function index()
	{
		$page['subview'] = "exam/exam_schedule";
		$this->load->view('_main_layout',$page);
	}


	/**
	*---------------------------------------------------
	* FUNCTION : EXAM SCHDULE TABLE						|
	*---------------------------------------------------
	*---------------------------------------------------
	* WRITTEN BY : ARIFUL ISLAM							|
	*---------------------------------------------------
	**/
	public function schedule_table($classesID,$sectionID)
	{
		//chedule table by class and section
		$this->load->model('exam_schedule_model','esm');
		$table = $this->esm->get_esm_table($classesID,$sectionID);
		$n=1;
		foreach($table as $t)
		{
			$result = array();
			$result[] = $n++;
			$result[] = $t->exam;
			$result[] = $t->class;
			$result[] = $t->section;
			$result[] = $t->subject;
			$result[] = $t->edate;
			$result[] = $t->examfrom." - ".$t->examto;
			$result[] = attendance_button('exam_attendance_table',$t->examscheduleID)." ".edit_button('edit_exam_schedule',$t->examscheduleID)." ".delete_button('delete_exam_schedule',$t->examscheduleID);

			$table['data'][] = $result;
		}

		echo json_encode($table);
	}
	//exam schedule end


	/**
	*---------------------------------------------------
	* FUNCTION : EXAM DETAILS 							|
	*---------------------------------------------------
	*---------------------------------------------------
	* WRITTEN BY : ARIFUL ISLAM							|
	*---------------------------------------------------
	**/
	public function  get_exam_details($id)
	{
		//getting exam details
		$this->load->model('exam_schedule_model','esm');
		$details = $this->esm->get_exam_details($id);

		foreach($details as $d)
		{
			$result = array();
			$result['date'] = $d->edate;
			$result['examfrom'] = $d->examfrom;
			$result['examto'] = $d->examto;
			$result['class'] = $d->class;
			$result['section'] = $d->section;
			$result['exam'] = $d->exam;
			$result['subject'] = $d->subject;
		}
		echo json_encode($result);
	}
	//geting exam details end


	/**
	*---------------------------------------------------
	* FUNCTION : EXAM ATTEMDANCE TABLE					|
	*---------------------------------------------------
	*---------------------------------------------------
	* WRITTEN BY : ARIFUL ISLAM							|
	*---------------------------------------------------
	**/
	public function get_attendance($id)
	{
		$this->load->model('exam_schedule_model','esm');
		//check exam attendance already exists or not
		$attendance = $this->esm->get_attendance_register($id);

		if($attendance)
		{	
			//return attendance table
			$n=1;
			foreach($attendance as $a)
			{
				$result = array();
				$result[] = $n++;
				$result[] = $a->name;
				$result[] = $a->phone;
				$result[] = $a->email;
				$result[] = attendance_switch('change_attendance',$a->eattendanceID,$a->attendance);

				$table['data'][] = $result;
			}

			echo json_encode($table);
		}
		else
		{
			//if attendance register not found
			//getting single exam schedule
			$this->cm->_table_name = "examschedule";
			$this->cm->_field_name = "examscheduleID";
			$this->cm->_primary_key = $id;
			$at = $this->cm->get_obj();

			//getting student
			$this->load->model('student_model','sm');
			$students = $this->sm->get_student($at->classesID,$at->sectionID);

			//check if student exists or not
			if($students)
			{
				//inserting attendance register by student
				foreach($students as $s)
				{
					$data = array
					(
						'examscheduleID' => $id,
						'date' => date("Y-m-d"),
						'studentID' => $s->studentID,
						'year' => date("Y"),
					);

					//inserting into database
					$this->cm->_table_name = "eattendance";
					$this->cm->insert($data);
				}

				//when attendance register inserted again call this function for getting table
				$this->get_attendance($id);
			}
			else
			{	
				//if student not exists than exit
				exit();
			}
		}
	}
	//exam attendance table end


	/**
	*---------------------------------------------------
	* FUNCTION : CHANGE EXAM ATTENDANCE 				|
	*---------------------------------------------------
	*---------------------------------------------------
	* WRITTEN BY : ARIFUL ISLAM							|
	*---------------------------------------------------
	**/
	public function change_attendance($attendanceID)
	{
		//getting single attendance
		$this->cm->_table_name = "eattendance";
		$this->cm->_field_name = "eattendanceID";
		$this->cm->_primary_key = $attendanceID;
		$status = $this->cm->get_row('attendance');
		//switch attendance
		switch ($status) {
			case null:
				$status = "P";
				break;

			case "A":
				$status = "P";
				break;

			case "P":
				$status = "A";
				break;
			
			default:
				$status = "P";
				break;
		}

		//update attendance
		$this->cm->_table_name = "eattendance";
		$this->cm->_field_name = "eattendanceID";
		$this->cm->_primary_key = $attendanceID;
		$update = $this->cm->update(array('attendance'=>$status));

		//check if attendance updated or not
		if($update)
		{
			echo "Updated";
		}
		else
		{
			echo "Notupdated";
		}
	}
	//change exam attendance end


	/**
	*---------------------------------------------------
	* FUNCTION : ADD EXAM SCHEDULE						|
	*---------------------------------------------------
	*---------------------------------------------------
	* WRITTEN BY : ARIFUL ISLAM							|
	*---------------------------------------------------
	**/
	public function add()
	{
		$this->form_validation->set_rules('examID','Exam','trim|xss_clean|required');
		$this->form_validation->set_rules('classesID','Class','trim|xss_clean|required');
		$this->form_validation->set_rules('sectionID','Exam Date','trim|xss_clean|required');
		$this->form_validation->set_rules('subjectID','Subject','trim|xss_clean|required');
		$this->form_validation->set_rules('edate','Exam Date','trim|xss_clean');
		$this->form_validation->set_rules('examfrom','Exam Starting Time','trim|xss_clean|required');
		$this->form_validation->set_rules('examto','Exam Ending Time','trim|xss_clean|required');
		$this->form_validation->set_rules('room','Room Number','trim|xss_clean');

		if($this->form_validation->run() == FALSE)
		{
			echo validation_errors();
		}
		else
		{
			$tdata = $this->cm->array_from_post(array('examID','classesID','sectionID','subjectID','edate','examfrom','examto','room'));

			$data = array
			(
				'examID' => $tdata['examID'],
				'classesID' => $tdata['classesID'],
				'sectionID' => $tdata['sectionID'],
				'subjectID' => $tdata['subjectID'],
				'edate' => $tdata['edate'],
				'examfrom' => $tdata['examfrom'],
				'examto' => $tdata['examto'],
				'room' => $tdata['room'],
				'year' => date("Y",strtotime($tdata['edate'])),
				);

			$this->cm->_table_name = "examschedule";
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
	//add exam schedule end


	/**
	*---------------------------------------------------
	* FUNCTION : SINGLE EXAM SCHEDULE					|
	*---------------------------------------------------
	*---------------------------------------------------
	* WRITTEN BY : ARIFUL ISLAM							|
	*---------------------------------------------------
	**/
	public function single($id)
	{
		$this->cm->_table_name = "examschedule";
		$this->cm->_field_name = "examscheduleID";
		$this->cm->_primary_key = $id;
		$exam = $this->cm->get_where();

		foreach($exam as $e)
		{
			$result = array();
			$result['examscheduleID'] = $e->examscheduleID;
			$result['examID'] = $e->examID;
			$result['classesID'] = $e->classesID;
			$result['sectionID'] = $e->sectionID;
			$result['subjectID'] = $e->subjectID;
			$result['edate'] = $e->edate;
			$result['examfrom'] = $e->examfrom;
			$result['examto'] = $e->examto;
			$result['room'] = $e->room;
		}

		echo json_encode($result);
	}
	//single exam schedule end


	/**
	*---------------------------------------------------
	* FUNCTION : EDIT EXAM SCHEDULE 					|
	*---------------------------------------------------
	*---------------------------------------------------
	* WRITTEN BY : ARIFUL ISLAM							|
	*---------------------------------------------------
	**/
	public function edit($id=null)
	{
		$this->form_validation->set_rules('examID','Exam','trim|xss_clean|required');
		$this->form_validation->set_rules('classesID','Class','trim|xss_clean|required');
		$this->form_validation->set_rules('sectionID','Exam Date','trim|xss_clean|required');
		$this->form_validation->set_rules('subjectID','Subject','trim|xss_clean|required');
		$this->form_validation->set_rules('edate','Exam Date','trim|xss_clean');
		$this->form_validation->set_rules('examfrom','Exam Starting Time','trim|xss_clean|required');
		$this->form_validation->set_rules('examto','Exam Ending Time','trim|xss_clean|required');
		$this->form_validation->set_rules('room','Room Number','trim|xss_clean');

		if($this->form_validation->run() == FALSE)
		{
			echo validation_errors();
		}
		else
		{
			$tdata = $this->cm->array_from_post(array('examID','classesID','sectionID','subjectID','edate','examfrom','examto','room'));

			$data = array
			(
				'examID' => $tdata['examID'],
				'classesID' => $tdata['classesID'],
				'sectionID' => $tdata['sectionID'],
				'subjectID' => $tdata['subjectID'],
				'edate' => $tdata['edate'],
				'examfrom' => $tdata['examfrom'],
				'examto' => $tdata['examto'],
				'room' => $tdata['room'],
				'year' => date("Y",strtotime($tdata['edate'])),
				);

			$this->cm->_table_name = "examschedule";
			$this->cm->_field_name = "examscheduleID";
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
	//edit exam schedule end


	/**
	*---------------------------------------------------
	* FUNCTION : DELETE EXAM SCHEDULE 					|
	*---------------------------------------------------
	*---------------------------------------------------
	* WRITTEN BY : ARIFUL ISLAM							|
	*---------------------------------------------------
	**/
	public function delete($id=NULL)
	{
		$this->cm->_table_name = "examschedule";
		$this->cm->_field_name = "examscheduleID";
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
	//delete exam schedule end

}

//End of file Exam_schedule.php
//Location : ./application/controller/Exam_schedule.php