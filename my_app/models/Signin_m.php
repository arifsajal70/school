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

class Signin_m extends MY_Model
{
	public function get_loggedin()
	{
		$tables = array('student' => 'student', 'parent' => 'parent', 'teacher' => 'teacher', 'user' => 'user', 'setting' => 'setting');
		$array = array();
		$i = 0;
		$username = $this->input->post('username');
		$password = $this->hash($this->input->post('password'));
		$userdata = '';
		foreach ($tables as $table)
		{
			$user = $this->db->get_where($table, array("username" => $username, "password" => $password));
			$alluserdata = $user->row();

			if(count($alluserdata)) {
				$userdata = $alluserdata;
				$array['permition'][$i] = 'yes';
			} else {
				$array['permition'][$i] = 'no';
			}
			$i++;
		}

		if(in_array('yes', $array['permition']) && $userdata->status == 1)
		{
			$data = array(
				"name" => $userdata->name,
				"email" => $userdata->email,
				"usertype" => $userdata->usertype,
				"username" => $userdata->username,
				"photo" => $userdata->photo,
				"lang" => "english",
				"loggedin" => TRUE,
				"locked" => FALSE,
			);
			$this->session->set_userdata($data);
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
}

//End Of File Signin_m.php
//Location : ./application/models/Signin_m.php