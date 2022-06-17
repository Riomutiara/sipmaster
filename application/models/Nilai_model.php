<?php

class Nilai_model extends CI_Model
{

	var $table = 'kelompok';
	var $order_column = array(
		null, 'mahasiswa_nama', 'mahasiswa_npm', 'mahasiswa_jenis_kelamin', null
	);
	var $order_column2 = array(
		null, 'mahasiswa_nama', 'mahasiswa_npm', 'mahasiswa_jenis_kelamin', 'nilai_angka', 'nilai_huruf', 'status_nilai', null
	);

	// DATATABLES 1
	public function make_query()
	{
		if ($this->input->post('Pembimbing')) {
			$this->db->where('kelompok.pembimbing_id', $this->input->post('Pembimbing'));
		}

		if ($this->input->post('Periode')) {
			$this->db->where('kelompok.periode_id', $this->input->post('Periode'));
		}


		$this->db->select('*');
		$this->db->from('kelompok');
		$this->db->join('mahasiswa', 'mahasiswa.mahasiswa_id = kelompok.mahasiswa_id');
		$this->db->where('status_nilai', 'belum dibuat');

		if (isset($_POST['search']['value'])) {
			$this->db->like('mahasiswa_nama', $_POST['search']['value']);
		}

		if (isset($_POST['order'])) {
			$this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by('kelompok_id', 'DESC');
		}
	}

	public function make_datatables()
	{
		$this->make_query();

		if ($_POST['length'] != -1) {
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
	// END DATATABLES 1


	// DATATABLES 2
	public function make_query2()
	{
		if ($this->input->post('Pembimbing')) {
			$this->db->where('kelompok.pembimbing_id', $this->input->post('Pembimbing'));
		}

		if ($this->input->post('Periode')) {
			$this->db->where('kelompok.periode_id', $this->input->post('Periode'));
		}

		$this->db->select('*');
		$this->db->from('kelompok');
		$this->db->join('mahasiswa', 'mahasiswa.mahasiswa_id = kelompok.mahasiswa_id');
		$this->db->join('nilai', 'nilai.mahasiswa_id = kelompok.mahasiswa_id');
		$this->db->where('status_nilai !=', 'belum dibuat');

		if (isset($_POST['search']['value'])) {
			$this->db->like('mahasiswa_nama', $_POST['search']['value']);
		}

		if (isset($_POST['order'])) {
			$this->db->order_by($this->order_column2[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by('kelompok_id', 'DESC');
		}
	}

	public function make_datatables2()
	{
		$this->make_query2();

		if ($_POST['length'] != -1) {
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
		$this->db->from($this->table);

		return $this->db->count_all_results();
	}
	// END DATATABLES 2


	// DATATABLES TUGAS MHS
	public function make_query_tugas()
	{
		if ($this->input->post('Pembimbing')) {
			$this->db->where('upload_tugas.id_pembimbing', $this->input->post('Pembimbing'));
		}

		$this->db->select('
				user.nama_akun,
				institusi.institusi_nama,
				upload_tugas.judul_tugas,
				upload_tugas.file,
				upload_tugas.id,
		
		');
		$this->db->from('upload_tugas');
		$this->db->join('user', 'user.username = upload_tugas.user', 'LEFT');
		$this->db->join('institusi', 'institusi.institusi_id = user.institusi_id', 'LEFT');

		if (isset($_POST['search']['value'])) {
			$this->db->like('user.nama_akun', $_POST['search']['value']);
		}

		if (isset($_POST['order'])) {
			$this->db->order_by($this->order_column2[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by('upload_tugas.id', 'DESC');
		}
	}

	public function make_datatables_tugas()
	{
		$this->make_query_tugas();

		if ($_POST['length'] != -1) {
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}

	public function get_filtered_tugas()
	{
		$this->make_query_tugas();

		$query = $this->db->get();
		return $query->num_rows();
	}

	public function get_all_tugas()
	{
		$this->db->select('*');
		$this->db->from('upload_tugas');

		return $this->db->count_all_results();
	}
	// END DATATABLES 2




	// CRUD
	public function fetch_single($mahasiswa_id)
	{
		$this->db->where('mahasiswa_id', $mahasiswa_id);
		$query = $this->db->get('mahasiswa');
		return $query->result();
	}

	public function fetch_periode()
	{
		$this->db->where('status', 'terkirim');
		$query = $this->db->get('periode');
		return $query->result();
	}

	public function fetch_single_nilai($mahasiswa_id)
	{
		$this->db->where('mahasiswa_id', $mahasiswa_id);
		$query = $this->db->get('nilai');
		return $query->result();
	}

	public function insert_nilai($kirim_data)
	{
		$this->db->insert('nilai', $kirim_data);
	}

	public function update_data($mahasiswa_id, $update_data)
	{
		$this->db->where('mahasiswa_id', $mahasiswa_id);
		$this->db->update('kelompok', $update_data);
	}

	public function update_data_nilai($mahasiswa_id, $update_data)
	{
		$this->db->where('mahasiswa_id', $mahasiswa_id);
		$this->db->update('nilai', $update_data);
	}

	public function kirim_nilai($mahasiswa_id, $update_data)
	{
		$this->db->where('mahasiswa_id', $mahasiswa_id);
		$this->db->update('kelompok', $update_data);
	}

	public function update_status_tugas($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('upload_tugas', $data);
	}
}
