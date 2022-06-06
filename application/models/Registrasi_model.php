<?php

class Registrasi_model extends CI_Model
{

	public function fetch_institusi()
	{
		$this->db->order_by('institusi_nama', 'ASC');
		$query = $this->db->get('institusi');
		return $query->result();
	}

	public function fetch_pembimbing()
	{
		$this->db->order_by('pembimbing_nama', 'ASC');
		$query = $this->db->get('pembimbing');
		return $query->result();
	}

	public function fetch_single_nama_institusi($institusi_id)
	{
		$this->db->where('institusi_id', $institusi_id);
		$query = $this->db->get('institusi');

		return $query->result();
	}

	// DATATABLES 1
	var $table = 'user';
	var $select_column = array(
		'id',
		'institusi_nama',
		'username',
		'nama_akun',
		'is_active',
		'date_created'
	);
	var $order_column = array(
		null, 'username', 'nama_akun', 'keterangan', 'is_active', null, null
	);


	public function make_query()
	{
		$this->db->select('*');
		$this->db->from('user');
		// $this->db->join('institusi', 'institusi.institusi_id = user.institusi_id');	   
		$this->db->where('role_id', 4);

		if (($_POST['search']['value'])) {
			$this->db->like('user.username', $_POST['search']['value']);
			$this->db->or_like('nama_akun', $_POST['search']['value']);
			$this->db->or_like('keterangan', $_POST['search']['value']);
			// $this->db->or_like('is_active', $_POST['search']['value']);
		}

		if (isset($_POST['order'])) {
			$this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by('id', 'DESC');
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



	// DATATABLE 2
	public function make_query2()
	{
		$this->db->from('user');
		$this->db->where('role_id', 3);
		// $this->db->join('institusi', 'institusi.institusi_id = user.institusi_id');	   

		if (($_POST['search']['value'])) {
			$this->db->like('username', $_POST['search']['value']);
			$this->db->or_like('nama_akun', $_POST['search']['value']);
			// $this->db->or_like('institusi_id', $_POST['search']['value']);
			$this->db->or_like('is_active', $_POST['search']['value']);
		}

		if (isset($_POST['order'])) {
			$this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by('id', 'DESC');
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
	// END DATATABLE 2






	// DATATABLE 3 approve
	public function make_query3()
	{
		$this->db->from('user');
		$this->db->not_like('institusi_id', 0);
		// $this->db->join('institusi', 'institusi.institusi_id = user.institusi_id');	   

		if (($_POST['search']['value'])) {
			$this->db->like('username', $_POST['search']['value']);
			// $this->db->or_like('nama_akun', $_POST['search']['value']);
			$this->db->or_like('keterangan', $_POST['search']['value']);
			// $this->db->or_like('is_active', $_POST['search']['value']);
		}

		if (isset($_POST['order'])) {
			$this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by('id', 'DESC');
		}
	}

	public function make_datatables3()
	{
		$this->make_query3();

		if ($_POST['length'] != -1) {
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
		$this->db->from($this->table);

		return $this->db->count_all_results();
	}
	// END DATATABLE 3

	public function make_query_pembimbing()
	{

		if ($this->input->post('role_id')) {
			$this->db->where('role_id', $this->input->post('role_id'));
		}

		$this->db->from($this->table);
		$this->db->join('pembimbing', 'pembimbing.pembimbing_id = user.user_id');

		if (($_POST['search']['value'])) {
			$this->db->like('username', $_POST['search']['value']);
			$this->db->or_like('nama_akun', $_POST['search']['value']);
			$this->db->or_like('is_active', $_POST['search']['value']);
		}

		if (isset($_POST['order'])) {
			$this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by('id', 'DESC');
		}
	}

	public function make_datatables_pembimbing()
	{
		$this->make_query_pembimbing();

		if ($_POST['length'] != -1) {
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}

	public function get_filtered_data_pembimbing()
	{
		$this->make_query();

		$query = $this->db->get();
		return $query->num_rows();
	}








	// DATATABLE MAHASISWA
	public function make_query_mahasiswa()
	{
		$this->db->from('user');
		$this->db->where('user.role_id', 5);

		if (($_POST['search']['value'])) {
			$this->db->like('username', $_POST['search']['value']);
		}

		if (isset($_POST['order'])) {
			$this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by('id', 'DESC');
		}
	}

	public function make_datatables_mahasiswa()
	{
		$this->make_query_mahasiswa();

		if ($_POST['length'] != -1) {
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}

	public function get_filtered_data_mahasiswa()
	{
		$this->make_query();

		$query = $this->db->get();
		return $query->num_rows();
	}

	public function get_all_data_mahasiswa()
	{
		$this->db->select('*');
		$this->db->from('user');

		return $this->db->count_all_results();
	}
	// END DATATABLES PEMBIMBING






	// CRUD
	public function registrasi($data)
	{
		$this->db->insert('user', $data);
	}

	public function update_registrasi($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('user', $data);
	}

	public function fetch_single($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('user');

		return $query->result();
	}
}
