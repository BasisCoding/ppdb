<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Persyaratan extends MY_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('PersyaratanModel');
		$this->load->helper('tanggal');
		$this->load->helper('upload');
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->helper('security');
	}
	
	public function index()
	{
		$data['title'] = 'Persyaratan';
		$data['css'] = '
		<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
		<link href="'. site_url('assets/css/plugins/dataTables/datatables.min.css') .'" rel="stylesheet">
		';
		$data['js'] = 'persyaratan';
		$data['pages'] = 'ppdb/persyaratan';

		$menu = $this->RolesMenusModel->get_menu();
		$data['menu'] = fetch_menu($menu);

		$this->load->view('layouts/backend/app', $data);
	}

	public function get()
	{
		$data = $this->PersyaratanModel->get()->row();
		// echo $this->db->last_query($data);
		echo json_encode($data);
	}

	public function update()
	{
		$config = array(

			array(

				'field' => 'deskripsi',
				'label' => 'Deskripsi',
				'rules' => 'required|xss_clean',
				'errors' => array(
					'required' => 'Deskripsi Wajib diisi',
				),

			)
		);

		$this->form_validation->set_rules($config);
		if ($this->form_validation->run() == FALSE) {

			$data = [
				'type'              => 'val_error',
				'deskripsi'         => form_error('deskripsi', '<h4>', '</h4>')
			];

			echo json_encode($data);
		} else {
			$id       				= str_replace("'", "", htmlspecialchars($this->input->post('id'), ENT_QUOTES));
			$data['deskripsi']		= str_replace("'", "", htmlspecialchars($this->input->post('deskripsi'), ENT_QUOTES));
			
			$act = $this->PersyaratanModel->update($data, $id);
			// echo $this->db->last_query($act);
			if ($act) {
				// $this->verified_code($data['email']);
				$response = array(
					'type' => 'success',
					'title' => 'Berhasil !',
					'message' => 'Data Persyaratan berhasil diubah !'
				);
			} else {
				$response = array(
					'type' => 'error',
					'title' => 'Gagal !',
					'message' => 'Data Persyaratan gagal diubah, silahkan coba kembali dalam beberapa menit !'
				);
			}

			echo json_encode($response);
		}
	}
	
}

/* End of file Persyaratan.php */
/* Location: ./application/controllers/Persyaratan.php */
?>
