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

class Exam_schedule_model extends MY_Model
{
	public function get_esm_table($classesID,$sectionID)
	{
		$this->db->select('examschedule.* , classes.classes as class , section.section as section , exam.exam as exam , subject.subject as subject');
		$this->db->from('examschedule');
		$this->db->join('classes','examschedule.classesID=classes.classesID');
		$this->db->join('section','examschedule.sectionID=section.sectionID');
		$this->db->join('exam','examschedule.examID=exam.examID');
		$this->db->join('subject','examschedule.subjectID=subject.subjectID');
		$this->db->where('examschedule.classesID',$classesID);
		$this->db->where('examschedule.sectionID',$sectionID);
		return $this->db->get()->result();

	}

	public function get_attendance_register($id)
	{
		$this->db->select('eattendance.* , student.*');
		$this->db->from('eattendance');
		$this->db->join('student','eattendance.studentID=student.studentID');
		$this->db->where('eattendance.examscheduleID',$id);
		return $this->db->get()->result();
	}

	public function get_exam_details($id)
	{
		$this->db->select('examschedule.* , classes.classes as class , section.section as section , exam.exam as exam , subject.subject as subject');
		$this->db->from('examschedule');
		$this->db->join('classes','examschedule.classesID=classes.classesID');
		$this->db->join('section','examschedule.sectionID=section.sectionID');
		$this->db->join('exam','examschedule.examID=exam.examID');
		$this->db->join('subject','examschedule.subjectID=subject.subjectID');
		$this->db->where('examschedule.examscheduleID',$id);
		return $this->db->get()->result();
	}

	public function get_attendance_table($classesID,$sectionID)
	{
		$this->db->select('*');
		$this->db->from('student');
		$this->db->where('classesID',$classesID);
		$this->db->where('sectionID',$sectionID);
		return $this->db->get()->result();
	}
}