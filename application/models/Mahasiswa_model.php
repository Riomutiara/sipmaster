<?php 

class Mahasiswa_model extends CI_Model{

	public function fetch_jadwal()
	{		
		$this->db->order_by('jadwal_id', 'DESC');		
		$this->db->like('jadwal_status', 'draft');		
		$query = $this->db->get_where('jadwal', ['username' =>
    	$this->session->userdata('username')]);
		return $query->result();
	}


	public function fetch_jurusan()
	{
		$this->db->order_by('jurusan_nama', 'ASC');
		$query = $this->db->get('jurusan');
		return $query->result();
	}

	
	// DATATABLE
	var $table = "mahasiswa";  
	var $select_column = array("mahasiswa_nama", "mahasiswa_npm", "mahasiswa_jenis_kelamin");  
	var $order_column = array(null, "mahasiswa_nama", "mahasiswa_npm", 'mahasiswa_jenis_kelamin', null, null);

	public function make_query()  
	{  
		if ($this->input->post('Jadwal')) 
		{
			$this->db->where('jadwal_id', $this->input->post('Jadwal'));
		}

		$this->db->from($this->table);
		$this->db->join('jurusan', 'jurusan.jurusan_id = mahasiswa.jurusan_id');

	
			
		if(($_POST["search"]["value"]))  
		{  
			$this->db->like('mahasiswa_npm', $_POST["search"]["value"]);  
				
		} 

		if(isset($_POST["order"]))  
		{  
			$this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
		}  
		else  
		{  
			$this->db->order_by('mahasiswa_id', 'DESC');  
		}  
	} 
	
	public function make_datatables()
	{  
		$this->make_query();

		if($_POST["length"] != -1)  
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
		$this->db->select("*");
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}
	// END DATATABLE

	// CRUD

	
	public function input_mahasiswa($insert_mahasiswa)
	{
		$this->db->insert('mahasiswa', $insert_mahasiswa);
	}

	public function delete_single_user($mahasiswa_id)
	{
		$this->db->where('mahasiswa_id', $mahasiswa_id);
    	$this->db->delete('mahasiswa');
	}

	public function nilai_mahasiswa($kirim_data)
	{
		$this->db->insert('upload_nilai', $kirim_data);
	}

	

}


 ?>