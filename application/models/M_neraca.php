<?php @session_start();

/**
 * Created by PhpStorm.
 * User: irvan
 * Date: 12/07/18
 * Time: 22:32
 */
class M_Neraca extends CI_Model
{
    function __construct()
    {
        parent:: __construct();
    }

    public function aktiva($f,$d)
    {
        $query = "SELECT ket,saldo FROM akuntan.`jurnal_pengeluaran_kas` WHERE `jenis`=9 AND
(`tgl_pengeluaran` BETWEEN '$f'  AND '$d')";
        $items['data'] = $this->db->query($query)->result_array();
        $totalSaldo = 0;
        foreach ($items['data'] as $index=>$data){
            $totalSaldo = $totalSaldo + $data['saldo'];
        }
        $items['totalSaldo'] = $totalSaldo;

        return $items;
    }

    public function ekuitas($f,$d){
        $query = "SELECT ket,saldo FROM akuntan.`jurnal_kas` WHERE `jenis`=3 AND
(`tgl_penerimaan` BETWEEN '$f'  AND '$d')";
        $items['data'] = $this->db->query($query)->result_array();
        $totalSaldo = 0;
        foreach ($items['data'] as $index=>$data){
            $totalSaldo = $totalSaldo + $data['saldo'];
        }
        $items['totalSaldo'] = $totalSaldo;
        return $items;
    }

    public function jumlah_pendapatan($f,$d){
//        $Jumlah_Pendapatan = $this->db->query('SELECT SUM(total_debit) as result_pendapatan FROM jurnal_umum WHERE jurnal="Penjualan"');
//        return $Jumlah_Pendapatan->row()->result_pendapatan;

        $query = "SELECT SUM(jumlah)as jmlPenjualan FROM akuntan.`jurnal_penjualan` WHERE 
(`tgl_penjualan` BETWEEN '$f'  AND '$d')";
        $items = $this->db->query($query)->row();

        return $items->jmlPenjualan;
    }

    public function kewajiban($f,$d){
        $query = "SELECT ket,saldo FROM akuntan.`jurnal_kas` WHERE `jenis`=2 AND
(`tgl_penerimaan` BETWEEN '$f'  AND '$d')";
        $items['data'] = $this->db->query($query)->result_array();
        $totalSaldo = 0;
        foreach ($items['data'] as $index=>$data){
            $totalSaldo = $totalSaldo + $data['saldo'];
        }
        $items['totalSaldo'] = $totalSaldo;
        return $items;
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
