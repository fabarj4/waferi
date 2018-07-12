<?php
class Panel extends CI_Controller{

 function __construct(){
   parent::__construct();
   // $this->load->model('m_login');
 }

 function index(){
		$this->load->view('v_panel');
	}
}
 ?>
