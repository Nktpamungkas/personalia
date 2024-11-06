<?php if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class user_model extends CI_Model
{

	public function getUserByUsername($username)
	{
		$this->db->where('username', $username);
		return $this->db->get('user')->row(); // Make sure the table name is correct
	}


}
