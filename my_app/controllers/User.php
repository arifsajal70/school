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

class User extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->language('user',$this->session->userdata('language'));
		//crud model autoloaded in MY_Controller.php
	}

	public function index()
	{
		$page['subview'] = "users/users";
		$this->load->view('_main_layout',$page);
	}


	/**
	*---------------------------------------------------
	* FUNCTION : USER TABLE 							|
	*---------------------------------------------------
	*---------------------------------------------------
	* WRITTEN BY : ARIFUL ISLAM							|
	*---------------------------------------------------
	**/
	public function user_table()
	{
		$this->cm->_table_name = "user";
		$this->cm->_field_name = "userID";
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
			$result[] = $t->usertype;
			$result[] = status_switch('change_status',$t->userID,$t->status);
			$result[] = view_button('view_user',$t->userID)." ".pass_change_button('pass_change',$t->userID)." ".edit_button('edit_user',$t->userID)." ".delete_button('delete_user',$t->userID);

			$data['data'][] = $result;
		}

		echo json_encode($data);
	}
	//user table end


	/**
	*---------------------------------------------------
	* FUNCTION : ADD USER								|
	*---------------------------------------------------
	*---------------------------------------------------
	* WRITTEN BY : ARIFUL ISLAM							|
	*---------------------------------------------------
	**/
	public function add()
	{
		//form validation rule
		$this->form_validation->set_rules('name','Name','trim|xss_clean|required');
		$this->form_validation->set_rules('dob','Date Of Birth','trim|xss_clean|required');
		$this->form_validation->set_rules('sex','Gender','trim|xss_clean|required');
		$this->form_validation->set_rules('usertype','User Type','trim|xss_clean|max_length[10]');
		$this->form_validation->set_rules('religion','Religion','trim|xss_clean');
		$this->form_validation->set_rules('email','Email','trim|xss_clean|valid_email|is_unique[user.email]|is_unique[student.email]|is_unique[parent.email]|required');
		$this->form_validation->set_rules('phone','Phone Number','trim|xss_clean|is_unique[user.phone]|required');
		$this->form_validation->set_rules('address','Address','trim|xss_clean');
		$this->form_validation->set_rules('doj','Date Of Joining','trim|xss_clean|required');
		$this->form_validation->set_rules('username','Username','trim|xss_clean|min_length[5]|is_unique[user.username]|is_unique[student.username]|is_unique[parent.username]|required');
		$this->form_validation->set_rules('password','Password','trim|xss_clean|min_length[5]|required');

		//check form validation if there any
		if($this->form_validation->run() == FALSE)
		{
			echo validation_errors();
		}
		else
		{
			//getting submited data
			$tdata = $this->cm->array_from_post(array('name','sex','dob','sex','religion','email','phone','address','doj','username','password','usertype'));

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

			//make data for inserting into database
			$data = array
			(
				'name' => $tdata['name'],
				'dob' => $tdata['dob'],
				'sex' => $tdata['sex'],
				'email' => $tdata['email'],
				'phone' => $tdata['phone'],
				'religion' => $tdata['religion'],
				'address' => $tdata['address'],
				'doj' => $tdata['doj'],
				'username' => $tdata['username'],
				'password' => $this->cm->hash($tdata['password']),
				'usertype' => $tdata['usertype'],
				'photo' => $file_name,
				'status' => 1,
				'usertype' => $tdata['usertype'],
			);

			//inserting into database
			$this->cm->_table_name = "user";
			$ins = $this->cm->insert($data);

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
	}
	//add user end


	/**
	*---------------------------------------------------
	* FUNCTION : SINGLE USER							|
	*---------------------------------------------------
	*---------------------------------------------------
	* WRITTEN BY : ARIFUL ISLAM							|
	*---------------------------------------------------
	**/
	public function single($id=NULL)
	{
		//getting single user
		$this->cm->_table_name = "user";
		$this->cm->_field_name = "userID";
		$this->cm->_primary_key = $id;
		$user = $this->cm->get_where();

		foreach($user as $u)
		{
			$result = array();
			$result['userID'] = $u->userID;
			$result['name'] = ucwords($u->name);
			$result['dob'] = $u->dob;
			$result['sex'] = $u->sex;
			$result['religion'] = $u->religion;
			$result['email'] = $u->email;
			$result['phone'] = $u->phone;
			$result['address'] = $u->address;
			$result['doj'] = $u->doj;
			$result['photo'] = $this->global_c->image($u->photo,'user.png');;
			$result['username'] = $u->username;
			$result['usertype'] = $u->usertype;
		}

		$user = json_encode($result);

		echo $user;
	}
	//getting single user end


	/**
	*---------------------------------------------------
	* FUNCTION : EDIT USER								|
	*---------------------------------------------------
	*---------------------------------------------------
	* WRITTEN BY : ARIFUL ISLAM							|
	*---------------------------------------------------
	**/
	public function edit($id=null)
	{
		//form validation rule
		$this->form_validation->set_rules('name','Name','trim|xss_clean|required');
		$this->form_validation->set_rules('dob','Date Of Birth','trim|xss_clean|required');
		$this->form_validation->set_rules('sex','Gender','trim|xss_clean|max_length[7]|required');
		$this->form_validation->set_rules('religion','Religion','trim|xss_clean');
		$this->form_validation->set_rules('email','Email','trim|xss_clean|valid_email|required');
		$this->form_validation->set_rules('phone','Phone Number','trim|xss_clean|required');
		$this->form_validation->set_rules('address','Address','trim|xss_clean');
		$this->form_validation->set_rules('doj','Date Of Joining','trim|xss_clean|required');
		$this->form_validation->set_rules('usertype','User Type','trim|xss_clean|required');

		//check if there any validation or not
		if($this->form_validation->run() == FALSE)
		{
			echo validation_errors();
		}
		else
		{
			//getting submited data
			$tdata = $this->cm->array_from_post(array('name','dob','sex','religion','email','phone','address','doj','usertype'));

			//getting filename for processing
			$this->cm->_table_name = "user";
			$this->cm->_field_name = "userID";
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

			$data = array
			(
				'name' => $tdata['name'],
				'dob' => $tdata['dob'],
				'sex' => $tdata['sex'],
				'religion' => $tdata['religion'],
				'phone' => $tdata['phone'],
				'address' => $tdata['address'],
				'doj' => $tdata['doj'],
				'usertype' => $tdata['usertype'],
				'photo' => $file_name,
			);

			//update database
			$this->cm->_table_name = "user";
			$this->cm->_field_name = "userID";
			$this->cm->_primary_key = $id;

			//check database updated or not
			$update = $this->cm->update($data);

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
	//edit user end


	/**
	*---------------------------------------------------
	* FUNCTION : USER PASSWORD CHANGE					|
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

		//check if there validation error
		if($this->form_validation->run() == FALSE)
		{
			echo validation_errors();
		}
		else
		{
			$p_data = $this->cm->array_from_post(array('password'));

			$this->cm->_table_name = "user";
			$this->cm->_field_name = "userID";
			$this->cm->_primary_key = $id;

			//updating database
			$update = $this->cm->update(array('password'=>$this->cm->hash($p_data['password'])));

			//check if database updated or not
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
	* FUNCTION : DELETE USER							|
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

		$this->cm->_table_name = "user";
		$this->cm->_field_name = "userID";
		$this->cm->_primary_key = $id;

		$delete = $this->cm->delete($id);

		if($delete)
		{
			echo "Deleted";
		}
		else
		{
			echo "Notdeleted";
		}
	}
	//delete user end


	/**
	*---------------------------------------------------
	* FUNCTION : USER STATUS CHANGE						|
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
		$this->cm->_table_name = "user";
		$this->cm->_field_name = "userID";
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

//End of file user.php
//Location: ./application/controller/user.php