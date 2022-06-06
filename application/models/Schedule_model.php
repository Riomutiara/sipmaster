<?php 

class Schedule_model extends CI_Model{
			
	public function input_jadwal($insert_jadwal)
	{
		$this->db->insert('jadwal', $insert_jadwal);
	}

	
}


 ?>