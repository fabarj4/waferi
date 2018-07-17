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

    public function jumlah_pendapatan(){
      $Jumlah_Pendapatan = $this->db->query('SELECT SUM(total_debit) as result_pendapatan FROM jurnal_umum WHERE jurnal="Penjualan"');
      return $Jumlah_Pendapatan->row()->result_pendapatan;
    }

    public function beban_gaji(){
      $Jumlah_bebangaji = $this->db->query('SELECT SUM(total_debit) as result_bebangaji FROM jurnal_umum WHERE jurnal="Penggajian"');
      return $Jumlah_bebangaji->row()->result_bebangaji;
    }

    public function pengeluaran(){
      $Jumlah_pengeluaran = $this->db->query('SELECT SUM(total_debit) as result_pengeluaran FROM jurnal_umum WHERE jurnal="Pengeluaran Kas"');
      return $Jumlah_pengeluaran->row()->result_pengeluaran;
    }

    public function pembelian_wafer(){
      $Jumlah_pembelian = $this->db->query('SELECT SUM(total_debit) as result_pembelian FROM jurnal_umum WHERE jurnal="Pembelian"');
      return $Jumlah_pembelian->row()->result_pembelian;
    }

}
