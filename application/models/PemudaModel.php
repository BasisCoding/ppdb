<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class PemudaModel extends CI_Model {
	
	var $column_order = array(null, 'p.nama_lengkap', 'g.jabatan'); 
    var $column_search = array('p.nama_lengkap', 'g.jabatan'); //field yang diizin untuk pencarian 
    var $order = array('p.nama_lengkap' => 'asc'); // default order 
    var $table = 'penduduk';

// Datatable
    private function _get_datatables_query()
    {
    	$this->db->select('p.*, u.username, u.group_id, g.description as jabatan');
    	$this->db->from($this->table.' as p');
    	$this->db->join('users as u', 'u.id = p.user_id', 'left');
    	$this->db->join('groups as g', 'g.id = u.group_id', 'left');
    	$this->db->where('u.group_id', 5);
    	$this->db->where('u.group_id', 6);
    	$this->db->where('u.group_id', 7);
    	$i = 0;

        foreach ($this->column_search as $item) // looping awal
        {
            if($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {

                if($i===0) // looping awal
                {
                	$this->db->group_start();
                	$this->db->like($item, $_POST['search']['value']); 
                }
                else
                {
                	$this->db->or_like($item, $_POST['search']['value']);
                }

                if(count($this->column_search) - 1 == $i) 
                	$this->db->group_end(); 
            }
            $i++;
        }

        if(isset($_POST['order'])) { // here order processing
        	$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }  else if(isset($this->order)) {
        	$order = $this->order;
        	$this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables()
    {
    	$this->_get_datatables_query();
    	if($_POST['length'] != -1)
    		$this->db->limit($_POST['length'], $_POST['start']);

    	$query = $this->db->get();
    	// echo $this->db->last_query($query);
    	return $query->result();
    }

    function count_filtered()
    {
    	$this->_get_datatables_query();
    	$query = $this->db->get();
    	return $query->num_rows();
    }

    function count_all()
    {
    	$this->db->from($this->table);
    	return $this->db->count_all_results();
    }
// Datatable	

}

/* End of file PemudaModel.php */
/* Location: ./application/models/PemudaModel.php */
?>