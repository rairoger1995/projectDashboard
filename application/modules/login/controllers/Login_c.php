<?php 

class Login_c extends MX_Controller 
{

    private $_user_level;
    private $_full_name;
    private $_id;

	function __construct()
	{
		parent::__construct(); 

		$this->load->library(['form_validation']);
        $this->form_validation->CI =& $this;

		$this->load->helper(['form', 'language']);
		$this->lang->load('users');

		$this->load->model('User_login_m');

        if(!@ $this->session->userdata('is_logged_in') == TRUE)
        {
        // redirect('C_login');
        }
        else
        {
            redirect('home');
        }
	}

	function index()
	{
		$this->load->view('login_v.php');
	}

	function loginValidation()
	{
        $this->form_validation->set_rules($this->_rules());

        if($this->form_validation->run() == FALSE)
        {
            $this->index();
        }
        else
        {
            $data = array(
                        'username'      =>  $this->input->post('user_name'),
                        'is_logged_in'  =>  TRUE,
                        'user_level'    =>  $this->_user_level,
                        'name'          =>  $this->_full_name,
                        'id'          	=>  $this->_id
                );

            $this->session->set_userdata($data);

            redirect('home');
        }
	}

	function checkLogin($str)
    {
        $data = $this->User_login_m->getRecordByUsername($this->input->post('user_name'));

        if ($data == NULL)
        {
            $this->form_validation->set_message('checkLogin', 'Wrong username. Please try again');
            return FALSE;
        }
        else
        {
            $password = $this->input->post('password');
            if($password != NULL && password_verify($password.$data->salt, $data->password))
            {
                $this->_user_level = $data->user_level;
                $this->_full_name  = $data->name;
                return TRUE;
            }
            else
            {
                $this->form_validation->set_message('checkLogin', 'Wrong password. Please try again');
                return FALSE;
                
            }
        }
    }

    function _rules()
    {
        return [
            [
                'field'     =>  'user_name',
                'rules'     =>  'trim|required|callback_checkLogin'
            ],
            [
                'field'     =>  'password',
                'rules'     =>  'trim|required'
            ]
        ];
    }
}