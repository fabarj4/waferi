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
        $data['jmlData'] = $this->m_admin->data();
        $this->load->view('v_admin_main',$data);
    }
}

?>
