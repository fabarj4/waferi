<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="<?php echo base_url('asset/css/materialize.min.css') ?>" type="text/css" rel="stylesheet"
      media="screen,projection"/>
<link type="text/css" rel="stylesheet" href="<?php echo base_url('/asset/css/cetakBlank.css') ?>"/>
<style type="text/css">
    .text-center {
        text-align: center !important;
    }
</style>
<body>
<div class="row text-center">
    <h2 class="header">Laporan Neraca</h2>
    <h5>Tanggal : <span id="tgl"></span></h5>
</div>
<div style="padding-left: 5%;padding-right: 5%">
    <table class="tblIsi">
        <tbody>
        <tr>
            <th colspan="2" width="50%">Assets</th>
            <th colspan="2">Kewajiban</th>
        </tr>
        <tr>
            <td>Kas</td>
            <td>xx.xxx.xxx</td>

            <td>Utang Usaha</td>
            <td>xx.xxx.xxx</td>
        </tr>
        <tr>
            <td>Peralatan Kantor</td>
            <td>xx.xxx.xxx</td>

            <th colspan="2">Ekuitas</th>
        </tr>
        <tr>
            <td>Bahan Habis Pakai</td>
            <td>xx.xxx.xxx</td>

            <td>Modal</td>
            <td>xx.xxx.xxx</td>
        </tr>
        <tr>
            <td>Piutang Sewa</td>
            <td>xx.xxx.xxx</td>

            <td>Laba (Rugi) Periode Berjalan</td>
            <td>(xx.xxx.xxx)</td>
        </tr>
        <tr>
            <th>Total :</th>
            <th>28.000.000</th>
            <th></th>
            <th>28.000.000</th>
        </tr>
        </tbody>
    </table>
    <br/>
    <br/>
    <div class="tools">
        <a href="<?php echo base_url() ?>laporan" class="waves-effect waves-light btn blue darken-4"><i
                    class="material-icons left">arrow_back</i> Kembali</a>
        <a id="btnCetak" class="waves-effect waves-light btn green darken-2"><i class="material-icons left">print</i>
            Cetak</a>
    </div>
</div>
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="https://momentjs.com/downloads/moment-with-locales.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        moment.locale('id-ID');
        <?php
        $originalDate = $_SESSION['tgl'];
        $newDate = date("Y-m-d", strtotime($originalDate));
        ?>
        var waktu = moment('<?php echo $newDate ?>').format('LL');
        $('#tgl').text(waktu);

        $('#btnCetak').click(function () {
            window.print();
        })
    });
</script>
</body>