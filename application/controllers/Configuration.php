<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Configuration extends MY_Controller {
	
	public function index()
	{
		$data['title'] = 'Konfigurasi';
		$data['css'] = '
		<link href="'. site_url('assets/css/plugins/chosen/bootstrap-chosen.css') .'" rel="stylesheet">
		<link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
  		<link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet"/>	
  			';
		$data['js'] = 'config';
		$data['pages'] = 'config';

		$menu = $this->RolesMenusModel->get_menu();
		$data['menu'] = fetch_menu($menu);

		$this->load->view('layouts/backend/app', $data);
	}
	
}

/* End of file Configuration.php */
/* Location: ./application/controllers/Configuration.php */
?>