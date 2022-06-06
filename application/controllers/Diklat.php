<?php 

class Diklat extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();	
		is_logged_in();
		// $this->load->library('pdf');
	}


	// INSTITUSI
	public function institusi()
	{
		$data['title'] = 'Institusi Pendidikan';
		$data['user'] = $this->db->get_where('user', ['username' =>	$this->session->userdata('username')])->row_array();
				
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('institusi/index', $data);
		$this->load->view('templates/footer');
	}

	public function dataInstitusi()
	{
		$fetch_data = $this->Institusi_model->make_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($fetch_data as $row) 
		{
			$no++;
			$sub_array = array();
			$sub_array[] = $no;
			$sub_array[] = $row->institusi_nama;
			$sub_array[] = $row->institusi_status;
			$sub_array[] = $row->tanggal_mou;
			$sub_array[] = '	
				<a href="#" id="'.$row->institusi_id.'" class="text-primary details mr-2" data-toggle="modal" title="Details"><i class="fas fa-info-circle"></i></a>
				<a href="#" id="'.$row->institusi_id.'" class="text-primary update mr-2"data-toggle="modal" title="Edit"><i class="fas fa-edit"></i></a>
				<a href="#" id="'.$row->institusi_id.'" class="text-danger delete mr-2" data-toggle="modal" title="Hapus"><i class="fas fa-trash-alt"></i></a>
				';
			$data[] = $sub_array;					
		}

		$output = array(
			"draw"				=> intval($_POST['draw']),
			"recordsTotal"		=> $this->Institusi_model->get_all_data(),
			"recordsFiltered"	=> $this->Institusi_model->get_filtered_data(),
			"data"				=> $data
		);
		echo json_encode($output);
	}

	public function inputInstitusi()
	{
		if ($_POST['btn_action'] == 'Tambah') 
		{			
			$insert_data = array(
				'institusi_nama'			=>$this->input->post('nama_institusi'),
				'institusi_no_akreditasi'	=>$this->input->post('no_akreditasi'),
				'institusi_tahun_akreditasi'=>$this->input->post('tahun_akreditasi'),
				'institusi_status'			=>$this->input->post('status'),
				'institusi_alamat'			=>$this->input->post('alamat'),
				'institusi_telepon'			=>$this->input->post('telepon'),
				'tanggal_mou'				=>$this->input->post('tanggal_mou'),
				'email'						=>$this->input->post('email')
			);
			$this->Institusi_model->input_institusi($insert_data);
			echo "Data behasil ditambahkan";
		}

		if ($_POST['btn_action'] == 'Edit') 
		{		
			$update_data = array(
				'institusi_nama'			=>$this->input->post('nama_institusi'),
				'institusi_no_akreditasi'	=>$this->input->post('no_akreditasi'),
				'institusi_tahun_akreditasi'=>$this->input->post('tahun_akreditasi'),
				'institusi_status'			=>$this->input->post('status'),
				'institusi_alamat'			=>$this->input->post('alamat'),
				'institusi_telepon'			=>$this->input->post('telepon'),
				'tanggal_mou'				=>$this->input->post('tanggal_mou'),
				'email'						=>$this->input->post('email')
			);
			$this->Institusi_model->update_institusi($this->input->post('institusi_id'), $update_data);
			echo "Data berhasil diubah";
		}
	}

	public function fetchSingleInstitusi()
	{
		$output = array();
		$data = $this->Institusi_model->fetch_single($_POST["institusi_id"]);
		foreach ($data as $row) 
		{
		$output['nama_institusi']   = $row->institusi_nama;
		$output['no_akreditasi']  	= $row->institusi_no_akreditasi;
		$output['tahun_akreditasi'] = $row->institusi_tahun_akreditasi;      
		$output['status']        	= $row->institusi_status;      
		$output['alamat']        	= $row->institusi_alamat;      
		$output['telepon']        	= $row->institusi_telepon;      
		$output['email']        	= $row->email;      
		$output['tanggal_mou']      = $row->tanggal_mou;      
		}
		echo json_encode($output);	
	}

	public function deleteInstitusi()
	{
		$this->Institusi_model->delete_single_user($_POST['institusi_id']);
		echo "Data berhasil dihapus";
	}
	// END INSTITUSI














  // JURUSAN
  public function jurusan()
	{
		$data["title"] 	= "Jurusan";
		$data['user'] 	= $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('jurusan/index');
        $this->load->view('templates/footer');
	}

  // DataTables
	public function dataJurusan()
	{    	       
		$fetch_data = $this->Jurusan_model->make_datatables();  
		$data = array();       
		$no = $_POST['start'];

		foreach($fetch_data as $row)  
		{  
			$no++;
			$sub_array = array();                                   
			$sub_array[] = $no;  
			$sub_array[] = $row->jurusan_nama;  
			$sub_array[] = $row->jurusan_supervisi;  
			$sub_array[] = $row->jurusan_pin;  
			$sub_array[] = '
				<a href="#" id="'.$row->jurusan_id.'" class="text-primary update mr-2" data-toggle="modal" title="Edit"><i class="fas fa-edit"></i></a>  
				<a href="#" id="'.$row->jurusan_id.'" class="text-danger delete mr-2" data-toggle="modal" title="Hapus"><i class="fas fa-trash-alt"></i></a>
				';      
			$data[] = $sub_array;
		}
		$output = array(  
			"draw"              =>  intval($_POST["draw"]),  
			"recordsTotal"      =>  $this->Jurusan_model->get_all_data(),  
			"recordsFiltered"   =>  $this->Jurusan_model->get_filtered_data(),  
			"data"              =>  $data        
			);  
		echo json_encode($output);  
	}

  // Tambah dan Edit Jurusan
  public function inputJurusan()
  {
    if ($_POST['btn_action'] == 'Tambah')
    {
      $insert_data = array(
          'jurusan_nama'        => $this->input->post('jurusan'),
          'jurusan_supervisi'   => $this->input->post('supervisi'),
          'jurusan_pin'         => $this->input->post('pin')
        );
      $this->Jurusan_model->input_jurusan($insert_data);
      echo "Data berhasil ditambahkan";
    }
    

    if ($_POST['btn_action'] == 'Edit')
    {      
      $update_data = array(
        'jurusan_nama'      => $this->input->post('jurusan'),
        'jurusan_supervisi' => $this->input->post('supervisi'),
        'jurusan_pin'       => $this->input->post('pin'),
      );
      $this->Jurusan_model->update_jurusan($this->input->post('jurusan_id'), $update_data);
      echo "Data Berhasil diubah!";
    }        
  }

  public function deleteJurusan()
  {
    $this->Jurusan_model->delete_single_user($_POST['jurusan_id']);
    echo "Data berhasil dihapus";
  }

  // Ambil 1 data jurusan
  public function fetchSingleJurusan()
  {
    $output = array();
    $data = $this->Jurusan_model->fetch_single($_POST["user_id"]);
    foreach ($data as $row) 
    {
      $output['jurusan']    = $row->jurusan_nama;
      $output['supervisi']  = $row->jurusan_supervisi;
      $output['pin']        = $row->jurusan_pin;      
    }
    echo json_encode($output);
  }
  // END JURUSAN















  // PEMBIMBING
  public function pembimbing()
	{
		$data['title'] = 'Pembimbing';
		$data['user'] = $this->db->get_where('user', ['username' =>  $this->session->userdata('username')])->row_array();
		$data['ruangan'] = $this->Pembimbing_model->fetch_ruangan();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('pembimbing/index', $data);
		$this->load->view('templates/footer');
	}

	
	public function dataPembimbing()
	{
		$fetch_data = $this->Pembimbing_model->make_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($fetch_data as $row) 
		{
			$no++;
			$sub_array = array();
			$sub_array[] = $no;
			$sub_array[] = $row->pembimbing_nama;				
			$sub_array[] = $row->ruangan_nama;				
			$sub_array[] = '
				<a href="#" id="'.$row->pembimbing_id.'" class="text-primary details mr-2" data-toggle="modal" title="Detail"><i class="fas fa-info-circle"></i></a>
				<a href="#" id="'.$row->pembimbing_id.'" class="text-primary update mr-2" data-toggle="modal" title="Edit"><i class="fas fa-edit"></i></a>
				<a href="#" id="'.$row->pembimbing_id.'" class="text-danger delete mr-2" data-toggle="modal" title="Hapus"><i class="fas fa-trash-alt"></i></a>
				';
			$data[] = $sub_array;					
		}

		$output = array(
			"draw"				=> intval($_POST['draw']),
			"recordsTotal"		=> $this->Pembimbing_model->get_all_data(),
			"recordsFiltered"	=> $this->Pembimbing_model->get_filtered_data(),
			"data"				=> $data
		);
		echo json_encode($output);
	}

	// CRUD
	public function inputPembimbing()
	{
		if ($_POST['btn_action'] == 'Tambah') 
		{			
			$insert_data = array(
				'ruangan_id'			=>$this->input->post('ruangan'),		
				'pembimbing_nama'		=>$this->input->post('nama_pembimbing'),		
				'pembimbing_nip'		=>$this->input->post('nip'),		
				'pembimbing_jabatan'	=>$this->input->post('jabatan'),		
				'pembimbing_pangkat'	=>$this->input->post('pangkat'),		
				'pembimbing_pendidikan'	=>$this->input->post('pendidikan'),		
			);
			$this->Pembimbing_model->input_pembimbing($insert_data);
			echo "Data behasil ditambahkan";
		}

		if ($_POST['btn_action'] == 'Edit') 
		{		
			$update_data = array(
				'ruangan_id'			=>$this->input->post('ruangan'),		
				'pembimbing_nama'		=>$this->input->post('nama_pembimbing'),		
				'pembimbing_nip'		=>$this->input->post('nip'),		
				'pembimbing_jabatan'	=>$this->input->post('jabatan'),		
				'pembimbing_pangkat'	=>$this->input->post('pangkat'),		
				'pembimbing_pendidikan'	=>$this->input->post('pendidikan'),		
			);
			$this->Pembimbing_model->update_pembimbing($this->input->post('pembimbing_id'), $update_data);
			echo "Data berhasil diubah";
		}
	}

	public function fetchSinglePembimbing()
	{
		$output = array();
		$data = $this->Pembimbing_model->fetch_single($_POST["pembimbing_id"]);
		foreach ($data as $row) 
		{
		$output['nama_pembimbing']  = $row->pembimbing_nama;
		$output['ruangan']  		= $row->ruangan_id;
		$output['nip'] 				= $row->pembimbing_nip;      
		$output['jabatan']        	= $row->pembimbing_jabatan;      
		$output['pangkat']        	= $row->pembimbing_pangkat;      
		$output['pendidikan']      	= $row->pembimbing_pendidikan;      
		}
		echo json_encode($output);
	}

	public function deletePembimbing()
	{
		$this->Pembimbing_model->delete_single_user($_POST['pembimbing_id']);
   		echo "Data berhasil dihapus";
	}
	// END PEMBIMBING
















	// RUANGAN
	public function ruangan()
	{
		$data['title'] = 'Ruangan';
		$data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('ruangan/index');
		$this->load->view('templates/footer');
	}

	public function dataRuangan()
	{
		$fetch_data = $this->Ruangan_model->make_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($fetch_data as $row) 
		{
			$no++;
			$sub_array = array();
			$sub_array[] = $no;
			$sub_array[] = $row->ruangan_nama;
			$sub_array[] = '
				<a href="#" id="'.$row->ruangan_id.'" class="text-primary update mr-2" data-toggle="modal" title="Edit"><i class="fas fa-edit"></i></a>
				<a href="#" id="'.$row->ruangan_id.'" class="text-danger delete mr-2" data-toggle="modal" title="Hapus"><i class="fas fa-trash-alt"></i></a>
				';
			$data[] = $sub_array;					
		}

		$output = array(
				"draw"				=> intval($_POST['draw']),
				"recordsTotal"		=> $this->Ruangan_model->get_all_data(),
				"recordsFiltered"	=> $this->Ruangan_model->get_filtered_data(),
				"data"				=> $data
		);
		echo json_encode($output);
	}


	// CRUD
	public function inputRuangan()
	{
		if ($_POST['btn_action'] == 'Tambah') 
		{			
			$insert_data = array(
					'ruangan_nama'	=>$this->input->post('nama_ruangan'),		
			);
			$this->Ruangan_model->input_institusi($insert_data);
			echo "Data behasil ditambahkan";
		}

		if ($_POST['btn_action'] == 'Edit') 
		{		
			$update_data = array(
				'ruangan_nama'	=>$this->input->post('nama_ruangan'),
			);
			$this->Ruangan_model->update_institusi($this->input->post('ruangan_id'), $update_data);
			echo "Data berhasil diubah";
		}
	}


	public function fetchSingleRuangan()
	{
		$output = array();
		$data = $this->Ruangan_model->fetch_single($_POST["ruangan_id"]);
		foreach ($data as $row) 
			{
			$output['nama_ruangan']   = $row->ruangan_nama;            
			}
		echo json_encode($output);
	}


	public function deleteRuangan()
	{
		$this->Ruangan_model->delete_single_user($_POST['ruangan_id']);
    	echo "Data berhasil dihapus";
	}
	// END RUANGAN






















	// DASHBOARD JADWAL DIKLAT
	public function dashboard()
	{
		$data['title'] = 'Jadwal Diklat';
		$data['user'] = $this->db->get_where('user', ['username' =>
		$this->session->userdata('username')])->row_array();
		$data['old_pdf'] = $this->input->post('file');

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('dashboard_diklat/diklat_jadwal', $data);
		$this->load->view('templates/footer');
	}

	public function dataJadwal()
	{
		$fetch_data = $this->Dashboard_diklat_model->make_datatables();
		$data = array();	
		$no = $_POST['start'];
		foreach ($fetch_data as $row) 
		{
			$no++;
			$sub_array = array();
			$sub_array[] = $no;
			$sub_array[] = $row->institusi_nama;
			$sub_array[] = $row->jadwal_nama;
			$sub_array[] = $row->jadwal_mulai;
			$sub_array[] = $row->jadwal_akhir;
			if ($row->jadwal_status == 'draft') 
			{
				$sub_array[] = '<span class="badge badge-secondary"><i>'.$row->jadwal_status.'</i></span>';									
			}
			elseif ($row->jadwal_status == 'terkirim') 
			{
				$sub_array[] = '<span class="badge badge-warning"><i>'.$row->jadwal_status.'</i></span>';
			}
			elseif ($row->jadwal_status == 'approved') 
			{
				$sub_array[] = '<span class="badge badge-success"><i>'.$row->jadwal_status.'</i></span>';
			}
			$sub_array[] = '<center>'.$row->volume.'</center>';					
			$sub_array[] = '
				<a href="#" id="'.$row->jadwal_id.'" class="text-primary approve mr-2" data-toggle="modal" title="Approval Jadwal"><i class="fas fa-check-circle"></i></a>
				<a href="#" id="'.$row->jadwal_id.'" class="text-danger details mr-2" data-toggle="modal" title="Batalkan Jadwal"><i class="fas fa-times-circle"></i></a>
				';				
			$data[] = $sub_array;					
		}

		$output = array(
			"draw"				=> intval($_POST['draw']),
			"recordsTotal"		=> $this->Dashboard_diklat_model->get_all_data(),
			"recordsFiltered"	=> $this->Dashboard_diklat_model->get_filtered_data(),
			"data"				=> $data
		);
		echo json_encode($output);
	}

	public function dataJadwalAdmin()
	{
		$fetch_data = $this->Dashboard_diklat_model->make_datatables();
		$data = array();	
		$no = $_POST['start'];
		foreach ($fetch_data as $row) 
		{
			$no++;
			$sub_array = array();
			$sub_array[] = $no;
			$sub_array[] = $row->institusi_nama;
			$sub_array[] = $row->jadwal_nama;
			$sub_array[] = $row->jadwal_mulai;
			$sub_array[] = $row->jadwal_akhir;
			if ($row->jadwal_status == 'draft') 
			{
				$sub_array[] = '<span class="badge badge-secondary"><i>'.$row->jadwal_status.'</i></span>';									
			}
			elseif ($row->jadwal_status == 'terkirim') 
			{
				$sub_array[] = '<span class="badge badge-warning"><i>'.$row->jadwal_status.'</i></span>';
			}
			elseif ($row->jadwal_status == 'approved') 
			{
				$sub_array[] = '<span class="badge badge-success"><i>'.$row->jadwal_status.'</i></span>';
			}
			$sub_array[] = '<center>'.$row->volume.'</center>';				
			$sub_array[] = '
				<a href="#" id="'.$row->jadwal_id.'" class="text-primary approve mr-2" data-toggle="modal" title="Approval Jadwal"><i class="fas fa-info-circle"></i></a>
				<a href="#" id="'.$row->jadwal_id.'" class="text-success upload_nilai mr-2" data-toggle="modal" title="Upload Nilai"><i class="fas fa-upload"></i></a>
				
				';				
			$data[] = $sub_array;					
		}

		$output = array(
			"draw"				=> intval($_POST['draw']),
			"recordsTotal"		=> $this->Dashboard_diklat_model->get_all_data(),
			"recordsFiltered"	=> $this->Dashboard_diklat_model->get_filtered_data(),
			"data"				=> $data
		);
		echo json_encode($output);
	}

	
	public function fetchSingleJadwal()
	{
		$output = array();
		$data = $this->Dashboard_model->fetch_single($_POST["jadwal_id"]);
		foreach ($data as $row) 
		{
		  $output['nama_jadwal']  	= $row->jadwal_nama;
		  $output['tanggal_mulai']  = $row->jadwal_mulai;
		  $output['tanggal_akhir'] 	= $row->jadwal_akhir;      
		  $output['status']        	= $row->jadwal_status;	            
		  $output['nama']        	= $row->mahasiswa_nama;	      
		  $output['npm']        	= $row->mahasiswa_npm;	      
		  $output['jk']        		= $row->mahasiswa_jenis_kelamin;	      
		  $output['praktek']        = $row->mahasiswa_jenis_praktek;	      
		  $output['file']        	= $row->file;	      
				
		}
		echo json_encode($output);
	}
	

	public function dataMahasiswaDashboard()
	{
		$fetch_data = $this->Dashboard_model->make_datatables2();
		$data = array();	
		$no = $_POST['start'];
		foreach ($fetch_data as $row) 
		{
			$no++;
			$sub_array = array();
			$sub_array[] = $no;
			$sub_array[] = $row->mahasiswa_nama;
			$sub_array[] = $row->mahasiswa_npm;
			$sub_array[] = $row->mahasiswa_jenis_kelamin;
			
			$data[] = $sub_array;					
		}

		$output = array(
			"data"				=> $data
		);
		echo json_encode($output);
	}


	public function kirimJadwal()
	{
		if ($_POST['action'] == 'Kirim') 
		{			
			$kirim_data = array(
				'jadwal_status'		=> 'terkirim'	
			);
			$this->Dashboard_model->kirim_data_jadwal($this->input->post('jadwal_id'), $kirim_data);
			echo "Jadwal telah behasil dikirim";
		}
	}

	public function deleteJadwal()
	{
		$this->Dashboard_model->delete_single_user_jadwal($_POST['jadwal_id']);
		$this->Dashboard_model->delete_mahasiswa($_POST['jadwal_id']);		
		echo "Data Jadwal berhasil dihapus";
	}

	public function uploadNilai()
	{
		
	    // $data = $this->Dashboard_model->fetch_upload($this->input->post('jadwal_id'));

		$config['upload_path']          = './assets/documents/nilaimahasiswa/';
		$config['allowed_types']        = 'pdf';
		$config['max_size']             = '1024'; // 1024KB


        $this->load->library('upload', $config);
		if ($this->upload->do_upload('file_nilai')) 
		{

            $old_file = $this->input->post('dokumen');
            if ($old_file != '') {
                unlink(FCPATH .'assets/documents/nilaimahasiswa/'. $old_file);
            }
  
            } else {
				echo "Jadwal gagal dikirim, pastikan ukuran dan format file benar (PDF Max. 1 MB)";
				return false;
        } 
			
		if ($_POST['action_nilai'] == 'Kirim') {

			
			$kirim_data = array(
				
				'file' 				=> $this->upload->data("file_name"),
				'type'				=> $this->upload->data('file_ext'),
				'size' 				=> $this->upload->data('file_size'),
				'jadwal_id' 		=> $this->input->post('nilai_jadwal_id')
			);	
			$this->Mahasiswa_model->nilai_mahasiswa($kirim_data);
			// $old_pdf = $this->input->post('dokumen');
			// unlink(FCPATH .'assets/documents/suratpengantar/'.$this->input->post('dokumen'));
			echo "Nilai berhasil diupload";
		}
			
	}
	// END DASHBOARD

















	// KUOTA DIKLAT
	public function kuota()
	{
		$data['title'] = 'Kalender Diklat';
		$data['user'] = $this->db->get_where('user', ['username' =>
		$this->session->userdata('username')])->row_array();
			
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('dashboard_diklat/kuota');
		$this->load->view('templates/footer');
	}

	public function inputKuota()
	{
		if ($_POST['btn_action'] == 'Tambah') 
		{	
		
			$insert_data = array(
				'id_bulan'		=>$this->input->post('bulan'),		
				'tanggal_mulai'	=>$this->input->post('tanggal_mulai'),		
				'tanggal_akhir'	=>$this->input->post('tanggal_akhir'),		
				'kuota'			=>$this->input->post('kuota'),		
			);
			$this->Dashboard_diklat_model->input_kuota($insert_data);
			echo "Data behasil ditambahkan";
		}
	}

	function loadcalendar()
	{
		$event_data = $this->Fullcalendar_model->fetch_all_event();
		foreach($event_data->result_array() as $row)
		{
			$data[] = array(
				'id'	=>	$row['id'],
				'title'	=>	$row['title'],
				'start'	=>	$row['start_event'],
				'end'	=>	$row['end_event']
			);
		}
		echo json_encode($data);
	}

	function insertcalendar()
	{
		if($this->input->post('title'))
		{
			$data = array(
				'title'			=>	$this->input->post('title'),
				'start_event'	=>	$this->input->post('start'),
				'end_event'		=>	$this->input->post('end')
			);
			$this->Fullcalendar_model->insert_event($data);
		}
	}

	function updatecalendar()
	{
		if($this->input->post('id'))
		{
			$data = array(
				'title'			=>	$this->input->post('title'),
				'start_event'	=>	$this->input->post('start'),
				'end_event'		=>	$this->input->post('end')
			);

			$this->Fullcalendar_model->update_event($data, $this->input->post('id'));
		}
	}

	function deletecalendar()
	{
		if($this->input->post('id'))
		{
			$this->Fullcalendar_model->delete_event($this->input->post('id'));
		}
	}










	// KELOMPOK
	public function kelompok()
	{
		$data['title'] = 'Pembagian Kelompok';
		$data['user'] = $this->db->get_where('user', ['username' =>	$this->session->userdata('username')])->row_array();
		$id = $this->input->post('id_ruangan');
		$data['ruangan'] = $this->Dashboard_diklat_model->fetch_ruangan();
		$data['institusi'] = $this->Dashboard_diklat_model->fetch_institusi();
		$data['periode'] = $this->Dashboard_diklat_model->fetch_periode();

		
			
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('dashboard_diklat/kelompok', $data);
		$this->load->view('templates/footer');
	}

	public function getPembimbing()
	{
		$id=$this->input->post('id');
		$data=$this->Dashboard_diklat_model->fetch_pembimbing($id);
		echo json_encode($data);
	}

	public function getJadwal()
	{
		$id=$this->input->post('id');
		$data=$this->Dashboard_diklat_model->fetch_jadwal($id);
		echo json_encode($data);
	}

	public function getMahasiswa()
	{
		$id=$this->input->post('id');
		$data=$this->Dashboard_diklat_model->fetch_mahasiswa($id);
		echo json_encode($data);
	}

	public function inputKelompok()
	{
		$insert_data = array(
			'periode_id'		=>$this->input->post('periode'),
			'institusi_id'		=>$this->input->post('institusi'),
			'jadwal_id'			=>$this->input->post('jadwal'),
			'kelompok_nama'		=>$this->input->post('kelompok'),
			'ruangan_id'		=>$this->input->post('ruangan'),
			'pembimbing_id'		=>$this->input->post('pembimbing'),
			'mahasiswa_id'		=>$this->input->post('mahasiswa'),
			'status_nilai'		=>'belum dibuat'
		);
		$this->Kelompok_model->input_kelompok($insert_data);
		echo "Data Mahasiswa berhasil ditambahkan";
	}

	public function inputPeriode()
	{
		$insert_data = array(
			'periode_nama'		=>$this->input->post('periode_modal'),
			'status'			=>'belum dibuat'
			);
		$this->Kelompok_model->input_periode($insert_data);
		echo "Periode berhasil ditambahkan";
	}

	

	public function deleteKelompok()
	{
		$this->Kelompok_model->delete_single_user($_POST['kelompok_id']);
		echo "Data berhasil dihapus";
	}

	public function dataKelompok()
	{
		$fetch_data = $this->Kelompok_model->make_datatables();
		$data = array();	
		$no = $_POST['start'];
		foreach ($fetch_data as $row) 
		{
			$no++;
			$sub_array = array();
			$sub_array[] = $no;
			$sub_array[] = $row->kelompok_nama;
			$sub_array[] = $row->mahasiswa_nama;
			$sub_array[] = $row->mahasiswa_npm;
			$sub_array[] = $row->mahasiswa_jenis_kelamin;
			$sub_array[] = $row->ruangan_nama;
			$sub_array[] = $row->pembimbing_nama;
			$sub_array[] = '
				<a href="#" id="'.$row->kelompok_id.'" class="text-danger delete mr-2" data-toggle="modal" title="Hapus"><i class="fas fa-trash-alt"></i></a>
				';				
			$data[] = $sub_array;					
		}

		$output = array(
			"draw"				=> intval($_POST['draw']),
			"recordsTotal"		=> $this->Kelompok_model->get_all_data(),
			"recordsFiltered"	=> $this->Kelompok_model->get_filtered_data(),
			"data"				=> $data
		);
		echo json_encode($output);
	}

	public function dataKelompokUraianTugas()
	{
		$fetch_data = $this->Kelompok_model->make_datatables();
		$data = array();	
		$no = $_POST['start'];
		foreach ($fetch_data as $row) 
		{
			$no++;
			$sub_array = array();
			$sub_array[] = $no;
			$sub_array[] = $row->kelompok_nama;
			$sub_array[] = $row->mahasiswa_nama;
			$sub_array[] = $row->mahasiswa_npm;
			$sub_array[] = $row->mahasiswa_jenis_kelamin;
			$sub_array[] = $row->ruangan_nama;
			$sub_array[] = $row->pembimbing_nama;
			$data[] = $sub_array;					
		}

		$output = array(
			"draw"				=> intval($_POST['draw']),
			"recordsTotal"		=> $this->Kelompok_model->get_all_data(),
			"recordsFiltered"	=> $this->Kelompok_model->get_filtered_data(),
			"data"				=> $data
		);
		echo json_encode($output);
	}
	// END KELOMPOK









	// URAIAN TUGAS
	public function kirim_mahasiswa()
	{
		$data['title'] = 'Kirim Mahasiswa';
		$data['user'] = $this->db->get_where('user', ['username' =>
		$this->session->userdata('username')])->row_array();
		$data['periode'] = $this->Dashboard_diklat_model->fetch_periode();
		
			
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('dashboard_diklat/uraian_tugas', $data);
		$this->load->view('templates/footer');
	}

	public function inputUraianTugas()
	{
		$insert_data = array(
			'periode_id'		=> $this->input->post('periode'),
			'keterangan'		=> $this->input->post('uraian_tugas')
		);

		$update_data = array(
			'status'			=> 'terkirim'			
		);
		
		$this->Kelompok_model->input_uraian_tugas($insert_data);
		$this->Kelompok_model->update_uraian_tugas($this->input->post('periode'), $update_data);
		echo "Data Mahasiswa berhasil dikirim ke Pembimbing";
	}

	public function fetchUraianTugas()
	{
		$output = array();
		$data = $this->Dashboard_diklat_model->fetch_single_tugas($_POST["id"]);
		foreach ($data as $row) 
		{
			$output['keterangan']   = $row->keterangan;			      
		}
		echo json_encode($output);
	}


	






	// NILAI MAHASISWA
	public function nilai_mahasiswa()
	{
		$data['title'] = 'Nilai Mahasiswa';
		$data['user'] = $this->db->get_where('user', ['username' =>	$this->session->userdata('username')])->row_array();
		$data['periode'] = $this->Dashboard_diklat_model->fetch_periode_all();	
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('dashboard_diklat/nilai_mahasiswa', $data);
		$this->load->view('templates/footer');
	}
	

	public function dataNilaiMahasiswa()
	{
    	$fetch_data = $this->Dashboard_diklat_model->make_datatables2();
		$data = array();	
		$no = $_POST['start'];
		foreach ($fetch_data as $row) 
		{
			$no++;
			$sub_array = array();
			$sub_array[] = $no;
			$sub_array[] = $row->mahasiswa_nama;
			$sub_array[] = $row->mahasiswa_npm;
			$sub_array[] = $row->mahasiswa_jenis_kelamin;
			$sub_array[] = $row->nilai_angka;
			$sub_array[] = $row->nilai_huruf;
			$sub_array[] = $row->keterangan;
			$sub_array[] = $row->pembimbing_nama;
			$sub_array[] = $row->institusi_nama;
			if ($row->status_nilai == 'belum dibuat') 
			{
				$sub_array[] = '<span class="badge badge-danger"><i>'.$row->status_nilai.'</i></span>';									
			}
			elseif ($row->status_nilai == 'draft') 
			{
				$sub_array[] = '<span class="badge badge-warning"><i>'.$row->status_nilai.'</i></span>';
			}
			elseif ($row->status_nilai == 'selesai') 
			{
				$sub_array[] = '<span class="badge badge-success"><i>'.$row->status_nilai.'</i></span>';
				$sub_array[] = '
				<a href="#" id="'.$row->mahasiswa_id.'" class="text-danger batal mr-2" data-toggle="modal" title="Batalkan Nilai"><i class="fas fa-times-circle"></i></a>
				<a href="#" id="'.$row->mahasiswa_id.'" class="text-success kirim mr-2" data-toggle="modal" title="Kirim Nilai"><i class="fas fa-paper-plane"></i></a>		
				';
			}
			elseif ($row->status_nilai == 'terkirim') 
			{
				$sub_array[] = '<span class="badge badge-primary"><i>'.$row->status_nilai.'</i></span>';
			}
			$sub_array[] = '';

			$data[] = $sub_array;					
		}

		$output = array(
			"draw"				=> intval($_POST['draw']),
			"recordsTotal"		=> $this->Dashboard_diklat_model->get_all_data2(),
			"recordsFiltered"	=> $this->Dashboard_diklat_model->get_filtered_data2(),
			"data"				=> $data
		);
		echo json_encode($output);
	 }

	 public function batalNilai()
	 {
		$update_data = array(
			'status_nilai'		=> 'draft'	
		);
		$this->Dashboard_diklat_model->batal_nilai($_POST['id'], $update_data);
		echo "Nilai telah dibatalkan";
	 }

	 public function kirimNilaiInstitusi()
	 {
		$update_data = array(
			'status_nilai'		=> 'terkirim'	
		);
		$this->Dashboard_diklat_model->kirim_nilai_institusi($_POST['id'], $update_data);
		echo "Nilai berhasil dikirim";
	 }
}
