<title>Waferi - Neraca</title>
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
    <table class="tblIsi" style="width: 50%;float:left">
        <tbody>
        <tr>
            <th colspan="2" width="50%">Assets</th>
        </tr>
        <!--        --><?php //print json_encode($aktiva['data']); ?>
        <?php
        foreach ($aktiva['data'] as $index => $item) {
            ?>
            <tr>
                <td><?php print $item['ket'] ?></td>
                <td style="text-align: right"><?php print number_format(abs($item['saldo']), 0, ".", ".") ?></td>
            </tr>
        <?php } ?>


        </tbody>
    </table>
    <table class="tblIsi" style="width: 50%;float:left">
        <tbody>
        <tr>
            <th colspan="2">Kewajiban</th>
        </tr>
        <tr>
            <td>Utang Usaha</td>
            <td style="text-align: right">0</td>
        </tr>
        <tr>
            <th colspan="2">Ekuitas</th>
        </tr>
        <?php
        foreach ($ekuitas['data'] as $index => $item) { ?>
            <tr>
                <td><?php print $item['ket'] ?></td>
                <td style="text-align: right"><?php print number_format(abs($item['saldo']), 0, ".", ".") ?></td>
            </tr>
        <?php } ?>

        <tr>
            <td>Laba (Rugi) Periode Berjalan</td>
            <td style="text-align: right">
                <?php
                if ($labaRugi < 0) {
                    print '(' . number_format(abs($labaRugi), 0, ".", ".") . ')';
                } else {
                    print number_format(abs($labaRugi), 0, ".", ".");
                }
                ?>
            </td>
        </tr>

        </tbody>
    </table>

    <table class="tblIsi" style="width: 50%;float: left">
        <tr>
            <th width="55%">Total :</th>
            <th style="text-align: right">
                <?php print number_format($aktiva['totalSaldo'], 0, ".", ".") ?>
            </th>
        </tr>
    </table>
    <table class="tblIsi" style="width: 50%;float: left">
        <th style="text-align: right"><?php
            print number_format(($ekuitas['totalSaldo'] + $labaRugi),0, ".", ".");
            ?></th>
    </table>

    <br/>
    <br/>
    <div class="tools" style="margin-top: 20%;">
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