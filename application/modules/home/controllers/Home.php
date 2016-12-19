<?php

class Home extends MX_Controller {
	function __construct() 
	{
		parent::__construct();

		$this->load->module('template');
		// Modules::run('login/Login_c/is_logged_in');
		$this->is_logged_in();
	}

	function index() 
	{
		$data['content_view'] 	= 	'home/home_v';
		$data['title']			=	'Dashboard';
		
		$this->template->dbtemplate($data);

	}

	function is_logged_in()
    {
        $is_logged_in = $this->session->userdata('is_logged_in');
        if(!@ $is_logged_in || $is_logged_in != true)
        {
            echo 'You dont have permission to access this page.';
            echo anchor('/', 'Log in');
            die();
        }
    }

	function logout()
	{
		$temp = $this->session->userdata('is_logged_in');
		$this->session->sess_destroy();
		$this->session->set_userdata('is_logged_in', $temp);

	    redirect('/');
	}
}