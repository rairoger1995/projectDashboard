<?php

class Client_edit_c extends MX_Controller
{
    function __construct()
    {
		parent::__construct();

		$this->load->module('template');
		Modules::run('home/Home/is_logged_in');

		$this->load->model('client_m');
		$this->load->helper(['form', 'language']);
		$this->lang->load('users');
	}

	function update_data($action, $id)
	{
		$data = [];
        
        $data['rs'] = $this->client_m->get_by_id($id);

        $data['content_view']   =   'consumer/editEntry_v';
        $data['title']          =   'Update Entry';

		
		if($this->input->post())
		{
			if($this->_form_validation())
			{
				$this->_save();
			}

			if($data['rs'] == null)
            {
                $data['_message'] = [
                    'message_type'  => 'error',
                    'message'       => lang('no_such_record'),
                ];
            }
		}

		$this->template->dbtemplate($data);
	}

	function _save($action, $id)
	{
		$this->client_m->update($this->input->post());
	}

	function _form_validation()
	{
		$this->load->library(['form_validation']);
        $this->form_validation->CI =& $this;
        $this->form_validation->set_message('is_unique', '%s is available.');
        $this->form_validation->set_rules($this->_rules());

        return $this->form_validation->run();
	}

	function _rules()
	{
		return [
            [
                'field'   =>  'first_name',
                'rules'   =>  'strip_tags|trim|required'
            ], 
            [
                'field'   =>  'last_name',
                'rules'   =>  'strip_tags|trim|required'
            ],
            [
                'field'   =>  'email',
                'rules'   =>  'strip_tags|trim|is_unique[tbl_client.email]|required'
            ],
            [
                'field'   =>  'uniqueid',
                'rules'   =>  'strip_tags|trim|required'
            ],
            [
                'field'   =>  'phone',
                'rules'   =>  'strip_tags|trim|required'
            ],
            [
                'field'   =>  'role',
                'rules'   =>  'strip_tags|trim|required'
            ],
            [
                'field'   =>  'company_name',
                'rules'   =>  'strip_tags|trim|required'
            ],
            [
                'field'   =>  'office_location',
                'rules'   =>  'strip_tags|trim|required'
            ],
            [
                'field'   =>  'suburb',
                'rules'   =>  'strip_tags|trim|required'
            ],
            [
                'field'   =>  'state',
                'rules'   =>  'strip_tags|trim|required'
            ],
            [
                'field'   =>  'postcode',
                'rules'   =>  'strip_tags|trim|required'
            ],
            [
                'field'   =>  'age',
                'rules'   =>  'strip_tags|trim|required'
            ],
            [
                'field'   =>  'gender',
                'rules'   =>  'required|in_list[1,2]'
            ],
            [
                'field'   =>  'yearsadviser',
                'rules'   =>  'strip_tags|trim|required'
            ],
            [
                'field'   =>  'source',
                'rules'   =>  'strip_tags|trim|required'
            ],
            [
                'field'   =>  'softbounce',
                'rules'   =>  'strip_tags|trim|required'
            ],
            [
                'field'   =>  'reason',
                'rules'   =>  'strip_tags|trim|required'
            ],
            [
                'field'   =>  'status',
                'rules'   =>  'required|in_list[1,2]'
            ],
        ];
	}
}