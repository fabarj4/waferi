<?php @session_start();

/**
 * Created by PhpStorm.
 * User: irvan
 * Date: 12/07/18
 * Time: 22:32
 */
class M_Laporan extends CI_Model
{
    function __construct()
    {
        parent:: __construct();
    }

    public function tgl()
    {
        $tgl= $_POST['tgl'];
        $_SESSION['tgl'] = $tgl;
        echo json_encode($_SESSION['tgl']);
        die();
    }
}