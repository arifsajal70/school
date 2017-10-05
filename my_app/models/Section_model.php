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

class Section_model extends MY_Model
{
	public function section_table($classesID)
	{
		$this->db->select('*');
		$this->db->from('section');
		$this->db->join('teacher','section.teacherID=teacher.teacherID');
		$this->db->join('classes','section.classesID=classes.classesID');
		$this->db->where('section.classesID',$classesID);
		$this->db->order_by('classes.classes_numeric','ASCE');
		return $this->db->get()->result();
	}
}

//End of file Section_model.php
//Location : ./application/model/Section_model.