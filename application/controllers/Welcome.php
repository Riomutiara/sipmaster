<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	
	public function index()
	{
		$data['title'] = 'Selamat Datang';
		
		$this->load->view('templates/header', $data);
		$this->load->view('welcome_message');
		$this->load->view('templates/footer');
	}
}
