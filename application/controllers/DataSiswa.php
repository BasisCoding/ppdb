<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class DataSiswa extends MY_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('SiswaModel');
		$this->load->helper('tanggal');
		$this->load->helper('upload');
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->helper('security');
	}
	
	public function index()
	{
		$data['title'] = 'Data Siswa';
		$data['css'] = '
		<link href="'. site_url('assets/css/plugins/chosen/bootstrap-chosen.css') .'" rel="stylesheet">
		<link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
		<link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet"/>
		<link href="'. site_url('assets/css/plugins/dataTables/datatables.min.css') .'" rel="stylesheet">
		<link href="'. site_url('assets/css/plugins/jasny/jasny-bootstrap.min.css') .'" rel="stylesheet">
		';
		$data['js'] = 'data-siswa';
		$data['pages'] = 'data-siswa';

		$menu = $this->RolesMenusModel->get_menu();
		$data['menu'] = fetch_menu($menu);

		$this->load->view('layouts/backend/app', $data);
	}

	public function store()
	{
		$list = $this->SiswaModel->get_datatables();
		$data = array();
		$no = $_POST['start'];

		foreach ($list as $ls) {

			if ($ls->status == 0) {
				$status = '<span class="badge rounded-pill badge-danger">Tidak Aktif</span>';
			}else if ($ls->status == 1) {
				$status = '<span class="badge rounded-pill badge-success">Aktif</span>';
			}else{
				$status = '';
			}

			$no++;
			$row = array();
			$row[] = '

			<a class="btn btn-sm btn-primary btn-bitbucket btn-view" data-id="'.$ls->id.'">
			<i class="fa fa-eye text-white"></i>
			</a>

			<a class="btn btn-sm btn-warning btn-bitbucket btn-update" data-id="'.$ls->id.'">
			<i class="fa fa-edit text-white"></i>
			</a>

			<a class="btn btn-sm btn-danger btn-bitbucket btn-delete" data-id="'.$ls->user_id.'">
			<i class="fa fa-trash text-white"></i>
			</a>

			';

			$row[] = $ls->nik;
			$row[] = $ls->nama_lengkap;
			$row[] = $ls->tempat_lahir;
			$row[] = date_indo($ls->tanggal_lahir);
			$row[] = $ls->agama;
			$row[] = $ls->jenis_kelamin;
			$row[] = $status;

			$data[] = $row;
		}

		$output = array(
			"draw"				=> $_POST['draw'],
			"recordsTotal" 		=> $this->SiswaModel->count_all(),
			"recordsFiltered" 	=> $this->SiswaModel->count_filtered(),
			"data" 				=> $data
		);

		echo json_encode($output);
	}

	public function create()
	{
		$config = array(

			array(

				'field' => 'nik',
				'label' => 'NIK',
				'rules' => 'required|trim|is_unique[siswa.nik]|min_length[16]|xss_clean',
				'errors' => array(
					'required' => 'NIK Wajib diisi',
					'trim' => 'NIK tidak boleh menggunakan spasi',
					'is_unique' => 'NIK sudah tersedia',
					'min_length' => 'NIK minimal 6 karakter',
				),

			),

			array(

				'field' => 'nama_lengkap',
				'label' => 'Nama Lengkap',
				'rules' => 'required|xss_clean',
				'errors' => array(
					'required' => 'Nama Lengkap Wajib diisi',
				),

			),

			array(

				'field' => 'tanggal_lahir',
				'label' => 'Tanggal Lahir',
				'rules' => 'required|xss_clean',
				'errors' => array(
					'required' => 'Tanggal Lahir Wajib diisi',
				),

			),

			array(

				'field' => 'email',
				'label' => 'Email',
				'rules' => 'required|trim|is_unique[users.email]|xss_clean',
				'errors' => array(
					'required' => 'Email Wajib diisi',
					'trim' => 'Email tidak boleh menggunakan spasi',
					'is_unique' => 'Email sudah tersedia'
				),

			),

		);

		if (!empty($this->input->post('username'))) {
			$config[] = 
			array(

				'field' => 'username',
				'label' => 'Username',
				'rules' => 'required|trim|is_unique[users.username]|min_length[6]|xss_clean',
				'errors' => array(
					'required' => 'Username Wajib diisi',
					'trim' => 'Username tidak boleh menggunakan spasi',
					'is_unique' => 'Username sudah tersedia',
					'min_length' => 'Username minimal 6 karakter',
				)

			);
		}

		if (!empty($this->input->post('password'))) {
			$config[] = 
			array(

				'field' => 'password',
				'label' => 'Password',
				'rules' => 'required|min_length[6]|xss_clean',
				'errors' => array(
					'required' => 'Password Wajib diisi',
					'min_length' => 'Password minimal 6 karakter',
				)

			);
		}

		$this->form_validation->set_rules($config);
		if ($this->form_validation->run() == FALSE) {

			$data = [
				'type'              => 'val_error',
				'nama_lengkap'      => form_error('nama_lengkap', '<h4>', '</h4>'),
				'nik'          		=> form_error('nik', '<h4>', '</h4>'),
				'username'          => form_error('username', '<h4>', '</h4>'),
				'email'          	=> form_error('email', '<h4>', '</h4>'),
				'password'          => form_error('password', '<h4>', '</h4>'),
				'tanggal_lahir'     => form_error('tanggal_lahir', '<h4>', '</h4>'),
			];

			echo json_encode($data);
		} else {
			$users['username'] 				= $this->input->post('nik');
			$users['password'] 				= password_hash(date('dmY', strtotime($this->input->post('tanggal_lahir'))), PASSWORD_DEFAULT);
			$users['status']				= $this->input->post('status');
			$users['email']					= $this->input->post('email');
			$siswa['nama_lengkap']       = $this->input->post('nama_lengkap');
			$siswa['nik']				= $this->input->post('nik');
			$siswa['tempat_lahir']		= $this->input->post('tempat_lahir');
			$siswa['tanggal_lahir']		= $this->input->post('tanggal_lahir');
			$siswa['jenis_kelamin']		= $this->input->post('jenis_kelamin');
			$siswa['pendidikan']			= $this->input->post('pendidikan');
			$siswa['agama']				= $this->input->post('agama');

			if (!empty($this->input->post('username'))) {
				$users['username']		= $this->input->post('username');
			}

			if (!empty($this->input->post('password'))) {
				$users['password']		= password_hash(date('dmY', strtotime($this->input->post('password'))), PASSWORD_DEFAULT);
			}
			
			$users['group_id']		= 5;

			$act = $this->SiswaModel->create($users, $siswa);
			// echo $this->db->last_query($act);
			if ($act) {
				// $this->verified_code($data['email']);
				$response = array(
					'type' => 'success',
					'title' => 'Berhasil !',
					'message' => 'Data siswa berhasil ditambahkan !'
				);
			} else {
				$response = array(
					'type' => 'error',
					'title' => 'Gagal !',
					'message' => 'Data siswa gagal ditambahkan, silahkan coba kembali dalam beberapa menit !'
				);
			}

			echo json_encode($response);
		}
	}
	
	public function show($id)
	{
		$get = $this->SiswaModel->get($id);
		// echo $this->db->last_query($get);
		if ($get->num_rows() > 0) {
			$response = $get->row();
		}else{
			$response = array(
				'type' => 'error',
				'title' => 'Gagal !!!',
				'message' => 'Data yang anda inginkan tidak ada di dalam database kami !',
			);
		}

		echo json_encode($response);
	}

	public function update()
	{
		$config = array(

			array(

				'field' => 'nama_lengkap_update',
				'label' => 'Nama Lengkap',
				'rules' => 'required|xss_clean',
				'errors' => array(
					'required' => 'Nama Lengkap Wajib diisi',
				),

			),

			array(

				'field' => 'email_update',
				'label' => 'Email',
				'rules' => 'required|xss_clean|trim',
				'errors' => array(
					'required' => 'Email Wajib diisi',
				),

			)
		);

		if (!$this->input->post('nik_lama')) {
			$config[] = 
			array(

				'field' => 'nik_update',
				'label' => 'NIK',
				'rules' => 'required|trim|is_unique[siswa.nik]|min_length[16]|xss_clean',
				'errors' => array(
					'required' => 'NIK Wajib diisi',
					'trim' => 'NIK tidak boleh menggunakan spasi',
					'is_unique' => 'NIK sudah tersedia',
					'min_length' => 'NIK minimal 6 karakter',
				),

			);

		}

		if (!$this->input->post('username_lama')) {
			$config[] = 
			array(

				'field' => 'username_update',
				'label' => 'Username',
				'rules' => 'required|trim|is_unique[users.username]|min_length[6]|xss_clean',
				'errors' => array(
					'required' => 'Username Wajib diisi',
					'trim' => 'Username tidak boleh menggunakan spasi',
					'is_unique' => 'Username sudah tersedia',
					'min_length' => 'Username minimal 6 karakter',
				),

			);
		}

		$this->form_validation->set_rules($config);
		if ($this->form_validation->run() == FALSE) {

			$data = [
				'type'              => 'val_error',
				'nama_lengkap_update'      => form_error('nama_lengkap_update', '<h4>', '</h4>'),
				'nik_update'          		=> form_error('nik_update', '<h4>', '</h4>'),
				'username_update'          => form_error('username_update', '<h4>', '</h4>'),
				'email_update'          => form_error('email_update', '<h4>', '</h4>'),
			];

			echo json_encode($data);
		} else {
			$users['username'] = null;
			$user_id = null;
			$users['status']			= $this->input->post('status_update'); // Tidak Usah Menggunakan Update Status
			$id       					= $this->input->post('id');
			$data['nama_lengkap']       = $this->input->post('nama_lengkap_update');
			$data['tempat_lahir']		= $this->input->post('tempat_lahir_update');
			$data['tanggal_lahir']		= $this->input->post('tanggal_lahir_update');
			$data['jenis_kelamin']		= $this->input->post('jenis_kelamin_update');
			$data['agama']				= $this->input->post('agama_update');
			$data['pendidikan']			= $this->input->post('pendidikan_update');
			$data['update_at']			= date('Y-m-d H:i:s');

			if (!$this->input->post('username_lama')) {
				$user_id       			= $this->input->post('user_id');
				$users['username']		= $this->input->post('username_update');
			}

			if (!$this->input->post('nik_lama')) {
				$data['nik']		= $this->input->post('nik_update');
			}

			$act = $this->SiswaModel->update($data, $id, $users, $user_id);
			// echo $this->db->last_query($act);
			if ($act) {
				// $this->verified_code($data['email']);
				$response = array(
					'type' => 'success',
					'title' => 'Berhasil !',
					'message' => 'Data siswa berhasil diubah !'
				);
			} else {
				$response = array(
					'type' => 'error',
					'title' => 'Gagal !',
					'message' => 'Data siswa gagal diubah, silahkan coba kembali dalam beberapa menit !'
				);
			}

			echo json_encode($response);
		}
	}

	public function delete()
	{
		$user_id = $this->input->post('user_id');
		$act = $this->SiswaModel->delete($user_id);
		if ($act) {
			// $this->verified_code($data['email']);
			$response = array(
				'type' => 'success',
				'title' => 'Berhasil !',
				'message' => 'Data siswa berhasil dihapus !'
			);
		} else {
			$response = array(
				'type' => 'error',
				'title' => 'Gagal !',
				'message' => 'Data siswa gagal dihapus, silahkan coba kembali dalam beberapa menit !'
			);
		}

		echo json_encode($response);
	}
	
}

/* End of file DataPenduduk.php */
/* Location: ./application/controllers/DataPenduduk.php */
?>
