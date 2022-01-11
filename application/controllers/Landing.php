<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Landing extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('AuthModel');
		$this->load->helper('String');
		$config = $this->db->get('config')->result_array();
		foreach ($config as $cf) {
			define("_{$cf['attr']}", $cf['value']);
		}
	}
	
	public function index()
	{
		$data['title'] = 'Landing Page';
		$data['css'] = '';
		$data['js'] = 'landing';
		$data['pages'] = 'landing';
		
		$this->load->view('layouts/frontend/app', $data);
	}
	
}

/* End of file Landing.php */
/* Location: ./application/controllers/Landing.php */
?>