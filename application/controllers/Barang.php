<?php

class Barang extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('m_barang');
    }

    public function Stok()
    {
        $this->m_barang->post();
    }

    function index()
    {
        $this->load->view('v_barang');
    }
}

?>
