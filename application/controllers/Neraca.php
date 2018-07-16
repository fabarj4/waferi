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
        $this->load->view('v_neraca');
    }
}

?>
