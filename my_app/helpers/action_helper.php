<?php

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

function delete_button($ajax_call,$id)
{
	return "<button type=\"button\" class=\"btn btn-danger btn-sm\" onclick=\"$ajax_call('$id')\"><span class=\"fa fa-trash\"></span></button>";
}

function edit_button($ajax_call,$id)
{
	return "<button type=\"button\" class=\"btn btn-primary btn-sm\" onclick=\"$ajax_call('$id')\"><span class=\"fa fa-edit\"></span></button>";
}

function view_button($ajax_call,$id)
{
	return "<button type=\"button\" class=\"btn btn-purple btn-sm\" onclick=\"$ajax_call('$id')\"><span class=\"fa fa-eye\"></span></button>";
}

function add_button($ajax_call,$id)
{
	return "<button type=\"button\" class=\"btn btn-success btn-sm\" onclick=\"$ajax_call('$id')\"><span class=\"fa fa-plus\"></span></button>";
}

function pass_change_button($ajax_call,$id)
{
	return "<button type=\"button\" class=\"btn btn-info btn-sm\" onclick=\"$ajax_call('$id')\"><span class=\"fa fa-lock\"></span></button>";
}

function attendance_button($ajax_call,$id)
{
	return "<button type=\"button\" class=\"btn btn-success btn-sm\" onclick=\"$ajax_call('$id')\"><span class=\"ti-target\"></span></button>";
}

function status_switch($ajax_call,$id,$status)
{
	if($status == 1)
	{
		return "<button type=\"button\" class=\"btn btn-success btn-sm\" onclick=\"$ajax_call('$id','$status')\">Active</button>";
	}
	else
	{
		return "<button type=\"button\" class=\"btn btn-danger btn-sm\" onclick=\"$ajax_call('$id','$status')\">Deactive</button>";
	}
}

function book_return($ajax_call,$id,$date)
{
	if($date == "")
	{
		return "<button type=\"button\" class=\"btn btn-danger btn-sm\" onclick=\"$ajax_call('$id')\">Not Returned</button>";
	}
	else
	{
		return $date;
	}
}

function attendance_switch($ajax_call,$id,$status)
{
	if($status == "P")
	{
		return "<button type=\"button\" class=\"btn btn-success btn-sm\" onclick=\"$ajax_call('$id','$status')\">Present</button>";
	}
	else
	{
		return "<button type=\"button\" class=\"btn btn-danger btn-sm\" onclick=\"$ajax_call('$id','$status')\">Absent</button>";
	}
}

//End of file action_helper.php
//Location : ./application/helper/action_helper.php