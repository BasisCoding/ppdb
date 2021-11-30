<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {
	
	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['css'] = '';
		$data['js'] = '';
		$data['pages'] = 'dashboard';

		$menu = $this->RolesMenusModel->get_menu();
		$data['menu'] = fetch_menu($menu);

		$this->load->view('layouts/backend/app', $data);
	}
	
}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */
?>