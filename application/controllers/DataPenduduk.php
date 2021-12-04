<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class DataPenduduk extends MY_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('PendudukModel');
		$this->load->helper('tanggal');
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
			$row[] = $ls->nik;
			$row[] = $ls->nama_lengkap;
			$row[] = $ls->tempat_lahir.', '.date_indo($ls->tanggal_lahir);
			$row[] = $ls->agama;
			$row[] = $ls->jenis_kelamin;
			$row[] = $status_pernikahan;
			$row[] = $status_hidup;
			$row[] = '<div class="btn-group">
                        <button data-toggle="dropdown" class="btn btn-primary btn-xs dropdown-toggle" aria-expanded="true">Action </button>
                        <ul class="dropdown-menu" x-placement="bottom-start" style="position: absolute; top: 25px; left: 0px; will-change: top, left;">
                            <li><a class="dropdown-item update-data" href="#">Update</a></li>
                            <li><a class="dropdown-item" href="#">Detail</a></li>
                            <li><a class="dropdown-item" href="#">Keluarga</a></li>
                        </ul>
                    </div>
                     ';

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