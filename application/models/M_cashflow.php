<?php @session_start();

/**
 * Created by PhpStorm.
 * User: irvan
 * Date: 12/07/18
 * Time: 22:32
 */
class M_Cashflow extends CI_Model
{
    function __construct()
    {
        parent:: __construct();
    }

    public function proses($firstDate,$date)
    {
        $query = "SELECT SUM(saldo) AS result_pembelian FROM jurnal_pembelian WHERE (`tgl_pembelian` BETWEEN '$firstDate'  AND '$date')";
        $Jumlah_pembelian = $this->db->query($query);

        return $Jumlah_pembelian->row()->result_pembelian;
    }

}
