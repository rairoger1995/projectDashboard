<?php

class FinancialPlannerDB_c extends MX_Controller 
{
	function __construct()
	{
		parent::__construct();

		$this->load->module('template');
		Modules::run('home/Home/is_logged_in');
	}

	function index()
	{
		$data['content_view'] 	= 	'home/financialplanner_v';
		$data['title']			=	'Financial Planner DB';
		
		$this->template->dbtemplate($data);
	}
}