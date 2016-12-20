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
        // print_r($data['file_name']); die("yeah");
        return $this->db->insert($this->table, [
            'filename'     => $data['file_name'],
            'file_type'     => $data['file_type'],
            'date_uploaded'    => date('Y-m-d H:i:s'),
        ]);
    }

    function get_uploadFile()
    {
        $result = $this->db->select('filename')
                           ->get('tbl_uploads');

        $data = $result->result_array();
        // print_r($data); die();
        return $data;
    }
}