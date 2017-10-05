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

class Teacher extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->language('teacher',$this->session->userdata('language'));
		//crud model autoloaded in MY_Controller.php
	}

	public function index()
	{
		$page['subview'] = "teacher/teacher";
		$this->load->view('_main_layout',$page);
	}


	/**
	*---------------------------------------------------
	* FUNCTION : TEACHERS TABLE							|
	*---------------------------------------------------
	*---------------------------------------------------
	* WRITTEN BY : ARIFUL ISLAM							|
	*---------------------------------------------------
	**/
	public function teacher_table()
	{
		$this->cm->_table_name = "teacher";
		$this->cm->_field_name = "teacherID";
		$this->cm->_order_by = "DESC";
		$table = $this->cm->get_by_order();
		$n=1;
		foreach($table as $t)
		{
			$result = array();
			$result[] = $n++;
			$result[] = $t->name;
			$result[] = $t->email;
			$result[] = $t->phone;
			$result[] = status_switch('change_status',$t->teacherID,$t->status);
			$result[] = view_button('view_teacher',$t->teacherID)." ".pass_change_button('pass_change',$t->teacherID)." ".edit_button('edit_teacher',$t->teacherID)." ".delete_button('delete_teacher',$t->teacherID);

			$table['data'][] = $result;
		}

		echo json_encode($table);
	}
	//teacher table end


	/**
	*---------------------------------------------------
	* FUNCTION : ADD TEACHER							|
	*---------------------------------------------------
	*---------------------------------------------------
	* WRITTEN BY : ARIFUL ISLAM							|
	*---------------------------------------------------
	**/
	public function add()
	{
		//form validation rule
		$this->form_validation->set_rules('name','Name','trim|xss_clean|required');
		$this->form_validation->set_rules('designation','Designation','trim|xss_clean|required');
		$this->form_validation->set_rules('dob','Date Of Birth','trim|xss_clean|required');
		$this->form_validation->set_rules('sex','Gender','trim|xss_clean|max_length[7]');
		$this->form_validation->set_rules('religion','Religion','trim|xss_clean');
		$this->form_validation->set_rules('email','Email','trim|xss_clean|valid_email|is_unique[teacher.email]|is_unique[student.email]|is_unique[parent.email]|required');
		$this->form_validation->set_rules('phone','Phone Number','trim|xss_clean|is_unique[teacher.phone]');
		$this->form_validation->set_rules('address','Address','trim|xss_clean');
		$this->form_validation->set_rules('doj','Date Of Joining','trim|xss_clean|required');
		$this->form_validation->set_rules('username','Username','trim|xss_clean|min_length[5]|is_unique[teacher.username]|is_unique[student.username]|is_unique[parent.username]|required');
		$this->form_validation->set_rules('password','Password','trim|xss_clean|min_length[5]|required');

		//check if form validation error or not
		if($this->form_validation->run() == FALSE)
		{
			echo validation_errors();
		}
		else
		{
			//getting submitted data
			$tdata = $this->cm->array_from_post(array('name','designation','dob','sex','religion','email','phone','address','doj','username','password'));

			//file processing
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

			//making data for inserting into database
			$data = array
			(
				'name' => $tdata['name'],
				'email' => $tdata['email'],
				'phone' => $tdata['phone'],
				'dob' => $tdata['dob'],
				'sex' => $tdata['sex'],
				'religion' => $tdata['religion'],
				'address' => $tdata['address'],
				'designation' => $tdata['designation'],
				'doj' => $tdata['doj'],
				'username' => $tdata['username'],
				'password' => $this->cm->hash($tdata['password']),
				'photo' => $file_name,
				'status' => 1,
				'usertype' => "Teacher",
			);

			//insert into database
			$this->cm->_table_name = "teacher";
			$ins = $this->cm->insert($data);

			//checking if data inserted or not
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
	//Add teacher end


	/**
	*---------------------------------------------------
	* FUNCTION : SINGLE TEACHER							|
	*---------------------------------------------------
	*---------------------------------------------------
	* WRITTEN BY : ARIFUL ISLAM							|
	*---------------------------------------------------
	**/
	public function single($id=NULL)
	{
		//getting single teacher
		$this->cm->_table_name = "teacher";
		$this->cm->_field_name = "teacherID";
		$this->cm->_primary_key = $id;
		$teacher = $this->cm->get_where();

		foreach($teacher as $t)
		{
			$result = array();
			$result['teacherID'] = $t->teacherID;
			$result['name'] = ucwords($t->name);
			$result['designation'] = $t->designation;
			$result['dob'] = $t->dob;
			$result['sex'] = $t->sex;
			$result['religion'] = $t->religion;
			$result['email'] = $t->email;
			$result['phone'] = $t->phone;
			$result['address'] = $t->address;
			$result['doj'] = $t->doj;
			$result['photo'] = $this->global_c->image($t->photo,'user.png');
			$result['username'] = $t->username;
		}

		echo json_encode($result);
	}
	//single teacher end


	/**
	*---------------------------------------------------
	* FUNCTION : EDIT TEACHER							|
	*---------------------------------------------------
	*---------------------------------------------------
	* WRITTEN BY : ARIFUL ISLAM							|
	*---------------------------------------------------
	**/
	public function edit($id=null)
	{
		//form validation rules
		$this->form_validation->set_rules('name','Name','trim|xss_clean|required');
		$this->form_validation->set_rules('designation','Designation','trim|xss_clean|required');
		$this->form_validation->set_rules('dob','Date Of Birth','trim|xss_clean|required');
		$this->form_validation->set_rules('sex','Gender','trim|xss_clean|max_length[7]');
		$this->form_validation->set_rules('religion','Religion','trim|xss_clean');
		$this->form_validation->set_rules('email','Email','trim|xss_clean|valid_email|required');
		$this->form_validation->set_rules('phone','Phone Number','trim|xss_clean');
		$this->form_validation->set_rules('address','Address','trim|xss_clean');
		$this->form_validation->set_rules('doj','Date Of Joining','trim|xss_clean|required');

		//check if there any validation error
		if($this->form_validation->run() == FALSE)
		{
			echo validation_errors();
		}
		else
		{
			//getting submited data
			$tdata = $this->cm->array_from_post(array('name','designation','dob','sex','religion','email','phone','address','doj'));

			//getting filename for processing
			$this->cm->_table_name = "teacher";
			$this->cm->_field_name = "teacherID";
			$this->cm->_primary_key = $id;
			$file_name = $this->cm->get_row('photo');

			//file processing
			if(!empty($_FILES['photo']['name']))
			{
				$upload = $this->cm->upload('photo','./uploads/');
				if($file_name != null)
				{
					//deleting previous file
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
					exit();
				}
			}

			//make data for update database
			$data = array
			(
				'name' => $tdata['name'],
				'phone' => $tdata['phone'],
				'dob' => $tdata['dob'],
				'sex' => $tdata['sex'],
				'religion' => $tdata['religion'],
				'address' => $tdata['address'],
				'designation' => $tdata['designation'],
				'photo' => $file_name,
			);

			//updating database
			$this->cm->_table_name = "teacher";
			$this->cm->_field_name = "teacherID";
			$this->cm->_primary_key = $id;

			$update = $this->cm->update($data);

			//check if database updated or not
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
	//edit teacher end


	/**
	*---------------------------------------------------
	* FUNCTION : DELETE TEACHER							|
	*---------------------------------------------------
	*---------------------------------------------------
	* WRITTEN BY : ARIFUL ISLAM							|
	*---------------------------------------------------
	**/
	public function delete($id=NULL)
	{	
		//getting filename
		$this->cm->_table_name = "teacher";
		$this->cm->_field_name = "teacherID";
		$this->cm->_primary_key = $id;
		$file_name = $this->cm->get_row('photo');

		if($file_name != null)
		{	
			//delete file
			$this->cm->delete_file($file_name,'./uploads/');
		}

		//deleting teacher
		$this->cm->_table_name = "teacher";
		$this->cm->_field_name = "teacherID";
		$this->cm->_primary_key = $id;

		$delete = $this->cm->delete($id);

		//check if deleted or not
		if($delete)
		{
			echo "Deleted";
		}
		else
		{
			echo "Notdeleted";
		}
	}
	//delete teacher end


	/**
	*---------------------------------------------------
	* FUNCTION : TEACHER PASSWORD CHANGE				|
	*---------------------------------------------------
	*---------------------------------------------------
	* WRITTEN BY : ARIFUL ISLAM							|
	*---------------------------------------------------
	**/
	public function change_pass($id=null)
	{
		//form validation rule
		$this->form_validation->set_rules('password','Password','trim|xss_clean|min_length[6]|required');
		$this->form_validation->set_rules('c_password','Confirm Password','trim|xss_clean|matches[password]');

		//check if there any validation error
		if($this->form_validation->run() == FALSE)
		{
			echo validation_errors();
		}
		else
		{
			$p_data = $this->cm->array_from_post(array('password'));

			//updating teacher password
			$this->cm->_table_name = "teacher";
			$this->cm->_field_name = "teacherID";
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
	* FUNCTION : TEACHER STATUS CHANGE					|
	*---------------------------------------------------
	*---------------------------------------------------
	* WRITTEN BY : ARIFUL ISLAM							|
	*---------------------------------------------------
	**/
	public function change_status($id,$status)
	{
		//switch status first
		$st = $status;

		switch ($st) {

			case '0':
			$st=1;
			break;

			case '1':
			$st=0;
			break;
			
		}

		//update status in database
		$this->cm->_table_name = "teacher";
		$this->cm->_field_name = "teacherID";
		$this->cm->_primary_key = $id;
		$update = $this->cm->update(array('status'=>$st));

		//check database updated or not
		if($update)
		{
			echo "Changed";
		}
		else
		{
			echo "Notchanged";
		}
	}
	//status change end

}

//End of file Teacher.php
//Location: ./application/controller/Teacher.php