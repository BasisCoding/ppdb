<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class DataPengajar extends MY_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('PengajarModel');
		$this->load->helper('tanggal');
		$this->load->helper('upload');
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->helper('security');
	}
	
	public function index()
	{
		$data['title'] = 'Data Pengajar';
		$data['css'] = '
		<link href="'. site_url('assets/css/plugins/chosen/bootstrap-chosen.css') .'" rel="stylesheet">
		<link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
		<link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet"/>
		<link href="'. site_url('assets/css/plugins/dataTables/datatables.min.css') .'" rel="stylesheet">
		<link href="'. site_url('assets/css/plugins/jasny/jasny-bootstrap.min.css') .'" rel="stylesheet">
		';
		$data['js'] = 'data-pengajar';
		$data['pages'] = 'data-pengajar';

		$menu = $this->RolesMenusModel->get_menu();
		$data['menu'] = fetch_menu($menu);

		$this->load->view('layouts/backend/app', $data);
	}

	public function store()
	{
		$list = $this->PengajarModel->get_datatables();
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
			"recordsTotal" 		=> $this->PengajarModel->count_all(),
			"recordsFiltered" 	=> $this->PengajarModel->count_filtered(),
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
				'rules' => 'required|trim|is_unique[pengajar.nik]|min_length[16]|xss_clean',
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
			$users['username'] 				= str_replace("'", "", htmlspecialchars($this->input->post('nik'), ENT_QUOTES));
			$users['password'] 				= password_hash(date('dmY', strtotime($this->input->post('tanggal_lahir'))), PASSWORD_DEFAULT);
			$users['status']				= str_replace("'", "", htmlspecialchars($this->input->post('status'), ENT_QUOTES));
			$users['email']					= str_replace("'", "", htmlspecialchars($this->input->post('email'), ENT_QUOTES));
			$pengajar['nama_lengkap']       = str_replace("'", "", htmlspecialchars($this->input->post('nama_lengkap'), ENT_QUOTES));
			$pengajar['nik']				= str_replace("'", "", htmlspecialchars($this->input->post('nik'), ENT_QUOTES));
			$pengajar['tempat_lahir']		= str_replace("'", "", htmlspecialchars($this->input->post('tempat_lahir'), ENT_QUOTES));
			$pengajar['tanggal_lahir']		= str_replace("'", "", htmlspecialchars($this->input->post('tanggal_lahir'), ENT_QUOTES));
			$pengajar['jenis_kelamin']		= str_replace("'", "", htmlspecialchars($this->input->post('jenis_kelamin'), ENT_QUOTES));
			$pengajar['pendidikan']			= str_replace("'", "", htmlspecialchars($this->input->post('pendidikan'), ENT_QUOTES));
			$pengajar['agama']				= str_replace("'", "", htmlspecialchars($this->input->post('agama'), ENT_QUOTES));

			if (!empty($this->input->post('username'))) {
				$users['username']		= $this->input->post('username');
			}

			if (!empty($this->input->post('password'))) {
				$users['password']		= password_hash(date('dmY', strtotime($this->input->post('password'))), PASSWORD_DEFAULT);
			}
			
			$users['group_id']		= 5;

			$act = $this->PengajarModel->create($users, $pengajar);
			// echo $this->db->last_query($act);
			if ($act) {
				// $this->verified_code($data['email']);
				$response = array(
					'type' => 'success',
					'title' => 'Berhasil !',
					'message' => 'Data pengajar berhasil ditambahkan !'
				);
			} else {
				$response = array(
					'type' => 'error',
					'title' => 'Gagal !',
					'message' => 'Data pengajar gagal ditambahkan, silahkan coba kembali dalam beberapa menit !'
				);
			}

			echo json_encode($response);
		}
	}
	
	public function show($id)
	{
		$get = $this->PengajarModel->get(str_replace("'", "", htmlspecialchars($id, ENT_QUOTES)));
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
				'rules' => 'required|trim|is_unique[pengajar.nik]|min_length[16]|xss_clean',
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
			$id       					= str_replace("'", "", htmlspecialchars($this->input->post('id'), ENT_QUOTES));
			$user_id       				= str_replace("'", "", htmlspecialchars($this->input->post('user_id'), ENT_QUOTES));
			
			$users['username'] = null;
			$users['status']			= str_replace("'", "", htmlspecialchars($this->input->post('status_update'), ENT_QUOTES)); // Tidak Usah Menggunakan Update Status
			$data['nama_lengkap']       = str_replace("'", "", htmlspecialchars($this->input->post('nama_lengkap_update'), ENT_QUOTES));
			$data['tempat_lahir']		= str_replace("'", "", htmlspecialchars($this->input->post('tempat_lahir_update'), ENT_QUOTES));
			$data['tanggal_lahir']		= str_replace("'", "", htmlspecialchars($this->input->post('tanggal_lahir_update'), ENT_QUOTES));
			$data['jenis_kelamin']		= str_replace("'", "", htmlspecialchars($this->input->post('jenis_kelamin_update'), ENT_QUOTES));
			$data['agama']				= str_replace("'", "", htmlspecialchars($this->input->post('agama_update'), ENT_QUOTES));
			$data['pendidikan']			= str_replace("'", "", htmlspecialchars($this->input->post('pendidikan_update'), ENT_QUOTES));
			$data['update_at']			= date('Y-m-d H:i:s');

			if (!$this->input->post('username_lama')) {
				$users['username']		= str_replace("'", "", htmlspecialchars($this->input->post('username_update'), ENT_QUOTES));
			}else{
				$users['username']		= str_replace("'", "", htmlspecialchars($this->input->post('username_update'), ENT_QUOTES));
			}

			if (!$this->input->post('nik_lama')) {
				$data['nik']		= str_replace("'", "", htmlspecialchars($this->input->post('nik_update'), ENT_QUOTES));
			}else{
				$data['nik']		= str_replace("'", "", htmlspecialchars($this->input->post('nik_update'), ENT_QUOTES));
			}

			$act = $this->PengajarModel->update($data, $id, $users, $user_id);
			// echo $this->db->last_query($act);
			if ($act) {
				// $this->verified_code($data['email']);
				$response = array(
					'type' => 'success',
					'title' => 'Berhasil !',
					'message' => 'Data pengajar berhasil diubah !'
				);
			} else {
				$response = array(
					'type' => 'error',
					'title' => 'Gagal !',
					'message' => 'Data pengajar gagal diubah, silahkan coba kembali dalam beberapa menit !'
				);
			}

			echo json_encode($response);
		}
	}

	public function delete()
	{
		$user_id = str_replace("'", "", htmlspecialchars($this->input->post('user_id'), ENT_QUOTES));
		$act = $this->PengajarModel->delete($user_id);
		if ($act) {
			// $this->verified_code($data['email']);
			$response = array(
				'type' => 'success',
				'title' => 'Berhasil !',
				'message' => 'Data pengajar berhasil dihapus !'
			);
		} else {
			$response = array(
				'type' => 'error',
				'title' => 'Gagal !',
				'message' => 'Data pengajar gagal dihapus, silahkan coba kembali dalam beberapa menit !'
			);
		}

		echo json_encode($response);
	}
	
}

/* End of file DataPenduduk.php */
/* Location: ./application/controllers/DataPenduduk.php */
?>
