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

class Student_model extends MY_Model
{
	public function get_student($classesID,$sectionID)
	{
		$this->db->select('*');
		$this->db->from('student');
		$this->db->where('classesID',$classesID);
		$this->db->where('sectionID',$sectionID);
		$this->db->order_by('student.studentID',"DESC");
		return $this->db->get()->result();
	}

	public function get_single_student($id)
	{
		$this->db->select('student.* , classes.classes as class , section.section as section ');
		$this->db->from('student');
		$this->db->join('classes','student.classesID=classes.classesID');
		$this->db->join('section','student.sectionID=section.sectionID');
		$this->db->where('student.studentID',$id);
		return $this->db->get()->result();
	}
}

//End of file Student_model.php
//Location : ./application/model/Student_model.php