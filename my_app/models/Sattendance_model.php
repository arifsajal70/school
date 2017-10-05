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


class Sattendance_model extends MY_Model
{
	public function check_register($classesID,$sectionID,$date)
	{
		$this->db->select('*');
		$this->db->from('attendance');
		$this->db->where('classesID',$classesID);
		$this->db->where('sectionID',$sectionID);
		$this->db->where('monthyear',date("Y-m",$date));
		return $this->db->get()->result();
	}

	public function get_student($classesID,$sectionID)
	{
		$this->db->select('student.* , classes.classes as class , section.section as section , parent.name as parent');
		$this->db->from('student');
		$this->db->join('classes','student.classesID=classes.classesID');
		$this->db->join('section','student.sectionID=section.sectionID');
		$this->db->join('parent','student.parentID=parent.parentID');
		$this->db->where('student.classesID',$classesID);
		$this->db->where('student.sectionID',$sectionID);
		return $this->db->get()->result();
	}

	public function get_register($classesID,$sectionID,$date)
	{
		$this->db->select('attendance.* , attendance.a'.abs(date("d",$date)).' as attendance , student.name as student , classes.classes as classes , section.section as section');
		$this->db->from('attendance');
		$this->db->join('student','attendance.studentID=student.studentID');
		$this->db->join('classes','attendance.classesID=classes.classesID');
		$this->db->join('section','attendance.sectionID=section.sectionID');
		$this->db->where('attendance.classesID',$classesID);
		$this->db->where('attendance.sectionID',$sectionID);
		$this->db->where('monthyear',date("Y-m",$date));
		return $this->db->get()->result();
	}

	//Getting single student information with attendance detals
	public function get_single_student($studentID)
	{
		$this->db->select('attendance.* , student.* , classes.classes as class , section.section as section , parent.name as parent_name , parent.phone as parent_phone');
		$this->db->from('attendance');
		$this->db->join('student','student.studentID=attendance.studentID');
		$this->db->join('classes','classes.classesID=attendance.classesID');
		$this->db->join('section','section.sectionID=attendance.sectionID');
		$this->db->join('parent','parent.parentID=student.parentID');
		$this->db->where('attendance.studentID',$studentID);
		$this->db->where('attendance.monthyear',date("Y-m"));
		return $this->db->get()->result();
	}
}

//End of file Sattendance_model.php
//Location : ./application/model/Sattendance_model.php