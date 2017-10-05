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

class Parents extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->language('parents',$this->session->userdata('language'));
		//Crud model autoloaded in MY_Controller.php
	}

	public function index()
	{
		$page['subview'] = "parents/parents";
		$this->load->view('_main_layout',$page);
	}


	/**
	*---------------------------------------------------
	* FUNCTION : PARENTS TABLE							|
	*---------------------------------------------------
	*---------------------------------------------------
	* WRITTEN BY : ARIFUL ISLAM							|
	*---------------------------------------------------
	**/
	public function parents_table()
	{
		$this->cm->_table_name = "parent";
		$this->cm->_field_name = "parentID";
		$this->cm->_order_by = "DESC";
		$parent = $this->cm->get_by_order();
		$n=1;
		foreach($parent as $p)
		{
			$result = array();
			$result[] = $n++;
			$result[] = $p->name;
			$result[] = $p->email;
			$result[] = $p->phone;
			$result[] = status_switch('change_status',$p->parentID,$p->status);
			$result[] = view_button('view_parent',$p->parentID)." ".pass_change_button('pass_change',$p->parentID)." ".edit_button('edit_parent',$p->parentID)." ".delete_button('delete_parent',$p->parentID);

			$table['data'][] = $result;
		}

		echo json_encode($table);
	}
	//Parent table end


	/**
	*---------------------------------------------------
	* FUNCTION : ADD PARENTS							|
	*---------------------------------------------------
	*---------------------------------------------------
	* WRITTEN BY : ARIFUL ISLAM							|
	*---------------------------------------------------
	**/
	public function add()
	{
		//form validation rules
		$this->form_validation->set_rules('name','Name','trim|xss_clean|required');
		$this->form_validation->set_rules('father_name','Father Name','trim|xss_clean|required');
		$this->form_validation->set_rules('mother_name','Mother Name','trim|xss_clean|required');
		$this->form_validation->set_rules('father_profession','Father Profession','trim|xss_clean');
		$this->form_validation->set_rules('mother_profession','Mother Profession','trim|xss_clean');
		$this->form_validation->set_rules('email','Email','trim|xss_clean|valid_email|is_unique[teacher.email]|is_unique[student.email]|is_unique[parent.email]|required');
		$this->form_validation->set_rules('phone','Phone Number','trim|xss_clean|is_unique[teacher.phone]');
		$this->form_validation->set_rules('address','Address','trim|xss_clean');
		$this->form_validation->set_rules('username','Username','trim|xss_clean|min_length[5]|is_unique[teacher.username]|is_unique[student.username]|is_unique[parent.username]|required');
		$this->form_validation->set_rules('password','Password','trim|xss_clean|min_length[5]|required');

		//check if there any validation errors
		if($this->form_validation->run() == FALSE)
		{
			echo validation_errors();
		}
		else
		{
			//Getting submitted data
			$tdata = $this->cm->array_from_post(array('name','father_name','mother_name','father_profession','mother_profession','email','phone','address','username','password'));

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
				}
			}

			//make data for inserting into database
			$data = array
			(
				'name' => $tdata['name'],
				'father_name' => $tdata['father_name'],
				'mother_name' => $tdata['mother_name'],
				'father_profession' => $tdata['father_profession'],
				'mother_profession' => $tdata['mother_profession'],
				'email' => $tdata['email'],
				'phone' => $tdata['phone'],
				'address' => $tdata['address'],
				'username' => $tdata['username'],
				'password' => $this->cm->hash($tdata['password']),
				'photo' => $file_name,
				'status' => 1,
				'usertype' => "Parents",
			);

			//insert submited data in database
			$this->cm->_table_name = "parent";
			$ins = $this->cm->insert($data);

			//check data inserted or not
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
	//Add parents end


	/**
	*---------------------------------------------------
	* FUNCTION : SINGLE PARENT							|
	*---------------------------------------------------
	*---------------------------------------------------
	* WRITTEN BY : ARIFUL ISLAM							|
	*---------------------------------------------------
	**/
	public function single($id=NULL)
	{
		$this->cm->_table_name = "parent";
		$this->cm->_field_name = "parentID";
		$this->cm->_primary_key = $id;
		$parents = $this->cm->get_where();

		foreach($parents as $p)
		{
			$result = array();
			$result['parentID'] = $p->parentID;
			$result['name'] = ucwords($p->name);
			$result['father_name'] = $p->father_name;
			$result['mother_name'] = $p->mother_name;
			$result['father_profession'] = $p->father_profession;
			$result['mother_profession'] = $p->mother_profession;
			$result['email'] = $p->email;
			$result['phone'] = $p->phone;
			$result['address'] = $p->address;
			$result['photo'] = $this->global_c->image($p->photo,'user.png');
			$result['username'] = $p->username;
		}

		$parents = json_encode($result);

		echo $parents;
	}
	//single Parent end


	/**
	*---------------------------------------------------
	* FUNCTION : EDIT PARENT							|
	*---------------------------------------------------
	*---------------------------------------------------
	* WRITTEN BY : ARIFUL ISLAM							|
	*---------------------------------------------------
	**/
	public function edit($id=null)
	{
		//form validation rules
		$this->form_validation->set_rules('name','Name','trim|xss_clean|required');
		$this->form_validation->set_rules('father_name','Father Name','trim|xss_clean|required');
		$this->form_validation->set_rules('mother_name','Mother Name','trim|xss_clean|required');
		$this->form_validation->set_rules('father_profession','Father Profession','trim|xss_clean');
		$this->form_validation->set_rules('mother_profession','Mother Profession','trim|xss_clean');
		$this->form_validation->set_rules('email','Email','trim|xss_clean|valid_email|required');
		$this->form_validation->set_rules('phone','Phone Number','trim|xss_clean');
		$this->form_validation->set_rules('address','Address','trim|xss_clean');

		//check if thekre any validation error
		if($this->form_validation->run() == FALSE)
		{
			echo validation_errors();
		}
		else
		{
			//getting submitted data
			$tdata = $this->cm->array_from_post(array('name','father_name','mother_name','father_profession','mother_profession','email','phone','address'));

			//getting filename for processing
			$this->cm->_table_name = "parent";
			$this->cm->_field_name = "parentID";
			$this->cm->_primary_key = $id;
			$file_name = $this->cm->get_row('photo');

			//file processing
			if(!empty($_FILES['photo']['name']))
			{
				$upload = $this->cm->upload('photo','./uploads/');
				if($file_name != null)
				{
					//delete file
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

			//make data for update database
			$data = array
			(
				'name' => $tdata['name'],
				'father_name' => $tdata['father_name'],
				'mother_name' => $tdata['mother_name'],
				'father_profession' => $tdata['father_profession'],
				'mother_profession' => $tdata['mother_profession'],
				'email' => $tdata['email'],
				'phone' => $tdata['phone'],
				'address' => $tdata['address'],
				'photo' => $file_name,
				);

			//updating submited data into database
			$this->cm->_table_name = "parent";
			$this->cm->_field_name = "parentID";
			$this->cm->_primary_key = $id;

			$update = $this->cm->update($data);

			//check if data updated or not
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
	//Edit Parent End


	/**
	*---------------------------------------------------
	* FUNCTION : DELETE PARENT							|
	*---------------------------------------------------
	*---------------------------------------------------
	* WRITTEN BY : ARIFUL ISLAM							|
	*---------------------------------------------------
	**/
	public function delete($id=NULL)
	{
		//getting filename for processing
		$this->cm->_table_name = "parent";
		$this->cm->_field_name = "parentID";
		$this->cm->_primary_key = $id;
		$file_name = $this->cm->get_row('photo');

		if($file_name != null)
		{
			//delete file
			$this->cm->delete_file($file_name,'./uploads/');
		}

		//delete parent
		$this->cm->_table_name = "parent";
		$this->cm->_field_name = "parentID";
		$this->cm->_primary_key = $id;

		$delete = $this->cm->delete($id);

		//check if parent deleted or not
		if($delete)
		{
			echo "Deleted";
		}
		else
		{
			echo "Notdeleted";
		}
	}
	//delete Parent end


	/**
	*---------------------------------------------------
	* FUNCTION : PARENT PASSWORD CHANGE					|
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

		//check if there any validation error or not
		if($this->form_validation->run() == FALSE)
		{
			echo validation_errors();
		}
		else
		{
			$p_data = $this->cm->array_from_post(array('password'));

			//updating password
			$this->cm->_table_name = "parent";
			$this->cm->_field_name = "parentID";
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
	* FUNCTION : CHANGE STATUS							|
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

		//update status
		$this->cm->_table_name = "parent";
		$this->cm->_field_name = "parentID";
		$this->cm->_primary_key = $id;
		$update = $this->cm->update(array('status'=>$st));

		//check if status updated or not
		if($update)
		{
			echo "Changed";
		}
		else
		{
			echo "Notchanged";
		}
	}
	//Status change end

}

//End of file Parents.php
//Location : ./application/controller/Parents.php