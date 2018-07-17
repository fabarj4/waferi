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
    <div class="row">
        <div id="penjualanCard" class="col s12">
          <div class="col s7">

            <div class="input-field col s12">
              <select id="konsumen">
                <option value="" disabled selected>Pilih Konsumen</option>
                <?php foreach ($konsumen as $k) { ?>
                  <option value="<?php echo $k->id?>"><?php echo $k->nama?></option>
                <?php } ?>
              </select>
              <label>Konsumen</label>
            </div>
          </div>
          <div class="col s5">
            <div class="input-field">
              <textarea id="ket" class="materialize-textarea"></textarea>
              <label for="ket">Keterangan</label>
            </div>
          </div>

        </div>

        <div id="penjualanDetailCard" class="col s12">
          <table class="responsive-table">
            <thead>
              <tr>
                  <th>Barang</th>
                  <th>Jumlah</th>
              </tr>
            </thead>

            <tbody>
              <?php foreach ($barang as $b) {?>
                <tr>
                  <td><?php echo $b->nm_barang ?></td>
                  <td>
                    <div class="input-field">
                      <input id="<?php echo $b->id_barang?>" name="barang" type="number">
                    </div>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>

        </div>

        <div id="confrim" class="col s12">
          <a class="waves-effect waves-light btn">Simpan</a>
        </div>
    </div>
</div>

<div class="fixed-action-btn">
  <a class="btn-floating btn-large waves-effect waves-light red" href="<?php echo base_url() ?>Penjualan_Card">
    <i class="large material-icons">add</i>
  </a>
</div>
<!-- <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a> -->

<!--  Scripts-->
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.material.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('asset/plugins/sweetalert2/dist/sweetalert2.all.min.js') ?>"></script>
<script type="text/javascript" src="https://momentjs.com/downloads/moment-with-locales.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
      $('#konsumen').formSelect();
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
            this.querySelector('#nav-text').innerText = 'Penjualan Card';
        }
    );




    //select event
    document.addEventListener('DOMContentLoaded', function() {
      var elems = document.querySelectorAll('#konsumen');
      // var instances = M.FormSelect.init(elems, options);
    });

    document.getElementById("confrim").addEventListener("click", function(){
      let ket = document.getElementById("ket").value;
      let konsumen = document.getElementById("konsumen").options[document.getElementById("konsumen").selectedIndex].value;
      let databarang = [];
      for(let i=0;i<document.getElementsByName("barang").length;i++){
        let item = {id:document.getElementsByName("barang")[i].id,value:document.getElementsByName("barang")[i].value}
        databarang.push(item);
      }
      $.ajax({
        url : "<?php echo base_url()?>penjualan/savePenjualan",
        type: 'post',
        data: {ket:ket, id_konsumen:konsumen, databarang:databarang},
        dataType: 'json',
        success: function(response){
          console.log(response);
        }
      });
    });

    // $("#konsumen").on('change', function(e) {
    //     let value = e.target.value;
    //     let id = <?php echo $id ?>;
    //     $.ajax({
    //       url : "<?php echo base_url()?>penjualan/savePenjualan",
    //       type: 'post',
    //       data: {id:id, id_konsumen:value},
    //       dataType: 'json',
    //       success: function(response){
    //         console.log(response);
    //         window.location.replace("<?php echo base_url()?>penjualan/card/<?php echo $id ?>");
    //       }
    //     });
    // });
</script>
</body>
