<?php

class Filemanager_c extends MX_Controller {
	function __construct() 
	{
		parent::__construct();

		$this->load->module('template');
		$this->load->helper(array('form', 'url'));
		Modules::run('home/Home/is_logged_in');

		$this->load->model('upload_m');
	}

	function index() 
	{
		$data['content_view'] 	= 	'filemanager/filemanager_v';
		$data['title']			=	'File Manager';
		
		$this->template->dbtemplate($data);
	}

	function do_upload()
	{
	    $config['upload_path'] = FCPATH . 'uploads';
	    $config['allowed_types'] = '*';
	    $config['max_size'] = '3000';
	    $config['overwrite'] = TRUE;
	    $config['encrypt_name'] = FALSE;
	    $config['remove_spaces'] = TRUE;


	    // echo $config['upload_path']; die();
	    if ( ! is_dir($config['upload_path']) ) die("THE UPLOAD DIRECTORY DOES NOT EXIST");
	    $this->load->library('upload', $config);
	    if ( ! $this->upload->do_upload('userfile')) {
	        echo 'error';
	    } else {
	    	var_dump( $this->input->post('userfile') ); die();
	    	$this->upload_m->insert($this->input->post());
	        return array('upload_data' => $this->upload->data());
	    }
	}
}