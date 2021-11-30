<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('AuthModel');
		$this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->helper('security');
	}
	
	public function index()
	{
		$data['title'] = 'Register Page';
		$data['css'] = '';
		$data['js'] = 'register';
		$data['pages'] = 'register';

		$cookie = get_cookie('silink');
		if ($this->session->userdata('logged')) {
			redirect('dashboard','refresh');
		}else if ($cookie != '') {
			$row = $this->AuthModel->get_by_cookie($cookie)->row();
			if ($row) {
				$this->_reg_session($row);
			}else{
				$this->load->view('layouts/frontend/auth', $data);
			}
		}else{
			$this->load->view('layouts/frontend/auth', $data);
		}
	}

	public function process()
	{
		$config = array(
			array(

				'field' => 'nama_lengkap',
				'label' => 'Nama Lengkap',
				'rules' => 'required|xss_clean',
				'errors' => array(
					'required' => 'Nama Lengkap Wajib diisi',
				),

			),

			array(

				'field' => 'username',
				'label' => 'Username',
				'rules' => 'required|trim|is_unique[users.username]|min_length[6]|xss_clean',
				'errors' => array(
					'required' => 'Username Wajib diisi',
					'trim' => 'Username tidak boleh menggunakan spasi',
					'is_unique' => 'Username sudah tersedia',
					'min_length' => 'Username minimal 6 karakter',
				),

			),

			array(

				'field' => 'password',
				'label' => 'Password',
				'rules' => 'required|min_length[6]|xss_clean',
				'errors' => array(
					'required' => 'Password Wajib diisi',
					'min_length' => 'Password minimal 6 karakter',
				),

			),

			array(

				'field' => 'password_confirm',
				'label' => 'Konfirmasi Password',
				'rules' => 'required|matches[password]|xss_clean',
				'errors' => array(
					'required' => 'Konfirmasi Password Wajib diisi',
					'matches' => 'Konfirmasi Password tidak sama dengan password',
				),

			),

			array(

				'field' => 'email',
				'label' => 'Email',
				'rules' => 'required|valid_email|is_unique[users.email]|xss_clean',
				'errors' => array(
					'required' => 'Email Wajib diisi',
					'valid_email' => 'Harap isi email dengan benar',
					'is_unique' => 'Email sudah tersedia',
				),

			),

		);

		$this->form_validation->set_rules($config);
		if ($this->form_validation->run() == FALSE) {

			$data = [
				'type'              => 'val_error',
				'nama_lengkap'      => form_error('nama_lengkap', '<h4>', '</h4>'),
				'username'          => form_error('username', '<h4>', '</h4>'),
				'password'          => form_error('password', '<h4>', '</h4>'),
				'password_confirm' => form_error('password_confirm', '<h4>', '</h4>'),
				'email'             => form_error('email', '<h4>', '</h4>')
			];

			echo json_encode($data);
		} else {
			$data['nama_lengkap']     	= $this->input->post('nama_lengkap');
			$data['username']         	= $this->input->post('username');
			$data['email']				= $this->input->post('email');
			$data['password']         	= password_hash($this->input->post('password'), PASSWORD_DEFAULT);

			$act = $this->AuthModel->register($data);
			if ($act) {
				// $this->verified_code($data['email']);
				$response = array(
					'type' => 'success',
					'title' => 'Berhasil !',
					'message' => 'Pendaftaran berhasil, silahkan verifikasi email terlebih dahulu untuk melakukan login !',
					'redirect' => base_url('login'),
				);
			} else {
				$response = array(
					'type' => 'danger',
					'title' => 'Gagal !',
					'message' => 'Pendaftaran gagal silahkan coba beberapa menit lagi !',
					'redirect' => base_url('register'),
				);
			}

			echo json_encode($response);
		}
	}
	
}

/* End of file Register.php */
/* Location: ./application/controllers/auth/Register.php */
?>