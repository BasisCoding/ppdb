<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Gelombang extends MY_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('GelombangModel');
		$this->load->model('TahunAjaranModel');
		$this->load->helper('tanggal');
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->helper('security');
	}
	
	public function index()
	{
		$where = "start_date > '".date('Y-m-d')."' OR end_date < '".date('Y-m-d')."'";
		$gel = $this->GelombangModel->show($where);
		$gel1 = 'Tidak Ada Gelombang';
		
		if ($gel->num_rows() > 0) {
			$gel1 = $gel->row()->nama_gelombang;
		}
		$tahun = $this->TahunAjaranModel->show(array('t.status' => 1))->row();
		// echo $this->db->last_query($tahun);
		$data['title'] = $gel1.' | Tahun Ajaran '. $tahun->tahun .'<span hidden id="_tahun" data-tahun="'.$tahun->id.'"></span>';
		$data['css'] = '
		<link href="'. site_url('assets/css/plugins/chosen/bootstrap-chosen.css') .'" rel="stylesheet">
		<link href="'. site_url('assets/css/plugins/dataTables/datatables.min.css') .'" rel="stylesheet">
		<link href="'. site_url('assets/css/plugins/jasny/jasny-bootstrap.min.css') .'" rel="stylesheet">
		';
		$data['js'] = 'gelombang';
		$data['pages'] = 'ppdb/gelombang';

		$menu = $this->RolesMenusModel->get_menu();
		$data['menu'] = fetch_menu($menu);

		$this->load->view('layouts/backend/app', $data);
	}

	public function store()
	{
		$list = $this->GelombangModel->get_datatables();
		$data = array();
		$no = $_POST['start'];

		foreach ($list as $ls) {

			$no++;
			$row = array();
			$row[] = '

				<a class="btn btn-sm btn-warning btn-bitbucket btn-update" data-id="'.$ls->id.'" data-nama="'.$ls->nama_gelombang.'" data-start="'.$ls->start_date.'" data-end="'.$ls->end_date.'">
				<i class="fa fa-edit text-white"></i>
				</a>

				<a class="btn btn-sm btn-danger btn-bitbucket btn-delete" data-id="'.$ls->id.'" data-nama="'.$ls->nama_gelombang.'" data-start="'.$ls->start_date.'" data-end="'.$ls->end_date.'">
				<i class="fa fa-trash text-white"></i>
				</a>

			';

			$row[] = $ls->nama_gelombang;
			$row[] = $ls->start_date;
			$row[] = $ls->end_date;

			$data[] = $row;
		}

		$output = array(
			"draw"				=> $_POST['draw'],
			"recordsTotal" 		=> $this->GelombangModel->count_all(),
			"recordsFiltered" 	=> $this->GelombangModel->count_filtered(),
			"data" 				=> $data
		);

		echo json_encode($output);
	}

	public function create()
	{
		$config = array(

			array(

				'field' => 'nama_gelombang',
				'label' => 'Nama Gelombang',
				'rules' => 'required|xss_clean',
				'errors' => array(
					'required' => 'Nama Gelombang Wajib diisi',
				),

			),

			array(

				'field' => 'start_date',
				'label' => 'Tanggal Mulai',
				'rules' => 'required|xss_clean',
				'errors' => array(
					'required' => 'Tanggal Mulai Wajib diisi',
				),

			),

			array(

				'field' => 'end_date',
				'label' => 'Tanggal Selesai',
				'rules' => 'required|xss_clean',
				'errors' => array(
					'required' => 'Tanggal Selesai Wajib diisi',
				),

			),

		);

		$this->form_validation->set_rules($config);
		if ($this->form_validation->run() == FALSE) {

			$data = [
				'type'              => 'val_error',
				'nama_gelombang'    => form_error('nama_gelombang', '<h4>', '</h4>'),
				'start_date'      	=> form_error('start_date', '<h4>', '</h4>'),
				'end_date'      	=> form_error('end_date', '<h4>', '</h4>'),
			];

			echo json_encode($data);
		} else {
			$data['nama_gelombang']     = str_replace("'", "", htmlspecialchars($this->input->post('nama_gelombang'), ENT_QUOTES));
			$data['start_date']     	= str_replace("'", "", htmlspecialchars($this->input->post('start_date'), ENT_QUOTES));
			$data['end_date']     		= str_replace("'", "", htmlspecialchars($this->input->post('end_date'), ENT_QUOTES));
			$data['tahun_ajaran_id']	= str_replace("'", "", htmlspecialchars($this->input->post('tahun_ajaran_id'), ENT_QUOTES));
			
			$date_valid = $this->GelombangModel->date_valid($data['start_date'], $data['end_date']);
			if ($date_valid->num_rows() > 0) {
				$response = array(
					'type' => 'error',
					'title' => 'Gagal !',
					'message' => 'Periode Gelombang sepertinya sudah tersedia !'
				);
			}else{
				$act = $this->GelombangModel->create($data);
				// echo $this->db->last_query($act);
				if ($act) {
					// $this->verified_code($data['email']);
					$response = array(
						'type' => 'success',
						'title' => 'Berhasil !',
						'message' => 'Gelombang berhasil ditambahkan !'
					);
				} else {
					$response = array(
						'type' => 'error',
						'title' => 'Gagal !',
						'message' => 'Gelombang gagal ditambahkan, silahkan coba kembali dalam beberapa menit !'
					);
				}
			}

			echo json_encode($response);
		}
	}
	
	public function show($id)
	{
		$get = $this->GelombangModel->get(str_replace("'", "", htmlspecialchars($id, ENT_QUOTES)));
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

				'field' => 'nama_gelombang_update',
				'label' => 'Nama Gelombang',
				'rules' => 'required|xss_clean',
				'errors' => array(
					'required' => 'Nama Gelombang Wajib diisi',
				),

			),

			array(

				'field' => 'start_date_update',
				'label' => 'Tanggal Mulai',
				'rules' => 'required|xss_clean',
				'errors' => array(
					'required' => 'Tanggal Mulai Wajib diisi',
				),

			),

			array(

				'field' => 'end_date_update',
				'label' => 'Tanggal Selesai',
				'rules' => 'required|xss_clean',
				'errors' => array(
					'required' => 'Tanggal Selesai Wajib diisi',
				),

			),

		);

		$this->form_validation->set_rules($config);
		if ($this->form_validation->run() == FALSE) {

			$data = [
				'type'              => 'val_error',
				'nama_gelombang'    => form_error('nama_gelombang_update', '<h4>', '</h4>'),
				'start_date'      	=> form_error('start_date_update', '<h4>', '</h4>'),
				'end_date'      	=> form_error('end_date_update', '<h4>', '</h4>'),
			];

			echo json_encode($data);
		} else {
			$id       					= str_replace("'", "", htmlspecialchars($this->input->post('id_update'), ENT_QUOTES));

			$data['nama_gelombang']     = str_replace("'", "", htmlspecialchars($this->input->post('nama_gelombang_update'), ENT_QUOTES));
			$data['start_date']     	= str_replace("'", "", htmlspecialchars($this->input->post('start_date_update'), ENT_QUOTES));
			$data['end_date']     		= str_replace("'", "", htmlspecialchars($this->input->post('end_date_update'), ENT_QUOTES));
			
			$date_valid = $this->GelombangModel->date_valid($data['start_date'], $data['end_date']);
			if ($date_valid->row()->id != $id) {
				if ($date_valid->num_rows() > 0) {
					$response = array(
						'type' => 'error',
						'title' => 'Gagal !',
						'message' => 'Periode Gelombang sepertinya sudah tersedia !'
					);
				}
			}else{
				$act = $this->GelombangModel->update($data, $id);
				// echo $this->db->last_query($act);
				if ($act) {
					$response = array(
						'type' => 'success',
						'title' => 'Berhasil !',
						'message' => 'Data gelombang berhasil diubah !'
					);
				} else {
					$response = array(
						'type' => 'error',
						'title' => 'Gagal !',
						'message' => 'Data gelombang gagal diubah, silahkan coba kembali dalam beberapa menit !'
					);
				}
			}

			echo json_encode($response);
		}
	}

	public function delete()
	{
		$id = str_replace("'", "", htmlspecialchars($this->input->post('id_delete'), ENT_QUOTES));
		$act = $this->GelombangModel->delete($id);
		if ($act) {
			// $this->verified_code($data['email']);
			$response = array(
				'type' => 'success',
				'title' => 'Berhasil !',
				'message' => 'Data gelombang berhasil dihapus !'
			);
		} else {
			$response = array(
				'type' => 'error',
				'title' => 'Gagal !',
				'message' => 'Data gelombang gagal dihapus, silahkan coba kembali dalam beberapa menit !'
			);
		}

		echo json_encode($response);
	}
	
}

/* End of file Gelombang.php */
/* Location: ./application/controllers/Gelombang.php */
?>
