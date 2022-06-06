<?php 

class Jadwal_model extends CI_Model{

	public function fetch_jurusan()
	{
			$this->db->order_by('jurusan_nama', 'ASC');
			$query = $this->db->get('jurusan');
			return $query->result();
	}


	// DATATABLE
	var $table = 'jadwal';
	var $select_column = array(
			'jadwal_id', 
			'jurusan_nama',
			'jadwal_bulan',
			'jadwal_mulai',			
			'jadwal_akhir',
			'jadwal_jenis_praktek'
		);
	var $order_column = array(null, 'jadwal_bulan', 'jadwal_mulai', 'jadwal_akhir', 'jurusan_nama', 'jadwal_jenis_praktek');


	public function make_query()
	{
		$this->db->select($this->select_column);
		$this->db->from($this->table);
		
		if (isset($_POST['search']['value'])) 
		{
				$this->db->like('jadwal_bulan', $_POST['search']['value']);
				$this->db->or_like('jadwal_mulai', $_POST['search']['value']);
				$this->db->or_like('jadwal_akhir', $_POST['search']['value']);
				$this->db->or_like('jurusan_nama', $_POST['search']['value']);
				$this->db->or_like('jadwal_jenis_praktek', $_POST['search']['value']);
		}
		
		if (isset($_POST['order'])) 
		{
				$this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		}
		else
		{
				$this->db->order_by('jadwal_id', 'DESC');
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
	public function input_jadwal($insert_data)
	{
		$this->db->insert('jadwal', $insert_data);
	}
}



 ?>