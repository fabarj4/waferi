<?php include 'head_admin.php' ?>
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
            <div class="card-panel">
                <h5>Tabel Barang</h5>
                <a class="waves-effect waves-light btn blue darken-4 modal-trigger" data-target="modal1">
                    <i class="material-icons left">add</i>Tambah Stok</a>
                <table id="example" class="responsive-table" style="width:100%">
                    <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Stok</th>
                        <th>Tanggal Update</th>
                    </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
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

            let halaman = 'barang';
            menus = this.querySelector('nav').getElementsByTagName('li');
            for (let i = 0; i < menus.length; i++) {
                if (menus[i].className === "active" && menus[i].id !== halaman) {
                    menus[i].classList.remove("active");
                }
            }
            this.querySelector('#' + halaman).className = "active";
            this.querySelector('#nav-text').innerText = 'Barang';

            stokBarang();

            function stokBarang() {
                var html = '';
                $.ajax({
                    type: 'post',
                    url: 'Barang/Stok',
                    data: {tipe: 'stok'},
                    dataType: 'json'
                }).done(function (x) {
                    var data = x.data;
                    var no = 1;
                    $.each(data, function (c, d) {
                        var waktu = moment(d.TGL_UPDATE).format('LLL');
                        html += "<tr><td>" + no + "</td>";
                        html += "<td>" + d.NM_BARANG + "</td>";
                        html += "<td>" + d.STOCK + "</td>";
                        html += "<td>" + waktu + "</td></tr>";
                        no++;
                    })
                }).always(function () {
                    $('#example tbody').html(html);
//                    $('#example').DataTable({
//                        columnDefs: [
//                            {
//                                className: 'dt-body-left'
//                            }
//                        ],
//                        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
//                    });
                });
            }

            $('#btnStok').click(function () {
                var id = $('#idBarang').val();
                var stok = $('#stok').val();
                var elmnt = document.getElementById("example");
                if (stok > 0) {
                    console.log(id + ' ' + stok);
                    $.ajax({
                        type: 'post',
                        url: 'Barang/Stok',
                        data: {tipe: 'addStok', id: id, stok: stok},
                        dataType: 'json'
                    }).done(function (x) {
                        if (x.data) {
                            stokBarang();
                            swal({
                                type: 'success',
                                title: 'Data Berhasil Diupdate',
                                timer: 2000
                            }).then(function () {
                                elmnt.scrollIntoView();
                            })
                        }
                    });
                }
            })
        }
    );
</script>
</body>
