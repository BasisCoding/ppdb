<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class TahapanModel extends CI_Model {
	private $table = 'tahapan';

	function get()
    {
        return $this->db->get($this->table);
    }

    function show($where = null)
    {
        $this->db->from($this->table.'as t');
        if ($where != null) {
            $this->db->where($where);
        }
        return $this->db->get();
    }

    function create($data)
    {
        return $this->db->insert($this->table, $data);
    }

    function update($data, $id)
    {
        return $this->db->update($this->table, $data, array('id' => $id));
    }

    function delete($id)
    {
        return $this->db->delete($this->table, array('id' => $id));
    }

}

/* End of file TahapanModel.php */
/* Location: ./application/models/TahapanModel.php */
?>
