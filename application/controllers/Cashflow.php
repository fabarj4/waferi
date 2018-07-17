<?php

class Cashflow extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('m_cashflow');
    }

    function index()
    {
        $firstDate=date('Y-m-1',strtotime($_SESSION['tgl']));
        $date=date('Y-m-d',strtotime($_SESSION['tgl']));
        $data_pendapatan['tampil_pendapatan'] = $this->M_laba_rugi->jumlah_pendapatan();

        $this->load->view('v_cashflow');
    }
}

?>
