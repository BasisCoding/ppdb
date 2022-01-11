<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class DataJurusan extends MY_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('JurusanModel');
		$this->load->helper('tanggal');
		$this->load->helper('upload');
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->helper('security');
	}
	
	public function index()
	{
		$data['title'] = 'Data Jurusan';
		$data['css'] = '
		<link href="'. site_url('assets/css/plugins/chosen/bootstrap-chosen.css') .'" rel="stylesheet">
		<link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
		<link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet"/>
		<link href="'. site_url('assets/css/plugins/dataTables/datatables.min.css') .'" rel="stylesheet">
		<link href="'. site_url('assets/css/plugins/jasny/jasny-bootstrap.min.css') .'" rel="stylesheet">
		';
		$data['js'] = 'data-jurusan';
		$data['pages'] = 'data-jurusan';

		$menu = $this->RolesMenusModel->get_menu();
		$data['menu'] = fetch_menu($menu);

		$this->load->view('layouts/backend/app', $data);
	}

	public function store()
	{
		$list = $this->JurusanModel->get_datatables();
		$data = array();
		$no = $_POST['start'];

		foreach ($list as $ls) {

			// if ($ls->status == 0) {
			// 	$status = '<span class="badge rounded-pill badge-danger">Tidak Aktif</span>';
			// }else if ($ls->status == 1) {
			// 	$status = '<span class="badge rounded-pill badge-success">Aktif</span>';
			// }else{
			// 	$status = '';
			// }

			$no++;
			$row = array();
			$row[] = '

			<a class="btn btn-sm btn-warning btn-bitbucket btn-update" 
				data-id="'.$ls->id.'"  
				data-logo="'.$ls->logo.'"  
				data-slug="'.$ls->slug_jurusan.'"
				data-nama="'.$ls->nama_jurusan.'"
			>
			<i class="fa fa-edit text-white"></i>
			</a>

			<a class="btn btn-sm btn-danger btn-bitbucket btn-delete"
				data-id="'.$ls->id.'"  
				data-logo="'.$ls->logo.'"  
				data-slug="'.$ls->slug_jurusan.'"
				data-nama="'.$ls->nama_jurusan.'"
			>
			<i class="fa fa-trash text-white"></i>
			</a>

			';

			$row[] = $ls->logo;
			$row[] = $ls->nama_jurusan;
			$row[] = $ls->slug_jurusan;

			$data[] = $row;
		}

		$output = array(
			"draw"				=> $_POST['draw'],
			"recordsTotal" 		=> $this->JurusanModel->count_all(),
			"recordsFiltered" 	=> $this->JurusanModel->count_filtered(),
			"data" 				=> $data
		);

		echo json_encode($output);
	}

	public function create()
	{
		$config = array(

			array(

				'field' => 'nama_jurusan',
				'label' => 'Nama Jurusan',
				'rules' => 'required|xss_clean',
				'errors' => array(
					'required' => 'Nama Jurusan Wajib diisi',
				),

			),

			array(

				'field' => 'slug_jurusan',
				'label' => 'Slug Jurusan',
				'rules' => 'required|trim|xss_clean',
				'errors' => array(
					'required' => 'Slug Jurusan Wajib diisi',
				),

			),

		);

		$this->form_validation->set_rules($config);
		if ($this->form_validation->run() == FALSE) {

			$data = [
				'type'              => 'val_error',
				'nama_jurusan'      => form_error('nama_jurusan', '<h4>', '</h4>'),
				'slug_jurusan'      => form_error('slug_jurusan', '<h4>', '</h4>'),
			];

			echo json_encode($data);
		} else {
			$data['nama_jurusan'] 			= str_replace("'", "", htmlspecialchars($this->input->post('nama_jurusan'), ENT_QUOTES));
			$data['slug_jurusan']			= str_replace("'", "", htmlspecialchars($this->input->post('slug_jurusan'), ENT_QUOTES));
			
			$act = $this->JurusanModel->create($data);
			// echo $this->db->last_query($act);
			if ($act) {
				// $this->verified_code($data['email']);
				$response = array(
					'type' => 'success',
					'title' => 'Berhasil !',
					'message' => 'Data jurusan berhasil ditambahkan !'
				);
			} else {
				$response = array(
					'type' => 'error',
					'title' => 'Gagal !',
					'message' => 'Data jurusan gagal ditambahkan, silahkan coba kembali dalam beberapa menit !'
				);
			}

			echo json_encode($response);
		}
	}
	
	// public function show($id)
	// {
	// 	$get = $this->JurusanModel->get($id);
	// 	// echo $this->db->last_query($get);
	// 	if ($get->num_rows() > 0) {
	// 		$response = $get->row();
	// 	}else{
	// 		$response = array(
	// 			'type' => 'error',
	// 			'title' => 'Gagal !!!',
	// 			'message' => 'Data yang anda inginkan tidak ada di dalam database kami !',
	// 		);
	// 	}

	// 	echo json_encode($response);
	// }

	public function update()
	{
		$config = array(

			array(

				'field' => 'nama_jurusan_update',
				'label' => 'Nama Jurusan',
				'rules' => 'required|xss_clean',
				'errors' => array(
					'required' => 'Nama Jurusan Wajib diisi',
				),

			),

			array(

				'field' => 'slug_jurusan_update',
				'label' => 'Slug Jurusan',
				'rules' => 'required|trim|xss_clean',
				'errors' => array(
					'required' => 'Slug Jurusan Wajib diisi',
				),

			),
		);

		$this->form_validation->set_rules($config);
		if ($this->form_validation->run() == FALSE) {

			$data = [
				'type'              => 'val_error',
				'nama_jurusan'      => form_error('nama_jurusan_update', '<h4>', '</h4>'),
				'slug_jurusan'      => form_error('slug_jurusan_update', '<h4>', '</h4>'),
			];

			echo json_encode($data);
		} else {
			$id 			= str_replace("'", "", htmlspecialchars($this->input->post('id_update'), ENT_QUOTES));
			$data['nama_jurusan'] 			= str_replace("'", "", htmlspecialchars($this->input->post('nama_jurusan_update'), ENT_QUOTES));
			$data['slug_jurusan']			= str_replace("'", "", htmlspecialchars($this->input->post('slug_jurusan_update'), ENT_QUOTES));
			
			$act = $this->JurusanModel->update($data, $id);
			// echo $this->db->last_query($act);
			if ($act) {
				// $this->verified_code($data['email']);
				$response = array(
					'type' => 'success',
					'title' => 'Berhasil !',
					'message' => 'Data jurusan berhasil diubah !'
				);
			} else {
				$response = array(
					'type' => 'error',
					'title' => 'Gagal !',
					'message' => 'Data jurusan gagal diubah, silahkan coba kembali dalam beberapa menit !'
				);
			}

			echo json_encode($response);
		}
	}

	public function delete()
	{
		$id 	= str_replace("'", "", htmlspecialchars($this->input->post('id_delete'), ENT_QUOTES));
		$act 	= $this->JurusanModel->delete($id);
		if ($act) {
			// $this->verified_code($data['email']);
			$response = array(
				'type' => 'success',
				'title' => 'Berhasil !',
				'message' => 'Data jurusan berhasil dihapus !'
			);
		} else {
			$response = array(
				'type' => 'error',
				'title' => 'Gagal !',
				'message' => 'Data jurusan gagal dihapus, silahkan coba kembali dalam beberapa menit !'
			);
		}

		echo json_encode($response);
	}

	public function show()
	{
		$get = $this->JurusanModel->show()->result();
		echo json_encode($get);
	}
	
}

/* End of file DataPenduduk.php */
/* Location: ./application/controllers/DataPenduduk.php */
?>
