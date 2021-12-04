<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class DataPenduduk extends MY_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('PendudukModel');
		$this->load->helper('upload');
	}
	
	public function index()
	{
		$data['title'] = 'Data Penduduk';
		$data['css'] = '
		<link href="'. site_url('assets/css/plugins/chosen/bootstrap-chosen.css') .'" rel="stylesheet">
		<link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
		<link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet"/>
		<link href="'. site_url('assets/css/plugins/dataTables/datatables.min.css" rel="stylesheet') .'">
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

			if ($ls->status == 0) {
				$status = '<span class="badge rounded-pill badge-danger">Not Active</span>';
			}if ($ls->status == 1) {
				$status = '<span class="badge rounded-pill badge-success">Active</span>';
			}

			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $ls->nik;
			$row[] = $ls->nama_lengkap;
			$row[] = $ls->jenis_kelamin;
			$row[] = $status;

			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->PendudukModel->count_all(),
			"recordsFiltered" => $this->PendudukModel->count_filtered(),
			"data" => $data
		);

		echo json_encode($output);
	}
	
}

/* End of file DataPenduduk.php */
/* Location: ./application/controllers/DataPenduduk.php */
?>