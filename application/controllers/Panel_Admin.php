<?php @session_start();
class Panel_Admin extends CI_Controller{

 function __construct(){
   parent::__construct();
   // $this->load->model('m_login');
 }

 function index(){
		$this->load->view('v_admin_main');
	}
}
 ?>
