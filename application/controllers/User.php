<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
  public function __construct()
  {
      parent::__construct();
      is_logged_in();
  }

  public function index()
  {
    $data['title'] = 'Profil';
    $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
    
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('user/index', $data);
    $this->load->view('templates/footer');
  }

  public function fetchSingleInstitusi()
  {
    $output = array();
		$data = $this->Institusi_model->fetch_single($_POST["institusi_id"]);
		foreach ($data as $row) 
		{
			$output['nama_institusi']   = $row->institusi_nama;		      
			$output['akreditasi']   = $row->institusi_no_akreditasi;		      
			$output['tahun_akreditasi']   = $row->institusi_tahun_akreditasi;		      
			$output['status']   = $row->institusi_status;		      
			$output['alamat']   = $row->institusi_alamat;		      
			$output['telepon']   = $row->institusi_telepon;		      
			$output['mou']   = $row->tanggal_mou;		      
			$output['email']   = $row->email;		      
		}
		echo json_encode($output);
  }

  public function edit()
  {
    $data['title'] = 'Ubah Profil';
    $data['user'] = $this->db->get_where('user', ['username' =>
    $this->session->userdata('username')])->row_array();

    $this->form_validation->set_rules('nama_akun', 'Nama', 'required|trim');

    if ($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/edit', $data);
        $this->load->view('templates/footer');
    } else {
      $username = $this->input->post('username');
      $nama = $this->input->post('nama_akun');
      // $email = $this->input->post('email');
      // $alamat = $this->input->post('alamat');
      // $notlp = $this->input->post('notlp');

      $upload_image = $_FILES['image']['name'];

        if ($upload_image) {
          $config['allowed_types'] = 'jpg|png';
          $config['max_size']     = '1024';
          $config['upload_path'] = './assets/img/profile/';

          $this->load->library('upload', $config);

          if ($this->upload->do_upload('image')) {

            $old_image = $data['user']['image'];
            if ($old_image != 'default.png') {
                unlink(FCPATH . 'assets/img/profile/' . $old_image);
            }

            $new_image = $this->upload->data('file_name');
            $this->db->set('image', $new_image);
            } else {
              $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <strong>Upload Foto Profil Gagal, pastikan ukuran file Max. 900 KB dengan format .jpg atau .png </strong>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>');
                    redirect('user');
				      return false;
            }
        }

        $this->db->set('nama_akun', $nama);
        // $this->db->set('alamat', $alamat);
        // $this->db->set('notlp', $notlp);
        // $this->db->set('email', $email);
        $this->db->where('username', $username);
        $this->db->update('user');

        $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                      Profile <strong>berhasil diubah</strong>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>');
          redirect('user');
    }
  }

  public function changePassword()
  {
    $data['title'] = 'Ubah Kata Sandi';
    $data['user'] = $this->db->get_where('user', ['username' =>
    $this->session->userdata('username')])->row_array();
    $this->form_validation->set_rules('current_password', 'Password Sebelumnya', 'required|trim');
    $this->form_validation->set_rules('new_password1', 'Password Baru', 'required|trim|min_length[8]|matches[new_password2]', [
        'matches' => 'Password tidak sama!',
        'min_length' => 'Password terlalu pendek!',
        'required' => 'Dibutuhkan Password!'
    ]);
    $this->form_validation->set_rules('new_password2', 'Ulang Password', 'required|trim|min_length[8]|matches[new_password1]', [
        'matches' => 'Password tidak sama!',
        'min_length' => 'Password terlalu pendek!',
        'required' => 'Dibutuhkan Password!'
    ]);

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('user/changepassword', $data);
      $this->load->view('templates/footer');
      //password sebelumnya salah
    } else {
      $current_password = $this->input->post('current_password');
      $new_password = $this->input->post('new_password1');
        if (!password_verify($current_password, $data['user']['password'])) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password sebelumnya salah. </div>');

            redirect('user/changepassword');
            //password sebelumnya tdk sama
        } else {
          if ($current_password == $new_password) {
              $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password baru tidak boleh sama dengan password sebelumnya.</div>');
              redirect('user/changepassword');
          } else {
              //password benar
              $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

              $this->db->set('password', $password_hash);
              $this->db->where('id', $this->input->post('id'));
              $this->db->update('user');

              $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                      <strong>Password</strong> berhasil diubah
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>');
              redirect('user/changepassword');
          }
        }
    }
  }
}