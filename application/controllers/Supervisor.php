<?php 

class Supervisor extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
    }


    //APPROVE USER
	public function approval_user()
	{
		$data['title'] = 'Approve User';
		$data['user'] = $this->db->get_where('user', ['username' =>
		$this->session->userdata('username')])->row_array();
				
		$this->load->view('templates/header', $data);
	    $this->load->view('templates/sidebar', $data);
	    $this->load->view('templates/topbar', $data);
		$this->load->view('registrasi/approve_user', $data);
		$this->load->view('templates/footer');
	}

    

    // APPROVE JADWAL
	public function approval_jadwal()
	{
		$data['title'] = 'Approve Jadwal';
		$data['user'] = $this->db->get_where('user', ['username' =>
		$this->session->userdata('username')])->row_array();
				
		$this->load->view('templates/header', $data);
	    $this->load->view('templates/sidebar', $data);
	    $this->load->view('templates/topbar', $data);
		$this->load->view('registrasi/approve_jadwal', $data);
		$this->load->view('templates/footer');
	}






	
}