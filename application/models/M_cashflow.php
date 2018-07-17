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

    public function operasi($f,$d)
    {
        $query = "SELECT SUM(jumlah)as jmlPenjualan FROM akuntan.`jurnal_penjualan` WHERE 
(`tgl_penjualan` BETWEEN '$f'  AND '$d')";
        $items = $this->db->query($query)->row();

        return $items->jmlPenjualan;
    }

    public function investasi($f,$d)
    {
        $query1 = "SELECT SUM(saldo)AS jmlBeliAT FROM akuntan.`jurnal_pengeluaran_kas` WHERE jenis = 5 AND
(`tgl_pengeluaran` BETWEEN '$f'  AND '$d')";
        $item1 = $this->db->query($query1)->row()->jmlBeliAT;

        $query2 = "SELECT SUM(saldo)AS jmlJualAT FROM akuntan.`jurnal_kas` WHERE jenis = 6 AND
(`tgl_penerimaan` BETWEEN '$f'  AND '$d')";
        $item2 = $this->db->query($query2)->row()->jmlJualAT;
        $totalInvestasi = $item2 - $item1;

        return $totalInvestasi;
    }

    public function pendanaan($f,$d)
    {
        $query1 = "SELECT SUM(saldo)AS jmlTarikOwner FROM akuntan.`jurnal_pengeluaran_kas` WHERE jenis = 10 AND
(`tgl_pengeluaran` BETWEEN '$f'  AND '$d')";
        $item1 = $this->db->query($query1)->row()->jmlTarikOwner;

        $query2 = "SELECT SUM(saldo)AS jmlInvestOwner FROM akuntan.`jurnal_kas` WHERE jenis = 8 AND
(`tgl_penerimaan` BETWEEN '$f'  AND '$d')";
        $item2 = $this->db->query($query2)->row()->jmlInvestOwner;

        $items['tarik'] = $item1;
        $items['invest'] = $item2;

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
