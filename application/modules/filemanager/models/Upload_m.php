<?php 

class Upload_m extends CI_Model 
{   
    private $table = 'tbl_uploads';

	function __construct()
	{
		parent::__construct();
	}

	function insert($data)
    {
        return $this->db->insert($this->table, [
            'data_uploaded'    => date('Y-m-d H:i:s'),
            'userfile'     => $data['userfile'],
        ]);
    }
}