<?php include 'head.php' ?>
<style type="text/css">
    .btnReport {
        margin-bottom: 2%;
        margin-top: 2%;
    }
</style>
<body style="background: #ebe7e7">
<div class="main">
    <div class="container">
        <div class="row">
            <div class="col s12">
                <h2 class="header">Laporan</h2>
                <label>Tanggal Laporan</label>
                <input type="text" id="tglLaporan" class="datepicker" value="<?php echo date("d-m-Y") ?>"/>

                <div class="card-panel text-center">
                    <a class="waves-effect waves-light btn blue darken-4 btnReport" id="btnNeraca">
                        <i class="material-icons left">insert_drive_file</i>Laporan Neraca</a>
                    <hr/>
                    <a class="waves-effect waves-light btn green darken-2 btnReport" id="btnLaba">
                        <i class="material-icons left">attach_money</i>Laporan Laba Rugi</a>
                    <hr/>
                    <a class="waves-effect waves-light btn orange darken-4 btnReport" id="btnKas">
                        <i class="material-icons left">account_balance_wallet</i>Laporan Arus Kas</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a> -->

<!--  Scripts-->
<script type="text/javascript">
    $(document).ready(function () {
            let halaman = 'laporan';
            menus = this.querySelector('nav').getElementsByTagName('li');
            for (let i = 0; i < menus.length; i++) {
                if (menus[i].className === "active" && menus[i].id !== halaman) {
                    menus[i].classList.remove("active");
                }
            }
            this.querySelector('#' + halaman).className = "active";

            $('.datepicker').datepicker({format: "dd-mm-yyyy"});

            $('#btnNeraca').click(function () {
                var time = $('#tglLaporan').val();
                $.ajax({
                    type: 'post',
                    url: 'Laporan/Tgl',
                    data: {tgl: time},
                    dataType: 'json'
                }).done(function (x) {
                        window.location.href = "/neraca";
                });
            });
        }
    );
</script>
</body>