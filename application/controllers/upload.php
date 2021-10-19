<?php

class upload extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }

    function index()
    {
        #code
    }

    function do_upload()
    {
        // setting konfigurasi upload
        $config['upload_path'] = './assets/img/profile/';
        $config['allowed_types'] = 'gif|jpg|png';
        // load library upload
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('gambar')) {
            $error = $this->upload->display_errors();
            // menampilkan pesan error
            print_r($error);
        } else {
            $result = $this->upload->data();
            echo "<pre>";
            print_r($result);
            echo "</pre>";
        }
    }
}
