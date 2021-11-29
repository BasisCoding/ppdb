<?php 
	
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Register extends CI_Controller {
	
		public function index()
		{
			$data['title'] = 'Register Page';
			$data['css'] = '';
			$data['js'] = '';
			$data['pages'] = 'register';

			$this->load->view('layouts/frontend/auth', $data);		
		}
	
	}
	
	/* End of file Register.php */
	/* Location: ./application/controllers/auth/Register.php */
?>