<?php @session_start();

class Laporan extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('m_laporan');
    }

    public function Tgl()
    {
        $this->m_laporan->tgl();
    }

    function index()
    {
        $this->load->view('v_laporan');
    }
}

?>
