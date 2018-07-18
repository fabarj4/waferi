<?php @session_start();

/**
 * Created by PhpStorm.
 * User: irvan
 * Date: 12/07/18
 * Time: 22:32
 */
class M_Barang extends CI_Model
{
    function __construct()
    {
        parent:: __construct();

    }

    public function post()
    {
        $return = new stdClass();
        $tipe = $_POST['tipe'];
        switch ($tipe) {
            case 'addBarang':
                $idVendor = $_POST['supplier'];
                $nm = strtoupper($_POST['nm']);
                $stok = $_POST['stok'];
                $hargaB = $_POST['hargaB'];
                $hargaJ = $_POST['hargaJ'];
                $SQL = "insert into akuntan.barang(nm_barang, stock, id_vendor, harga_beli, harga_jual) 
VALUES ('$nm','$stok','$idVendor','$hargaB','$hargaJ')";
                $query = $this->db->query($SQL);
                $return->data = $query;
                break;
            case 'addStok':
                $id = $_POST['id'];
                $stok = $_POST['stok'];
                $SQL = "UPDATE `akuntan`.`barang` SET `stock` = `stock`+$stok WHERE `id_barang` = '$id'";
                $query = $this->db->query($SQL);
                $sqlPrice = "select nm_barang as nm,harga_beli as beli from akuntan.barang WHERE id_barang='$id'";
                $price = $this->db->query($sqlPrice)->row();
                $username = $this->session->userdata['data']->username;
                $saldo = $stok * $price->beli;
                $date = date("Y-m-d");
                $sql2 = "INSERT INTO akuntan.jurnal_pembelian(tgl_pembelian,username, saldo, id_barang, jumlah,ket)
VALUES ('$date','$username','$saldo','$id',$stok,'penambahan stok barang $price->nm')";
                $this->db->query($sql2);
                $return->data = $query;
                break;
            case 'stok':
                $SQL = $this->db->get('akuntan.barang');
                $return->data = $SQL->result_array();
                break;
            case 'supplier':
                $SQL = $this->db->get('akuntan.supplier');
                $data = $SQL->result_array();
                $return->data = $data;
                break;
            case 'addSupplier':
                $nm = strtoupper($_POST['nm']);
                $hp = $_POST['hp'];
                $adr = $_POST['adr'];
                $data = array(
                    'nama' => $nm,
                    'no_hp' => $hp,
                    'alamat' => $adr
                );
                $insert = $this->db->insert('akuntan.supplier', $data);
                $return->data = $insert;
                break;
        }
        echo json_encode($return);
        die();
    }
}