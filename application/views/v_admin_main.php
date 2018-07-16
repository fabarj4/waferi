<?php include 'head_admin.php'?>
<body style="background: #ebe7e7">
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
            <div class="col s12 m4">
                <div class="card-panel rekap text-center light-blue darken-3 white-text">
                    <div class="card-content ">
                        <i class="material-icons">business_center</i>
                        <h1>300</h1>
                    </div>
                    <div class="card-action">
                        <h6>Hasil Penjualan</h6>
                    </div>
                </div>
            </div>
            <div class="col s12 m4">
                <div class="card-panel rekap text-center teal darken-3 white-text">
                    <div class="card-content ">
                        <i class="material-icons">shopping_cart</i>
                        <h1><?php print $jmlData->jmlBarang ?></h1>
                    </div>
                    <div class="card-action">
                        <h6>Stok Barang</h6>
                    </div>
                </div>
            </div>
            <div class="col s12 m4">
                <div class="card-panel rekap text-center orange darken-3 white-text">
                    <div class="card-content ">
                        <i class="material-icons">attach_money</i>
                        <br>
                        <br>
                        <h4>5.000.000</h4>
                    </div>
                    <div class="card-action">
                        <h6>Pendapatan Penjualan</h6>
                    </div>
                </div>
            </div>
        </div>
        <hr/>
        <h5>Grafik Penjualan per Bulan</h5>
        <div class="card">
        <center><div id="chart_div"></div></center>
        </div>
    </div>
</div>
<!-- <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a> -->

<!--  Scripts-->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
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

<!-- fungsi ini digunakan untuk menandai menu yang di akses pada nav -->
<script type="text/javascript">
$(document).ready(function(){
  let halaman = 'dashboard';
  menus = this.querySelector('nav').getElementsByTagName('li');
  for(let i=0;i<menus.length;i++){
    if(menus[i].className === "active" && menus[i].id !== halaman){
      menus[i].classList.remove("active");
    }
  }
  this.querySelector('#'+halaman).className = "active";
});
</script>
</body>
