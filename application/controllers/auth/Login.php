<?php 

	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Login extends CI_Controller {
	
		public function index()
		{
			$data['title'] = 'Login Page';
			$data['css'] = '';
			$data['js'] = '';
			$data['pages'] = 'login';

			$this->load->view('layouts/frontend/auth', $data);
		}

		public function process()
		{
			$data['username'] = str_replace("'", "", htmlspecialchars($this->input->post('username_email'), ENT_QUOTES));
			$data['password'] = str_replace("'", "", htmlspecialchars($this->input->post('password'), ENT_QUOTES));
			$data['remember_me'] = $this->input->post('remember_me');

			$row = 
		}
	
	}
	
	/* End of file Login.php */
	/* Location: ./application/controllers/auth/Login.php */
?>