<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class WilayahModel extends CI_Model {
	
		function store()
		{
			return $this->db->get('provinces')->result();
		}
	
	}
	
	/* End of file WilayahModel.php */
	/* Location: ./application/models/WilayahModel.php */
?>