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

class Fee_type extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->language('fee_type',$this->session->userdata('language'));
		//crud model autoloaded in MY_Controller.php
	}

	public function index()
	{
		$page['subview'] = "fee_type/fee_type";
		$this->load->view('_main_layout',$page);
	}


	/**
	*---------------------------------------------------
	* FUNCTION : FEE TYPE TABLE 						|
	*---------------------------------------------------
	*---------------------------------------------------
	* WRITTEN BY : ARIFUL ISLAM							|
	*---------------------------------------------------
	**/
	public function fee_type_table()
	{
		$this->cm->_table_name = "feetype";
		$table = $this->cm->get();
		$n=1;
		foreach($table as $t)
		{
			$result = array();
			$result[] = $n++;
			$result[] = $t->feetype;
			$result[] = $t->amount;
			$result[] = edit_button('edit_feetype',$t->feetypeID)." ".delete_button('delete_book',$t->feetypeID);

			$table['data'][] = $result;
		}

		echo json_encode($table);
	}
	//Fee Type table end


	/**
	*---------------------------------------------------
	* FUNCTION : ADD FEE TYPE 							|
	*---------------------------------------------------
	*---------------------------------------------------
	* WRITTEN BY : ARIFUL ISLAM							|
	*---------------------------------------------------
	**/
	public function add()
	{
		//form validation rule
		$this->form_validation->set_rules('feetype','Fee Type','trim|xss_clean|required');
		$this->form_validation->set_rules('amount','Amount','trim|xss_clean|required');
		$this->form_validation->set_rules('note','Note','trim|xss_clean');

		//check if form validation error or not
		if($this->form_validation->run() == FALSE)
		{
			echo validation_errors();
		}
		else
		{
			//getting submitted data
			$tdata = $this->cm->array_from_post(array('feetype','amount','note'));

			//making data for inserting into database
			$data = array
			(
				'feetype' => $tdata['feetype'],
				'amount' => $tdata['amount'],
				'note' => $tdata['note'],
			);

			//insert into database
			$this->cm->_table_name = "feetype";
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
	//add Fee Type end


	/**
	*---------------------------------------------------
	* FUNCTION : SINGLE FEE TYPE 						|
	*---------------------------------------------------
	*---------------------------------------------------
	* WRITTEN BY : ARIFUL ISLAM							|
	*---------------------------------------------------
	**/
	public function single($id=NULL)
	{
		//getting single teacher
		$this->cm->_table_name = "feetype";
		$this->cm->_field_name = "feetypeID";
		$this->cm->_primary_key = $id;
		$single = $this->cm->get_where();

		foreach($single as $s)
		{
			$result = array();
			$result['feetypeID'] = $s->feetypeID;
			$result['feetype'] = $s->feetype;
			$result['amount'] = $s->amount;
			$result['note'] = $s->note;
		}

		echo json_encode($result);
	}
	//single teacher end


	/**
	*---------------------------------------------------
	* FUNCTION : EDIT FEE TYPE 							|
	*---------------------------------------------------
	*---------------------------------------------------
	* WRITTEN BY : ARIFUL ISLAM							|
	*---------------------------------------------------
	**/
	public function edit($feetypeID=null)
	{
		//form validation rule
		$this->form_validation->set_rules('feetype','Fee Type','trim|xss_clean|required');
		$this->form_validation->set_rules('amount','Amount','trim|xss_clean|required');
		$this->form_validation->set_rules('note','Note','trim|xss_clean');

		//check if form validation error or not
		if($this->form_validation->run() == FALSE)
		{
			echo validation_errors();
		}
		else
		{
			//getting submitted data
			$tdata = $this->cm->array_from_post(array('feetype','amount','note'));

			//making data for inserting into database
			$data = array
			(
				'feetype' => $tdata['feetype'],
				'amount' => $tdata['amount'],
				'note' => $tdata['note'],
			);

			//insert into database
			$this->cm->_table_name = "feetype";
			$this->cm->_field_name = "feetypeID";
			$this->cm->_primary_key = $feetypeID;
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
	//add Fee Type end


	/**
	*---------------------------------------------------
	* FUNCTION : DELETE ISSUE  							|
	*---------------------------------------------------
	*---------------------------------------------------
	* WRITTEN BY : ARIFUL ISLAM							|
	*---------------------------------------------------
	**/
	public function delete($feetypeID)
	{
		$this->cm->_table_name = "feetype";
		$this->cm->_field_name = "feetypeID";
		$this->cm->_primary_key = $feetypeID;
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