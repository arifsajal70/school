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

class Mark extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->language('mark',$this->session->userdata('language'));
		//crud model autoladed in MY_Controller.php
	}

	public function index()
	{
		$page['subview'] = "mark/mark";
		$this->load->view('_main_layout',$page);
	}


	/**
	*---------------------------------------------------
	* FUNCTION : ADDING MARK TABLE 						|
	*---------------------------------------------------
	*---------------------------------------------------
	* WRITTEN BY : ARIFUL ISLAM							|
	*---------------------------------------------------
	**/
	public function mark_table($classesID,$sectionID)
	{
		$this->load->model('mark_model','mm');
		//getting single studnet for getting mark by studentID
		$students = $this->mm->get_students($classesID,$sectionID);
		$n=1;
		foreach($students as $s)
		{	
			$result = array();
			$result[] = $n++;
			$result[] = $s->name;
			$result[] = $s->phone;
			$result[] = $s->email;
			$result[] = view_button('view_result',$s->studentID);

			$table['data'][] = $result;
		}

		echo json_encode($table);
	}


	/**
	*---------------------------------------------------
	* FUNCTION : ADD MARK 								|
	*---------------------------------------------------
	*---------------------------------------------------
	* WRITTEN BY : ARIFUL ISLAM							|
	*---------------------------------------------------
	**/
	public function add()
	{
		$this->load->model('mark_model','mm');
		//form validation rule
		$this->form_validation->set_rules('examID','Exam','trim|xss_clean|required');
		$this->form_validation->set_rules('classesID','Class','trim|xss_clean|required');
		$this->form_validation->set_rules('sectionID','Section','trim|xss_clean|required');
		$this->form_validation->set_rules('subjectID','Subject','trim|xss_clean|required');

		//check validation error if there any
		if($this->form_validation->run() == FALSE)
		{
			echo validation_errors();
		}
		else
		{
			//getting submited data
			$sdata = $this->cm->array_from_post(array('examID','classesID','sectionID','subjectID'));
			
			//check if mark sheet exists or not id not insert mark sheet by student behind the class and section
			if(!$this->mm->check_mark_sheet($sdata['examID'],$sdata['classesID'],$sdata['sectionID'],$sdata['subjectID']))
			{
				//getting student by class and section
				$students = $this->mm->get_students($sdata['classesID'],$sdata['sectionID']);

				//check if student exists or not
				if($students)
				{	
					//if student exists than insert mark sheet into database
					foreach($students as $s)
					{
						$data = array
						(
							'examID' => $sdata['examID'],
							'classesID' => $sdata['classesID'],
							'sectionID' => $sdata['sectionID'],
							'subjectID' => $sdata['subjectID'],
							'studentID' => $s->studentID,
							'year' => date("Y"),
						);

						$this->cm->_table_name = "mark";
						$ins = $this->cm->insert($data);
					}

					//check if data inserted or not
					if($ins)
					{
						echo "Added";
					}
					else
					{
						echo "Notadded";
					}
				}
				//if student not found
				else
				{
					echo "Nostudent";
				}
			}
			else
			{
				//if mark sheet exists
				echo "Alreadyadded";
			}
		}
	}


	/**
	*---------------------------------------------------
	* FUNCTION : EDIT MARK TABLE						|
	*---------------------------------------------------
	*---------------------------------------------------
	* WRITTEN BY : ARIFUL ISLAM							|
	*---------------------------------------------------
	**/
	public function mark_sheet_table($examID,$classesID,$sectionID,$subject)
	{
		$this->load->model('mark_model','mm');
		//getting mark table by class and section
		$sheet = $this->mm->get_mark_sheet($examID,$classesID,$sectionID,$subject);
		$n=1;
		foreach ($sheet as $s)
		{
			$result = array();
			$result[] = $n++;
			$result[] = $s->name;
			$result[] = $s->roll;
			$result[] = $s->class;
			$result[] = $s->section;
			$result[] = "<input class=\"form-control\" value=\"$s->mark\" placeholder=\"Mark\" onchange=\"save_mark(this.id , this.value)\" id=\"$s->markID\"/>";

			$table['data'][] = $result;
		}

		echo json_encode($table);
	}


	/**
	*---------------------------------------------------
	* FUNCTION : VIEW MARKS TABLE						|
	*---------------------------------------------------
	*---------------------------------------------------
	* WRITTEN BY : ARIFUL ISLAM							|
	*---------------------------------------------------
	**/
	public function marks_table($id)
	{
		$this->load->model('mark_model','mm');
		//view mark by student
		$marks = $this->mm->get_marks($id);
		foreach($marks as $m)
		{
			$result = array();
			$result[] = $m->exam;
			$result[] = $m->subject;
			$result[] = $m->mark;
			$result[] = $this->global_c->get_grade($m->mark);

			$table['data'][] = $result;
		}

		echo json_encode($table);
	}


	/**
	*---------------------------------------------------
	* FUNCTION : SINGLE STUDNET							|
	*---------------------------------------------------
	*---------------------------------------------------
	* WRITTEN BY : ARIFUL ISLAM							|
	*---------------------------------------------------
	**/
	public function single_student($id)
	{
		$this->cm->_table_name = "student";
		$this->cm->_field_name = "studentID";
		$this->cm->_primary_key = $id;
		//getting single student data
		$student = $this->cm->get_where();

		foreach($student as $s)
		{
			$result = array();
			$result['studentID'] = $s->studentID;
			$result['name'] = ucwords($s->name);
			$result['dob'] = $s->dob;
			$result['sex'] = $s->sex;
			$result['religion'] = $s->religion;
			$result['email'] = $s->email;
			$result['phone'] = $s->phone;
			$result['address'] = $s->address;
			$result['classesID'] = $s->classesID;
			$result['sectionID'] = $s->sectionID;
			$result['parentID'] = $s->parentID;
			$result['photo'] = $this->global_c->image($s->photo,'user.png');
			$result['username'] = $s->username;
			$result['roll'] = $s->roll;
			$result['create_date'] = $s->create_date;
		}

		echo json_encode($result);
	}


	/**
	*---------------------------------------------------
	* FUNCTION : SET SECTION							|
	*---------------------------------------------------
	*---------------------------------------------------
	* WRITTEN BY : ARIFUL ISLAM							|
	*---------------------------------------------------
	**/
	public function get_section_by_id($id=NULL,$set)
	{
		$this->cm->_table_name = "section";
		$this->cm->_field_name = "classesID";
		$this->cm->_primary_key = $id;
		$section = $this->cm->get_where();

		if($set == "option")
		{
			echo "<option value=''>Section</option>";
			foreach($section as $s)
			{
				echo "<option value=".$s->sectionID.">".$s->section."</option>";
			}
		}
		elseif($set == "link")
		{
			foreach($section as $s)
			{
				echo "<a class=\"dropdown-item\" onclick=\"view_table('$s->sectionID','$s->section')\" style=\"cursor:pointer;\">".$s->section."</option>";
			}
		}

	}


	/**
	*---------------------------------------------------
	* FUNCTION : SUBJECT BY ID							|
	*---------------------------------------------------
	*---------------------------------------------------
	* WRITTEN BY : ARIFUL ISLAM							|
	*---------------------------------------------------
	**/
	public function get_subject_by_id($id=NULL)
	{
		$this->cm->_table_name = "subject";
		$this->cm->_field_name = "classesID";
		$this->cm->_primary_key = $id;
		$subject = $this->cm->get_where();

		echo "<option value=''>Subject</option>";
		foreach($subject as $s)
		{
			echo "<option value=".$s->subjectID.">".$s->subject."</option>";
		}

	}


	/**
	*---------------------------------------------------
	* FUNCTION : SAVE MARK 								|
	*---------------------------------------------------
	*---------------------------------------------------
	* WRITTEN BY : ARIFUL ISLAM							|
	*---------------------------------------------------
	**/
	public function save_mark($id)
	{
		$this->form_validation->set_rules('mark','Mark','trim|xss_clean|required|numeric');

		if($this->form_validation->run() == FALSE)
		{
			echo validation_errors();
		}
		else
		{
			$mdata = $this->cm->array_from_post(array('mark'));

			$this->cm->_table_name = "mark";
			$this->cm->_field_name = "markID";
			$this->cm->_primary_key = $id;

			$update = $this->cm->update(array('mark'=>$mdata['mark']));

			if($update)
			{
				echo "Updated";
			}
			else
			{
				echo "Notupdated";
			}
		}
	}
}