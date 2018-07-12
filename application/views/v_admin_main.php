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
    </style>
</head>
<body style="background: #ebe7e7">
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
            <li class="active"><a href="#!">Dashboard</a></li>
            <li class=""><a href="#!">Barang</a></li>
            <li class=""><a href="#!">Laporan</a></li>
            <li class=""><a href="/logout">Logout</a></li>
        </div>
    </ul>
    <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
</nav>
<div class="main">
    <div class="container">
        <div class="row">
            <div class="col s12">
                <h2 class="header">Dashboard</h2>
                <div class="card horizontal">
                    <div class="card-stacked">
                        <div class="card-content">
                            <div class="row">
                                <div class="col s6 m3">
                                    <img src="<?php echo base_url('/asset/image/logo.png') ?>" style="width: 100px">
                                </div>
                                <div class="col s6 m9">
                                    <h5>PT. Waferi Laris Manis</h5>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr/>
        <h5>Data Rekap Bulan Ini</h5>
        <div class="row">
            <div class="col s12 m6">
                <div class="card-panel text-center light-blue darken-3 white-text">
                    <div class="card-content ">
                        <i class="material-icons">business_center</i>
                        <h1>300</h1>
                    </div>
                    <div class="card-action">
                        <h6>Hasil Penjualan</h6>
                    </div>
                </div>
            </div>
            <div class="col s12 m6">
                <div class="card-panel text-center teal darken-3 white-text">
                    <div class="card-content ">
                        <i class="material-icons">shopping_cart</i>
                        <h1>2500</h1>
                    </div>
                    <div class="card-action">
                        <h6>Stok Barang</h6>
                    </div>
                </div>
            </div>
        </div>
        <hr/>
        <h5>Grafik Penjualan per Bulan</h5>
        <div class="card">
        <div id="chart_div"></div>
        </div>
    </div>
</div>
<!-- <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a> -->

<!--  Scripts-->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="<?php echo base_url('asset/js/materialize.js') ?>"></script>
<script src="<?php echo base_url('asset/js/init.js') ?>"></script>
<script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ["Bulan", "Jumlah", { role: "style" } ],
            ["April", 100, "#76A7FA"],
            ["Mei", 250, "#76A7FA"],
            ["Juni", 210, "#76A7FA"],
            ["Juli", 300, "#76A7FA"]
        ]);
        var view = new google.visualization.DataView(data);
        view.setColumns([0, 1,
            { calc: "stringify",
                sourceColumn: 1,
                type: "string",
                role: "annotation" },
            2]);

        var options = {
            title: "Penjualan Tiap Bulan",
            width: 600,
            height: 400,
            bar: {groupWidth: "95%"},
            legend: { position: "none" },
        };
        var chart = new google.visualization.ColumnChart(
            document.getElementById('chart_div'));

        chart.draw(data, options);
    }
</script>
</body>
</html>
