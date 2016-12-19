<?php

class Template extends MX_Controller
{
	function __construct()
	{
		parent::__construct();
	}

	function dbtemplate($data = NULL)
	{
		$this->load->view("template/template_v", $data);
	}
}