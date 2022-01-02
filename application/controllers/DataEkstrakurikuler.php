<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class DataEkstrakurikuler extends MY_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('EkstrakurikulerModel');
		$this->load->helper('tanggal');
		$this->load->helper('upload');
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->helper('security');
	}
	
	public function index()
	{
		$data['title'] = 'Data Ekstrakurikuler';
		$data['css'] = '
		<link href="'. site_url('assets/css/plugins/chosen/bootstrap-chosen.css') .'" rel="stylesheet">
		<link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
		<link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet"/>
		<link href="'. site_url('assets/css/plugins/summernote/summernote-bs4.css') .'" rel="stylesheet">
		<link href="'. site_url('assets/css/plugins/dataTables/datatables.min.css') .'" rel="stylesheet">
		<link href="'. site_url('assets/css/plugins/jasny/jasny-bootstrap.min.css') .'" rel="stylesheet">
		';
		$data['js'] = 'data-ekstrakurikuler';
		$data['pages'] = 'data-ekstrakurikuler';

		$menu = $this->RolesMenusModel->get_menu();
		$data['menu'] = fetch_menu($menu);

		$this->load->view('layouts/backend/app', $data);
	}

	public function store()
	{
		$list = $this->EkstrakurikulerModel->get_datatables();
		$data = array();
		$no = $_POST['start'];

		foreach ($list as $ls) {

			$no++;
			$row = array();
			$row[] = '

			<a class="btn btn-sm btn-primary btn-bitbucket btn-view" data-id="'.$ls->id.'">
			<i class="fa fa-eye text-white"></i>
			</a>

			<a class="btn btn-sm btn-warning btn-bitbucket btn-update" data-id="'.$ls->id.'">
			<i class="fa fa-edit text-white"></i>
			</a>

			<a class="btn btn-sm btn-danger btn-bitbucket btn-delete" data-id="'.$ls->id.'">
			<i class="fa fa-trash text-white"></i>
			</a>

			';

			$row[] = $ls->nama_eskul;
			$row[] = $ls->slug_eskul;
			$row[] = substr($ls->deskripsi, 0, 100);

			$data[] = $row;
		}

		$output = array(
			"draw"				=> $_POST['draw'],
			"recordsTotal" 		=> $this->EkstrakurikulerModel->count_all(),
			"recordsFiltered" 	=> $this->EkstrakurikulerModel->count_filtered(),
			"data" 				=> $data
		);

		echo json_encode($output);
	}

	public function create()
	{
		$config = array(

			array(

				'field' => 'nama_eskul',
				'label' => 'Nama Ekstrakurikuler',
				'rules' => 'required|xss_clean',
				'errors' => array(
					'required' => 'Nama Ekstrakurikuler Wajib diisi',
				),

			),

			array(

				'field' => 'slug_eskul',
				'label' => 'Slug Ekstrakurikuler',
				'rules' => 'required|is_unique[ekstrakurikuler.slug_eskul]|xss_clean',
				'errors' => array(
					'required' => 'Slug Ekstrakurikuler Wajib diisi',
					'is_unique' => 'Slug Ekstrakurikuler Sudah Tersedia',
				),

			),

			array(

				'field' => 'deskripsi',
				'label' => 'Deskripsi',
				'rules' => 'required|xss_clean',
				'errors' => array(
					'required' => 'Deskripsi Wajib diisi',
				),

			),

		);

		$this->form_validation->set_rules($config);
		if ($this->form_validation->run() == FALSE) {

			$data = [
				'type'              => 'val_error',
				'nama_eskul'      	=> form_error('nama_eskul', '<h4>', '</h4>'),
				'deskripsi'         => form_error('deskripsi', '<h4>', '</h4>'),
				'slug_eskul'        => form_error('slug_eskul', '<h4>', '</h4>'),
			];

			echo json_encode($data);
		} else {
			$data['nama_eskul']     = str_replace("'", "", htmlspecialchars($this->input->post('nama_eskul'), ENT_QUOTES));
			$data['deskripsi']		= str_replace("'", "", htmlspecialchars($this->input->post('deskripsi'), ENT_QUOTES));
			$data['slug_eskul']		= str_replace("'", "", htmlspecialchars($this->input->post('slug_eskul'), ENT_QUOTES));
			
			$act = $this->EkstrakurikulerModel->create($data);
			// echo $this->db->last_query($act);
			if ($act) {
				// $this->verified_code($data['email']);
				$response = array(
					'type' => 'success',
					'title' => 'Berhasil !',
					'message' => 'Data ekstrakurikuler berhasil ditambahkan !'
				);
			} else {
				$response = array(
					'type' => 'error',
					'title' => 'Gagal !',
					'message' => 'Data ekstrakurikuler gagal ditambahkan, silahkan coba kembali dalam beberapa menit !'
				);
			}

			echo json_encode($response);
		}
	}
	
	public function show($id)
	{
		$get = $this->EkstrakurikulerModel->get(str_replace("'", "", htmlspecialchars($id, ENT_QUOTES)));
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

				'field' => 'nama_eskul_update',
				'label' => 'Nama Ekstrakurikuler',
				'rules' => 'required|xss_clean',
				'errors' => array(
					'required' => 'Nama Ekstrakurikuler Wajib diisi',
				),

			),

			array(

				'field' => 'slug_eskul_update',
				'label' => 'Slug Ekstrakurikuler',
				'rules' => 'required|xss_clean',
				'errors' => array(
					'required' => 'Slug Ekstrakurikuler Wajib diisi',
				),

			),

			array(

				'field' => 'deskripsi_update',
				'label' => 'Deskripsi',
				'rules' => 'required',
				'errors' => array(
					'required' => 'Deskripsi Wajib diisi',
				),

			)
		);

		$this->form_validation->set_rules($config);
		if ($this->form_validation->run() == FALSE) {

			$data = [
				'type'              => 'val_error',
				'nama_eskul'      	=> form_error('nama_eskul_update', '<h4>', '</h4>'),
				'deskripsi'         => form_error('deskripsi_update', '<h4>', '</h4>'),
				'slug_eskul'        => form_error('slug_eskul_update', '<h4>', '</h4>'),
			];

			echo json_encode($data);
		} else {
			$id       					= str_replace("'", "", htmlspecialchars($this->input->post('id_update'), ENT_QUOTES));

			$data['nama_eskul']     = str_replace("'", "", htmlspecialchars($this->input->post('nama_eskul_update'), ENT_QUOTES));
			$data['deskripsi']		= str_replace("'", "", htmlspecialchars($this->input->post('deskripsi_update'), ENT_QUOTES));
			$data['slug_eskul']		= str_replace("'", "", htmlspecialchars($this->input->post('slug_eskul_update'), ENT_QUOTES));
			
			$act = $this->EkstrakurikulerModel->update($data, $id);
			// echo $this->db->last_query($act);
			if ($act) {
				// $this->verified_code($data['email']);
				$response = array(
					'type' => 'success',
					'title' => 'Berhasil !',
					'message' => 'Data ekstrakurikuler berhasil diubah !'
				);
			} else {
				$response = array(
					'type' => 'error',
					'title' => 'Gagal !',
					'message' => 'Data ekstrakurikuler gagal diubah, silahkan coba kembali dalam beberapa menit !'
				);
			}

			echo json_encode($response);
		}
	}

	public function delete()
	{
		$id = str_replace("'", "", htmlspecialchars($this->input->post('id'), ENT_QUOTES));
		$act = $this->EkstrakurikulerModel->delete($id);
		if ($act) {
			// $this->verified_code($data['email']);
			$response = array(
				'type' => 'success',
				'title' => 'Berhasil !',
				'message' => 'Data ekstrakurikuler berhasil dihapus !'
			);
		} else {
			$response = array(
				'type' => 'error',
				'title' => 'Gagal !',
				'message' => 'Data ekstrakurikuler gagal dihapus, silahkan coba kembali dalam beberapa menit !'
			);
		}

		echo json_encode($response);
	}
	
}

/* End of file Ekstrakurikuler.php */
/* Location: ./application/controllers/Ekstrakurikuler.php */
?>
