<?php 

class Institusi extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		// is_logged_in();
		//  $this->load->library('pdf');
	}

	// SCHEDULE
	public function schedule()
	{
		$data['title'] = 'Buat Jadwal';	
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['institusi'] = $this->db->get_where('institusi', ['institusi_id' => $this->input->post('institusi_id')])->row_array();
		

		$this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
		$this->load->view('schedule/index', $data);
		$this->load->view('templates/footer');	
	}

	public function inputJadwal()
	{					
		$insert_jadwal = array(
			'institusi_id'	=> $this->input->post('institusi_id'),		
			'jadwal_nama'	=> $this->input->post('nama_jadwal'),		
			'username'		=> $this->input->post('username'),		
			'jadwal_mulai'	=> $this->input->post('tanggal_mulai'),		
			'jadwal_akhir'	=> $this->input->post('tanggal_akhir'),
			'volume'		=> $this->input->post('volume'),
			'jadwal_status'	=> 'draft'			
		);
				
		$this->Schedule_model->input_jadwal($insert_jadwal);
		echo "Jadwal berhasil dibuat, anda akan otomatis diarahkan kehalaman input data mahasiswa";					
	}
	// END SCHEDULE











	// DASHBOARD
	public function dashboard()
	{
		$data['title'] = 'Dashboard';


		$data['title'] 	= 'Kirim Jadwal';
		$data['user'] 	= $this->db->get_where('user', ['username' =>
		$this->session->userdata('username')])->row_array();
			
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('dashboard/index', $data);
		$this->load->view('templates/footer');
		
	}

	public function dataJadwal()
	{
		$fetch_data = $this->Dashboard_model->make_datatables();
		$data = array();	
		$no = $_POST['start'];
		foreach ($fetch_data as $row) 
		{
			$no++;
			$sub_array = array();
			$sub_array[] = $no;
			$sub_array[] = $row->jadwal_nama;
			$sub_array[] = $row->jadwal_mulai;
			$sub_array[] = $row->jadwal_akhir;
			$sub_array[] = $row->volume;
			if ($row->jadwal_status == 'terkirim') 
			{
				$sub_array[] = '<span class="badge badge-warning"><i>'.$row->jadwal_status.'</i></span>';									
			}
			elseif ($row->jadwal_status == 'draft') 
			{
				$sub_array[] = '<span class="badge badge-secondary"><i>'.$row->jadwal_status.'</i></span>';
			}
			elseif ($row->jadwal_status == 'approved') 
			{
				$sub_array[] = '<span class="badge badge-success"><i>'.$row->jadwal_status.'</i></span>';
			}
			
			if ($row->jadwal_status == 'approved')
			{
				$sub_array[] = '';
			}
			elseif  ($row->jadwal_status == 'terkirim')
			{
				$sub_array[] = '';
			}
			else
			{
				$sub_array[] = '
					<a href="#" id="'.$row->jadwal_id.'" class="text-primary details mr-2" data-toggle="modal" title="Kirim Jadwal"><i class="fas fa-paper-plane"></i></a>				
					';
			}
			$data[] = $sub_array;					
		}

		$output = array(
			"draw"				=> intval($_POST['draw']),
			"recordsTotal"		=> $this->Dashboard_model->get_all_data(),
			"recordsFiltered"	=> $this->Dashboard_model->get_filtered_data(),
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
	      $output['kuota']  		= $row->volume;
	      $output['tanggal_mulai']  = $row->jadwal_mulai;
	      $output['tanggal_akhir'] 	= $row->jadwal_akhir;      
	      $output['status']        	= $row->jadwal_status;	        
	      $output['nama']        	= $row->mahasiswa_nama;	      
	      $output['npm']        	= $row->mahasiswa_npm;	      
	      $output['jk']        		= $row->mahasiswa_jenis_kelamin;	      
		  $output['praktek']        = $row->mahasiswa_jenis_praktek;	    
		  $output['file']        	= $row->file;	      
	      $output['dokumen']        = $row->file;	    
	      // $output['institusi_id']        = $row->institusi_id;	    
	            
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
			$sub_array[] = $row->mahasiswa_jenis_praktek;
			
			$data[] = $sub_array;					
		}
		$output = array(
			"draw"				=> intval($_POST['draw']),
			"recordsTotal"		=> $this->Dashboard_model->get_all_data2(),
			"recordsFiltered"	=> $this->Dashboard_model->get_filtered_data2(),
			"data"				=> $data
		);
		echo json_encode($output);
	}


	public function kirimJadwal()
	{
		
	    // $data = $this->Dashboard_model->fetch_upload($this->input->post('jadwal_id'));

		$config['upload_path']          = './assets/documents/suratpengantar/';
		$config['allowed_types']        = 'pdf';
		$config['max_size']             = '1024'; // 1024KB


        $this->load->library('upload', $config);
		if ($this->upload->do_upload('file')) 
		{

            $old_file = $this->input->post('dokumen');
            if ($old_file != '') {
                unlink(FCPATH .'assets/documents/suratpengantar/'. $old_file);
            }
  
            } else {
				echo "Jadwal gagal dikirim, pastikan ukuran dan format file benar (PDF Max. 1 MB)";
				return false;
        } 
			
			
		if ($_POST['action'] == 'Kirim') 
		{
			$kirim_data = array(
				'jadwal_status'		=> 'terkirim',	
				'volume'		=> $this->input->post('kuota'),	
				'jadwal_mulai'		=> $this->input->post('tanggal_mulai'),	
				'jadwal_akhir'		=> $this->input->post('tanggal_akhir'),	
				'file' 				=> $this->upload->data("file_name"),
				'type'				=> $this->upload->data('file_ext'),
				'size' 				=> $this->upload->data('file_size')
			);	
			$this->Dashboard_model->kirim_data_jadwal($this->input->post('jadwal_id'), $kirim_data);
			// $old_pdf = $this->input->post('dokumen');
			// unlink(FCPATH .'assets/documents/suratpengantar/'.$this->input->post('dokumen'));
			echo "Jadwal behasil dikirim";
		}
	}

	public function batalkanJadwal()
	{
		if ($_POST['action'] == 'Batal') 
		{			
			$kirim_data = array(
				'jadwal_status'		=> 'draft'	
			);
			$this->Dashboard_model->kirim_data_jadwal($this->input->post('jadwal_id'), $kirim_data);
			echo "Jadwal behasil dibatalkan";
		}

		if ($_POST['action'] == 'Approve') 
		{			
			$kirim_data = array(
				'jadwal_status'		=> 'approved'	
			);
			$this->Dashboard_model->kirim_data_jadwal($this->input->post('jadwal_id'), $kirim_data);
			echo "Jadwal berhasil di approve";	
		}
	}

	public function deleteJadwal()
	{
		$this->Dashboard_model->delete_single_user_jadwal($_POST['jadwal_id']);
		$this->Dashboard_model->delete_mahasiswa($_POST['jadwal_id']);		
    	echo "Data Jadwal berhasil dihapus";
	}
	// END DASHBOARD













	// MAHASISWA
	public function mahasiswa()
	{
		$data['title'] = 'Input Mahasiswa';
		$data['jadwal'] = $this->Mahasiswa_model->fetch_jadwal();
		$data['jurusan'] = $this->Mahasiswa_model->fetch_jurusan();
		$data['user'] = $this->db->get_where('user', ['username' =>	$this->session->userdata('username')])->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('mahasiswa/index',$data);
		$this->load->view('templates/footer');
	}

	public function inputMahasiswa()
	{
		$insert_mahasiswa = array(
			'jadwal_id'					=>$this->input->post('jadwal'),		
			'jurusan_id'				=>$this->input->post('jurusan'),		
			'mahasiswa_nama'			=>$this->input->post('nama_mahasiswa'),
			'mahasiswa_npm'				=>$this->input->post('npm'),
			'mahasiswa_jenis_kelamin'	=>$this->input->post('jenis_kelamin'),
			'mahasiswa_jenis_praktek'	=>$this->input->post('jenis_praktek')
		);
		
		$this->Mahasiswa_model->input_mahasiswa($insert_mahasiswa);
		echo "Data mahasiswa berhasil ditambahkan";
	}

	
	public function dataMahasiswa()
	{		
		$fetch_data = $this->Mahasiswa_model->make_datatables();
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
			$sub_array[] = $row->jurusan_nama;							
			$sub_array[] = $row->jurusan_supervisi;							
			$sub_array[] = '<a href="#" id="'.$row->mahasiswa_id.'" class="text-danger delete" data-toggle="modal" title="Hapus"><i class="fas fa-trash-alt"></i></a>';
			$data[] = $sub_array;					
		}
		$output = array(
			"draw"				=> intval($_POST['draw']),
			"recordsTotal"		=> $this->Mahasiswa_model->get_all_data(),
			"recordsFiltered"	=> $this->Mahasiswa_model->get_filtered_data(),
			"data"				=> $data
		);
		echo json_encode($output);
	}


	public function deleteMahasiswa()
	{
		$this->Mahasiswa_model->delete_single_user($_POST['mahasiswa_id']);
    	echo "Data berhasil dihapus";
	}
	// END MAHASISWA




	public function print_jadwal()
	{
		$this->load->view('print/print_jadwal');
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


	// JADWAL PRAKTEK
	public function jadwal_praktek()
	{
		$data['title'] = 'Jadwal Praktek';
		$data['user'] = $this->db->get_where('user', ['username' =>	$this->session->userdata('username')])->row_array();		
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('rekap_nilai/jadwal_praktek',$data);
		$this->load->view('templates/footer');
	}

	public function jadwalPraktekMahasiswa()
	{
		$fetch_data = $this->Institusi_model->make_datatables3();
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
			$sub_array[] = $row->kelompok_nama;
			$sub_array[] = $row->ruangan_nama;
			$sub_array[] = $row->pembimbing_nama;
			// $sub_array[] = $row->periode_nama;
			

			$data[] = $sub_array;					
		}

		$output = array(
			"draw"				=> intval($_POST['draw']),
			"recordsTotal"		=> $this->Institusi_model->get_all_data3(),
			"recordsFiltered"	=> $this->Institusi_model->get_filtered_data3(),
			"data"				=> $data
		);
		echo json_encode($output);
	}

	public function fetchSinglePeriode()
	{
		$output = array();
		$data = $this->Institusi_model->fetch_single_jadwal($_POST["jadwal_id"]);
		foreach ($data as $row) 
		{
			$output['jadwal']  = $row->jadwal_mulai;
			$output['akhir']  		= $row->jadwal_akhir;
			// $output['nip'] 				= $row->pembimbing_nip;      
			// $output['jabatan']        	= $row->pembimbing_jabatan;      
			// $output['pangkat']        	= $row->pembimbing_pangkat;      
			// $output['pendidikan']      	= $row->pembimbing_pendidikan;      
		}
		echo json_encode($output);
	}



	// REKAP NILAI MAHASISWA
	public function rekap_nilai()
	{
		$data['title'] = 'Rekap Nilai Mahasiswa';
		$data['user'] = $this->db->get_where('user', ['username' =>	$this->session->userdata('username')])->row_array();		
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('rekap_nilai/rekap_nilai',$data);
		$this->load->view('templates/footer');
	}

	public function getJadwal()
	{
		$id=$this->input->post('username');
		$data=$this->Institusi_model->fetch_jadwal($id);
		echo json_encode($data);
	}

	public function rekapNilai()
	{
		$fetch_data = $this->Institusi_model->make_datatables2();
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
			$sub_array[] = '<b>'.$row->keterangan.'</b>';
			$data[] = $sub_array;					
		}

		$output = array(
			"draw"				=> intval($_POST['draw']),
			"recordsTotal"		=> $this->Institusi_model->get_all_data2(),
			"recordsFiltered"	=> $this->Institusi_model->get_filtered_data2(),
			"data"				=> $data
		);
		echo json_encode($output);
	}

	public function download_nilai()
	{
		$data['title'] = 'Download Nilai';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('institusi/download_nilai', $data);
		$this->load->view('templates/footer');
	}

	public function dataNilai()
	{
		$fetch_data = $this->Download_model->make_datatables();
		$data = array();	
		$no = $_POST['start'];
		foreach ($fetch_data as $row) 
		{
			$no++;
			$sub_array = array();
			$sub_array[] = $no;
			// $sub_array[] = $row->id;
			$sub_array[] = $row->file;
			$sub_array[] = $row->type;
			$sub_array[] = $row->size;
			
			$sub_array[] = '
				<a href="" id="'.$row->file.'" class="text-primary download_nilai mr-2"  title="Download Nilai Mahasiswa"><i class="fas fa-download"></i></a>
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

	public function fetchSingleFileNilai()
	{
		$output = array();
	    $data = $this->Dashboard_model->fetch_upload_nilai($_POST["jadwal_id"]);
	    foreach ($data as $row) 
	    {
	      $output['id']  		= $row->id;
	      $output['file']  		= $row->file;
	      $output['type']  		= $row->type;
	      $output['size'] 		= $row->size;      
	      $output['jadwal_id']  = $row->jadwal_id;
	    }
    	echo json_encode($output);
	}
	
}
