<?php

class User_c extends MX_Controller 
{
	function __construct()
	{
		parent::__construct();
        
        Modules::run('home/Home/is_logged_in');
        $this->is_super_admin();

        $this->load->module('template');


        $this->load->helper(['form', 'language']);
        $this->lang->load('users');
		$this->load->model('user_m');
	}

	function index()
	{
		$data['content_view'] 	= 	'user/user_manager_v';
		$data['title']			=	'Users';

		$this->template->dbtemplate($data);
	}



    function is_super_admin()
    {
        $is_super_admin = $this->session->userdata('user_level');
        if($is_super_admin != '1')
        {
            echo 'You dont have permission to access this page.';
            // echo anchor('/', 'Log in');
            die();
        }
    }

	function form($action, $id = 0)
    {
        // default action form is ADD
        $data = [];

        if($this->input->post())
        {
            if($this->_form_validation())
            {
                if($this->_save($action, $id))
                {
                    $this->_redirect($action, $id);
                }
                else
                {
                    $data['_message'] = [
                            'message_type'  => 'error',
                            'message'       => lang('try_again'),
                        ];
                }
            }
        } 
        // if the 3rd segment is edit do this action
        elseif($action == 'edit')
        {
            $data['title'] = 'Update Profile';
            $data['rs'] = $this->user_m->get_by_id($id);

            if($data['rs'] == null)
            {
                $data['_message'] = [
                    'message_type'  => 'error',
                    'message'       => lang('no_such_record'),
                ];
            }
        }
        
        $data['content_view'] 	= 	'user/add_edit_user_v';
		$data['title']			=	'Add User';

		$this->template->dbtemplate($data);
    }
    // if the validation are passed it will save wheather its add or edit
    function _save($action, $id)
    {
        if($action == 'add')
        {
            $result = $this->user_m->insert($this->input->post());
        }
        else
        {
            $result = $this->user_m->update($id, $this->input->post());
        }

        return $result;
    }
    // every success saving this action will redirect to its respective link
    function _redirect($action, $id)
    {
        if($action == 'add')
        {
            $id = $this->db->insert_id();
        }

        $this->session->set_flashdata([
            '_message' => [
                'message'       => lang('success'),
                'message_type'  => 'success'
            ]
        ]);

        redirect(site_url("user_detail/$id"));
    }

    function detail_user($id)
    {
        $_message = $this->session->flashdata('_message');

        if($_message)
        {
            $data['_message'][] = $_message;
        }

        $data['rs'] = $this->user_m->get_by_id($id);

        if($data['rs'] == null)
        {
            $data['_message'][] = [
                'message_type'  => 'error',
                'message'       => lang('no_such_record'),
            ];
        }
        else
        {
            $data['rs']->user_level = $this->user_m->get_level_label($data['rs']->user_level);
            $data['rs']->status = $this->user_m->get_status_label($data['rs']->status);
        }

        $data['content_view']   =   'user/detail_user_v';
        $data['title']          =   'Added User';

        $this->template->dbtemplate($data);
    }

	function _form_validation()
	{
		$this->load->library(['form_validation']);
        $this->form_validation->CI =& $this;
        $this->form_validation->set_rules($this->_rules());

        return $this->form_validation->run();
	}

	function _rules()
	{
		return [
            [
                'field'   =>  'first_name',
                'rules'   =>  'strip_tags|trim|required'
            ], [
                'field'   =>  'middle_name',
                'rules'   =>  'strip_tags|trim'
            ], [
                'field'   =>  'last_name',
                'rules'   =>  'strip_tags|trim|required'
            ], [
                'field'   =>  'user_name',
                'rules'   =>  'strip_tags|trim|required',
                'required'      => 'You have not provided %s.',
                'is_unique'     => 'This %s already exists.'
            ], [
                'field'   =>  'password',
                'rules'   =>  'strip_tags|trim|required'
            ], [
                'field'   =>  'user_level',
                'rules'   =>  'required|in_list[1,2,3]'
            ], [
                'field'   =>  'status',
                'rules'   =>  'required|in_list[1,2]'
            ],
        ];
	}

	function jgrid_ajax()
    {
        ($this->input->is_ajax_request()) OR die();

        $post = $this->input->post();

        $data = $this->user_m->get_list($post);

        foreach($data as $index => $_data)
        {
            // print_r($data[$index]->action);
            // die();
            $data[$index]['action'] = anchor("edit-user/{$_data['id']}", 'Edit', 'class="btn btn-info"');
        }

        echo json_encode([
            'total' => $this->user_m->get_list($post, true),
            'data'  => $data
        ]);
    }
}