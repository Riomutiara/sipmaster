<?php

class Kelompok_model extends CI_Model
{
  // DATATABLES
	var $table = 'kelompok';
	var $select_column = array( 
			'kelompok_id',
			'periode_id', 
			'institusi_id', 
			'jadwal_id', 
			'kelompok_nama', 
			'ruangan_id', 
			'pembimbing_id',
			'mahasiswa_id',
			// 'mahasiswa_nama'
		);
	var $order_column = array(
			null, 'kelompok_nama', 'mahasiswa_nama', 'mahasiswa_npm', 'mahasiswa_jenis_kelamin', 'ruangan_nama', 'pembimbing_nama', null
		);

	public function make_query()
	{
		if ($this->input->post('Periode')) 
		{
			$this->db->where('periode_id', $this->input->post('Periode'));
		}

		$this->db->select('*');
		$this->db->from('kelompok');
		// $this->db->join('periode', 'periode.periode_id = kelompok.periode_id');
		$this->db->join('mahasiswa', 'mahasiswa.mahasiswa_id = kelompok.mahasiswa_id');
		$this->db->join('ruangan', 'ruangan.ruangan_id = kelompok.ruangan_id');
		$this->db->join('pembimbing', 'pembimbing.pembimbing_id = kelompok.pembimbing_id');
		
		
		if (($_POST['search']['value'])) 
		{
			$this->db->like('kelompok.kelompok_nama', $_POST['search']['value']);
			$this->db->or_like('mahasiswa.mahasiswa_nama', $_POST['search']['value']);
			$this->db->or_like('mahasiswa.mahasiswa_npm', $_POST['search']['value']);
			$this->db->or_like('mahasiswa.mahasiswa_jenis_kelamin', $_POST['search']['value']);
			$this->db->or_like('ruangan.ruangan_nama', $_POST['search']['value']);
			$this->db->or_like('pembimbing.pembimbing_nama', $_POST['search']['value']);
		}
		
		if (isset($_POST['order'])) 
		{
			$this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		}
		else
		{
			$this->db->order_by('kelompok_id', 'ASC');
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

  
	// CRUD
	public function input_periode($insert_data)
	{
		$this->db->insert('periode', $insert_data);
	}

	public function input_kelompok($insert_data)
	{
		$this->db->insert('kelompok', $insert_data);
	}

	public function input_uraian_tugas($insert_data)
	{
		$this->db->insert('uraian_tugas', $insert_data);
	}

	public function update_uraian_tugas($periode_id, $update_data)
	{
		$this->db->where('periode_id', $periode_id);
    	$this->db->update('periode', $update_data);
	}

	public function delete_single_user($kelompok_id)
	{
		$this->db->where('kelompok_id', $kelompok_id);
    	$this->db->delete('kelompok');
	}

	


}

?>