<?php defined("BASEPATH") or exit("No direct script access allowed");

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

class Global_c
{
	public function image($file_name,$default)
	{
		if($file_name != null && file_exists('./uploads/'.$file_name))
		{
			return "./uploads/".$file_name;
		}
		else
		{
			return "./uploads/default/".$default;
		}
	}

	public function get_grade($mark)
	{
		$CI =& get_instance();
		return $CI->db->get_where('grade',array('gradefrom <='=>$mark,'gradeupto >='=>$mark))->row()->grade;
	}
}