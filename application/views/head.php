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
    <title>Starter Template - Materialize</title>

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

        .text-center {
    text-align: center !important;
        }

        .rekap{
    height: 232px;
        }
    </style>
</head>
<body>
<nav> <!-- navbar content here  -->
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
            <li class="active"><a href="/">Dashboard</a></li>
            <li class=""><a href="/barang">Barang</a></li>
            <li class=""><a href="#!">Laporan</a></li>
            <li class=""><a href="/logout">Logout</a></li>
        </div>
    </ul>
    <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
</nav>
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="<?php echo base_url('asset/js/materialize.js') ?>"></script>
<script src="<?php echo base_url('asset/js/init.js') ?>"></script>
</body>