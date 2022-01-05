<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class TahunAjaran extends MY_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('TahunAjaranModel');
		$this->load->helper('tanggal');
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->helper('security');
	}
	
	public function index()
	{
		$data['title'] = 'Tahun Ajaran';
		$data['css'] = '
		<link href="'. site_url('assets/css/plugins/chosen/bootstrap-chosen.css') .'" rel="stylesheet">
		<link href="'. site_url('assets/css/plugins/dataTables/datatables.min.css') .'" rel="stylesheet">
		<link href="'. site_url('assets/css/plugins/jasny/jasny-bootstrap.min.css') .'" rel="stylesheet">
		';
		$data['js'] = 'tahun-ajaran';
		$data['pages'] = 'ppdb/tahun-ajaran';

		$menu = $this->RolesMenusModel->get_menu();
		$data['menu'] = fetch_menu($menu);

		$this->load->view('layouts/backend/app', $data);
	}

	public function store()
	{
		$list = $this->TahunAjaranModel->get_datatables();
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

				<a class="btn btn-sm btn-warning btn-bitbucket btn-update" data-id="'.$ls->id.'" data-tahun="'.$ls->tahun.'" data-status="'.$ls->status.'">
				<i class="fa fa-edit text-white"></i>
				</a>

				<a class="btn btn-sm btn-danger btn-bitbucket btn-delete" data-id="'.$ls->id.'" data-tahun="'.$ls->tahun.'" data-status="'.$ls->status.'">
				<i class="fa fa-trash text-white"></i>
				</a>

			';

			$row[] = $ls->tahun;
			$row[] = $status;

			$data[] = $row;
		}

		$output = array(
			"draw"				=> $_POST['draw'],
			"recordsTotal" 		=> $this->TahunAjaranModel->count_all(),
			"recordsFiltered" 	=> $this->TahunAjaranModel->count_filtered(),
			"data" 				=> $data
		);

		echo json_encode($output);
	}

	public function create()
	{
		$config = array(

			array(

				'field' => 'tahun',
				'label' => 'Tahun Ajaran',
				'rules' => 'required|xss_clean',
				'errors' => array(
					'required' => 'Tahun Ajaran Wajib diisi',
				),

			),

		);

		$this->form_validation->set_rules($config);
		if ($this->form_validation->run() == FALSE) {

			$data = [
				'type'              => 'val_error',
				'tahun'      	=> form_error('tahun', '<h4>', '</h4>'),
			];

			echo json_encode($data);
		} else {
			$data['tahun']     = str_replace("'", "", htmlspecialchars($this->input->post('tahun'), ENT_QUOTES));
				
			$act = $this->TahunAjaranModel->create($data);
			// echo $this->db->last_query($act);
			if ($act) {
				// $this->verified_code($data['email']);
				$response = array(
					'type' => 'success',
					'title' => 'Berhasil !',
					'message' => 'Data tahun ajaran berhasil ditambahkan !'
				);
			} else {
				$response = array(
					'type' => 'error',
					'title' => 'Gagal !',
					'message' => 'Data tahun ajaran gagal ditambahkan, silahkan coba kembali dalam beberapa menit !'
				);
			}

			echo json_encode($response);
		}
	}
	
	public function show($id)
	{
		$get = $this->TahunAjaranModel->get(str_replace("'", "", htmlspecialchars($id, ENT_QUOTES)));
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

				'field' => 'tahun_update',
				'label' => 'Tahun Update',
				'rules' => 'required|xss_clean',
				'errors' => array(
					'required' => 'Tahun Ajaran Wajib diisi',
				),

			),

		);

		$this->form_validation->set_rules($config);
		if ($this->form_validation->run() == FALSE) {

			$data = [
				'type'              => 'val_error',
				'tahun'      	=> form_error('tahun_update', '<h4>', '</h4>'),
			];

			echo json_encode($data);
		} else {
			$id       					= str_replace("'", "", htmlspecialchars($this->input->post('id_update'), ENT_QUOTES));

			$data['tahun']     = str_replace("'", "", htmlspecialchars($this->input->post('tahun_update'), ENT_QUOTES));
			$data['status']     = str_replace("'", "", htmlspecialchars($this->input->post('status_update'), ENT_QUOTES));
			
			$act = $this->TahunAjaranModel->update($data, $id);
			// echo $this->db->last_query($act);
			if ($act) {
				// $this->verified_code($data['email']);
				$response = array(
					'type' => 'success',
					'title' => 'Berhasil !',
					'message' => 'Data tahun ajaran berhasil diubah !'
				);
			} else {
				$response = array(
					'type' => 'error',
					'title' => 'Gagal !',
					'message' => 'Data tahun ajaran gagal diubah, silahkan coba kembali dalam beberapa menit !'
				);
			}

			echo json_encode($response);
		}
	}

	public function delete()
	{
		$id = str_replace("'", "", htmlspecialchars($this->input->post('id_delete'), ENT_QUOTES));
		$act = $this->TahunAjaranModel->delete($id);
		if ($act) {
			// $this->verified_code($data['email']);
			$response = array(
				'type' => 'success',
				'title' => 'Berhasil !',
				'message' => 'Data tahun ajaran berhasil dihapus !'
			);
		} else {
			$response = array(
				'type' => 'error',
				'title' => 'Gagal !',
				'message' => 'Data tahun ajaran gagal dihapus, silahkan coba kembali dalam beberapa menit !'
			);
		}

		echo json_encode($response);
	}
	
}

/* End of file TahunAjaran.php */
/* Location: ./application/controllers/TahunAjaran.php */
?>
