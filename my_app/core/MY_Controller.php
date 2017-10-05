<?php defined("BASEPATH") or exit('Direct script access not Allowed');

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

class MY_Controller extends CI_Controller
{
	function __construct()
	{
		
		parent::__construct();
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->library('global_c');
		$this->load->helper('form');
		$this->load->helper('security');
		$this->load->helper('action');
		$this->load->helper('language');
		$this->load->helper('url');
		$this->load->model('crud_model','cm');
		$this->load->language('menu',$this->session->userdata('language'));
		$this->session->userdata('loggedin') == TRUE || redirect('signin?Signin_first_than_come');
	}
}

//End of file MY_Controller.php
//Location : ./my_app/core/MY_Controller.php