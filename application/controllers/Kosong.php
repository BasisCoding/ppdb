<?php 

	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Kosong extends CI_Controller {
	
		public function index()
		{
			$data['title'] = 'Kosong';
			$data['css'] = '';
			$data['js'] = '';
			
			$this->load->view('layouts/backend/app', $data);
		}
	
	}
	
	/* End of file Empty.php */
	/* Location: ./application/controllers/Empty.php */
?>