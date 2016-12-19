<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_login_m extends CI_Model
{
	private $_table = 'tbl_users';

	function getRecordByUsername($user_name)
	{
		$select = "CONCAT(`first_name`,' ', `last_name`) `name`, "
					 ."`id`, `password`, `salt`, `status`, `user_level`";

		$q = $this->db->where("user_name = '$user_name'")
					  ->select($select, false)
					  ->where("status = '1'")
					  ->get($this->_table);

		$data = $q->row();

		$q->free_result();

		return $data;
	}
}