<?php

class Registrasi extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
	}

	// REGISTRASI INSTITUSI
	public function institusi()
	{
		$data['title'] = 'Registrasi Ins. Pendidikan';
		$data['institusi'] = $this->Registrasi_model->fetch_institusi();
		$data['pembimbing'] = $this->Registrasi_model->fetch_pembimbing();
		$data['user'] = $this->db->get_where('user', ['username' =>
		$this->session->userdata('username')])->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('registrasi/index', $data);
		$this->load->view('templates/footer');
	}

	public function fetchSingleNamaInstitusi()
	{
		$output = array();
		$data = $this->Registrasi_model->fetch_single_nama_institusi($_POST["keterangan"]);
		foreach ($data as $row) {
			$output['keterangan']   = $row->institusi_nama;
		}
		echo json_encode($output);
	}

	public function inputUser()
	{
		$password = $this->input->post('password', true);

		if ($_POST['btn_action'] == 'Submit_institusi') {
			$insert_data = array(
				'role_id'		=> 4,
				'institusi_id'	=> $this->input->post('nama_institusi'),
				'keterangan'	=> $this->input->post('keterangan'),
				'username'		=> $this->input->post('username', true),
				'password'		=> password_hash($password, PASSWORD_DEFAULT),
				'nama_akun'		=> $this->input->post('nama_akun'),
				'image'			=> 'default.png',
				'is_active'		=> 'Tidak Aktif',
				'date_created'	=> time()
			);
			$this->Registrasi_model->registrasi($insert_data);
			echo "Registrasi berhasil";
		}

		if ($_POST['btn_action'] == 'Edit_username') {
			$update_data = array(
				'username'		=> $this->input->post('username'),
				'nama_akun'		=> $this->input->post('nama_akun'),
			);
			$this->Registrasi_model->update_registrasi($this->input->post('user_id'), $update_data);
			echo "Update data berhasil";
		}

		if ($_POST['btn_action'] == 'Approve_user') {
			$update_data = array(
				'is_active'		=> $this->input->post('status'),
			);
			$this->Registrasi_model->update_registrasi($this->input->post('user_id'), $update_data);
			echo "Status berhasil diubah";
		}
	}


	public function tabelRegistrasi()
	{
		$fetch_data = $this->Registrasi_model->make_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($fetch_data as $row) {
			$no++;
			$sub_array = array();
			$sub_array[] = $no;
			$sub_array[] = $row->username;
			$sub_array[] = $row->nama_akun;
			$sub_array[] = $row->keterangan;
			if ($row->is_active == 'Aktif') {
				$sub_array[] = '<span class="badge badge-success"><i>' . $row->is_active . '</i></span>';
			} else {
				$sub_array[] = '<span class="badge badge-danger"><i>' . $row->is_active . '</i></span>';
			}
			$sub_array[] = '<a href="#" id="' . $row->id . '" class="text-perimary update" data-toggle="modal" data-target="#approveModal title="Edit"><i class="fas fa-check-circle"></i></a>';
			$data[] = $sub_array;
		}

		$output = array(
			"draw"				=> intval($_POST['draw']),
			"recordsTotal"		=> $this->Registrasi_model->get_all_data(),
			"recordsFiltered"	=> $this->Registrasi_model->get_filtered_data(),
			"data"				=> $data
		);
		echo json_encode($output);
	}

	public function tabelRegistrasiSupervisor()
	{
		$fetch_data = $this->Registrasi_model->make_datatables3();
		$data = array();
		$no = $_POST['start'];
		foreach ($fetch_data as $row) {
			$no++;
			$sub_array = array();
			$sub_array[] = $no;
			$sub_array[] = $row->username;
			$sub_array[] = $row->nama_akun;
			$sub_array[] = $row->keterangan;
			if ($row->is_active == 'Aktif') {
				$sub_array[] = '<span class="badge badge-success"><i>' . $row->is_active . '</i></span>';
			} else {
				$sub_array[] = '<span class="badge badge-danger"><i>' . $row->is_active . '</i></span>';
			}
			$sub_array[] = '<a href="#" id="' . $row->id . '" class="text-perimary update" data-toggle="modal" data-target="#approveModal title="Edit"><i class="fas fa-check-circle"></i></a>';
			$data[] = $sub_array;
		}

		$output = array(
			"draw"				=> intval($_POST['draw']),
			"recordsTotal"		=> $this->Registrasi_model->get_all_data3(),
			"recordsFiltered"	=> $this->Registrasi_model->get_filtered_data3(),
			"data"				=> $data
		);
		echo json_encode($output);
	}

	public function fetchSingleInstitusi()
	{
		$output = array();
		$data = $this->Registrasi_model->fetch_single($_POST["user_id"]);

		foreach ($data as $row) {
			$output['username']   			= $row->username;
			$output['nama_akun']  			= $row->nama_akun;
			$output['status']        		= $row->is_active;
		}
		echo json_encode($output);
	}
	// END REGISTRASI INSTITUSI







	// REGISTRASI PEMBIMBING
	public function pembimbing()
	{
		$data['title'] = 'Registrasi Pembimbing';
		$data['institusi'] = $this->Registrasi_model->fetch_institusi();
		$data['pembimbing'] = $this->Registrasi_model->fetch_pembimbing();
		$data['user'] = $this->db->get_where('user', ['username' =>
		$this->session->userdata('username')])->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('registrasi/registrasi_pembimbing', $data);
		$this->load->view('templates/footer');
	}

	public function tabelPembimbing()
	{
		$fetch_data = $this->Registrasi_model->make_datatables2();
		$data = array();
		$no = $_POST['start'];
		foreach ($fetch_data as $row) {
			$no++;
			$sub_array = array();
			$sub_array[] = $no;
			$sub_array[] = $row->username;
			$sub_array[] = $row->nama_akun;
			// $sub_array[] = $row->keterangan;
			if ($row->is_active == 'Aktif') {
				$sub_array[] = '<span class="badge badge-success"><i>' . $row->is_active . '</i></span>';
			} else {
				$sub_array[] = '<span class="badge badge-danger"><i>' . $row->is_active . '</i></span>';
			}
			$sub_array[] = '<a href="#" id="' . $row->id . '" class="text-perimary update" data-toggle="modal" data-target="#approveModal title="Edit"><i class="fas fa-check-circle"></i></a>';
			$data[] = $sub_array;
		}

		$output = array(
			"draw"				=> intval($_POST['draw']),
			"recordsTotal"		=> $this->Registrasi_model->get_all_data2(),
			"recordsFiltered"	=> $this->Registrasi_model->get_filtered_data2(),
			"data"				=> $data
		);
		echo json_encode($output);
	}


	public function inputPembimbing()
	{
		$password = $this->input->post('password', true);

		if ($_POST['btn_action'] == 'Submit_pembimbing') {
			$insert_data = array(
				'role_id'		=> 3,
				'username'		=> $this->input->post('username', true),
				'password'		=> password_hash($password, PASSWORD_DEFAULT),
				'institusi_id'		=> $this->input->post('nama_pembimbing', true),
				'nama_akun'		=> $this->input->post('nama_akun'),
				'image'			=> 'default.png',
				'is_active'		=> 'Tidak Aktif',
				'keterangan'	=> 'Pembimbing Klinik',
				'date_created'	=> time()
			);
			$this->Registrasi_model->registrasi($insert_data);
			echo "Registrasi berhasil";
		}

		if ($_POST['btn_action'] == 'Edit_username') {
			$update_data = array(
				'username'		=> $this->input->post('username'),
				'nama_akun'		=> $this->input->post('nama_akun'),
			);
			$this->Registrasi_model->update_registrasi($this->input->post('user_id'), $update_data);
			echo "Update data berhasil";
		}

		if ($_POST['btn_action'] == 'Approve_user') {
			$update_data = array(
				'is_active'		=> $this->input->post('status'),
			);
			$this->Registrasi_model->update_registrasi($this->input->post('user_id'), $update_data);
			echo "Status berhasil diubah";
		}
	}
	// END REGISTRASI PEMBIMBING













	public function mahasiswa()
	{
		$data['title'] = 'Registrasi Mahasiswa';
		$data['institusi'] = $this->db->select('institusi_id, institusi_nama')->get('institusi')->result();
		// $data['pembimbing'] = $this->Registrasi_model->fetch_pembimbing();
		$data['user'] = $this->db->get_where('user', ['username' =>
		$this->session->userdata('username')])->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('registrasi/registrasi_mahasiswa', $data);
		$this->load->view('templates/footer');
	}

	public function tabelMahasiswa()
	{
		$fetch_data = $this->Registrasi_model->make_datatables_mahasiswa();
		$data = array();
		$no = $_POST['start'];
		foreach ($fetch_data as $row) {
			$no++;
			$sub_array = array();
			$sub_array[] = $no;
			$sub_array[] = $row->username;
			$sub_array[] = $row->nama_akun;
			if ($row->is_active == 'Aktif') {
				$sub_array[] = '<span class="badge badge-success"><i>' . $row->is_active . '</i></span>';
			} else {
				$sub_array[] = '<span class="badge badge-danger"><i>' . $row->is_active . '</i></span>';
			}
			$sub_array[] = '<a href="#" id="' . $row->id . '" username="' . $row->username . '"nama_akun="'.$row->nama_akun.'" institusi="'.$row->institusi_id.'"class="text-perimary update" data-toggle="modal" data-target="#approveModal title="Edit"><i class="fas fa-check-circle"></i></a>';
			$data[] = $sub_array;
		}

		$output = array(
			"draw"				=> intval($_POST['draw']),
			"recordsTotal"		=> $this->Registrasi_model->get_all_data_mahasiswa(),
			"recordsFiltered"	=> $this->Registrasi_model->get_filtered_data_mahasiswa(),
			"data"				=> $data
		);
		echo json_encode($output);
	}

	public function inputMahasiswa()
	{
		$password = $this->input->post('password', true);

		if ($_POST['btn_action'] == 'Submit_mahasiswa') {
			$insert_data = array(
				'role_id'		=> 5,
				'username'		=> $this->input->post('nim'),
				'password'		=> password_hash($password, PASSWORD_DEFAULT),
				'institusi_id'		=> $this->input->post('nama_institusi'),
				'nama_akun'		=> $this->input->post('nama_akun'),
				'is_active'		=> 'Aktif',
				'image'			=> 'default.png',
				'date_created'	=> time()
			);
			$this->Registrasi_model->registrasi($insert_data);
			echo "Registrasi Mahasiswa berhasil";
		}

		if ($_POST['btn_action'] == 'Edit_username') {
			$update_data = array(
				'username'		=> $this->input->post('nim'),
				'password'		=> password_hash($password, PASSWORD_DEFAULT),
				'institusi_id'		=> $this->input->post('nama_institusi'),
				'nama_akun'		=> $this->input->post('nama_akun'),
			);
			$this->Registrasi_model->update_registrasi($this->input->post('user_id'), $update_data);
			echo "Update Akun Mahasiswa berhasil";
		}

		if ($_POST['btn_action'] == 'Approve_user') {
			$update_data = array(
				'is_active'		=> $this->input->post('status'),
			);
			$this->Registrasi_model->update_registrasi($this->input->post('user_id'), $update_data);
			echo "Status berhasil diubah";
		}
	}
}
