<?php 

class Download_model extends CI_Model{

	// DATATABLE
	var $table = 'upload_nilai';
	var $select_column = array(
			'id', 
			'file',
			'type',
			'size',			
			'jadwal_id'
		);
	var $order_column = array(null, 'file', 'type', 'size', 'jadwal_id');


	public function make_query()
	{
		if ($this->input->post('Jadwal')) 
		{
			$this->db->where('upload_nilai.jadwal_id', $this->input->post('Jadwal'));
		}

		$this->db->select('*');
		$this->db->from('upload_nilai');
		
		if (isset($_POST['search']['value'])) 
		{
				$this->db->like('id', $_POST['search']['value']);
		}
		
		if (isset($_POST['order'])) 
		{
				$this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		}
		else
		{
				$this->db->order_by('id', 'DESC');
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