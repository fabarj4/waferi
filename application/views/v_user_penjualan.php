<?php include 'head_user.php' ?>
<link type="text/css" rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/material-design-lite/1.1.0/material.min.css"/>
<link type="text/css" rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.material.min.css"/>
<link type="text/css" rel="stylesheet" href="<?php echo base_url('asset/plugins/sweetalert2/dist/sweetalert2.min.css') ?>"/>
<style type="text/css">
    .dataTables_length .form-control.input-sm {
        display: block;
        width: 50%;
        border: 1px solid #757474;
    }
</style>
<body style="background: #ebe7e7">
<div class="main">
    <div id="modal1" class="modal">
        <div class="modal-content">
            <div class="row">
                <div class="input-field  col s6">
                    <select id="idBarang">
                        <option value="1" selected>Waferi Cokelat</option>
                    </select>
                    <label>Nama</label>
                </div>
                <div class="input-field col s6">
                    <input id="stok" type="number" min="0" class="validate">
                    <label for="stok">Stok</label>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <a id="btnStok" class="modal-close waves-effect waves-green btn-flat">Tambah</a>
        </div>
    </div>
    <div class="row">
        <div class="col s12">
            <!-- <h2 class="header">Barang</h2> -->
                <h5>Daftar Penjualan</h5>
                <!-- <a class="waves-effect waves-light btn blue darken-4 modal-trigger" data-target="modal1">
                    <i class="material-icons left">add</i>Tambah Stok</a> -->
                <table class="responsive-table" style="width:100%">
                    <thead>
                    <tr>
                        <th>No.</th>
                        <th>Tanggal Penjualan</th>
                        <th>Jumlah</th>
                        <th>Konsumen</th>
                        <th>Ket</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php $index = 0;?>
                      <?php foreach ($penjualan as $p) {?>
                        <tr>
                            <td><?php echo $index++ ?></td>
                            <td><?php echo $p->tgl_penjualan ?></td>
                            <td><?php echo $p->jumlah ?></td>
                            <td><?php echo $p->id_konsumen ?></td>
                            <td><?php echo $p->ket ?></td>
                        </tr>
                      <?php } ?>
                    </tbody>
                </table>
        </div>
    </div>
    <div class="fixed-action-btn">
      <a class="btn-floating btn-large waves-effect waves-light red" href="<?php echo base_url() ?>penjualan/card/0">
        <i class="large material-icons">add</i>
      </a>
    </div>
</div>
<!-- <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a> -->

<!--  Scripts-->
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.material.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('asset/plugins/sweetalert2/dist/sweetalert2.all.min.js') ?>"></script>
<script type="text/javascript" src="https://momentjs.com/downloads/moment-with-locales.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
      $('.modal').modal();
      $('#idBarang').formSelect();
      moment.locale('id-ID');

      let halaman = 'penjualan';
      menus = this.querySelector('nav').getElementsByTagName('li');
      for (let i = 0; i < menus.length; i++) {
        if (menus[i].className === "active" && menus[i].id !== halaman) {
          menus[i].classList.remove("active");
        }
            }
            this.querySelector('#' + halaman).className = "active";
            this.querySelector('#nav-text').innerText = 'Penjualan';
        }
    );



</script>
</body>
