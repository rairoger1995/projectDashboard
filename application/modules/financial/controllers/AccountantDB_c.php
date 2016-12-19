<?php

class AccountantDB_c extends MX_Controller 
{
	function __construct()
	{
		parent::__construct();

		$this->load->module('template');
		Modules::run('home/Home/is_logged_in');
	}

	function index()
	{
		$data['content_view'] 	= 	'home/accountant_v';
		$data['title']			=	'Accountant DB';
		
		$this->template->dbtemplate($data);
	}
}