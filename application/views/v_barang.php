<?php include 'head_admin.php' ?>
<link type="text/css" rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/material-design-lite/1.1.0/material.min.css"/>
<link type="text/css" rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.material.min.css"/>
<link type="text/css" rel="stylesheet"
      href="<?php echo base_url('asset/plugins/sweetalert2/dist/sweetalert2.min.css') ?>"/>
<style type="text/css">
    .dataTables_length .form-control.input-sm {
        display: block;
        width: 50%;
        border: 1px solid #757474;
    }
</style>
<body style="background: #ebe7e7">
<div class="main">
    <div id="modal" class="modal">
        <div class="modal-content">
            <div class="row">
                <div class="input-field  col s12">
                    <input id="supp_nama" type="text" class="validate">
                    <label for="supp_nama">Nama</label>
                </div>
                <div class="input-field col s12">
                    <input id="supp_hp" type="text" min="0" class="validate">
                    <label for="supp_hp">No. HP</label>
                </div>
                <div class="input-field  col s12">
                    <textarea id="supp_adr" class="materialize-textarea"></textarea>
                    <label for="supp_adr">Alamat</label>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <a id="btnAddSupplier" class="modal-close waves-effect waves-green btn-flat">Tambah</a>
        </div>
    </div>
    <div class="row">
        <div class="col s12">
            <div class="card-panel">
                <h5>Tabel Supplier</h5>
                <a class="waves-effect waves-light btn blue darken-4 modal-trigger" data-target="modal">
                    <i class="material-icons left">add</i> Supplier</a>
                <table id="tbl_supplier" class="responsive-table" style="width:100%">
                    <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>HP</th>
                    </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
    <hr/>
    <div id="modal1" class="modal">
        <div class="modal-content">
            <div class="row">
                <div class="input-field  col s6">
                    <select id="idBarang">
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
    <div id="mdl_barang" class="modal modal-fixed-footer">
        <div class="modal-content">
            <div class="row">
                <div class="input-field  col s12">
                    <select class="idSupplier">
                    </select>
                    <label>Supplier</label>
                </div>
                <div class="input-field col s12">
                    <input id="brg_nmBarang" type="text" class="validate">
                    <label for="brg_nmBarang">Nama Barang</label>
                </div>
                <div class="input-field col s12">
                    <input id="brg_stok" type="number" min="0" class="validate">
                    <label for="brg_stok">Stok</label>
                </div>
                <div class="input-field col s12">
                    <input id="brg_hargaB" type="number" min="0" class="validate">
                    <label for="brg_hargaB">Harga Beli @Stok</label>
                </div>
                <div class="input-field col s12">
                    <input id="brg_hargaJ" type="number" min="0" class="validate">
                    <label for="brg_hargaJ">Harga Jual @Stok</label>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <a id="btnAddBarang" class="modal-close waves-effect waves-green btn-flat">Tambah</a>
        </div>
    </div>
    <div class="row">
        <div class="col s12">
            <div class="card-panel">
                <h5>Tabel Barang</h5>
                <a class="waves-effect waves-light btn blue darken-4 modal-trigger" data-target="mdl_barang"
                   id="btn_mdl_barang">
                    <i class="material-icons left">add</i> Barang</a>
                <a class="waves-effect waves-light btn blue darken-4 modal-trigger" data-target="modal1">
                    <i class="material-icons left">add</i> Stok</a>
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
<script type="text/javascript"
        src="<?php echo base_url('asset/plugins/sweetalert2/dist/sweetalert2.all.min.js') ?>"></script>
