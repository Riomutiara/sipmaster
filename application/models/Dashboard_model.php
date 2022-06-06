<?php 

class Dashboard_model extends CI_Model{

	var $table = 'jadwal';
	var $select_column = array(
			'jadwal_id',
			'jadwal_nama', 
			'jadwal_mulai', 
			'jadwal_akhir', 
			'jadwal_status', 
			'volume', 
			);
	var $order_column = array(
			null, 'jadwal_nama', 'jadwal_mulai', 'jadwal_akhir', 'jadwal_status', 'volume', null, null
			);

	// DATATABLES 1
	public function make_query()
	{
		if ($this->input->post('Usernameeeeeeeeeeeeeee')) 
	   {
	   	$this->db->where('username', $this->input->post('Usernameeeeeeeeeeeeeee'));
	   }

		$this->db->select($this->select_column);
		$this->db->from($this->table);
		
		if (($_POST['search']['value'])) 
		{
			$this->db->like('jadwal.jadwal_nama', $_POST['search']['value']);
			$this->db->or_like('jadwal.jadwal_mulai', $_POST['search']['value']);
			$this->db->or_like('jadwal.jadwal_akhir', $_POST['search']['value']);
			$this->db->or_like('jadwal.jadwal_status', $_POST['search']['value']);
			$this->db->or_like('jadwal.volume', $_POST['search']['value']);
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

	public function get_filtered_data()
	{
		$this->make_query();

		$query = $this->db->get();
		return $query->num_rows();
	}

	public function get_all_data()
	{
		$this->db->select('*');
		$this->db->from('jadwal');
		
		return $this->db->count_all_results();
	}
	// END DATATABLES 1



	// DATATABLES 2
	public function make_query2()
	{
		if ($this->input->post('Jadwalllllllll')) 
   		{
	   		$this->db->where('jadwal_id', $this->input->post('Jadwalllllllll'));
	    }

   		$this->db->from('tabel_mahasiswa');

	}

	public function make_datatables2()
	{
		$this->make_query2();

		if ($_POST['length'] != -1) 
		{
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}

	public function get_filtered_data2()
	{
		$this->make_query2();

		$query = $this->db->get();
		return $query->num_rows();
	}

	public function get_all_data2()
	{
		$this->db->select('*');
		$this->db->from('jadwal');
		
		return $this->db->count_all_results();
	}

	// END DATATABLES 2

	public function GetDataJadwal($id)
	{
		return $this->db->get_where('jadwal', ['jadwal_id' => $id])->row_array();
	}


	// CRUD
	public function fetch_single($jadwal_id)
	{			
		$this->db->where('jadwal_id', $jadwal_id);
	    $query = $this->db->get('tabel_mahasiswa');    
	    return $query->result();
	}

	public function fetch_upload($jadwal_id)
	{			
		$this->db->where('jadwal_id', $jadwal_id);
	    $query = $this->db->get('jadwal');    
	    return $query->result();
	}

	public function delete_single_user_jadwal($jadwal_id)
	{
		$this->db->where('jadwal_id', $jadwal_id);
    	$this->db->delete('jadwal');
	}

	public function delete_mahasiswa($jadwal_id)
	{
		$this->db->where('jadwal_id', $jadwal_id);
    	$this->db->delete('mahasiswa');
	}


	public function kirim_data_jadwal($jadwal_id, $kirim_data)
	{
		$this->db->where('jadwal_id', $jadwal_id);
    	$this->db->update('jadwal', $kirim_data);
	}




}

 ?>