<?php
class M_penjualan extends CI_Model {

  function get_penjualan_id($where){
    $this->db->from('jurnal_penjualan');
    $this->db->where($where);
    return $this->db->get();
  }

  function get_konsumen(){
    return $this->db->get('konsumen');
  }

  function get_barang(){
    return $this->db->get('barang');
  }


  function get_harga($where){
    $this->db->select('harga_jual');
    $this->db->from('barang');
    $this->db->where($where);
    return $this->db->get();
  }

  function insert($data){
    $this->db->insert('jurnal_penjualan',$data);
    $id = $this->db->insert_id();
    return $id;
  }

  function update($data, $where){
    $this->db->where($where);
		$this->db->update('jurnal_penjualan',$data);
  }

  function insertBarang($data){
    $this->db->insert('jurnal_penjualan_detail',$data);
  }

}
?>
