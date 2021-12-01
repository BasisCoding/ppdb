<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class ConfigModel extends CI_Model {
	
	function store()
	{
		return $this->db->get('config')->result_array();
	}	
	
}

/* End of file ConfigModel.php */
/* Location: ./application/models/ConfigModel.php */
?>