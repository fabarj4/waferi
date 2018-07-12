<?php @session_start();
/**
 * Created by PhpStorm.
 * User: irvan
 * Date: 12/07/18
 * Time: 23:46
 */

class Logout extends CI_Controller {

    public function index()
    {
        @session_destroy();
//        $this->session->sess_destroy();
        redirect(base_url('login'));
    }

}