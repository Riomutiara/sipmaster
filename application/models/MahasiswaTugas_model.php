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

    $this->db->select('
          upload_tugas.id,
          upload_tugas.judul_tugas,
          upload_tugas.file,
          upload_tugas.status,
          pembimbing.pembimbing_nama,
    ');
    $this->db->from('upload_tugas');
    $this->db->join('pembimbing', 'pembimbing.pembimbing_id = upload_tugas.id_pembimbing');

    if (($_POST['search']['value'])) {
      $this->db->like('judul_tugas', $_POST['search']['value']);
    }

    $this->db->order_by('id', 'DESC');
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
