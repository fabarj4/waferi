<?php

class Panel_Admin extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('m_admin');
    }

//    public function Tgl()
//    {
//        $data['jmlBarang'] = $this->m_admin->get_members();
//        $this->m_admin->data();
//    }

    function index()
    {
        $firstDate=date('Y-m-1');
        $date=date('Y-m-d');

        $data['jmlData'] = $this->m_admin->data();
        $data['jmlPenjualan'] = $this->m_admin->penjualan($firstDate,$date);
        $data['jmlPendapatan'] = $this->m_admin->pendapatan($firstDate,$date);
        $data['PerBulan'] = $this->m_admin->jualBulan($date);
        $this->load->view('v_admin_main',$data);
    }
}

?>
