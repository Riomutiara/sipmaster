<?php

class MahasiswaTugas_model extends CI_Model
{

  public function simpan_tugas($data)
  {
    $this->db->insert('upload_tugas', $data);
  }

  public function hapus_tugas($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('upload_tugas');
  }

  public function make_query()
  {
    if ($this->input->post('Username')) {
      $this->db->where('user', $this->input->post('Username'));
    }

    $this->db->select('*');
    $this->db->from('upload_tugas');
    $this->db->join('pembimbing', 'pembimbing.pembimbing_id = upload_tugas.id_pembimbing');

    if (($_POST['search']['value'])) {
      $this->db->like('judul_tugas', $_POST['search']['value']);
    }

    // if (isset($_POST['order'])) {
    //   $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
    // } else {
      $this->db->order_by('id', 'DESC');
    // }
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
}
