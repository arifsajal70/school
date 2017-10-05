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

class Signin extends Admin_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->load->language('signin',$this->session->userdata('language'));
		//Signin_m loaded in Admin_Controller by Named sm
	}

	public function index()
	{
		$this->session->userdata('loggedin') == FALSE || redirect('dashboard');
		$this->load->view('pages/auth/signin');
	}

	public function ajax_login()
	{
		$this->session->userdata('loggedin') == FALSE || redirect('dashboard');

		$this->form_validation->set_rules('username','Username','trim|xss_clean|min_length[5]|required');
		$this->form_validation->set_rules('password','Password','trim|xss_clean|min_length[5]|required');

		if($this->form_validation->run() == FALSE)
		{
			echo validation_errors();
		}
		else
		{
			$login = $this->sm->get_loggedin();

			if($login != FALSE)
			{
				echo "loggedin";
			}
			else
			{
				echo "notloggedin";
			}
		}
	}

	public function signout()
	{
		$this->session->sess_destroy();
		redirect('signin?Signout');
	}
}

//End of file Signin.php
//Location : ./application/controller/Signin.php
