<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class PersyaratanModel extends CI_Model {

	private $table = 'persyaratan';

	function get()
	{
		return $this->db->get_where($this->table, array('id' => 0));
	}

    function update($data, $id)
    {
        return $this->db->update($this->table, $data, array('id' => $id));
    }
}

/* End of file PersyaratanModel.php */
/* Location: ./application/models/PersyaratanModel.php */
?>
