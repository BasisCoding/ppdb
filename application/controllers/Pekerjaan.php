<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Pekerjaan extends CI_Controller {
	
	public function show()
	{
		$get = $this->db->get('jenis_pekerjaan')->result();
		echo json_encode($get);
	}
	
}

/* End of file Pekerjaan.php */
/* Location: ./application/controllers/Pekerjaan.php */
?>