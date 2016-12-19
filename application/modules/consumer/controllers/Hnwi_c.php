<?php

class Hnwi_c extends MX_Controller 
{
	function __construct()
	{
		parent::__construct();

		$this->load->module('template');
		Modules::run('home/Home/is_logged_in');
	}

	function index()
	{
		$data['content_view'] 	= 	'consumer/hnwi_v';
		$data['title']			=	'HNWI DB';
		
		$this->template->dbtemplate($data);
	}
}