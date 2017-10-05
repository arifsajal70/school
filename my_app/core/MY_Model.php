<?php defined('BASEPATH') or exit('direct script access not allowed');

/**
*---------------------------------------------------
* PRODUCT NAME  : OPTICCODER SCHOOL MANAGEMENT 		|
*---------------------------------------------------
* AUTHOR 		: OPTICCODER DEVELOPMENT TEAM 		|
*---------------------------------------------------
* EMAIL 		: info@opticcoder.com 				|
*---------------------------------------------------
**/

class MY_Model extends CI_Model
{
	protected $_table_name ;
	protected $_field_name ;
	protected $_primary_key ;
	protected $_order_by ;

	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function array_from_post($fields) {

		$data = array();
		foreach ($fields as $field) {
			$data[$field] = $this->input->post($field);
		}
		return $data;
	}

	public function get()
	{
		return $this->db->get($this->_table_name)->result();
	}

	public function get_by_order()
	{
		$this->db->select('*');
		$this->db->from($this->_table_name);
		$this->db->order_by($this->_field_name,$this->_order_by);
		return $this->db->get()->result();
	}

	public function get_obj()
	{
		return $this->db->get($this->_table_name)->row();
	}

	public function get_where()
	{
		return $this->db->get_where($this->_table_name,array($this->_field_name=>$this->_primary_key))->result();
	}

	public function get_row($row)
	{
		return $this->db->get_where($this->_table_name,array($this->_field_name=>$this->_primary_key))->row()->$row ;
	}

	public function insert($data)
	{
		$this->db->insert($this->_table_name,$data);
		$id = $this->db->insert_id();
		return $id ;
	}

	public function update($data)
	{
		$this->db->set($data);
		$this->db->where($this->_field_name,$this->_primary_key);
		return $this->db->update($this->_table_name);
	}

	public function delete()
	{
		return $this->db->delete($this->_table_name,array($this->_field_name=>$this->_primary_key));
	}

	public function hash($string)
	{
		return hash("sha512", $string . config_item("encryption_key"));
	}

	public function  upload($field,$path) {

		$this->load->helper('string');
		$config['upload_path'] = $path;
		$config['allowed_types'] = 'gif|jpg|jpeg|png';
		$config['max_size'] = 2048;
		$config['file_name'] = time().random_string('alnum',20);

		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if ($this->upload->do_upload($field)) {
			$file_data = $this->upload->data();
			$file_name = $config['file_name'].$file_data['file_ext'] ;
			return $file_name;
		}
		else {
			$error = array('error' => $this->upload->display_errors());
			return $error;
		}
	}

	public function delete_file($file_name,$path)
	{
		$this->load->helper('file');
		if(file_exists($path.$file_name))
		{
			return unlink($path.$file_name);
		}
		else
		{
			return TRUE;
		}
	}

	public function send_mail($from,$to,$subject,$message)
	{
		$this->load->library('email');
		$this->email->from($from);
		$this->email->to($to);
		$this->email->subject($subject);
		$this->email->message($message);
		$this->email->set_mailtype('html');
		return $this->email->send();
	}
}


// End Of My_Model.php 
//Location : ./application/core/MY_Model.php