<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataPemuda extends MY_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('PemudaModel');
		$this->load->model('PendudukModel');
		$this->load->helper('tanggal');
		$this->load->helper('usia');
	}
	
	public function index()
	{
		$data['title'] = 'Data Pemuda';
		$data['css'] = '
		<link href="'. site_url('assets/css/plugins/dualListbox/bootstrap-duallistbox.min.css') .'" rel="stylesheet">
		<link href="'. site_url('assets/css/plugins/dataTables/datatables.min.css') .'" rel="stylesheet">
		';
		$data['js'] = 'data-pemuda';
		$data['pages'] = 'data-pemuda';

		$menu = $this->RolesMenusModel->get_menu();
		$data['menu'] = fetch_menu($menu);

		$this->load->view('layouts/backend/app', $data);
	}

	public function store()
	{
		$list = $this->PemudaModel->get_datatables();
		$data = array();
		$no = $_POST['start'];

		foreach ($list as $ls) {

			$no++;
			$row = array();
			$row[] = '

			<a class="btn btn-sm btn-warning btn-bitbucket btn-update" data-id="'.$ls->id.'">
			<i class="fa fa-edit text-white"></i>
			</a>

			<a class="btn btn-sm btn-danger btn-bitbucket btn-delete" data-id="'.$ls->user_id.'">
			<i class="fa fa-trash text-white"></i>
			</a>

			';

			$row[] = $ls->nama_lengkap;
			$row[] = hitung_umur($ls->tanggal_lahir);
			$row[] = $ls->jabatan;

			$data[] = $row;
		}

		$output = array(
			"draw"				=> $_POST['draw'],
			"recordsTotal" 		=> $this->PemudaModel->count_all(),
			"recordsFiltered" 	=> $this->PemudaModel->count_filtered(),
			"data" 				=> $data
		);

		echo json_encode($output);
	}

	public function showPenduduk()
	{
		$get = $this->PendudukModel->show()->result();
		echo json_encode($get);
	}
	
}

/* End of file DataPemuda.php */
/* Location: ./application/controllers/DataPemuda.php */
?>