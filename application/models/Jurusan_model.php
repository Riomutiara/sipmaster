<?php 

class Jurusan_model extends CI_Model{

	var $table = "jurusan";  
  var $select_column = array("jurusan_id", "jurusan_nama", "jurusan_supervisi", "jurusan_pin");  
  var $order_column = array(null, "jurusan_nama", "jurusan_supervisi", null, null, null);

  public function make_query()  
  {  
   $this->db->select($this->select_column);  
   $this->db->from($this->table);
     
   if(isset($_POST["search"]["value"]))  
   {  
        $this->db->like("jurusan_nama", $_POST["search"]["value"]);  
        $this->db->or_like("jurusan_supervisi", $_POST["search"]["value"]);  
        $this->db->or_like("jurusan_pin", $_POST["search"]["value"]);  
   }  
   if(isset($_POST["order"]))  
   {  
        $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
   }  
   else  
   {  
        $this->db->order_by('jurusan_id', 'DESC');  
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

  public function input_jurusan($data)
  {
    $this->db->insert('jurusan', $data);
  }

  public function update_jurusan($user_id, $data)
  {
    $this->db->where('jurusan_id', $user_id);
    $this->db->update('jurusan', $data);
  }

  public function delete_single_user($jurusan_id)
  {
    $this->db->where('jurusan_id', $jurusan_id);
    $this->db->delete('jurusan');
  }

  public function fetch_single($user_id)
  {
    $this->db->where('jurusan_id', $user_id);
    $query = $this->db->get('jurusan');
    return $query->result();
  }
}

 ?>