<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class AuthModel extends CI_Model {

	function login($username_email)
	{
		$this->db->select('u.id, u.nama_lengkap, u.email, u.password, u.foto, u.username, u.cookie, u.status, g.id as group_id, g.name as group_name, g.description as group_desc');
		$this->db->from('users as u');
		$this->db->join('groups as g', 'g.id = u.group_id', 'left');
		$this->db->where('u.email', $username_email);
		$this->db->or_where('u.username', $username_email);
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
		$this->db->select('u.id, u.nama_lengkap, u.email, u.password, u.foto, u.username, u.cookie, u.status, g.id as group_id, g.name as group_name, g.description as group_desc');
		$this->db->from('users as u');
		$this->db->join('groups as g', 'g.id = u.group_id', 'left');
		$this->db->where('cookie', $cookie);
		return $this->db->get();
	}

	
}

/* End of file AuthModel.php */
/* Location: ./application/models/AuthModel.php */
?>