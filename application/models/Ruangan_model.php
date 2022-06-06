<?php 

class Ruangan_model extends CI_Model{

	// DATATABLE
	var $table = 'ruangan';
	var $select_column = array(
			'ruangan_id', 
			'ruangan_nama', 			
		);
	var $order_column = array(null, 'ruangan_nama');

	public function make_query()
	{
		$this->db->select($this->select_column);
		$this->db->from($this->table);
		
		if (isset($_POST['search']['value'])) 
		{
				$this->db->like('ruangan_nama', $_POST['search']['value']);
		}
		
		if (isset($_POST['order'])) 
		{
				$this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		}
		else
		{
				$this->db->order_by('ruangan_id', 'DESC');
		}
	}


	public function make_datatables()
	{
		$this->make_query();

		if ($_POST['length'] != -1) 
		{
			$this->db->limit($_POST['length'], $_POST['start']);
		}

		$query = $this->db->get();

		return $query->result();
	}

	public function get_all_data()
	{
		$this->db->select('*');
		$this->db->from($this->table);
		
		return $this->db->count_all_results();
	}


	public function get_filtered_data()
	{
		$this->make_query();
		$query = $this->db->get();

		return $query->num_rows();
	}



	// PROSES CRUD
	public function fetch_single($ruangan_id)
	{
		$this->db->where('ruangan_id', $ruangan_id);
    $query = $this->db->get('ruangan');
    
    return $query->result();				
	}


	public function input_institusi($insert_data)
	{
		$this->db->insert('ruangan', $insert_data);
	}


	public function update_institusi($ruangan_id, $update_data)
	{
		$this->db->where('ruangan_id', $ruangan_id);
    $this->db->update('ruangan', $update_data);
	}

	public function delete_single_user($ruangan_id)
	{
		$this->db->where('ruangan_id', $ruangan_id);
    $this->db->delete('ruangan');
	}


}

 ?>