<?php

class Panel_User extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        // $this->load->model('m_user');
    }

    function index()
    {
        $this->load->view('v_user_main');
    }
}
?>
