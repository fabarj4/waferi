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
            case 'addStok':
                $id = $_POST['id'];
                $stok = $_POST['stok'];
                $SQL = "UPDATE `akuntan`.`t_barang` SET `STOCK` = `STOCK`+$stok WHERE `ID_BARANG` = '$id'";
                $query = $this->db->query($SQL);
                $return->data = $query;
                break;
            case 'stok':
                $SQL = $this->db->get('akuntan.t_barang');
                $return->data = $SQL->result_array(); ;
                break;
        }
        echo json_encode($return);
        die();
    }
}
//
//if ($_POST) {
//
//}