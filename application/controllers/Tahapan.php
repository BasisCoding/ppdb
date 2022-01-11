<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Tahapan extends MY_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('TahapanModel');
		$this->load->model('TahunAjaranModel');
		$this->load->helper('tanggal');
		$this->load->helper('upload');
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->helper('security');
	}
	
	public function index()
	{
		$tahun = $this->TahunAjaranModel->show(array('t.status' => 1))->row();
		// echo $this->db->last_query($tahun);
		$data['title'] = 'Tahapan PPDB | Tahun Ajaran '. $tahun->tahun .'<span hidden id="_tahun" data-tahun="'.$tahun->id.'"></span>';
		$data['css'] = '
		<link href="'. site_url('assets/css/plugins/chosen/bootstrap-chosen.css') .'" rel="stylesheet">
		<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
		';
		$data['js'] = 'tahapan';
		$data['pages'] = 'ppdb/tahapan';

		$menu = $this->RolesMenusModel->get_menu();
		$data['menu'] = fetch_menu($menu);

		$this->load->view('layouts/backend/app', $data);
	}

	public function store()
	{
		$tahun = $this->TahunAjaranModel->show(array('t.status' => 1))->row();

		$list = $this->TahapanModel->get($tahun->id);
		$data = '';

		if ($list->num_rows() > 0) {
		
			foreach ($list->result() as $ls) {

				$data .= '
					<li class="info-element" id="'.$ls->id.'">
						<h3>'.$ls->judul.'</h3><br>
						<p>'.html_entity_decode($ls->deskripsi).'</p>
						<div class="agile-detail">
							<a href="#" data-id="'.$ls->id.'" class="float-right btn btn-xs btn-delete btn-danger"><span class="fa fa-trash"></span></a>
							<a href="#" data-id="'.$ls->id.'" class="float-right btn btn-xs btn-update btn-warning mr-2"><span class="fa fa-pencil"></span></a>
							<i class="fa fa-clock-o"></i> '.$ls->created_at.'
						</div>
					</li>
				';
			}
		}else{
			$data .= '
				<li class="info-element">
					<h3>Tidak Ada Data !!</h3>
				</li>
			';
		}

		echo $data;
	}

	public function create()
	{
		$config = array(

			array(

				'field' => 'judul',
				'label' => 'Judul Tahapan',
				'rules' => 'required|xss_clean',
				'errors' => array(
					'required' => 'Judul Tahapan Wajib diisi',
				),

			),
	
			array(

				'field' => 'deskripsi',
				'label' => 'Deskripsi',
				'rules' => 'required|xss_clean',
				'errors' => array(
					'required' => 'Deskripsi Wajib diisi',
					'is_unique' => 'Deskripsi Sudah Tersedia',
				),

			),

		);

		$this->form_validation->set_rules($config);
		if ($this->form_validation->run() == FALSE) {

			$data = [
				'type'              => 'val_error',
				'judul'      		=> form_error('judul', '<h4>', '</h4>'),
				'deskripsi'         => form_error('deskripsi', '<h4>', '</h4>'),
			];

			echo json_encode($data);
		} else {
			$data['judul']     		= str_replace("'", "", htmlspecialchars($this->input->post('judul'), ENT_QUOTES));
			$data['deskripsi']		= str_replace("'", "", htmlspecialchars($this->input->post('deskripsi'), ENT_QUOTES));
			$data['tahun_ajaran_id']= str_replace("'", "", htmlspecialchars($this->input->post('tahun_ajaran_id'), ENT_QUOTES));
			
			$act = $this->TahapanModel->create($data);
			// echo $this->db->last_query($act);
			if ($act) {
				// $this->verified_code($data['email']);
				$response = array(
					'type' => 'success',
					'title' => 'Berhasil !',
					'message' => 'Data tahapan berhasil ditambahkan !'
				);
			} else {
				$response = array(
					'type' => 'error',
					'title' => 'Gagal !',
					'message' => 'Data tahapan gagal ditambahkan, silahkan coba kembali dalam beberapa menit !'
				);
			}

			echo json_encode($response);
		}
	}
	
	public function show($id)
	{
		$where['id'] = str_replace("'", "", htmlspecialchars($id, ENT_QUOTES));
		$get = $this->TahapanModel->show($where);
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

				'field' => 'judul_update',
				'label' => 'Nama tahapan',
				'rules' => 'required|xss_clean',
				'errors' => array(
					'required' => 'Judul Wajib diisi',
				),

			),

			array(

				'field' => 'deskripsi_update',
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
				'judul'      		=> form_error('judul_update', '<h4>', '</h4>'),
				'deskripsi'         => form_error('deskripsi_update', '<h4>', '</h4>'),
			];

			echo json_encode($data);
		} else {
			$id       					= str_replace("'", "", htmlspecialchars($this->input->post('id_update'), ENT_QUOTES));

			$data['judul']     		= str_replace("'", "", htmlspecialchars($this->input->post('judul_update'), ENT_QUOTES));
			$data['deskripsi']		= str_replace("'", "", htmlspecialchars($this->input->post('deskripsi_update'), ENT_QUOTES));
			
			$act = $this->TahapanModel->update($data, $id);
			// echo $this->db->last_query($act);
			if ($act) {
				// $this->verified_code($data['email']);
				$response = array(
					'type' => 'success',
					'title' => 'Berhasil !',
					'message' => 'Data tahapan berhasil diubah !'
				);
			} else {
				$response = array(
					'type' => 'error',
					'title' => 'Gagal !',
					'message' => 'Data tahapan gagal diubah, silahkan coba kembali dalam beberapa menit !'
				);
			}

			echo json_encode($response);
		}
	}

	public function delete()
	{
		$id = str_replace("'", "", htmlspecialchars($this->input->post('id_delete'), ENT_QUOTES));
		$act = $this->TahapanModel->delete($id);
		if ($act) {
			// $this->verified_code($data['email']);
			$response = array(
				'type' => 'success',
				'title' => 'Berhasil !',
				'message' => 'Data tahapan berhasil dihapus !'
			);
		} else {
			$response = array(
				'type' => 'error',
				'title' => 'Gagal !',
				'message' => 'Data tahapan gagal dihapus, silahkan coba kembali dalam beberapa menit !'
			);
		}

		echo json_encode($response);
	}
	
}

/* End of file tahapan.php */
/* Location: ./application/controllers/tahapan.php */
?>
