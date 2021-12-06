<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class DataPenduduk extends MY_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('PendudukModel');
		$this->load->helper('tanggal');
		$this->load->helper('upload');
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->helper('security');
	}
	
	public function index()
	{
		$data['title'] = 'Data Penduduk';
		$data['css'] = '
		<link href="'. site_url('assets/css/plugins/chosen/bootstrap-chosen.css') .'" rel="stylesheet">
		<link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
		<link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet"/>
		<link href="'. site_url('assets/css/plugins/dataTables/datatables.min.css') .'" rel="stylesheet">
		<link href="'. site_url('assets/css/plugins/jasny/jasny-bootstrap.min.css') .'" rel="stylesheet">
		';
		$data['js'] = 'data-penduduk';
		$data['pages'] = 'data-penduduk';

		$menu = $this->RolesMenusModel->get_menu();
		$data['menu'] = fetch_menu($menu);

		$this->load->view('layouts/backend/app', $data);
	}

	public function store()
	{
		$list = $this->PendudukModel->get_datatables();
		$data = array();
		$no = $_POST['start'];

		foreach ($list as $ls) {

			if ($ls->status_hidup == 'Meninggal') {
				$status_hidup = '<span class="badge rounded-pill badge-danger">Meninggal</span>';
			}else if ($ls->status_hidup == 'Hidup') {
				$status_hidup = '<span class="badge rounded-pill badge-success">Hidup</span>';
			}

			if ($ls->status_pernikahan == 'Belum Menikah') {
				$status_pernikahan = '<span class="badge rounded-pill badge-danger">Belum Menikah</span>';
			}else if ($ls->status_pernikahan == 'Menikah') {
				$status_pernikahan = '<span class="badge rounded-pill badge-success">Menikah</span>';
			}else if ($ls->status_pernikahan == 'Janda') {
				$status_pernikahan = '<span class="badge rounded-pill badge-warning">Janda</span>';
			}else if ($ls->status_pernikahan == 'Duda') {
				$status_pernikahan = '<span class="badge rounded-pill badge-warning">Duda</span>';
			}

			$no++;
			$row = array();
			$row[] = '

			<a class="btn btn-sm btn-primary btn-bitbucket btn-detail">
			<i class="fa fa-eye text-white"></i>
			</a>

			<a class="btn btn-sm btn-warning btn-bitbucket btn-update" data-id="'.$ls->id.'">
			<i class="fa fa-edit text-white"></i>
			</a>

			<a class="btn btn-sm btn-danger btn-bitbucket btn-delete">
			<i class="fa fa-trash text-white"></i>
			</a>
			';
			$row[] = $ls->nik;
			$row[] = $ls->nama_lengkap;
			$row[] = $ls->tempat_lahir.', '.date_indo($ls->tanggal_lahir);
			$row[] = $ls->agama;
			$row[] = $ls->jenis_kelamin;
			$row[] = $status_pernikahan;
			$row[] = $status_hidup;

			$data[] = $row;
		}

		$output = array(
			"draw"				=> $_POST['draw'],
			"recordsTotal" 		=> $this->PendudukModel->count_all(),
			"recordsFiltered" 	=> $this->PendudukModel->count_filtered(),
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
				'rules' => 'required|trim|is_unique[penduduk.nik]|min_length[16]|xss_clean',
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

		);

		if (!$this->input->post('username_default')) {
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

		if (!$this->input->post('password_default')) {
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
				'password'          => form_error('password', '<h4>', '</h4>'),
			];

			echo json_encode($data);
		} else {
			$penduduk['nama_lengkap']       = $this->input->post('nama_lengkap');
			$penduduk['nik']				= $this->input->post('nik');
			$penduduk['tempat_lahir']		= $this->input->post('tempat_lahir');
			$penduduk['tanggal_lahir']		= $this->input->post('tanggal_lahir');
			$penduduk['jenis_kelamin']		= $this->input->post('jenis_kelamin');
			$penduduk['agama']				= $this->input->post('agama');
			$penduduk['status_hidup']		= $this->input->post('status_hidup');
			$penduduk['status_pernikahan']	= $this->input->post('status_pernikahan');
			$penduduk['status_hidup']		= $this->input->post('status_hidup');

			if (!$this->input->post('username_default')) {
				$users['username']		= $this->input->post('nik');
			}

			if (!$this->input->post('password_default')) {
				$users['password']		= password_hash(date('dmY', strtotime($this->input->post('tanggal_lahir'))), PASSWORD_DEFAULT);
			}

			$act = $this->PendudukModel->create($users, $penduduk);
			if ($act) {
				// $this->verified_code($data['email']);
				$response = array(
					'type' => 'success',
					'title' => 'Berhasil !',
					'message' => 'Data penduduk berhasil ditambahkan !'
				);
			} else {
				$response = array(
					'type' => 'error',
					'title' => 'Gagal !',
					'message' => 'Data penduduk gagal ditambahkan, silahkan coba kembali dalam beberapa menit !'
				);
			}

			echo json_encode($response);
		}
	}

	public function show($id)
	{
		$get = $this->PendudukModel->get($id);
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

			)
		);

		if (!$this->input->post('nik_lama')) {
			$config[] = 
			array(

				'field' => 'nik_update',
				'label' => 'NIK',
				'rules' => 'required|trim|is_unique[penduduk.nik]|min_length[16]|xss_clean',
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
			];

			echo json_encode($data);
		} else {
			$users['username'] = null;
			$user_id = null;
			$id       					= $this->input->post('id');
			$data['nama_lengkap']       = $this->input->post('nama_lengkap_update');
			$data['tempat_lahir']		= $this->input->post('tempat_lahir_update');
			$data['tanggal_lahir']		= $this->input->post('tanggal_lahir_update');
			$data['jenis_kelamin']		= $this->input->post('jenis_kelamin_update');
			$data['agama']				= $this->input->post('agama_update');
			$data['status_hidup']		= $this->input->post('status_hidup_update');
			$data['status_pernikahan']	= $this->input->post('status_pernikahan_update');
			$data['status_hidup']		= $this->input->post('status_hidup_update');

			if (!$this->input->post('username_lama')) {
				$user_id       			= $this->input->post('user_id');
				$users['username']		= $this->input->post('username_update');
			}

			if (!$this->input->post('nik_lama')) {
				$data['nik']		= $this->input->post('nik_update');
			}

			$act = $this->PendudukModel->update($data, $id, $users, $user_id);
			// echo $this->db->last_query($act);
			if ($act) {
				// $this->verified_code($data['email']);
				$response = array(
					'type' => 'success',
					'title' => 'Berhasil !',
					'message' => 'Data penduduk berhasil diubah !'
				);
			} else {
				$response = array(
					'type' => 'error',
					'title' => 'Gagal !',
					'message' => 'Data penduduk gagal diubah, silahkan coba kembali dalam beberapa menit !'
				);
			}

			echo json_encode($response);
		}
	}
	
}

/* End of file DataPenduduk.php */
/* Location: ./application/controllers/DataPenduduk.php */
?>