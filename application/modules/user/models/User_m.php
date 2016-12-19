<?php 

class User_m extends CI_Model 
{   
    private $table = 'tbl_users';

	function __construct()
	{
		parent::__construct();
	}

    function get_by_id($id)
    {
        $query = $this->db->get_where($this->table, "id = $id");

        $data = $query->row();
        $query->free_result();
        
        return $data;
    }

	function insert($data)
    {
        $password = $data["password"];
        $salt = rand(100, 1000000);
        $hashed = password_hash("$password$salt", PASSWORD_BCRYPT);

        return $this->db->insert($this->table, [
            'first_name'    => $data['first_name'],
            'last_name'     => $data['last_name'],
            'middle_name'   => $data['middle_name'],
            'user_level'    => $data['user_level'],
            'user_name'     => $data['user_name'],
            'status'        => $data['status'],
            'password'      => $hashed,
            'salt'          => $salt,
        ]);
    }

	function update($id, $data)
	{
        $password = $data["password"];
        $salt = rand(100, 1000000);
        $hashed = password_hash("$password$salt", PASSWORD_BCRYPT);
        
        return $this->db->where('id', $id)
                        ->update($this->table, [
                            'first_name'    => $data['first_name'],
                            'last_name'     => $data['last_name'],
                            'middle_name'   => $data['middle_name'],
                            'user_level'    => $data['user_level'],
                            'status'        => $data['status'],
                            'password'      => $hashed,
                            'salt'          => $salt,
                        ]);
	}

	function get_list($post, $count = FALSE)
    {
        if(@$post['first_name'])
        {
            $this->db->like('first_name', $post['first_name']);
        }

        if(@$post['last_name'])
        {
            $this->db->like('last_name', $post['last_name']);
        }

        if(@$post['user_name'])
        {
            $this->db->like('user_name', $post['user_name']);
        }



        $this->db->join('status s', 's.id = u.status') 
                 ->join('user_level ul', 'ul.id = u.user_level') 
             ->from("$this->table u");

        if(@$post['user_status'])
        {
            $this->db->like('s.label', $post['user_status']);
        }

        if($count)
        {
            return $this->db->count_all_results();
        }

        $result = $this->db->select('u.id, first_name, middle_name, last_name, user_name, s.label status, ul.label user_level')
                           ->order_by($post['sort'], $post['order'])
                           ->limit($post['limit'], $post['offset'])
                           ->get();

        $data = $result->result_array();
        $result->free_result();

        return $data;
    }

    function get_level_label($id)
    {
        return $this->db->get_where('user_level', "id = '$id'")
                        ->row('label');
    }
    
    function get_status_label($id)
    {
        return $this->db->get_where('status', "id = '$id'")
                        ->row('label');
    }

}