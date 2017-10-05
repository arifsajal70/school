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

class Student extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->language('student',$this->session->userdata('language'));
		//Crud model autoloaded in MY_Controller.php
	}

	public function index()
	{
		$page['subview'] = "student/student";
		$this->load->view('_main_layout',$page);
	}


	/**
	*---------------------------------------------------
	* FUNCTION : STUDENT TABLE							|
	*---------------------------------------------------
	*---------------------------------------------------
	* WRITTEN BY : ARIFUL ISLAM							|
	*---------------------------------------------------
	**/
	public function student_table($classesID,$sectionID)
	{
		//Load Student model
		$this->load->model('student_model','sm');
		//Getting all student from student_model
		$student = $this->sm->get_student($classesID,$sectionID);
		$n=1;
		foreach($student as $s)
		{
			$result = array();
			$result[] = $n++;
			$result[] = $s->name;
			$result[] = $s->email;
			$result[] = $s->phone;
			$result[] = status_switch('change_status',$s->studentID,$s->status);
			$result[] = view_button('view_student',$s->studentID)." ".pass_change_button('pass_change',$s->studentID)." ".edit_button('edit_student',$s->studentID)." ".delete_button('delete_student',$s->studentID);

			$table['data'][] = $result;
		}

		echo json_encode($table);
	}
	//student table end



	/**
	*---------------------------------------------------
	* FUNCTION : ADD STUDENT							|
	*---------------------------------------------------
	*---------------------------------------------------
	* WRITTEN BY : ARIFUL ISLAM							|
	*---------------------------------------------------
	**/

	public function add()
	{
		//Form Validation Rules
		$this->form_validation->set_rules('name','Name','trim|xss_clean|required');
		$this->form_validation->set_rules('dob','Date Of Birth','trim|xss_clean|required');
		$this->form_validation->set_rules('sex','Gender','trim|xss_clean|max_length[7]|required');
		$this->form_validation->set_rules('religion','Religion','trim|xss_clean');
		$this->form_validation->set_rules('email','Email','trim|xss_clean|valid_email|is_unique[teacher.email]|is_unique[student.email]|is_unique[parent.email]|required');
		$this->form_validation->set_rules('phone','Phone Number','trim|xss_clean|is_unique[teacher.phone]');
		$this->form_validation->set_rules('address','Address','trim|xss_clean');
		$this->form_validation->set_rules('classesID','Class','trim|xss_clean|required');
		$this->form_validation->set_rules('sectionID','Section','trim|xss_clean|required');
		$this->form_validation->set_rules('roll','Roll','trim|xss_clean|is_unique[student.roll]|required');
		$this->form_validation->set_rules('parentID','Gurdian','trim|xss_clean|required');
		$this->form_validation->set_rules('username','Username','trim|xss_clean|min_length[5]|is_unique[teacher.username]|is_unique[student.username]|is_unique[parent.username]|required');
		$this->form_validation->set_rules('password','Password','trim|xss_clean|min_length[5]|required');

		//Form Validation Check
		if($this->form_validation->run() == FALSE)
		{
			echo validation_errors();
		}
		else
		{
			//Getting Submitted Data
			$tdata = $this->cm->array_from_post(array('name','dob','sex','religion','email','phone','address','classesID','sectionID','roll','parentID','username','password'));

			//File Processing If Have
			$file_name = "";
			if(!empty($_FILES['photo']['name']))
			{
				$upload = $this->cm->upload('photo','./uploads/');

				if($upload)
				{
					$file_name = $this->upload->file_name ; 
				}
				else
				{
					$file_name = "";
					echo $this->upload->error;
					exit();
				}
			}

			//Making Data For Inserting Into Database
			$data = array
			(
				'name' => $tdata['name'],
				'dob' => $tdata['dob'],
				'sex' => $tdata['sex'],
				'religion' => $tdata['religion'],
				'email' => $tdata['email'],
				'phone' => $tdata['phone'],
				'address' => $tdata['address'],
				'classesID' => $tdata['classesID'],
				'sectionID' => $tdata['sectionID'],
				'roll' => $tdata['roll'],
				'parentID' => $tdata['parentID'],
				'username' => $tdata['username'],
				'password' => $this->cm->hash($tdata['password']),
				'photo' => $file_name,
				'create_date' => date("Y-m-d"),
				'status' => 1,
				'usertype' => "Student",
			);

			//Insert Submitted Data Into Database
			$this->cm->_table_name = "student";
			$ins = $this->cm->insert($data);


			//Checking Data Inserted Or Not
			if($ins)
			{
				echo "Added";
			}
			else
			{
				echo "Notadded";
			}
		}
	}
	//Add Student Function End


	/**
	*---------------------------------------------------
	* FUNCTION : SINGLE STUDENT							|
	*---------------------------------------------------
	*---------------------------------------------------
	* WRITTEN BY : ARIFUL ISLAM							|
	*---------------------------------------------------
	**/
	public function single($id=NULL)
	{
		//Load Student Model first
		$this->load->model('student_model','sm');
		//Getting single student from student model
		$student = $this->sm->get_single_student($id);

		foreach($student as $t)
		{
			$result = array();
			$result['studentID'] = $t->studentID;
			$result['name'] = ucwords($t->name);
			$result['dob'] = $t->dob;
			$result['gender'] = $t->sex;
			$result['religion'] = $t->religion;
			$result['email'] = $t->email;
			$result['phone'] = $t->phone;
			$result['address'] = $t->address;
			$result['classesID'] = $t->classesID;
			$result['sectionID'] = $t->sectionID;
			$result['parentID'] = $t->parentID;
			$result['photo'] = $this->global_c->image($t->photo,'user.png');
			$result['username'] = $t->username;
			$result['class'] = $t->class;
			$result['section'] = $t->section;
			$result['roll'] = $t->roll;
			$result['create_date'] = $t->create_date;
		}

		$teacher = json_encode($result);

		echo $teacher;
	}
	//sending single student end


	/**
	*---------------------------------------------------
	* FUNCTION : EDIT STUDENT							|
	*---------------------------------------------------
	*---------------------------------------------------
	* WRITTEN BY : ARIFUL ISLAM							|
	*---------------------------------------------------
	**/
	public function edit($id=null)
	{
		//form validation rules
		$this->form_validation->set_rules('name','Name','trim|xss_clean|required');
		$this->form_validation->set_rules('dob','Date Of Birth','trim|xss_clean|required');
		$this->form_validation->set_rules('sex','Gender','trim|xss_clean|max_length[7]|required');
		$this->form_validation->set_rules('religion','Religion','trim|xss_clean');
		$this->form_validation->set_rules('email','Email','trim|xss_clean|valid_email|required');
		$this->form_validation->set_rules('phone','Phone Number','trim|xss_clean');
		$this->form_validation->set_rules('address','Address','trim|xss_clean');
		$this->form_validation->set_rules('classesID','Class','trim|xss_clean|required');
		$this->form_validation->set_rules('sectionID','Section','trim|xss_clean|required');
		$this->form_validation->set_rules('roll','Roll','trim|xss_clean|required');
		$this->form_validation->set_rules('parentID','Gurdian','trim|xss_clean|required');

		//check if there any validation error or not
		if($this->form_validation->run() == FALSE)
		{
			echo validation_errors();
		}
		else
		{
			//getting submited data
			$tdata = $this->cm->array_from_post(array('name','dob','sex','religion','email','phone','address','classesID','sectionID','roll','parentID'));

			//getting filename first for processing
			$this->cm->_table_name = "student";
			$this->cm->_field_name = "studentID";
			$this->cm->_primary_key = $id;
			$file_name = $this->cm->get_row('photo');

			//file processing
			if(!empty($_FILES['photo']['name']))
			{
				$upload = $this->cm->upload('photo','./uploads/');
				if($file_name != null)
				{
					$this->cm->delete_file($file_name,'./uploads/');
				}

				if($upload)
				{
					$file_name = $this->upload->file_name ; 
				}
				else
				{
					$file_name = "";
					echo $upload;
				}
			}

			//making data for update student
			$data = array
			(
				'name' => $tdata['name'],
				'dob' => $tdata['dob'],
				'sex' => $tdata['sex'],
				'religion' => $tdata['religion'],
				'email' => $tdata['email'],
				'phone' => $tdata['phone'],
				'address' => $tdata['address'],
				'classesID' => $tdata['classesID'],
				'sectionID' => $tdata['sectionID'],
				'roll' => $tdata['roll'],
				'parentID' => $tdata['parentID'],
				'photo' => $file_name,
			);

			//update submited data
			$this->cm->_table_name = "student";
			$this->cm->_field_name = "studentID";
			$this->cm->_primary_key = $id;

			$update = $this->cm->update($data);

			//check student updated or not
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
	//edit single student end


	/**
	*---------------------------------------------------
	* FUNCTION : DELETE STUDENT							|
	*---------------------------------------------------
	*---------------------------------------------------
	* WRITTEN BY : ARIFUL ISLAM							|
	*---------------------------------------------------
	**/
	public function delete($id=NULL)
	{
		//getting filename first for delete
		$this->cm->_table_name = "student";
		$this->cm->_field_name = "studentID";
		$this->cm->_primary_key = $id;
		$file_name = $this->cm->get_row('photo');

		//check if there was any file or not
		if($file_name != null)
		{	
			//delete file
			$this->cm->delete_file($file_name,'./uploads/');
		}

		//delete student data
		$this->cm->_table_name = "student";
		$this->cm->_field_name = "studentID";
		$this->cm->_primary_key = $id;

		$delete = $this->cm->delete($id);

		//check student data deleted or not
		if($delete)
		{
			echo "Deleted";
		}
		else
		{
			echo "Notdeleted";
		}
	}
	//Delete Student end


	/**
	*---------------------------------------------------
	* FUNCTION : CHANGE PASSWORD						|
	*---------------------------------------------------
	*---------------------------------------------------
	* WRITTEN BY : ARIFUL ISLAM							|
	*---------------------------------------------------
	**/
	public function change_pass($id=null)
	{
		//form validation rules
		$this->form_validation->set_rules('password','Password','trim|xss_clean|min_length[6]|required');
		$this->form_validation->set_rules('c_password','Confirm Password','trim|xss_clean|matches[password]');

		//check if there any validation error or not
		if($this->form_validation->run() == FALSE)
		{
			echo validation_errors();
		}
		else
		{
			//get submited data
			$p_data = $this->cm->array_from_post(array('password'));

			//update password
			$this->cm->_table_name = "student";
			$this->cm->_field_name = "studentID";
			$this->cm->_primary_key = $id;

			$update = $this->cm->update(array('password'=>$this->cm->hash($p_data['password'])));

			//check if password updated or not
			if($update)
			{
				echo "Changed";
			}
			else
			{
				echo "Notchanged";
			}
		}
	}
	//password change end


	/**
	*---------------------------------------------------
	* FUNCTION : CHANGE PASSWORD						|
	*---------------------------------------------------
	*---------------------------------------------------
	* WRITTEN BY : ARIFUL ISLAM							|
	*---------------------------------------------------
	**/
	public function change_status($id,$status)
	{
		//first switch the status
		$st = $status;

		switch ($st) {

			case '0':
			$st=1;
			break;

			case '1':
			$st=0;
			break;
			
		}

		//update the status
		$this->cm->_table_name = "student";
		$this->cm->_field_name = "studentID";
		$this->cm->_primary_key = $id;
		$update = $this->cm->update(array('status'=>$st));

		if($update)
		{
			echo "Changed";
		}
		else
		{
			echo "Notchanged";
		}
	}
	//Status Change End

}

//End of file Student.php
//Location : ./application/controller/Student.php