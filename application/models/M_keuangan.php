<?php @session_start();

/**
 * Created by PhpStorm.
 * User: irvan
 * Date: 12/07/18
 * Time: 22:32
 */
class M_Keuangan extends CI_Model
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
            case 'jenis':
                $tp = $_POST['tp'];
                $sql = "select id_jenis as id,nm_jenis as nm from akuntan.r_jenis_kas WHERE is_kredit='$tp'";
                $data = $this->db->query($sql)->result_array();

                $return->data = $data;
                break;
            case 'data':
                $tp = $_POST['tp'];
                $tgl = $_POST['tgl'];
                $f = date('Y-m-1', strtotime($tgl));
                $d = date('Y-m-d', strtotime($tgl));
//                $tp = 1 is kredit else debit
                if ($tp == '1') {
                    $query = "SELECT tgl_pengeluaran as tgl,username as user,saldo,ket,
(SELECT nm_jenis from akuntan.r_jenis_kas WHERE id_jenis=jenis)as jenis 
FROM akuntan.`jurnal_pengeluaran_kas` WHERE (`tgl_pengeluaran` BETWEEN '$f'  AND '$d')";
                } else {
                    $query = "SELECT tgl_penerimaan as tgl,username as user,saldo,ket,
(SELECT nm_jenis from akuntan.r_jenis_kas WHERE id_jenis=jenis)as jenis 
FROM akuntan.`jurnal_kas` WHERE (`tgl_penerimaan` BETWEEN '$f'  AND '$d')";
                }
                $data = $this->db->query($query)->result_array();
                foreach ($data as $index => $item) {
                    $data[$index]['saldo'] = number_format($item['saldo'], 0, ".", ".");
                    if (strlen($item['ket']) > 50){
                        $data[$index]['ketsub'] = substr($item['ket'], 0, 50) . '...';
                    }else{
                        $data[$index]['ketsub'] = $item['ket'];
                    }
                }
                if (!$data) $data = false;
                $return->data = $data;
                break;
            case 'addData':
                $tp = $_POST['tp'];
                $jns = $_POST['jns'];
                $saldo= $_POST['saldo'];
                $tglJurnal = date("Y-m-d");
                $ket = $_POST['ket'];
                $username = $this->session->userdata['data']->username;
                if ($tp == '1') {
                    $query = "insert into akuntan.jurnal_pengeluaran_kas(tgl_pengeluaran, username, saldo, jenis, ket) VALUES 
('$tglJurnal','$username','$saldo','$jns','$ket')";
                } else {
                    $query = "insert into akuntan.jurnal_kas(tgl_penerimaan, username, saldo, jenis, ket) VALUES 
('$tglJurnal','$username','$saldo','$jns','$ket')";
                }

                $data = $this->db->query($query);
                $return->data = $data;
                break;
        }
        echo json_encode($return);
        die();
    }
}