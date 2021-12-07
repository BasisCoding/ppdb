<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataPemuda extends MY_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('PemudaModel');
		$this->load->helper('tanggal');
	}
	
	public function index()
	{
		$data['title'] = 'Data Pemuda';
		$data['css'] = '
		<link href="'. site_url('assets/css/plugins/chosen/bootstrap-chosen.css') .'" rel="stylesheet">
		<link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
		<link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet"/>
		<link href="'. site_url('assets/css/plugins/dataTables/datatables.min.css') .'" rel="stylesheet">
		<link href="'. site_url('assets/css/plugins/jasny/jasny-bootstrap.min.css') .'" rel="stylesheet">
		';
		$data['js'] = 'data-pemuda';
		$data['pages'] = 'data-pemuda';

		$menu = $this->RolesMenusModel->get_menu();
		$data['menu'] = fetch_menu($menu);

		$this->load->view('layouts/backend/app', $data);
	}
	
}

/* End of file DataPemuda.php */
/* Location: ./application/controllers/DataPemuda.php */
?>