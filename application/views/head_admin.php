<?php
/**
 * Created by PhpStorm.
 * User: irvan
 * Date: 13/07/18
 * Time: 3:04
 */?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
    <title>Waferi - Admin Page</title>
    <link rel="icon" href="<?php echo base_url()?>logo.ico" type="image/x-icon">
    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="<?php echo base_url('asset/css/materialize.min.css') ?>" type="text/css" rel="stylesheet"
          media="screen,projection"/>
    <link href="<?php echo base_url('asset/css') ?>" type="text/css" rel="stylesheet" media="screen,projection"/>

    <style>
        .main {
    padding-left: 310px;
        }

        .headerImage {
    margin-top: 10px;
            height: 150px;
        }

        .headerText {
    color: #000000;
}

        .headerContent {
    height: calc(100% - 210px);
            overflow-y: auto;
        }

        .scroll::-webkit-scrollbar {
            width: 10px;
        }

        .scroll::-webkit-scrollbar-thumb {
            background: #666;
            border-radius: 20px;
        }

        .scroll::-webkit-scrollbar-track {
            background: #ddd;
            border-radius: 20px;
        }

        @media only screen and (max-width: 992px) {
    .main {
        padding-left: 0;
            }
        }

        @media only screen and (min-width: 992px){
          nav{
            padding-left: 300px;
            /* margin-left: 300px; */
          }
          .nav-text{
            margin-left: 10px;
          }
        }

        .text-center {
    text-align: center !important;
        }

        .rekap{
    height: 232px;
        }
    </style>
</head>
<body>
<nav id="nav"> <!-- navbar content here  -->
    <ul id="slide-out" class="sidenav sidenav-fixed">
        <li>
        <li class="headerImage">
            <center><img class="responsive-img" src="<?php echo base_url('/asset/image/logo.png') ?>" alt="Logo"
                         width="150px" height="150px"></center>
        </li>
        <li class="headerText">
            <center>ADMIN</center>
        </li>
        </li>
        <div class="headerContent scroll">
            <li id="dashboard" class=""><a href="<?php echo base_url() ?>Panel_Admin">Dashboard</a></li>
            <li id="barang" class=""><a href="<?php echo base_url() ?>barang">Barang</a></li>
            <li id="laporan" class=""><a href="<?php echo base_url() ?>laporan">Laporan</a></li>
            <li id="logout" class=""><a href="<?php echo base_url() ?>login/actlogout">Logout</a></li>
        </div>
    </ul>
    <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    <div id="nav-text" class="brand-logo nav-text"></div>
</nav>
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="<?php echo base_url('asset/js/materialize.js') ?>"></script>
<script src="<?php echo base_url('asset/js/init.js') ?>"></script>
</body>
