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
    <h2 class="header">Laporan Laba Rugi</h2>
    <h5>Tanggal : <span id="tgl"></span></h5>
</div>
<div style="padding-left: 5%;padding-right: 5%">
<div class="row">
    <table class="tblIsi">
        <tbody>
          <tr>
            <th><b>Pendapatan</b></th>
            <th></th>
            <th style="text-align: right"><b><?php echo number_format($tampil_pendapatan, 0, ".", "."). "<br>";?></b></th>
          </tr>
          <tr>
            <td><b>Beban:</b></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td>Beban Gaji</td>
            <td style="text-align: right"><?php echo number_format($tampil_bebangaji, 0, ".", "."). "<br>";?></td>
            <td></td>
          </tr>
          <tr>
            <td>Pengeluaran Perusahaan Untuk Operasional</td>
            <td style="text-align: right"><?php echo number_format($tampil_pengeluaran, 0, ".", "."). "<br>";?></td>
            <td></td>
          </tr>
          <tr>
            <td>Pembelian Wafer dari Supplier</td>
            <td style="text-align: right"><?php echo number_format($tampil_pembelian, 0, ".", "."). "<br>";?></td>
            <td></td>
          </tr>
          <tr>
            <td><b>Total Beban</b></td>
            <td></td>
            <td style="text-align: right"><b>
              <?php $total_beban = $tampil_bebangaji+$tampil_pengeluaran+$tampil_pembelian;
              echo number_format($total_beban, 0, ".", "."). "<br>";; ?>
            </b></td>
          </tr>
          <tr>
            <td><b>
              <?php
                if ($tampil_pendapatan > $total_beban)
                  echo "Laba Bersih";
                elseif ($tampil_pendapatan < $total_beban)
                  echo "Rugi Bersih";
                else
                  echo "tetew";   //gak akan muncul soalnya hahahahhaha
               ?>
            </b></td>
            <td></td>
            <td style="text-align: right"><b>
              <?php $laba = $tampil_pendapatan-$total_beban;
              echo number_format(abs($laba), 0, ".", "."). "<br>";; ?>
            <b/></td>
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