<script type="text/javascript" src="https://momentjs.com/downloads/moment-with-locales.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
            $('.modal').modal();

            moment.locale('id-ID');
            stokBarang();
            supplier();
            $('#mdl_barang').modal({
                onCloseEnd: function () {
                    $(':input', '#mdl_barang').val('');
                }
            });
            $('#modal').modal({
                onCloseEnd: function () {
                    $(':input', '#modal').val('');
                }
            });
            $('#modal1').modal({
                onCloseEnd: function () {
                    $(':input', '#modal1').val('');
                }
            });
            let halaman = 'barang';
            menus = this.querySelector('nav').getElementsByTagName('li');
            for (let i = 0; i < menus.length; i++) {
                if (menus[i].className === "active" && menus[i].id !== halaman) {
                    menus[i].classList.remove("active");
                }
            }
            this.querySelector('#' + halaman).className = "active";
            this.querySelector('#nav-text').innerText = 'Barang';

            function stokBarang() {
                var html,select = '';
                $.ajax({
                    type: 'post',
                    url: 'Barang/Stok',
                    data: {tipe: 'stok'},
                    dataType: 'json'
                }).done(function (x) {
                    var data = x.data;
                    var no = 1;
                    $.each(data, function (c, d) {
                        let waktu = moment(d.tgl_update).format('LLL');
                        html += "<tr><td>" + no + "</td>";
                        html += "<td>" + d.nm_barang + "</td>";
                        html += "<td>" + d.stock + "</td>";
                        html += "<td>" + waktu + "</td></tr>";
                        select+='<option value="'+d.id_barang+'">'+d.nm_barang+'</option>';
                        no++;
                    })
                }).always(function () {
                    $('#example tbody').html(html);
                    $('#idBarang').html(select);
                    $('#idBarang').formSelect();
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
                if (id && stok > 0) {
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
            $('#btnAddBarang').click(function () {
                let supp = $('.idSupplier').val();
                let nm = $('#brg_nmBarang').val();
                let stok = $('#brg_stok').val();
                let hargaB = $('#brg_hargaB').val();
                let hargaJ = $('#brg_hargaJ').val();
                const tblSup = document.getElementById("example");
                if (nm && stok && hargaB && hargaJ) {
                    $.ajax({
                        type: 'post',
                        url: 'Barang/Stok',
                        data: {
                            tipe: 'addBarang', supplier: supp,
                            nm: nm, stok: stok, hargaB: hargaB, hargaJ: hargaJ
                        },
                        dataType: 'json'
                    }).done(function (x) {
                        if (x.data) {
                            stokBarang();
                            swal({
                                type: 'success',
                                title: 'Data Berhasil Diupdate',
                                timer: 2000
                            }).then(function () {
                                tblSup.scrollIntoView();
                            })
                        }
                    });
                } else {
                    swal({
                        type: 'warning',
                        title: 'Silahkan Lengkapi Seluruh Data',
                        timer: 2000
                    }).then(function () {
                        $('#mdl_barang').modal('open');
                    })
                }
            })

            function supplier() {
                let html, select = '';
                $.ajax({
                    type: 'post',
                    url: 'Barang/Stok',
                    data: {tipe: 'supplier'},
                    dataType: 'json'
                }).done(function (x) {
                    let data = x.data;
                    let no = 1;
                    $.each(data, function (c, d) {
                        html += "<tr><td>" + no + "</td>";
                        html += "<td>" + d.nama + "</td>";
                        html += "<td>" + d.alamat + "</td>";
                        html += "<td>" + d.no_hp + "</td></tr>";
                        select += '<option value="' + d.id + '">' + d.nama + '</option>';
                        no++;
                    })
                }).always(function (x) {
                    $('#tbl_supplier tbody').html(html);
                    $('.idSupplier').html(select);
                    $('.idSupplier').formSelect();
                });
            }

            $('#btnAddSupplier').click(function () {
                let nm = $('#supp_nama').val();
                let hp = $('#supp_hp').val();
                let adr = $('#supp_adr').val();
                const tblSup = document.getElementById("supplier");
                if (nm && hp && adr) {
                    $.ajax({
                        type: 'post',
                        url: 'Barang/Stok',
                        data: {tipe: 'addSupplier', nm: nm, hp: hp, adr: adr},
                        dataType: 'json'
                    }).done(function (x) {
                        if (x.data) {
                            supplier();
                            swal({
                                type: 'success',
                                title: 'Data Berhasil Diupdate',
                                timer: 2000
                            }).then(function () {
                                tblSup.scrollIntoView();
                            })
                        }
                    });
                } else {
                    swal({
                        type: 'warning',
                        title: 'Silahkan Lengkapi Seluruh Data',
                        timer: 2000
                    }).then(function () {
                        $('#modal').modal('open');
                    })
                }
            })
        }
    );
</script>
</body>
