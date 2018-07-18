<?php include 'head_admin.php' ?>
<link type="text/css" rel="stylesheet"
      href="<?php echo base_url('asset/plugins/sweetalert2/dist/sweetalert2.min.css') ?>"/>

<body style="background: #ebe7e7">
<div class="main">
    <div class="container">
        <div class="row">
            <div class="input-field col s12" style="margin-top: 5%">
                <select id="idTipe">
                    <option value="" disabled selected>-- Pilih Tipe Proses Keuangan --</option>
                    <option value="0">Debit</option>
                    <option value="1">Kredit</option>
                </select>
            </div>
            <div class="input-field col s12">
                <input type="text" id="tgl" class="datepicker" value="<?php echo date("d-m-Y") ?>"/>
                <label>Tanggal Jurnal</label>
            </div>
        </div>
    </div>

    <div id="modal" class="modal modal-fixed-footer">
        <div class="modal-content">
            <div class="row">
                <div class="input-field  col s12">
                    <select id="idJenis">
                    </select>
                    <label>Jenis Proses</label>
                </div>
                <div class="input-field col s12">
                    <input id="jurnal_saldo" type="number" min="0" class="validate">
                    <label for="jurnal_saldo">Saldo</label>
                </div>
                <div class="input-field col s12">
                    <textarea id="jurnal_ket" class="materialize-textarea"></textarea>
                    <label for="jurnal_ket">Keterangan</label>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <a id="btnAddData" class="modal-close waves-effect waves-green btn-flat">Tambah</a>
        </div>
    </div>
    <div class="row hide" id="main_content">
        <div class="col s12">
            <div class="card-panel">
                <h5>Tabel Keuangan</h5>
                <a class="waves-effect waves-light btn blue darken-4 modal-trigger" data-target="modal">
                    <i class="material-icons left">add</i> Proses</a>
                <table id="tbl_user" class="responsive-table" style="width:100%">
                    <thead>
                    <tr>
                        <th>No.</th>
                        <th>Tanggal</th>
                        <!--                        <th>Username</th>-->
                        <th>Saldo</th>
                        <th>Jenis</th>
                        <th>Keterangan</th>
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
<script type="text/javascript"
        src="<?php echo base_url('asset/plugins/sweetalert2/dist/sweetalert2.all.min.js') ?>"></script>
<script type="text/javascript" src="https://momentjs.com/downloads/moment-with-locales.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
            $('.modal').modal();
            $('.datepicker').datepicker({format: "dd-mm-yyyy"});
            $('#idTipe').formSelect();
            moment.locale('id-ID');

            $('#modal').modal({
                onCloseEnd: function () {
                    $(':input', '#modal').val('');
                }
            });

            let halaman = 'keuangan';
            menus = this.querySelector('nav').getElementsByTagName('li');
            for (let i = 0; i < menus.length; i++) {
                if (menus[i].className === "active" && menus[i].id !== halaman) {
                    menus[i].classList.remove("active");
                }
            }
            this.querySelector('#' + halaman).className = "active";
            this.querySelector('#nav-text').innerText = 'Keuangan';

            $("#idTipe").on('change', function () {
                let tp = $(this).val();
                let tgl = $('#tgl').val();
                let select = '';
                $.ajax({
                    type: 'post',
                    url: 'Keuangan/data',
                    data: {tipe: 'jenis', tp: tp},
                    dataType: 'json'
                }).done(function (x) {
                    var data = x.data;
                    $.each(data, function (c, d) {
                        select += '<option value="' + d.id + '">' + d.nm + '</option>';
                    })
                    getData(tp, tgl);
                    $('#main_content').removeClass('hide');
                }).always(function () {
                    $('#idJenis').html(select);
                    $('#idJenis').formSelect();
                });
            });

            $("#tgl").on('change', function () {
                let tp = $('#idTipe').val();
                if (tp) {
                    getData(tp, $(this).val());
                }
            });

            function getData(tipe, tgl) {
                let html;
                $.ajax({
                    type: 'post',
                    url: 'Keuangan/data',
                    data: {tipe: 'data', tp: tipe, tgl: tgl},
                    dataType: 'json'
                }).success(function (x) {
                    let data = x.data;
                    let no = 1;
                    if (data) {
                        $.each(data, function (c, d) {
                            html += "<tr><td>" + no + "</td>";
                            html += "<td>" + d.tgl + "</td>";
//                        html += "<td>" + d.user + "</td>";
                            html += "<td style='text-align: right'>" + d.saldo + "</td>";
                            html += "<td>" + d.jenis + "</td>";
                            html += "<td><span class='tooltipped' data-position='bottom' " +
                                "data-tooltip='"+d.ket+"'>" + d.ketsub + "</span></td>" +
                                "</tr>";
                            no++;
                        })
                    } else {
                        html = "<tr></tr>";
                    }
                }).always(function () {
                    $('#tbl_user tbody').html(html);
                    $('.tooltipped').tooltip();
                });
            }

            $('#btnAddData').click(function () {
                let tp = $('#idTipe').val();
                let jns = $('#idJenis').val();
                let saldo = $('#jurnal_saldo').val();
                let ket = $('#jurnal_ket').val();
                let tgl = $('#tgl').val();
                const tblSup = document.getElementById("tbl_user");
                if (jns && saldo && ket) {
                    $.ajax({
                        type: 'post',
                        url: 'Keuangan/data',
                        data: {
                            tipe: 'addData', tp: tp, jns: jns,
                            saldo: saldo, ket: ket
                        },
                        dataType: 'json'
                    }).done(function (x) {
                        if (x.data) {
                            getData(tp, tgl);
                            swal({
                                type: 'success',
                                title: 'Data Berhasil Ditambahkan',
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
