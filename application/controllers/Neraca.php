<?php

class Neraca extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('m_neraca');
    }

    function index()
    {
        $firstDate=date('Y-m-1',strtotime($_SESSION['tgl']));
        $date=date('Y-m-d',strtotime($_SESSION['tgl']));
        $neraca['aktiva']= $this->m_neraca->aktiva($firstDate,$date);
        $neraca['kewajiban']= $this->m_neraca->kewajiban($firstDate,$date);
        $neraca['ekuitas']= $this->m_neraca->ekuitas($firstDate,$date);

        $tampil_pendapatan = $this->m_neraca->jumlah_pendapatan($firstDate,$date);
        $tampil_bebangaji = $this->m_neraca->beban_gaji();
        $tampil_pengeluaran = $this->m_neraca->pengeluaran();
        $tampil_pembelian = $this->m_neraca->pembelian_wafer($firstDate,$date);

        $neraca['labaRugi'] = $tampil_pendapatan - ($tampil_bebangaji + $tampil_pengeluaran + $tampil_pembelian);

        $this->load->view('v_neraca',$neraca);
    }
}

?>
