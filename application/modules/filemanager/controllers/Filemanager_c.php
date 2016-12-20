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

	function upload_file() 
	{
		$data['content_view'] 	= 	'filemanager/uploadFile_v';
		$data['title']			=	'File Manager';
		
		$this->template->dbtemplate($data);
	}

	function do_upload()
	{
	    $config['upload_path'] = FCPATH . 'uploads';
	    $config['allowed_types'] = 'pdf|doc|docx|xlsx|xls|jpg|jpeg|png|bit|txt|text';
	    $config['max_size'] = '3000';
	    $config['overwrite'] = FALSE;
	    $config['encrypt_name'] = FALSE;
	    $config['remove_spaces'] = TRUE;

	    $data['content_view'] 	= 	'filemanager/uploadFile_v';
		$data['title']			=	'File Manager';
	    
	    // echo $config['upload_path']; die();
	    if ( ! is_dir($config['upload_path']) ) die("THE UPLOAD DIRECTORY DOES NOT EXIST");
	    $this->load->library('upload', $config);

	    if ( ! $this->upload->do_upload('userfile')) {
 			$data['_message'] = [
                        'message_type'  => 'error',
                        'message'       => 'try again',
                    ];
            $this->template->dbtemplate($data);
	    } else {
	    	$upload_data = $this->upload->data();
	        $uploadData = array('upload_data' => $this->upload->data());
	    	$this->upload_m->insert($upload_data);

	    	$data['_message'] = [
                        'message_type'  => 'success',
                        'message'       => 'Success',
                    ];
            $this->template->dbtemplate($data);
	    }
    	// $this->template->dbtemplate($data);
	}

	function viewFiles()
	{
		$data['content_view'] 	= 	'filemanager/filemanager_v';
		$data['title']			=	'File Manager';
		$data['rs'] = $this->upload_m->get_uploadFile();

		// print_r($data['rs']);die();	
		$this->template->dbtemplate($data);
	}
}