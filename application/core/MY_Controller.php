<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$config = $this->db->get('config')->result_array();
		foreach ($config as $cf) {
			define("_{$cf['attr']}", $cf['value']);
		}

		if ($this->session->userdata('logged') != true) {
			redirect('login','refresh');
		}else{
			$this->load->model('RolesMenusModel');
			$this->load->helper('menu');
		}


		// $uri = $this->uri->segment(1);
		// $permission = $this->RolesMenusModel->check_access_group($uri);

		// // echo $this->db->last_query($permission);
		// if ($permission->num_rows() > 0) {
		// 	return true;
		// }else{
		// 	redirect('404_override','refresh');
		// }
	}
	
}

/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */

?>