<?php @session_start();

/**
 * Created by PhpStorm.
 * User: irvan
 * Date: 12/07/18
 * Time: 22:32
 */
class M_Pengguna extends CI_Model
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
            case 'user':
                $SQL = $this->db->get('akuntan.user');
                $data = $SQL->result_array();
                foreach ($data as $index=>$item){
                    if($item['tipe']=='1'){
                        $data[$index]['tipe'] = 'Admin';
                    }else{
                        $data[$index]['tipe'] = 'User';
                    }
                }
                $return->data = $data;
                break;
            case 'addUser':
                $tp = $_POST['tp'];
                $nm = strtoupper($_POST['nm']);
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $sql = "INSERT INTO akuntan.user(username, pass, tipe, nama) VALUES ('$user','$pass','$tp','$nm')";
                $data=$this->db->query($sql);
                $return->data = $data;
                break;
        }
        echo json_encode($return);
        die();
    }
}