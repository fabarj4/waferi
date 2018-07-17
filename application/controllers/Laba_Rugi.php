<?php

class Laba_Rugi extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('M_laba_rugi');
    }

    function index()
    {
        $firstDate=date('Y-m-1',strtotime($_SESSION['tgl']));
        $date=date('Y-m-d',strtotime($_SESSION['tgl']));
        $data_pendapatan['tampil_pendapatan'] = $this->M_laba_rugi->jumlah_pendapatan();

        $data_bebangaji['tampil_bebangaji'] = $this->M_laba_rugi->beban_gaji();

        $data_pengeluaran['tampil_pengeluaran'] = $this->M_laba_rugi->pengeluaran();

        $data_pembelian['tampil_pembelian'] = $this->M_laba_rugi->pembelian_wafer($firstDate,$date);

        $this->load->view('v_laba_rugi', $data_pendapatan + $data_bebangaji + $data_pengeluaran + $data_pembelian);
    }
}
