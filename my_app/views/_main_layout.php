<?php 

$this->load->view('compo/_header');

	if(isset($subview))
	{
		$this->load->view('pages/'.$subview);
	}

$this->load->view('compo/_footer');