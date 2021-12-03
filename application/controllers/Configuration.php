<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Configuration extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('ConfigModel');
	}
	
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

	public function store()
	{
		$get = $this->ConfigModel->store();
		foreach ($get as $cfg => $cf) {
			// define("_{$cf['attr']}", $cf['value']);
			$data[strtolower($cf['attr'])] = $cf['value'];

		}
		echo json_encode($data);
	}

	public function update()
	{
		$data['app_name'] = $this->input->post('app_name');
		$data['app_name_slug'] = $this->input->post('app_name_slug');
		$data['rt'] = $this->input->post('rt');
		$data['rw'] = $this->input->post('rw');
		$data['kode_pos'] = $this->input->post('kode_pos');
		$data['kelurahan'] = $this->input->post('kelurahan');
		$data['kecamatan'] = $this->input->post('kecamatan');
		$data['kota'] = $this->input->post('kota');
		$data['provinsi'] = $this->input->post('provinsi');
		$data['lattitude'] = $this->input->post('lattitude');
		$data['longitude'] = $this->input->post('longitude');
		$data['email'] = $this->input->post('email');
		$data['website'] = $this->input->post('website');

		$act = $this->ConfigModel->update($data);

		// echo $this->db->last_query($act);
		if ($act) {
			$response = array(
				'type' => 'success',
				'title' => 'Berhasil !!!',
				'message' => 'Konfigurasi berhasil diubah, silahkan refresh page untuk melihat perubahan',
			);
		}else{
			$response = array(
				'type' => 'error',
				'title' => 'Gagal !!!',
				'message' => 'Konfigurasi gagal diubah, silahkan coba beberapa saat lagi !',
			);
		}

		echo json_encode($response);
	}
	
}

/* End of file Configuration.php */
/* Location: ./application/controllers/Configuration.php */
?>