<?php defined('BASEPATH') OR exit('No direct script access allowed');

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

class Dashboard extends MY_Controller 
{
	function __construct()
	{
		//unauthorized interuption restricted ain MY_Controller.php
		parent::__construct();
		$this->load->language('dashboard','english');
	}
	
	public function index()
	{
		if($this->session->userdata('usertype') == "Admin")
		{
			$page['subview'] = "dashboard/admin_dashboard";
		}
		elseif($this->session->userdata('usertype') == "Student")
		{
			$page['subview'] = "dashboard/student_dashboard";
		}
		$this->load->view('_main_layout',$page);
	}
}

//End of file Dashboard.php
//Location : ./application/controller/Dashboard.php
