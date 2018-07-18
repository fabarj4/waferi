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
    <div id="modal" class="modal modal-fixed-footer">
        <div class="modal-content">
            <div class="row">
                <div class="input-field  col s12">
                    <select id="idTipe">
                        <option value="0" selected>User</option>
                        <option value="1">Admin</option>
                    </select>
                    <label>Nama</label>
                </div>
                <div class="input-field  col s12">
                    <input id="usr_nama" type="text" class="validate">
                    <label for="usr_nama">Nama</label>
                </div>
                <div class="input-field col s12">
                    <input id="usr_user" type="text" class="validate">
                    <label for="usr_user">Username</label>
                </div>
                <div class="input-field col s12">
                    <input id="usr_pass" type="password" class="validate">
                    <label for="usr_pass">Password</label>
                </div>
                <div class="input-field col s12">
                    <input id="usr_pass2" type="password" class="validate">
                    <label for="usr_pass2">Konfirmasi Password</label>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <a id="btnAddUser" class="modal-close waves-effect waves-green btn-flat">Tambah</a>
        </div>
    </div>
    <div class="row">
        <div class="col s12">
            <div class="card-panel">
                <h5>Tabel Pengguna</h5>
                <a class="waves-effect waves-light btn blue darken-4 modal-trigger" data-target="modal">
                    <i class="material-icons left">add</i> Pengguna</a>
                <table id="tbl_user" class="responsive-table" style="width:100%">
                    <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Tipe</th>
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
        $('#idTipe').formSelect();
            moment.locale('id-ID');

            user();

            $('#modal').modal({
                onCloseEnd: function () {
                    $(':input', '#modal').val('');
                }
            });

            let halaman = 'pengguna';
            menus = this.querySelector('nav').getElementsByTagName('li');
            for (let i = 0; i < menus.length; i++) {
                if (menus[i].className === "active" && menus[i].id !== halaman) {
                    menus[i].classList.remove("active");
                }
            }
            this.querySelector('#' + halaman).className = "active";
            this.querySelector('#nav-text').innerText = 'Pengguna';

            function user() {
                let html = '';
                $.ajax({
                    type: 'post',
                    url: 'Pengguna/User',
                    data: {tipe: 'user'},
                    dataType: 'json'
                }).done(function (x) {
                    let data = x.data;
                    let no = 1;
                    $.each(data, function (c, d) {
                        html += "<tr><td>" + no + "</td>";
                        html += "<td>" + d.nama + "</td>";
                        html += "<td>" + d.username + "</td>";
                        html += "<td>" + d.tipe + "</td></tr>";
                        no++;
                    })
                }).always(function (x) {
                    $('#tbl_user tbody').html(html);
                });
            }

            $('#btnAddUser').click(function () {
                let tp = $('#idTipe').val();
                let nm = $('#usr_nama').val();
                let usr = $('#usr_user').val();
                let pass = $('#usr_pass').val();
                let pass2 = $('#usr_pass2').val();
                const tblSup = document.getElementById("tbl_user");
                if (nm && usr && pass && pass2) {
                    if(pass==pass2){
                    $.ajax({
                        type: 'post',
                        url: 'Pengguna/User',
                        data: {tipe: 'addUser', tp:tp,nm: nm, user: usr, pass: pass,pass2: pass2},
                        dataType: 'json'
                    }).done(function (x) {
                        if (x.data) {
                            user();
                            swal({
                                type: 'success',
                                title: 'Data Berhasil Diupdate',
                                timer: 2000
                            }).then(function () {
                                tblSup.scrollIntoView();
                            })
                        }
                    });
                    }else {
                        swal({
                            type: 'warning',
                            title: 'Password dan Konfirmasi Password Tidak Sama',
                            timer: 2000
                        }).then(function () {
                            $('#modal').modal('open');
                        })
                    }
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
