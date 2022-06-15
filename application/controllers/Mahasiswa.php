<?php

class Mahasiswa extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
	}

	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['user'] = $this->db->get_where('user', ['username' =>	$this->session->userdata('username')])->row_array();
		$data['pembimbing'] = $this->db->get('pembimbing')->result();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('mahasiswa/tugas', $data);
		$this->load->view('templates/footer');
	}

	public function inputTugas()
	{

		// $data = $this->Dashboard_model->fetch_upload($this->input->post('jadwal_id'));

		$config['upload_path']          = './assets/documents/tugasmahasiswa/';
		$config['allowed_types']        = 'pdf';
		$config['max_size']             = '1024'; // 1024KB


		$this->load->library('upload', $config);
		if ($this->upload->do_upload('file_nilai')) {
			$old_file = $this->input->post('dokumen');
			if ($old_file != '') {
				unlink(FCPATH . 'assets/documents/tugasmahasiswa/' . $old_file);
			}
		} else {
			echo "Tugas gagal dikirim, pastikan ukuran dan format file benar (PDF Max. 1 MB)";
			return false;
		}

		$data = array(
			'id_pembimbing'	=> $this->input->post("pembimbing"),
			'judul_tugas' 	=> $this->input->post("judul"),
			'catatan'		=> $this->input->post("catatan"),
			'user'			=> $this->input->post("username"),
			'status'		=> 1,
			'file'			=> $this->upload->data("file_name"),
			'type'			=> $this->upload->data('file_ext'),
			'size'			=> $this->upload->data('file_size'),
		);
		$this->MahasiswaTugas_model->simpan_tugas($data);
		// $old_pdf = $this->input->post('dokumen');
		// unlink(FCPATH .'assets/documents/suratpengantar/'.$this->input->post('dokumen'));
		echo "Tugas berhasil diupload";
	}

	public function tabelTugas()
	{
		$fetch_data = $this->MahasiswaTugas_model->make_datatables();
		$data = array();	
		$no = $_POST['start'];
		foreach ($fetch_data as $row) 
		{
			$no++;
			$sub_array = array();
			$sub_array[] = $no;
			$sub_array[] = $row->judul_tugas;
			$sub_array[] = $row->pembimbing_nama;
			$sub_array[] = $row->file;
			$sub_array[] = '<a href="#" id="'.$row->id.'" class="text-danger hapus_tugas mr-2" data-toggle="modal" title="Hapus Tugas"><i class="fas fa-trash"></i></a>';
			
			$data[] = $sub_array;					
		}

		$output = array(
			"data"				=> $data
		);
		echo json_encode($output);
	}

	public function hapusTugas()
	{
		$this->MahasiswaTugas_model->hapus_tugas($_POST['id']);
		echo 'Data berhasil dihapus';
	}
}
