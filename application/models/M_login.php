<?php @session_start();
/**
 * Created by PhpStorm.
 * User: irvan
 * Date: 12/07/18
 * Time: 22:32
 */
class M_Login extends CI_Model {

}

if($_POST){
    $return = new stdClass();
    $tipe = $_POST['tipe'];
    switch ($tipe){
        case 'login':
            $user = $_POST['u'];
            $pass = $_POST['p'];
            if($user=='admin'){
                $stat = 'v_admin_main';
                $url = 'Panel_Admin';
                $_SESSION['statUser'] = 1;
            }else{
                $stat = 'v_panel';
                $url = 'Panel';
                $_SESSION['statUser'] = 2;
            }
            $return->stat = $stat;
            $return->url = $url;
            break;
    }
    echo json_encode($return);
    die();
}