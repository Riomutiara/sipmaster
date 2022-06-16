<?php

class Pembimbing extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
	}

	// PEMBIMBING
	public function input_nilai()
	{
		$data['title'] = 'Input Nilai Mahasiswa';
		$data['user'] = $this->db->get_where('user', ['username' =>	$this->session->userdata('username')])->row_array();
		$data['periode'] = $this->Nilai_model->fetch_periode();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('pembimbing/input_nilai', $data);
		$this->load->view('templates/footer');
	}

	public function dataMahasiswa()
	{
		$fetch_data = $this->Nilai_model->make_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($fetch_data as $row) {
			$no++;
			$sub_array = array();
			$sub_array[] = $no;
			$sub_array[] = $row->mahasiswa_nama;
			$sub_array[] = $row->mahasiswa_npm;
			$sub_array[] = $row->mahasiswa_jenis_kelamin;
			$sub_array[] = '
				<a href="#" id="' . $row->mahasiswa_id . '" class="text-primary details mr-2" data-toggle="modal" title="Input Nilai"><i class="fas fa-edit"></i></a>				
				';
			$data[] = $sub_array;
		}

		$output = array(
			"draw"				=> intval($_POST['draw']),
			"recordsTotal"		=> $this->Nilai_model->get_all_data(),
			"recordsFiltered"	=> $this->Nilai_model->get_filtered_data(),
			"data"				=> $data
		);
		echo json_encode($output);
	}

	public function tabelKirimMahasiswa()
	{
		$fetch_data = $this->Nilai_model->make_datatables2();
		$data = array();
		$no = $_POST['start'];
		foreach ($fetch_data as $row) {
			$no++;
			$sub_array = array();
			$sub_array[] = $no;
			$sub_array[] = $row->mahasiswa_nama;
			$sub_array[] = $row->mahasiswa_npm;
			$sub_array[] = $row->mahasiswa_jenis_kelamin;
			$sub_array[] = $row->nilai_angka;
			$sub_array[] = $row->nilai_huruf;
			$sub_array[] = $row->keterangan;
			if ($row->status_nilai == 'draft') {
				$sub_array[] = '<span class="badge badge-warning"><i>' . $row->status_nilai . '</i></span>';
			} elseif ($row->status_nilai == 'selesai') {
				$sub_array[] = '<span class="badge badge-success"><i>' . $row->status_nilai . '</i></span>';
			} elseif ($row->status_nilai == 'terkirim') {
				$sub_array[] = '<span class="badge badge-primary"><i>' . $row->status_nilai . '</i></span>';
			}

			if ($row->status_nilai == 'selesai') {
				$sub_array[] = '';
			} elseif ($row->status_nilai == 'terkirim') {
				$sub_array[] = '';
			} else {
				$sub_array[] =
					'<a href="#" id="' . $row->mahasiswa_id . '" class="text-primary edit mr-2" data-toggle="modal" title="Edit Nilai"><i class="fas fa-edit"></i></a>
				<a href="#" id="' . $row->mahasiswa_id . '" class="text-success kirim mr-2" data-toggle="modal" title="Kirim Nilai"><i class="fas fa-paper-plane"></i></a>';
			}
			$data[] = $sub_array;
		}

		$output = array(
			"draw"				=> intval($_POST['draw']),
			"recordsTotal"		=> $this->Nilai_model->get_all_data2(),
			"recordsFiltered"	=> $this->Nilai_model->get_filtered_data2(),
			"data"				=> $data
		);
		echo json_encode($output);
	}




	//   CRUD
	public function fetchSingleMahasiswa()
	{
		$output = array();
		$data = $this->Nilai_model->fetch_single($_POST["mahasiswa_id"]);
		foreach ($data as $row) {
			$output['nama_mahasiswa']		= $row->mahasiswa_nama;
			$output['npm']  				= $row->mahasiswa_npm;
			$output['jenis_kelamin']  		= $row->mahasiswa_jenis_kelamin;
		}
		echo json_encode($output);
	}

	public function fetchSingleNilai()
	{
		$output = array();
		$data = $this->Nilai_model->fetch_single_nilai($_POST["mahasiswa_id"]);
		foreach ($data as $row) {
			$output['nilai_angka']	= $row->nilai_angka;
			$output['nilai_huruf']	= $row->nilai_huruf;
			$output['keterangan']	= $row->keterangan;
		}
		echo json_encode($output);
	}

	public function inputNilai()
	{
		if ($_POST['action'] == 'Kirim') {
			$kirim_data = array(
				'mahasiswa_id'		=> $this->input->post('mahasiswa_id'),
				'nilai_angka'		=> $this->input->post('nilai_angka'),
				'nilai_huruf'		=> $this->input->post('nilai_huruf'),
				'keterangan'		=> $this->input->post('keterangan')
			);

			$update_data = array(
				'status_nilai'		=> 'draft',
			);

			$this->Nilai_model->insert_nilai($kirim_data);
			$this->Nilai_model->update_data($this->input->post('mahasiswa_id'), $update_data);
			echo "Nilai berhasil disimpan";
		}

		if ($_POST['action'] == 'Edit_nilai') {
			$update_data = array(
				'nilai_angka'		=> $this->input->post('nilai_angka'),
				'nilai_huruf'		=> $this->input->post('nilai_huruf'),
				'keterangan'		=> $this->input->post('keterangan')
			);
			$this->Nilai_model->update_data_nilai($this->input->post('mahasiswa_id'), $update_data);
			echo "Nilai berhasil diedit";
		}
	}

	public function kirimNilai()
	{
		$update_data = array(
			'status_nilai'		=> 'selesai',
		);
		$this->Nilai_model->kirim_nilai($_POST['id'], $update_data);
		echo "Nilai berhasil dikirim";
	}








	public function kirim_nilai()
	{
		$data['title'] = 'Kirim Nilai Mahasiswa';
		$data['user'] = $this->db->get_where('user', ['username' =>	$this->session->userdata('username')])->row_array();
		$data['periode'] = $this->Nilai_model->fetch_periode();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('pembimbing/kirim_nilai', $data);
		$this->load->view('templates/footer');
	}








	public function tugasmahasiswa()
	{
		$data['title'] = 'Tugas Mahasiswa';
		$data['user'] = $this->db->get_where('user', ['username' =>	$this->session->userdata('username')])->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('pembimbing/tugas_mahasiswa', $data);
		$this->load->view('templates/footer');
	}

	public function tabelTugasMahasiswa()
	{
		$fetch_data = $this->Nilai_model->make_datatables_tugas();
		$data = array();
		$no = $_POST['start'];
		foreach ($fetch_data as $row) {
			$no++;
			$sub_array = array();
			$sub_array[] = $no;
			$sub_array[] = $row->judul_tugas;
			$sub_array[] = '<div>'.$row->nama_akun.'<br>'.$row->institusi_nama.'</div>';
			$sub_array[] = $row->file;
			$sub_array[] = '<a href="#" class="btn btn-sm btn-primary lihat_nilai" id="' . $row->id . '" file="'.$row->file.'" data-toggle="modal"><i class="fas fa-search mr-1"></i>Lihat</a>';
			$data[] = $sub_array;
		}

		$output = array(
			"draw"				=> intval($_POST['draw']),
			"recordsTotal"		=> $this->Nilai_model->get_all_tugas(),
			"recordsFiltered"	=> $this->Nilai_model->get_filtered_tugas(),
			"data"				=> $data
		);
		echo json_encode($output);
	}

	public function updateStatusTugas()
	{
		$status = [
			'status' => 2
		];
		$this->Nilai_model->update_status_tugas($_POST['id'], $status);		
	}
	// END PEMBIMBING
}
