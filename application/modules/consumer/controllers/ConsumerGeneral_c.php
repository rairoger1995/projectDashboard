<?php

class ConsumerGeneral_c extends MX_Controller 
{
	function __construct()
	{
		parent::__construct();

		$this->load->module('template');
		Modules::run('home/Home/is_logged_in');

		$this->load->model('client_m');
	}

	function index()
	{
		$data['content_view'] 	= 	'consumer/consumergeneral_v';
		$data['title']			=	'Consumer General DB';
		
		$this->template->dbtemplate($data);
	}

	function jgrid_ajax()
    {
        ($this->input->is_ajax_request()) OR die();

        $post = $this->input->post();

        $data = $this->client_m->get_list($post);

        foreach($data as $index => $_data)
        {
            // print_r($data[$index]->action);
            // die();
            $data[$index]['action'] = anchor("edit-entry/{$_data['id']}", 'Edit', 'class="btn btn-info"');
        }

        echo json_encode([
            'total' => $this->client_m->get_list($post, true),
            'data'  => $data
        ]);
    }
}