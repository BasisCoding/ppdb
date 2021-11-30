<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class RolesMenusModel extends CI_Model {
	
		function get_menu()
		{
			$this->db->select('m.menu_name, m.menu_icon, m.menu_link, m.parrent_id, m.id, g.id as group_id, g.name as group_name, g.description as group_desc');
			$this->db->from('group_menus as gm');
			$this->db->join('groups as g', 'g.id = gm.group_id', 'left');
			$this->db->join('menus as m', 'm.id = gm.menu_id', 'left');
			$this->db->where('m.parrent_id', 0);
			$this->db->where('gm.group_id', $this->session->userdata('group_id'));
			$this->db->order_by('m.sequence', 'asc');
			
			$menus = $this->db->get()->result();
			$i = 0;

			foreach ($menus as $mn) {
				$menus[$i]->sub = $this->get_sub_menu($mn->id);
				$i++;
			}

			// echo $this->db->last_query($menus);
			return $menus;
		}

		function get_sub_menu($id)
		{
			$this->db->select('m.menu_name, m.menu_icon, m.menu_link, m.parrent_id, m.id, g.id as group_id, g.name as group_name, g.description as group_desc');
			$this->db->from('group_menus as gm');
			$this->db->join('groups as g', 'g.id = gm.group_id', 'left');
			$this->db->join('menus as m', 'm.id = gm.menu_id', 'left');
			$this->db->where('m.parrent_id', $id);
			$this->db->where('gm.group_id', $this->session->userdata('group_id'));
			$this->db->order_by('m.sequence', 'asc');

			$menus = $this->db->get()->result();
			$i = 0;

			foreach ($menus as $mn) {
				$menus[$i]->sub = $this->get_sub_menu($mn->id);
				$i++;
			}

			return $menus;
		}

		function check_access_group($link)
		{
			$this->db->select('m.menu_link');
			$this->db->from('group_menus as gm');
			$this->db->join('menus as m', 'm.id = gm.menu_id', 'left');
			$this->db->where('m.menu_link', $link);
			$this->db->where('gm.group_id', $this->session->userdata('group_id'));

			return $this->db->get();
		}

	}
	
	/* End of file RoleMenusModel.php */
	/* Location: ./application/models/RoleMenusModel.php */
?>