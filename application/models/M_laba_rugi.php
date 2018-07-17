<?php
/**
 * Created by PhpStorm.
 * User: irvan
 * Date: 12/07/18
 * Time: 22:32
 */
class M_laba_rugi extends CI_Model
{
    function __construct()
    {
        parent:: __construct();
    }

    public function jumlah_pendapatan($f,$d){
//      $Jumlah_Pendapatan = $this->db->query('SELECT SUM(total_debit) as result_pendapatan FROM jurnal_umum WHERE jurnal="Penjualan"');
//      return $Jumlah_Pendapatan->row()->result_pendapatan;

        $query = "SELECT SUM(jumlah)as jmlPenjualan FROM akuntan.`jurnal_penjualan` WHERE 
(`tgl_penjualan` BETWEEN '$f'  AND '$d')";
        $items = $this->db->query($query)->row();

        return $items->jmlPenjualan;
    }

    public function beban_gaji(){
      $Jumlah_bebangaji = $this->db->query('SELECT SUM(total_debit) as result_bebangaji FROM jurnal_umum WHERE jurnal="Penggajian"');
      return $Jumlah_bebangaji->row()->result_bebangaji;
    }

    public function pengeluaran(){
      $Jumlah_pengeluaran = $this->db->query('SELECT SUM(total_debit) as result_pengeluaran FROM jurnal_umum WHERE jurnal="Pengeluaran Kas"');
      return $Jumlah_pengeluaran->row()->result_pengeluaran;
    }

    public function pembelian_wafer($firstDate,$date){
        $query = "SELECT SUM(saldo) AS result_pembelian FROM jurnal_pembelian WHERE (`tgl_pembelian` BETWEEN '$firstDate'  AND '$date')";
        $Jumlah_pembelian = $this->db->query($query);

      return $Jumlah_pembelian->row()->result_pembelian;
    }

}
