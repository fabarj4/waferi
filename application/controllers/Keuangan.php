<?php

class Keuangan extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('m_keuangan');
    }

    public function data()
    {
        $this->m_keuangan->post();
    }

    function index()
    {
        $this->load->view('v_keuangan');
    }
}

?>
