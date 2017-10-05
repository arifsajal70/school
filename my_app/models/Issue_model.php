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

class Issue_model extends MY_Model
{
	public function get_issue()
	{
		$this->db->select('*');
		$this->db->from('issue');
		$this->db->join('lmember','issue.lID=lmember.lID');
		$this->db->join('student','lmember.studentID=student.studentID');
		$this->db->join('book','issue.bookID=book.bookID');
		return $this->db->get()->result();
	}
}