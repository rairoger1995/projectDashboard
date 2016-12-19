<?php 

class client_m extends CI_Model
{
	private $table = 'tbl_client';

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

	function insertEntry($data)
	{
        return $this->db->insert($this->table, [
            'first_name'    => $data['first_name'],
            'last_name'    => $data['last_name'],
            'email'         => $data['email'],
            'uniqueid'      => $data['uniqueid'],
            'phone'         => $data['phone'],
            'role'          => $data['role'],
            'company_name'   => $data['company_name'],
            'office_location'=> $data['office_location'],
            'suburb'        => $data['suburb'],
            'state'         => $data['state'],
            'postcode'      => $data['postcode'],
            'age'           => $data['age'],
            'gender'        => $data['gender'],
            'yearsadviser'  => $data['yearsadviser'],
            'source'        => $data['source'],
            'softbounce'    => $data['softbounce'],
            'reason'        => $data['reason'],
            'status'        => $data['status'],
        ]);
	}

	function update($id, $data)
	{
        return $this->db->where('id', $id)
                        ->update($this->table, [
                            'first_name'    => $data['first_name'],
                            'last_name'    => $data['last_name'],
                            'email'         => $data['email'],
                            'uniqueid'      => $data['uniqueid'],
                            'phone'         => $data['phone'],
                            'role'          => $data['role'],
                            'company_name'   => $data['company_name'],
                            'office_location'=> $data['office_location'],
                            'suburb'        => $data['suburb'],
                            'state'         => $data['state'],
                            'postcode'      => $data['postcode'],
                            'age'           => $data['age'],
                            'gender'        => $data['gender'],
                            'yearsadviser'  => $data['yearsadviser'],
                            'source'        => $data['source'],
                            'softbounce'    => $data['softbounce'],
                            'reason'        => $data['reason'],
                            'status'        => $data['status'],
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

        if(@$post['age'])
        {
            $this->db->like('age', $post['age']);
        }

        if(@$post['postcode'])
        {
            $this->db->like('postcode', $post['postcode']);
        }

        if(@$post['suburb'])
        {
            $this->db->like('suburb', $post['suburb']);
        }

        if(@$post['state'])
        {
            $this->db->like('state', $post['state']);
        }


        $this->db->join('status s', 's.id = u.status') 
                 ->join('gender g', 'g.id = u.gender')
                 ->join('yearsadviser ya', 'ya.id = u.yearsadviser')
                 ->join('source so', 'so.id = u.source')
                 ->join('state st', 'st.id = u.state')
             ->from("$this->table u");

        if($count)
        {
            return $this->db->count_all_results();
        }

        $result = $this->db->select('u.id, uniqueid, email, first_name, last_name, phone, role, company_name, office_location, suburb, st.label state, postcode, age, g.label gender, ya.label yearsadviser, so.label source, softbounce, reason, s.label status')
                           ->order_by($post['sort'], $post['order'])
                           ->limit($post['limit'], $post['offset'])
                           ->get();

        $data = $result->result_array();
        $result->free_result();

        return $data;
    }
}