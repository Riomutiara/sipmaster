<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Menu Management';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('menu', 'Nama Menu', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Menu Berhasil Ditambahkan.
          </div>');

            redirect('menu');
        }
    }

    public function submenu()
    {
        $data['title'] = 'Submenu Management';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();
        $this->load->model('Menu_model', 'menu');

        $data['subMenu'] = $this->menu->getSubMenu();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Nama Menu', 'required');
        $this->form_validation->set_rules('url', 'Url', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');


        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active')
            ];
            $this->db->insert('user_sub_menu', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Submenu Berhasil Ditambahkan.
          </div>');

            redirect('menu/submenu');
        }
    }
    public function hapus($id)
    {
        $this->db->delete('user_menu', array('id' => $id));
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Menu berhasil dihapus.
          </div>');
        redirect('menu');
    }

    public function edit($id)
    {
        $data['title'] = 'Ubah Menu';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['menu'] = $this->db->get_where('user_menu', ['id' => $id])->row_array();

        $this->form_validation->set_rules('menu', 'Nama Menu', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $menu = $this->input->post('menu');

            $this->db->set('menu', $menu);
            $this->db->where('id', $id);
            $this->db->update('user_menu');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Menu telah diubah.
          </div>');

            redirect('menu');
        }
    }
    public function editsubmenu($id)
    {
        $data['title'] = 'Ubah Menu';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();


        $data['sm'] = $this->db->get_where('user_sub_menu', ['id' => $id])->row_array();

        $this->form_validation->set_rules('menu_id', 'Nama Submenu', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/edit_submenu', $data);
            $this->load->view('templates/footer');
        } else {

            $menu_id = $this->input->post('menu_id');
            $title = $this->input->post('title');
            $url = $this->input->post('url');
            $icon = $this->input->post('icon');
            $is_active = $this->input->post('is_active');



            $this->db->set('menu_id', $menu_id);
            $this->db->set('title', $title);
            $this->db->set('url', $url);
            $this->db->set('icon', $icon);

            $this->db->where('id', $id);
            $this->db->update('user_sub_menu');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Submenu telah diubah.
          </div>');

            redirect('menu/submenu');
        }
    }
    public function hapussubmenu($id)
    {
        $this->db->delete('user_sub_menu', array('id' => $id));
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Submenu berhasil dihapus.
          </div>');
        redirect('menu/submenu');
    }
}
