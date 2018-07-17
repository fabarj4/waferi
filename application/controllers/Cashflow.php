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
        $firstDate = date('Y-m-1', strtotime($_SESSION['tgl']));
        $date = date('Y-m-d', strtotime($_SESSION['tgl']));
        $cashflow['operasi'] = $this->m_cashflow->operasi($firstDate, $date);

        $tampil_bebangaji = $this->m_cashflow->beban_gaji();
        $tampil_pengeluaran = $this->m_cashflow->pengeluaran();
        $tampil_pembelian = $this->m_cashflow->pembelian_wafer($firstDate,$date);
        $cashflow['bebanOperasi'] = $tampil_bebangaji + $tampil_pengeluaran + $tampil_pembelian;
        $cashflow['jmlOperasi'] = $cashflow['operasi'] - $cashflow['bebanOperasi'];

        $cashflow['investasi'] = $this->m_cashflow->investasi($firstDate, $date);

        $cashflow['pendanaan'] = $this->m_cashflow->pendanaan($firstDate, $date);
        $cashflow['jmlPendanaan']=$cashflow['pendanaan']['invest']-$cashflow['pendanaan']['tarik'];

        $cashflow['kas']=$cashflow['jmlOperasi']+$cashflow['investasi']+$cashflow['jmlPendanaan'];

        $this->load->view('v_cashflow',$cashflow);
    }


}

?>
