<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Wilayah extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('WilayahModel');
	}
	
	public function index($d=0)
	{
		$kota = $this->db->get_where('regencies',array('province_id'=>$d))->result();
		$kec = $this->db->get_where('districts',array('regency_id'=>$d))->result();
		$kel = $this->db->get_where('villages',array('district_id'=>$d))->result();

		if($kota)
		{
			echo json_encode($kota);
		}
		else if($kec)
		{
			echo json_encode($kec);
		}
		else if($kel)
		{
			echo json_encode($kel);
		}
		else if($d==0)
		{
			$data = $this->WilayahModel->store();
			echo json_encode($data);
		}
		else
		{
			show_404();
		}
	}
	
}

/* End of file Wilayah.php */
/* Location: ./application/controllers/Wilayah.php */
?>