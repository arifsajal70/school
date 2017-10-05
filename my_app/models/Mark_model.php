<?php  defined('BASEPATH') or exit('No direct script access allowed');

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

class Mark_model extends MY_Model
{
	public function get_mark_table($classesID,$sectionID)
	{
		$this->db->select('mark.*');
		$this->db->from('mark');
		$this->db->get_where('');
	}

	public function get_students($classesID,$sectionID)
	{
		$this->db->select('*');
		$this->db->from('student');
		$this->db->where('classesID',$classesID);
		$this->db->where('sectionID',$sectionID);
		return $this->db->get()->result();
	}

	public function check_mark_sheet($examID,$classesID,$sectionID,$subjectID)
	{
		$this->db->select('*');
		$this->db->from('mark');
		$this->db->where('examID',$examID);
		$this->db->where('classesID',$classesID);
		$this->db->where('sectionID',$sectionID);
		$this->db->where('subjectID',$subjectID);
		$this->db->where('year',date('Y'));
		return $this->db->get()->result();
	}

	public function get_mark_sheet($examID,$classesID,$sectionID,$subjectID)
	{
		$this->db->select('mark.* , exam.exam as exam , classes.classes as class , section.section as section , subject.subject as subject , student.name as name , student.roll');
		$this->db->from('mark');
		$this->db->join('exam','mark.examID=exam.examID');
		$this->db->join('classes','mark.classesID=classes.classesID');
		$this->db->join('section','mark.sectionID=section.sectionID');
		$this->db->join('subject','mark.subjectID=subject.subjectID');
		$this->db->join('student','mark.studentID=student.studentID');
		$this->db->where('mark.examID',$examID);
		$this->db->where('mark.classesID',$classesID);
		$this->db->where('mark.sectionID',$sectionID);
		$this->db->where('mark.subjectID',$subjectID);
		$this->db->where('mark.year',date('Y'));
		return $this->db->get()->result();
	}

	public function get_marks($id)
	{
		$this->db->select('mark.* , subject.subject as subject , exam.exam as exam');
		$this->db->from('mark');
		$this->db->join('subject','mark.subjectID=subject.subjectID');
		$this->db->join('exam','mark.examID=exam.examID');
		$this->db->where('studentID',$id);
		$this->db->order_by('mark.examID','ASCE');
		return $this->db->get()->result();
	}
}