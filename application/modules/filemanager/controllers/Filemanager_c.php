<?php

class Filemanager_c extends MX_Controller {
	function __construct() 
	{
		parent::__construct();

		$this->load->module('template');
		$this->load->helper(array('form', 'url'));
		Modules::run('home/Home/is_logged_in');
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
	    $config['allowed_types'] = 'gif|jpg|png';
	    $config['max_size'] = '100';
	    $config['max_width']  = '1024';
	    $config['max_height']  = '768';
	    $config['overwrite'] = TRUE;
	    $config['encrypt_name'] = FALSE;
	    $config['remove_spaces'] = TRUE;


	    // echo $config['upload_path']; die("yeah");
	    if ( ! is_dir($config['upload_path']) ) die("THE UPLOAD DIRECTORY DOES NOT EXIST");
	    $this->load->library('upload', $config);
	    if ( ! $this->upload->do_upload('userfile')) {
	        echo 'error';
	    } else {

	        return array('upload_data' => $this->upload->data());
	    }
	}
}