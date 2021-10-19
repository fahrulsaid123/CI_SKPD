<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = $data['user']['username'];

        if ($data['user']['role_id'] == NULL) {
            redirect('auth');
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');

        #echo copy("./assets/img/profile/default.jpg", "./assets/img/profile/user3.jpg");
    }
    public function edit_profile()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = $data['user']['username'];

        if ($data['user']['role_id'] == NULL) {
            redirect('auth');
        }
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/edit_foto', $data);
        $this->load->view('templates/footer');
    }

    public function proses_edit()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $nama_pict = $data['user']['username'];
        $path_ori = './assets/img/profile/' . $nama_pict . '.jpg';
        echo $path_ori;
        unlink($path_ori);
        #delete_files($path_ori, TRUE);

        $config['upload_path'] = './assets/img/profile/';
        $config['allowed_types'] = 'jpg';
        $config['file_name'] = $nama_pict;


        // load library upload
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('gambar')) {
            //$error = $this->upload->display_errors();
            // menampilkan pesan error
            //print_r($error);

            $error = 'ekstensi gambar hanya jpg';          // menampilkan pesan error
            $this->session->set_flashdata('error_edit', '<div class="alert alert-danger" role="alert">' . $error . '</div>');

            $path_foto = "./assets/img/profile/" . $nama_pict . ".jpg";
            echo copy("./assets/img/profile/default.jpg", $path_foto);

            redirect('user/edit_profile');
        } else {
            redirect('user');
            //$result = $this->upload->data();
            //echo "<pre>";
            //print_r($result);
            //echo "</pre>";
        }
    }

    public function get_daftar($tabel, $column1, $column2)
    { #menampilkan daftar
        $this->db->select('*');
        $this->db->from($tabel);
        $this->db->where($column1, $column2);
        $query = $this->db->get();
        return $query->result();
    }

    public function kegiatan()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        #$data['laporan'] = $this->db->get_where('laporan', ['username' => $this->session->userdata('username')])->row_array();
        $data['laporan'] = $this->get_daftar('laporan', 'username', $this->session->userdata('username'));
        $data['title'] = $data['user']['username'];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/kegiatan', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_laporan()
    {

        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = $data['user']['username'];

        if ($data['user']['role_id'] == NULL) {
            redirect('auth');
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/tambah', $data);
        $this->load->view('templates/footer');
    }

    public function proses_tambah()
    {

        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $nama_pict = $data['user']['username'] . '_' . time();
        #delete_files($path_ori, TRUE);
        $error = '';

        if ($this->input->post('keterangan', true) == NULL) {
            $error = $error . 'keterangan harus diisi';
            $this->session->set_flashdata('error', '<div class="alert alert-danger" role="alert">' . $error . '</div>');
            redirect('user/tambah_laporan');
        }

        $config['upload_path'] = './assets/img/laporan/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['file_name'] = $nama_pict;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('gambar')) {
            $error = $error . 'ekstensi gambar hanya jpg, png, dan jpeg';          // menampilkan pesan error
            $this->session->set_flashdata('error', '<div class="alert alert-danger" role="alert">' . $error . '</div>');
            redirect('user/tambah_laporan');
            #$path_foto = "./assets/img/profile/" . $nama_pict . ".jpg";
            #echo copy("./assets/img/profile/default.jpg", $path_foto);
        } else {
            $result2 = $this->upload->data();
            $result = [
                'username' => $data['user']['username'],
                'keterangan' => htmlspecialchars($this->input->post('keterangan', true)),
                'image' => $nama_pict . $result2['file_ext'],
                'tanggal' => time()
            ];

            $this->db->insert('laporan', $result);
            redirect('user/kegiatan');
            #echo "<pre>";
            #print_r($result);
            #echo "</pre>";
        }
    }
}
