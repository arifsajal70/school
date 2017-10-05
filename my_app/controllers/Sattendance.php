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


class Sattendance extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->language('sattendance_lang',$this->session->userdata('language'));
		//Crud model autoloaded in MY_Controller.php
	}

	public function index()
	{
		$page['subview'] = "attendance/sattendance";
		$this->load->view('_main_layout',$page);
	}

	public function get_section($id,$set)
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

	public function get_register()
	{
		$this->load->model('sattendance_model','sam');
		$this->form_validation->set_rules('classesID','Class','trim|xss_clean|required');
		$this->form_validation->set_rules('sectionID','Section','trim|xss_clean|required');
		$this->form_validation->set_rules('date','Date','trim|xss_clean|required');
		
		if($this->form_validation->run() == FALSE)
		{
			echo validation_errors();
		}
		else
		{
			$stud = $this->cm->array_from_post(array('classesID','sectionID','date'));

			//Check Register Already Exist or not
			$check_register = $this->sam->check_register($stud['classesID'],$stud['sectionID'],strtotime($stud['date']));

			if($check_register)
			{
				echo "Added";
			}
			else
			{
				//Insert Into Attendance If Register Not Exist
				$get_student = $this->sam->get_student($stud['classesID'],$stud['sectionID']);

				if($get_student)
				{
					foreach($get_student as $gs)
					{
						$data = array
						(
							'classesID' => $stud['classesID'],
							'sectionID' => $stud['sectionID'],
							'studentID' => $gs->studentID,
							'username' => $this->session->userdata('username'),
							'usertype' => $this->session->userdata('usertype'),
							'monthyear' => date("Y-m",strtotime($stud['date'])),
						);

						$this->cm->_table_name = 'attendance';
						$ins = $this->cm->insert($data);
					}

					$this->get_register();
				}
			}
		}
	}


	// Getting table After checking register exist or not
	public function attendance_table($classesID,$sectionID,$date)
	{
		$this->load->model('sattendance_model','sam');

		$get_register = $this->sam->get_register($classesID,$sectionID,strtotime($date));
		$n=1;
		foreach($get_register as $gr)
		{
			$result = array();
			$result[] = $n++;
			$result[] = $gr->student;
			$result[] = $gr->classes;
			$result[] = $gr->section;
			$result[] = attendance_switch('change_attendance',$gr->attendanceID,$gr->attendance);

			$table['data'][] = $result;
		}

		echo json_encode($table);
	}

	public function change_attendance($attendanceID,$date)
	{
		$this->cm->_table_name = "attendance";
		$this->cm->_field_name = "attendanceID";
		$this->cm->_primary_key = $attendanceID;
		$status = $this->cm->get_row('a'.abs(date("d",strtotime($date))));

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

		$this->cm->_table_name = "attendance";
		$this->cm->_field_name = "attendanceID";
		$this->cm->_primary_key = $attendanceID;
		$update = $this->cm->update(array("a".abs(date("d",strtotime($date)))=>$status));

		if($update)
		{
			echo "Updated";
		}
		else
		{
			echo "Notupdated";
		}
	}

	public function student_table($classesID,$sectionID)
	{
		$this->load->model('sattendance_model','sam');

		$student = $this->sam->get_student($classesID,$sectionID);
		$n=1;
		foreach($student as $s)
		{
			$result = array();
			$result[] = $n++;
			$result[] = $s->name;
			$result[] = $s->roll;
			$result[] = $s->class;
			$result[] = $s->section;
			$result[] = $s->phone;
			$result[] = view_button('view_student',$s->studentID);

			$table['data'][] = $result;
		}

		echo json_encode($table);
	}

	public function get_single_student($studentID)
	{
		$this->load->model('sattendance_model','sam');
		$student = $this->sam->get_single_student($studentID);

		foreach ($student as $s)
		{
			$result = array();
			//student Details
			$result['student_name'] = $s->name;
			$result['student_class'] = $s->class;
			$result['student_section'] = $s->section;
			$result['student_parent_name'] = $s->parent_name;
			$result['student_parent_phone'] = $s->parent_phone;
			$result['student_dob'] = $s->dob;
			$result['student_roll'] = $s->roll;
			$result['student_photo'] = $s->photo;
			$result['monthyear'] = $s->monthyear;
			//attendance details

			$result['01'] = $s->a1;
			$result['02'] = $s->a2;
			$result['03'] = $s->a3;
			$result['04'] = $s->a4;
			$result['05'] = $s->a5;
			$result['06'] = $s->a6;
			$result['07'] = $s->a7;
			$result['08'] = $s->a8;
			$result['09'] = $s->a9;
			$result['10'] = $s->a10;
			$result['11'] = $s->a11;
			$result['12'] = $s->a12;
			$result['13'] = $s->a13;
			$result['14'] = $s->a14;
			$result['15'] = $s->a15;
			$result['16'] = $s->a16;
			$result['17'] = $s->a17;
			$result['18'] = $s->a18;
			$result['19'] = $s->a19;
			$result['20'] = $s->a20;
			$result['21'] = $s->a21;
			$result['22'] = $s->a22;
			$result['23'] = $s->a23;
			$result['24'] = $s->a24;
			$result['25'] = $s->a25;
			$result['26'] = $s->a26;
			$result['27'] = $s->a27;
			$result['28'] = $s->a28;
			$result['29'] = $s->a29;
			$result['30'] = $s->a30;
			$result['31'] = $s->a31;

		}

		echo json_encode($result);
	}
}

//End of file Sattendance.php
//Location : ./application/controller/Sattendance.php