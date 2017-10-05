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

class Subject_model extends MY_Model
{
	public function get_subjects($id)
	{
		$this->db->select('subject.* , classes.classes as class , teacher.name as teacher');
		$this->db->from('subject');
		$this->db->join('classes','subject.classesID=classes.classesID');
		$this->db->join('teacher','subject.teacherID=teacher.teacherID');
		$this->db->where('subject.classesID',$id);
		return $this->db->get()->result();
	}
}

//End of file Subject_model.php
//Location : ./application/model/Subject_model.