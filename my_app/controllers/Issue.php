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


class Issue extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->language('issue',$this->session->userdata('language'));
		//crud Model autoloaded in MY_Controller.php
	}

	public function index()
	{
		$page['subview'] = "issue/issue";
		$this->load->view('_main_layout',$page);
	}


	/**
	*---------------------------------------------------
	* FUNCTION : ISSUE TABLE 							|
	*---------------------------------------------------
	*---------------------------------------------------
	* WRITTEN BY : ARIFUL ISLAM							|
	*---------------------------------------------------
	**/
	public function issue_table()
	{
		$this->load->model('issue_model','im');
		$table = $this->im->get_issue();
		$n=1;
		foreach($table as $t)
		{
			$result = array();
			$result[] = $n++;
			$result[] = $t->name;
			$result[] = $t->book;
			$result[] = $t->issue_date;
			$result[] = $t->due_date;
			$result[] = book_return('return_book',$t->issueID,$t->return_date);
			$result[] = edit_button('edit_book',$t->issueID)." ".delete_button('delete_book',$t->issueID);

			$table['data'][] = $result;
		}

		echo json_encode($table);
	}
	//book table end


	/**
	*---------------------------------------------------
	* FUNCTION : ISSUE BOOK 							|
	*---------------------------------------------------
	*---------------------------------------------------
	* WRITTEN BY : ARIFUL ISLAM							|
	*---------------------------------------------------
	**/
	public function add()
	{
		//form validation rule
		$this->form_validation->set_rules('lID','Member','trim|xss_clean|required');
		$this->form_validation->set_rules('bookID','Book','trim|xss_clean|required');
		$this->form_validation->set_rules('due_date','Due Date','trim|xss_clean|required');
		$this->form_validation->set_rules('fine','Fine','trim|xss_clean');
		$this->form_validation->set_rules('note','note','trim|xss_clean');

		//check if form validation error or not
		if($this->form_validation->run() == FALSE)
		{
			echo validation_errors();
		}
		else
		{
			//getting submitted data
			$tdata = $this->cm->array_from_post(array('lID','bookID','due_date','fine','note'));

			//making data for inserting into database
			$data = array
			(
				'lID' => $tdata['lID'],
				'bookID' => $tdata['bookID'],
				'due_date' => $tdata['due_date'],
				'issue_date' => date("Y-m-d"),
				'fine' => $tdata['fine'],
				'note' => $tdata['note'],
			);

			//insert into database
			$this->cm->_table_name = "issue";
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
	//Issue end


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
		$this->cm->_table_name = "issue";
		$this->cm->_field_name = "issueID";
		$this->cm->_primary_key = $id;
		$teacher = $this->cm->get_where();

		foreach($teacher as $t)
		{
			$result = array();
			$result['issueID'] = $t->issueID;
			$result['lID'] = $t->lID;
			$result['bookID'] = $t->bookID;
			$result['issue_date'] = $t->issue_date;
			$result['due_date'] = $t->due_date;
			$result['return_date'] = $t->return_date;
			$result['fine'] = $t->fine;
			$result['note'] = $t->note;
		}

		echo json_encode($result);
	}
	//single teacher end


	/**
	*---------------------------------------------------
	* FUNCTION : EDIT ISSUE  							|
	*---------------------------------------------------
	*---------------------------------------------------
	* WRITTEN BY : ARIFUL ISLAM							|
	*---------------------------------------------------
	**/
	public function edit($issueid=null)
	{
		//form validation rule
		$this->form_validation->set_rules('lID','Member','trim|xss_clean|required');
		$this->form_validation->set_rules('bookID','Book','trim|xss_clean|required');
		$this->form_validation->set_rules('due_date','Due Date','trim|xss_clean|required');
		$this->form_validation->set_rules('fine','Fine','trim|xss_clean');
		$this->form_validation->set_rules('note','note','trim|xss_clean');

		//check if form validation error or not
		if($this->form_validation->run() == FALSE)
		{
			echo validation_errors();
		}
		else
		{
			//getting submitted data
			$tdata = $this->cm->array_from_post(array('lID','bookID','due_date','fine','note'));

			//making data for inserting into database
			$data = array
			(
				'lID' => $tdata['lID'],
				'bookID' => $tdata['bookID'],
				'due_date' => $tdata['due_date'],
				'fine' => $tdata['fine'],
				'note' => $tdata['note'],
			);

			//insert into database
			$this->cm->_table_name = "issue";
			$this->cm->_field_name = "issueID";
			$this->cm->_primary_key = $issueid;
			$update = $this->cm->update($data);

			//checking if data inserted or not
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
	//Issue edit end


	/**
	*---------------------------------------------------
	* FUNCTION : BOOK RETURN  							|
	*---------------------------------------------------
	*---------------------------------------------------
	* WRITTEN BY : ARIFUL ISLAM							|
	*---------------------------------------------------
	**/
	public function return_book($issueid)
	{
		$this->cm->_table_name = "issue";
		$this->cm->_field_name = "issueID";
		$this->cm->_primary_key = $issueid;

		$update = $this->cm->update(array('return_date'=>date("Y-m-d")));

		if($update)
		{
			echo "Updated";
		}
		else
		{
			echo "Notupdated";
		}
	}
	//Book Return end


	/**
	*---------------------------------------------------
	* FUNCTION : DELETE ISSUE  							|
	*---------------------------------------------------
	*---------------------------------------------------
	* WRITTEN BY : ARIFUL ISLAM							|
	*---------------------------------------------------
	**/
	public function delete($issueid)
	{
		$this->cm->_table_name = "issue";
		$this->cm->_field_name = "issueID";
		$this->cm->_primary_key = $issueid;
		$delete = $this->cm->delete();

		if($delete)
		{
			echo "Deleted";
		}
		else
		{
			echo "Notdeleted";
		}
	}
	//Issue edit end
}