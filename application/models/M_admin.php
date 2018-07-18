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
        $SQL = "SELECT SUM(STOCK)AS jmlBarang FROM akuntan.`barang`";
        $query = $this->db->query($SQL);
        return $query->row()->jmlBarang;
    }

    public function penjualan($f, $d)
    {
        $SQL = "SELECT SUM(jumlah)as jmlPenjualan FROM akuntan.`jurnal_penjualan` WHERE (`tgl_penjualan` BETWEEN '$f' AND '$d')";
        $query = $this->db->query($SQL);
        return $query->row()->jmlPenjualan;
    }

    public function pendapatan($f, $d)
    {
        $SQL = "SELECT SUM(jumlah)as jmlPenjualan FROM akuntan.`jurnal_penjualan` WHERE (`tgl_penjualan` BETWEEN '$f' AND '$d')";
        $query = $this->db->query($SQL);
        return $query->row()->jmlPenjualan;
    }

    public function jualBulan($d){
        $SQL = "SELECT MONTH(tgl_penjualan)AS bln,SUM(jumlah)AS jmlPenjualan 
FROM akuntan.`jurnal_penjualan` 
WHERE year(`tgl_penjualan`)=YEAR('$d') GROUP BY MONTH(`tgl_penjualan`)";
        $query = $this->db->query($SQL)->result_array();

        foreach ($query as $index=>$item){
            if($item['bln']=='1'){
                $query[$index]['bln'] = "Januari";
            }elseif ($item['bln']=='2'){
                $query[$index]['bln'] = "Februari";
            }elseif ($item['bln']=='3'){
                $query[$index]['bln'] = "Maret";
            }elseif ($item['bln']=='4'){
                $query[$index]['bln'] = "April";
            }elseif ($item['bln']=='5'){
                $query[$index]['bln'] = "Mei";
            }elseif ($item['bln']=='6'){
                $query[$index]['bln'] = "Juni";
            }elseif ($item['bln']=='7'){
                $query[$index]['bln'] = "Juli";
            }elseif ($item['bln']=='8'){
                $query[$index]['bln'] = "Agustus";
            }elseif ($item['bln']=='9'){
                $query[$index]['bln'] = "September";
            }elseif ($item['bln']=='10'){
                $query[$index]['bln'] = "Oktober";
            }elseif ($item['bln']=='11'){
                $query[$index]['bln'] = "November";
            }elseif ($item['bln']=='12'){
                $query[$index]['bln'] = "Desember";
            }
        }
        return $query;
    }
}
