<?php
class login extends CI_Controller{

 function __construct(){
   parent::__construct();
    $this->load->model('m_login');
 }

 function index(){
		$this->load->view('v_login');
	}

  function actlogin(){
    $username = $this->input->post('username');
    $password = $this->input->post('password');
    $where = array('username' => $username, 'pass' => $password);
    $result = $this->m_login->cek_login($where)->result();
    if(!$result){
      $data = ['message'=>'username atau password salah','role'=>''];
      echo json_encode($data);
      return;
    }
    $data = ['message'=>'sukses login','role'=> $result[0]->tipe];
    $sessionData = array('login' => true, 'data' => $result);
    $this->session->set_userdata($sessionData);
    echo json_encode($data);
  }

  function actlogout(){
    $this->session->sess_destroy();
		redirect(base_url('login'));
  }
}
 ?>
