<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Institusi_model extends CI_Model{


	// DATATABLES
	var $table = 'institusi';
	var $select_column = array(
			'institusi_id', 
			'institusi_nama', 
			'institusi_no_akreditasi', 
			'institusi_tahun_akreditasi', 
			'institusi_status', 
			'institusi_alamat', 
			'institusi_telepon',
			'tanggal_mou'
		);
	var $order_column = array(
			null, 'institusi_nama', 'institusi_status', 'tanggal_mou', null, null
		);

	public function make_query()
	{
		$this->db->select($this->select_column);
		$this->db->from($this->table);
		
		if (isset($_POST['search']['value'])) 
		{
			$this->db->like('institusi_nama', $_POST['search']['value']);
			$this->db->or_like('institusi_status', $_POST['search']['value']);
			$this->db->or_like('tanggal_mou', $_POST['search']['value']);
		}
		
		if (isset($_POST['order'])) 
		{
			$this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		}
		else
		{
			$this->db->order_by('institusi_id', 'DESC');
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
		$this->db->from($this->table);
		
		return $this->db->count_all_results();
	}
	// END DATATABLE



	// DATATABLE NILAI MAHASISWA
	var $order_column2 = array(
		null, 'mahasiswa_nama', 'mahasiswa_npm', 'mahasiswa_jenis_kelamin', 'nilai_angka', 'nilai_huruf', null, null
	);
	
	public function make_query2()
	{
		if ($this->input->post('Jadwal')) 
		{
			$this->db->where('kelompok.jadwal_id', $this->input->post('Jadwal'));
		}

		$this->db->select('*');
		$this->db->from('kelompok');
		$this->db->join('mahasiswa', 'mahasiswa.mahasiswa_id = kelompok.mahasiswa_id');
		$this->db->join('nilai', 'nilai.mahasiswa_id = kelompok.mahasiswa_id', 'left');
		$this->db->where('status_nilai', 'terkirim');
    
		if (($_POST['search']['value'])) 
		{
			$this->db->like('mahasiswa_nama', $_POST['search']['value']);
		}
		
		if (isset($_POST['order'])) 
		{
			$this->db->order_by($this->order_column2[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
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



  // DATATABLE PRAKTEK MAHASISWA
	var $order_column3 = array(
		null, 'mahasiswa_nama', 'mahasiswa_npm', 'mahasiswa_jenis_kelamin', 'ruangan_nama', 'pembimbing_nama', null, null
	);
	
	public function make_query3()
	{
		if ($this->input->post('Jadwal')) 
		{
			$this->db->where('kelompok.jadwal_id', $this->input->post('Jadwal'));
		}

		$this->db->select('*');
		$this->db->from('kelompok');
		$this->db->join('mahasiswa', 'mahasiswa.mahasiswa_id = kelompok.mahasiswa_id');
		$this->db->join('ruangan', 'ruangan.ruangan_id = kelompok.ruangan_id');
		$this->db->join('pembimbing', 'pembimbing.pembimbing_id = kelompok.pembimbing_id');
		// $this->db->join('periode', 'periode.periode_id = kelompok.periode_id');
		// $this->db->where('status_nilai', 'terkirim');
    
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
			$this->db->order_by('kelompok_id', 'ASC');
		}
	}

	public function make_datatables3()
	{
		$this->make_query3();

		if ($_POST['length'] != -1) 
		{
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}

	public function get_filtered_data3()
	{
		$this->make_query3();

		$query = $this->db->get();
		return $query->num_rows();
	}

	public function get_all_data3()
	{
		$this->db->select('*');
		$this->db->from('kelompok');
		
		return $this->db->count_all_results();
	}
  // END DATATABLES PRAKTEK MAHASISWA



	

	

	
	

	// CRUD
	public function fetch_single($institusi_id)
	{
		$this->db->where('institusi_id', $institusi_id);
		$query = $this->db->get('institusi');	
		return $query->result();
	}

	public function fetch_jadwal($id)
	{
		$this->db->where('username', $id);
		$query = $this->db->get('jadwal');	
		return $query->result();
	}

	public function input_institusi($insert)
	{
		$this->db->insert('institusi', $insert);
	}	

	public function update_institusi($institusi_id, $update)
	{	
		$this->db->where('institusi_id', $institusi_id);
		$this->db->update('institusi', $update );
	}

	public function delete_single_user($institusi_id)
 	{
		$this->db->where('institusi_id', $institusi_id);
		$this->db->delete('institusi');
	}
	
	public function fetch_single_jadwal($jadwal_id)
	{
		$this->db->where('jadwal_id', $jadwal_id);
    	$query = $this->db->get('jadwal');    
    	return $query->result();
	}

	public function fetch_upload_nilai($file_nilai)
	{			
		$this->db->where('id', $file_nilai);
	    $query = $this->db->get('upload_nilai');    
	    return $query->result();
	}
}

 ?>