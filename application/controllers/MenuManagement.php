<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class MenuManagement extends MY_Controller {
	
	public function index()
	{
		$data['title'] = 'Menu Management';
		$data['css'] = '';
		$data['js'] = 'menu-management';
		$data['pages'] = 'menu-management';

		$menu = $this->RolesMenusModel->get_menu();
		$data['menu'] = fetch_menu($menu);

		$this->load->view('layouts/backend/app', $data);
	}
	
}

/* End of file MenuManagement.php */
/* Location: ./application/controllers/MenuManagement.php */
?>