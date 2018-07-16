<?php @session_start();

/**
 * Created by PhpStorm.
 * User: irvan
 * Date: 12/07/18
 * Time: 22:32
 */
class M_Admin extends CI_Model
{
    function __construct()
    {
        parent:: __construct();
    }

    public function data()
    {
        $SQL = "SELECT SUM(STOCK)AS jmlBarang FROM akuntan.`t_barang`";
        $query = $this->db->query($SQL);
        return $query->row();
    }
}