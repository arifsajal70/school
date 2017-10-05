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

class Book extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->language('book',$this->session->userdata('language'));
		//Crud model autoloaded in MY_Controller.php
	}

	public function index()
	{
		$page['subview'] = "book/book";
		$this->load->view('_main_layout',$page);
	}


	/**
	*---------------------------------------------------
	* FUNCTION : BOOK TABLE 							|
	*---------------------------------------------------
	*---------------------------------------------------
	* WRITTEN BY : ARIFUL ISLAM							|
	*---------------------------------------------------
	**/
	public function book_table()
	{
		$this->cm->_table_name = "book";
		$table = $this->cm->get();
		$n=1;
		foreach($table as $t)
		{
			$result = array();
			$result[] = $n++;
			$result[] = $t->book;
			$result[] = $t->author;
			$result[] = $t->book_code;
			$result[] = $t->price;
			$result[] = $t->quantity;
			$result[] = $t->due_quantity;
			$result[] = $t->rack;
			$result[] = edit_button('edit_book',$t->bookID)." ".delete_button('delete_book',$t->bookID);

			$table['data'][] = $result;
		}

		echo json_encode($table);
	}
	//book table end


	/**
	*---------------------------------------------------
	* FUNCTION : ADD BOOK 								|
	*---------------------------------------------------
	*---------------------------------------------------
	* WRITTEN BY : ARIFUL ISLAM							|
	*---------------------------------------------------
	**/
	public function add()
	{
		//form validation rule
		$this->form_validation->set_rules('name','Name','trim|xss_clean|required');
		$this->form_validation->set_rules('author','Author','trim|xss_clean|required');
		$this->form_validation->set_rules('book_code','Book Code','trim|xss_clean|required');
		$this->form_validation->set_rules('price','Price','trim|xss_clean|max_length[7]');
		$this->form_validation->set_rules('quantity','Quantity','trim|xss_clean');
		$this->form_validation->set_rules('rack','Rack No','trim|xss_clean|required');

		//check if form validation error or not
		if($this->form_validation->run() == FALSE)
		{
			echo validation_errors();
		}
		else
		{
			//getting submitted data
			$tdata = $this->cm->array_from_post(array('name','author','book_code','price','quantity','rack'));

			//making data for inserting into database
			$data = array
			(
				'book' => $tdata['name'],
				'author' => $tdata['author'],
				'book_code' => $tdata['book_code'],
				'price' => $tdata['price'],
				'quantity' => $tdata['quantity'],
				'rack' => $tdata['rack'],
			);

			//insert into database
			$this->cm->_table_name = "book";
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
	* FUNCTION : SINGLE BOOK 							|
	*---------------------------------------------------
	*---------------------------------------------------
	* WRITTEN BY : ARIFUL ISLAM							|
	*---------------------------------------------------
	**/
	public function single($id=NULL)
	{
		//getting single teacher
		$this->cm->_table_name = "book";
		$this->cm->_field_name = "bookID";
		$this->cm->_primary_key = $id;
		$teacher = $this->cm->get_where();

		foreach($teacher as $t)
		{
			$result = array();
			$result['bookID'] = $t->bookID;
			$result['name'] = $t->book;
			$result['book_code'] = $t->book_code;
			$result['author'] = $t->author;
			$result['price'] = $t->price;
			$result['quantity'] = $t->quantity;
			$result['rack'] = $t->rack;
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
		//form validation rule
		$this->form_validation->set_rules('name','Name','trim|xss_clean|required');
		$this->form_validation->set_rules('author','Author','trim|xss_clean|required');
		$this->form_validation->set_rules('book_code','Book Code','trim|xss_clean|required');
		$this->form_validation->set_rules('price','Price','trim|xss_clean|max_length[7]');
		$this->form_validation->set_rules('quantity','Quantity','trim|xss_clean');
		$this->form_validation->set_rules('rack','Rack No','trim|xss_clean|required');

		//check if there any validation error
		if($this->form_validation->run() == FALSE)
		{
			echo validation_errors();
		}
		else
		{
			//getting submitted data
			$tdata = $this->cm->array_from_post(array('name','author','book_code','price','quantity','rack'));

			//making data for inserting into database
			$data = array
			(
				'book' => $tdata['name'],
				'author' => $tdata['author'],
				'book_code' => $tdata['book_code'],
				'price' => $tdata['price'],
				'quantity' => $tdata['quantity'],
				'rack' => $tdata['rack'],
			);

			//updating database
			$this->cm->_table_name = "book";
			$this->cm->_field_name = "bookID";
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
		//deleting teacher
		$this->cm->_table_name = "book";
		$this->cm->_field_name = "bookID";
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
}