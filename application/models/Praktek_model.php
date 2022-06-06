<?php 

class Praktek_model extends CI_Model{

	// DATATABLE
	var $table = 'praktek';	
	var $select_column = array(
			'praktek_id', 
			'jurusan_id',
			'praktek_jenis',			
		);
	var $order_column = array(null, 'jurusan_id', 'praktek_jenis');


	public function make_query()
	{
		// $this->db->select($this->select_column);
		// $this->db->from($this->table);

		$this->db->order_by('pembimbing_id', 'ASC');
		return $this->db->from('pembimbing')
			->join('ruangan', 'ruangan.ruangan_id = pembimbing.ruangan_id');


		if (isset($_POST['search']['value'])) 
		{
				$this->db->like('pembimbing_nama', $_POST['search']['value']);
				$this->db->or_like('ruangan_id', $_POST['search']['value']);
		}
		
		if (isset($_POST['order'])) 
		{
				$this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		}
		else
		{
				$this->db->order_by('pembimbing_id', 'DESC');
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
	// END DATATABLE



	// CRUD
}

 ?>