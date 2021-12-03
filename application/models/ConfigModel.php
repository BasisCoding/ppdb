<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class ConfigModel extends CI_Model {
	
	function store()
	{
		return $this->db->get('config')->result_array();
	}	

	function update($data)
	{
		foreach ($data as $attr => $value) {
			// var_dump($data);
			$update = $this->db->update('config', array('value' => $value), array('attr' => $attr));
		}

		return $update;
	}
	
}

/* End of file ConfigModel.php */
/* Location: ./application/models/ConfigModel.php */
?>