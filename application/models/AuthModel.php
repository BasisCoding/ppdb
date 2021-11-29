<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class AuthModel extends CI_Model {

	function login($data)
	{
		$this->db->from('users as u');
		$this->db->join('groups as g', 'g.id = u.group_id', 'left');
		$this->db->where('u.email', $data['username']);
		$this->db->or_where('u.username', $data['username']);
		return $this->db->get();
	}

	function register($data)
	{
		return $this->db->insert('users', $data);
	}

	function update($data, $id)
	{
		return $this->db->update('users', $data, array('id' => $id));
	}

	function get_by_cookie($cookie)
	{
		$this->db->from('users as u');
		$this->db->join('groups as g', 'g.id = u.group_id', 'left');
		$this->db->where('cookie', $cookie);
		return $this->db->get();
	}

	
}

/* End of file AuthModel.php */
/* Location: ./application/models/AuthModel.php */
?>