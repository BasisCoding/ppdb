<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class TahunAjaranModel extends CI_Model {
	
	var $column_order = array(null, 't.tahun'); 
    var $column_search = array('t.tahun'); //field yang diizin untuk pencarian 
    var $order = array('t.tahun' => 'asc'); // default order 
    var $table = 'tahun_ajaran';

// Datatable
    private function _get_datatables_query()
    {
    	$this->db->from($this->table.' as t');
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
        $this->db->from($this->table.' as t');
        $this->db->where('t.id', $id);
        return $this->db->get();
    }

    function show($where = null)
    {
        $this->db->from($this->table.' as t');
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
		if ($data['status'] == 1) {
			$this->db->update($this->table, array('status' => 0), array('id != ' => $id));
		}
		
        return $this->db->update($this->table, $data, array('id' => $id));
    }

    function delete($id)
    {
        return $this->db->delete($this->table, array('id' => $id));
    }

}

/* End of file EkstrakurikulerModel.php */
/* Location: ./application/models/EkstrakurikulerModel.php */
?>
