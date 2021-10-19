<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    private function verify()
    {
        $data['cek'] = true;
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'ADMIN - ' . $data['user']['username'];
        if ($data['user']['role_id'] == NULL) {
            $data['cek'] = false;
        }

        if ($data['user']['role_id'] != 1) {
            $data['cek'] = false;
        }
        return $data;
    }

    public function index()
    {
        $data = $this->verify();

        if (!$data['cek']) {
            redirect('user');
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }

    public function user()
    {
        $data = $this->verify();

        if (!$data['cek']) {
            redirect('user');
        }

        $data['member'] = $this->get_daftar('user', 'is_active !=', 2);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/user', $data);
        $this->load->view('templates/footer');
    }
    public function user_blokir()
    {
        $data = $this->verify();

        if (!$data['cek']) {
            redirect('user');
        }

        $data['member'] = $this->get_daftar('user', 'is_active =', 2);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/user_blokir', $data);
        $this->load->view('templates/footer');
    }

    public function get_daftar($tabel, $kondisi = NULL, $value_kondisi = NULL)
    { #menampilkan daftar
        $this->db->select('*');
        $this->db->from($tabel);
        if ($value_kondisi != NULL && $kondisi != NULL) {
            $this->db->where($kondisi, $value_kondisi);
        }
        #$this->db->where($column1, $column2);
        /*if ($order != NULL) {
            if ($order_by != NULL) {
                $this->db->order_by($order, $order_by);
            } else {
                $this->db->order_by($order);
            }
        }*/

        $query = $this->db->get();
        return $query->result();
    }

    public function kegiatan()
    {
        $data = $this->verify();

        if (!$data['cek']) {
            redirect('user');
        }

        $data['laporan'] = $this->get_daftar('laporan');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/kegiatan', $data);
        $this->load->view('templates/footer');
    }
    public function edit($username = NULL)
    {
        $data = $this->verify();
        if (!$data['cek']) {
            redirect('user');
        }

        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('username', $username);
        $query = $this->db->get();
        $data['member_edit'] = $query->result();
        #print_r($data['member_edit']);

        $this->form_validation->set_rules('name', 'Name', 'required|trim', [
            'required' => 'Nama harus diisi'
        ]);
        if ($data['member_edit'][0]->username != $this->input->post('username', true)) {
            $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]', [
                'required' => 'username harus diisi',
                'is_unique' => 'Username sudah terdaftar'
            ]);
        }

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_admin', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $result = [
                'username' => htmlspecialchars($this->input->post('username', true)),
                'password' => $this->input->post('password', true),
                'nama' => htmlspecialchars($this->input->post('name', true)),
                'image' => $this->input->post('image', true),
                'role_id' => $this->input->post('status_user', true),
                'is_active' => $this->input->post('status_aktif', true)
            ];
            #print_r($result);

            $this->db->where('id', $this->input->post('id', true));
            $this->db->update('user', $result);
            redirect('admin/user');
        }
    }
    public function blokir($username = NULL)
    {
        $data = $this->verify();
        if (!$data['cek']) {
            redirect('user');
        }

        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('username', $username);
        $query = $this->db->get();
        $data['member_edit'] = $query->result();

        $result = [
            'is_active' => 2
        ];
        #print_r($data['member_edit'][0]->id);

        $this->db->where('id', $data['member_edit'][0]->id);
        $this->db->update('user', $result);
        redirect('admin/user');
    }

    public function buka($username = NULL)
    {
        $data = $this->verify();
        if (!$data['cek']) {
            redirect('user');
        }

        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('username', $username);
        $query = $this->db->get();
        $data['member_edit'] = $query->result();

        $result = [
            'is_active' => 1
        ];
        #print_r($data['member_edit'][0]->id);

        $this->db->where('id', $data['member_edit'][0]->id);
        $this->db->update('user', $result);
        redirect('admin/user_blokir');
    }
}
