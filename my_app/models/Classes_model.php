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

class Classes_model extends MY_Model
{
	public function classes_table()
	{
		$this->db->select('*');
		$this->db->from('classes');
		$this->db->join('teacher','classes.teacherID=teacher.teacherID');
		$this->db->order_by('classes.classes_numeric','ASCE');
		return $this->db->get()->result();
	}
}

//End of file Classes_model.php
//Location : ./application/model/CLasses_model.php