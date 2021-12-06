<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class PendudukModel extends CI_Model {
	
	var $column_order = array(null, 'nama_lengkap', 'nik', 'jenis_kelamin'); 
    var $column_search = array('nama_lengkap', 'nik', 'jenis_kelamin'); //field yang diizin untuk pencarian 
    var $order = array('nama_lengkap' => 'asc'); // default order 
    var $table = 'penduduk';

// Datatable
    private function _get_datatables_query()
    {
    	$this->db->from($this->table);
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

    function get($id)
    {
        $this->db->select('u.username, u.email, p.*');
        $this->db->from('penduduk as p');
        $this->db->join('users as u', 'u.id = p.user_id', 'left');
        $this->db->where('p.id', $id);
        return $this->db->get();
    }

    function create($users, $penduduk)
    {
        $user = $this->db->insert('users', $users);
        if ($user) {
            $penduduk['user_id'] = $this->db->insert_id();
            $insert = $this->db->insert('penduduk', $penduduk);
        }

        return true;
    }

    function update($data, $id, $users, $user_id)
    {
        if ($users!=null) {
            $this->db->update('users', $users, array('id' => $user_id));
        }
        $this->db->update('penduduk', $data, array('id' => $id));

        return true;
    }

}

/* End of file PendudukModel.php */
/* Location: ./application/models/PendudukModel.php */
?>