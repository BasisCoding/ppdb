<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Dashboard extends CI_Controller {
	
		public function index()
		{
			$data['title'] = 'Kosong';
			$data['css'] = '';
			$data['js'] = '';
			$data['pages'] = 'dashboard';
			
			$this->load->view('layouts/backend/app', $data);
		}
	
	}
	
	/* End of file Dashboard.php */
	/* Location: ./application/controllers/Dashboard.php */
?>