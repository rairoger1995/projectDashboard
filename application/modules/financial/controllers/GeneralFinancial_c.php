<?php

class GeneralFinancial_c extends MX_Controller 
{
	function __construct()
	{
		parent::__construct();
		
		$this->load->module('template');
		Modules::run('home/Home/is_logged_in');
	}

	function index()
	{
		$data['content_view'] 	= 	'home/generalfinancial_v';
		$data['title']			=	'GENERAL FINANCIAL SERVICES DB';
		
		$this->template->dbtemplate($data);
	}
}