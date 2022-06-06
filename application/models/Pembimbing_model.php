<?php 

class Pembimbing_model extends CI_Model{

	public function fetch_ruangan()
	{
		$this->db->order_by('ruangan_nama', 'ASC');
		$query = $this->db->get('ruangan');

		return $query->result();
	}


	// DATATABLE
	var $order_column = array(null, "pembimbing_nama", "ruangan_nama", null, null, null);

	public function make_query()
	{
		$this->db->select('*');
		$this->db->from('pembimbing');
		$this->db->join('ruangan', 'ruangan.ruangan_id = pembimbing.ruangan_id');

		if (isset($_POST['search']['value'])) 
		{
				$this->db->like('pembimbing.pembimbing_nama', $_POST['search']['value']);
				$this->db->or_like('ruangan.ruangan_nama', $_POST['search']['value']);
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
		$this->db->from('pembimbing');
		
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
	public function input_pembimbing($insert_data)
	{
		$this->db->insert('pembimbing', $insert_data);
	}

	public function fetch_single($pembimbing_id)
	{
		$this->db->where('pembimbing_id', $pembimbing_id);
    	$query = $this->db->get('pembimbing');    
    	return $query->result();
	}

	public function update_pembimbing($pembimbing_id, $update_data)
	{
		$this->db->where('pembimbing_id', $pembimbing_id);
    	$this->db->update('pembimbing', $update_data);
	}

	public function delete_single_user($pembimbing_id)
	{
		$this->db->where('pembimbing_id', $pembimbing_id);
    	$this->db->delete('pembimbing');
	}


}

 ?>