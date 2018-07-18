<?php

class Pengguna extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('m_pengguna');
    }

    public function user()
    {
        $this->m_pengguna->post();
    }

    function index()
    {
        $this->load->view('v_pengguna');
    }
}

?>
