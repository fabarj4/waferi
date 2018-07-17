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
    <h2 class="header">Laporan Arus Kas</h2>
    <h5>Tanggal : <span id="tgl"></span></h5>
</div>
<div style="padding-left: 5%;padding-right: 5%">
    <table class="tblIsi">
        <tbody>
        <tr><th colspan="4">Arus kas dari Aktivitas Operasi</th></tr>
        <tr><td></td><td>Kas diterima dari pelanggan</td><td align="right">xx.xxx.xxx</td><td></td></tr>
        <tr><td></td><td>Dikurangi pembayaran kas untuk beban</td><td>xx.xxx.xxx</td><td></td></tr>
        <tr><td></td><td>Arus kas bersih dari aktivitas operasi</td><td></td><td style="text-align: right">xx.xxx.xxx</td></tr>

        <tr><th colspan="4">Arus kas dari Aktivitas investasi</th></tr>
        <tr><td></td><td>Penjualan (Pembelian) Aktiva Tetap</td><td></td><td>(xx.xxx.xxx)</td></tr>

        <tr><th colspan="4">Arus kas dari Aktivitas Pendanaan</th></tr>
        <tr><td></td><td>Kas diterima sebagai investasi oleh pemilik</td><td>xx.xxx.xxx</td><td></td></tr>
        <tr><td></td><td>Dikurangi penarikan oleh pemilik</td><td>xx.xxx.xxx</td><td></td></tr>
        <tr><td></td><td>Arus kas bersih dari aktivitas pendanaan</td><td></td><td>xx.xxx.xxx</td></tr>

        <tr><td>Arus kas bersih dari aktivitas pendanaan</td><td></td><td>xx.xxx.xxx</td><td></td></tr>

        <tr><th colspan="2">Arus kas dari Aktivitas Pendanaan</th><th></th><th>0</th></tr>
        <tr><th colspan="2">Arus kas dari Aktivitas Pendanaan</th><th></th><th>xx.xxx.xxx</th></tr>
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