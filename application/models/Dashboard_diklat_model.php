<?php 

class Dashboard_diklat_model extends CI_Model{

	var $table = 'jadwal';
	var $select_column = array(
			'jadwal_id',
			'jadwal_nama', 
			'institusi_nama', 
			'jadwal_mulai', 
			'jadwal_akhir', 
			'jadwal_status', 
			'volume'
			);
	var $order_column = array(
			null, 'institusi_nama', 'jadwal_nama', 'jadwal_mulai', 'jadwal_akhir', 'jadwal_status', 'volume', null, null
			);
	var $order_column3 = array(
		null, 'mahasiswa_nama', 'mahasiswa_npm', 'mahasiswa_jenis_kelamin', 'nilai_angka', 'nilai_huruf', 'pembimbing_nama', 'institusi_nama', 'status_nilai', null
		);
	

	// DATATABLES 1
	public function make_query()
	{
		if ($this->input->post('Usernameeeeeeeeeeeeeee')) 
	   {
	   	$this->db->where('username', $this->input->post('Usernameeeeeeeeeeeeeee'));
	   }

		$this->db->select($this->select_column);
		$this->db->from('jadwal');
		$this->db->join('institusi', 'institusi.institusi_id = jadwal.institusi_id');
		
		if (($_POST['search']['value'])) 
		{
			$this->db->like('jadwal.jadwal_nama', $_POST['search']['value']);
			$this->db->or_like('jadwal.institusi_id', $_POST['search']['value']);
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


	// DATATABLE NILAI MAHASISWA
	public function make_query2()
	{
		if ($this->input->post('Periode')) 
		{
			$this->db->where('periode_id', $this->input->post('Periode'));
		}

		$this->db->select('*');
		$this->db->from('kelompok');
		$this->db->join('mahasiswa', 'mahasiswa.mahasiswa_id = kelompok.mahasiswa_id');
		$this->db->join('nilai', 'nilai.mahasiswa_id = kelompok.mahasiswa_id', 'left');
		$this->db->join('institusi', 'institusi.institusi_id = kelompok.institusi_id');
		$this->db->join('pembimbing', 'pembimbing.pembimbing_id = kelompok.pembimbing_id');
		
		if (($_POST['search']['value'])) 
		{
			$this->db->like('mahasiswa_nama', $_POST['search']['value']);
		}
		
		if (isset($_POST['order'])) 
		{
			$this->db->order_by($this->order_column3[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		}
		else
		{
			$this->db->order_by('kelompok_id', 'DESC');
		}
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
		$this->db->from('kelompok');
		
		return $this->db->count_all_results();
	}
  // END DATATABLES NILAI MAHASISWA


	



	// CRUD
	public function input_kuota($insert)
	{
		$this->db->insert('kuota', $insert);
	}

	public function fetch_ruangan()
	{
		$this->db->order_by('ruangan_nama', 'ASC');		
		$query = $this->db->get('ruangan');
		return $query->result();
	}

	public function fetch_pembimbing($id)
	{
		$hasil=$this->db->query("SELECT * FROM pembimbing WHERE ruangan_id='$id'");
		return $hasil->result();
	
	}
	
	public function fetch_jadwal($id)
	{
		$hasil=$this->db->query("SELECT * FROM jadwal WHERE institusi_id='$id' AND jadwal_status='approved'");
		return $hasil->result();
	}

	public function fetch_mahasiswa($id)
	{
		$hasil=$this->db->query("SELECT * FROM mahasiswa WHERE jadwal_id=$id");
		return $hasil->result();
	}

	public function fetch_institusi()
	{
		$this->db->order_by('institusi_nama', 'DESC');
		$this->db->from('institusi');
		$query = $this->db->get();
		return $query->result();
	}

	public function fetch_periode()
	{
		$this->db->order_by('periode_id', 'DESC');
		$this->db->from('periode');
		$this->db->where('status', 'belum dibuat');
		$query = $this->db->get();
		return $query->result();
	}

	public function fetch_periode_all()
	{
		$this->db->order_by('periode_id', 'DESC');
		$query = $this->db->get('periode');
		return $query->result();
	}

	
	public function fetch_single_periode($periode_id)
	{
		$this->db->from('periode');
		// $this->db->join('kelompok', 'kelompok.periode_id = periode.periode_id');
		$this->db->where('periode_id', $periode_id);

	    $query = $this->db->get();    
	    return $query->result();
	}

	public function fetch_single_tugas($periode_id)
	{
		$this->db->where('periode_id', $periode_id);
		$query = $this->db->get('uraian_tugas');
		
		return $query->result();
	}

	public function batal_nilai($mahasiswa_id, $update_data)
	{
		$this->db->where('mahasiswa_id', $mahasiswa_id);
    	$this->db->update('kelompok', $update_data);
	}

	public function kirim_nilai_institusi($mahasiswa_id, $update_data)
	{
		$this->db->where('mahasiswa_id', $mahasiswa_id);
    	$this->db->update('kelompok', $update_data);
	}

	


}

 ?>