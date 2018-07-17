<?php

class Penjualan extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('m_penjualan');
    }

    function index()
    {
        $iduser = $this->session->userdata('data')->id;
        $where = array('username'=>$iduser);
        $data['penjualan'] = $this->m_penjualan->get_penjualan_id($where)->result();
        $this->load->view('v_user_penjualan',$data);
    }

    function card($id){
      $data['id'] = $id;
      $data['barang'] =  $this->m_penjualan->get_barang()->result();
      $data['konsumen'] = $this->m_penjualan->get_konsumen()->result();
      $this->load->view('v_user_penjualan_card',$data);
    }

    function savePenjualan(){
      $idKonsumen = $this->input->post('id_konsumen');
      $ket = $this->input->post('ket');
      $username = $this->session->userdata('data')->id;
      $tglPenjualan = date("Y-m-d H:i:s");
      $data = array('id_konsumen'=>$idKonsumen,'ket'=>$ket,'username'=>$username,'tgl_penjualan'=>$tglPenjualan);
      $id_penjualan = $this->m_penjualan->insert($data);

      $databarang = $this->input->post('databarang');
      $jumlah = 0;

      foreach ($databarang as $item) {
        $id = $item['id'];
        $value = $item['value'];
        $detail = array('id_penjualan' => $id_penjualan, 'id_barang' => $id, 'jumlah'=>$value);
        $this->m_penjualan->insertBarang($detail);
        $where = array('id_barang' => $id);
        $harga = $this->m_penjualan->get_harga($where)->row()->harga_jual;
        // echo $harga;
        $jumlah += $harga * $value;
      }

      $update = array('jumlah' => $jumlah);
      $wherep = array('id' => $id_penjualan);
      $this->m_penjualan->update($update,$wherep);
    }
}

?>
