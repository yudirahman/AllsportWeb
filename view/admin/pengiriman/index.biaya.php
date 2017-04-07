<?php cutter_start('content') ?>
      <!-- =============================================== -->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <?php echo $halaman ?>
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- seting default pengirim -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Default Kabupaten/ Kota Untuk Pengiriman</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <form action="" method="POST" id="pengirim_default" style="display:none">
                <div class="form-group col-md-6">
                  <label>Alamat asal untuk pengiriman produk</label>
                  <select name="prov_pengirim" class="form-control">
                    <option value="">--Asal Provinsi Pengirim --</option>
                    <?php foreach ($provinsi as $key): ?>
                      <?php foreach ($key->results as $v): ?>
                        <option value="<?php echo $v->province_id ?>"><?php echo $v->province ?></option>}
                      <?php endforeach ?>
                    <?php endforeach ?>
                  </select>
                </div>
                <div class="form-group col-md-6">
                    <label>&nbsp</label>
                    <select name="kota_pengirim" class="form-control" >
                        <option value="">--Asal Kota/ Kabupaten Pengirim--</option>
                    </select>               
                </div>
                <div class="form-group col-md-6 col-md-offset-6 text-right">
                  <button class="btn btn-md btn-primary" id="btn_pengirim_default">Set as Default</button>
                </div>
              </form>
              <p class="text-right"><a href="javascript:void(0)" onclick="showEDP()"> <span id="spanTextEDP"><i class="fa fa-pencil"></i> Edit Default Pengirim </span></a></p>
              <div class="table-responsive">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>ID Provinsi</th>
                      <th>Nama Provinsi</th>
                      <th>ID Kabupaten/ Kota</th>
                      <th>Nama Kabupaten/ Kota</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($defaultPengirim as $v): ?>
                    <tr>
                      <td><?php echo $v['idprovinsi'] ?></td>
                      <td><?php echo $v['nama_provinsi'] ?></td>
                      <td><?php echo $v['idkota'] ?></td>
                      <td><?php echo $v['namakota'] ?></td>
                    </tr>                      
                    <?php endforeach ?>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="box-footer">
              Alamat default yang digunakan untuk mengirim semua produk.
            </div>
          </div>
          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Cek Biaya Pengiriman</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <form action="" method="POST" role="form" id="cekbiayapengiriman">
                <input type="hidden" name="cekbiaya">
        				 <div class="form-group col-md-6">
        				    <label>Alamat Asal</label>
        				    <select name="provinsi_asal" class="form-control">
                       			<option value="">--Pilih Provinsi--</option>
                       			<?php foreach ($provinsi as $key): ?>
                       				<?php foreach ($key->results as $v): ?>
                       					<option value="<?php echo $v->province_id ?>"><?php echo $v->province ?></option>}
                       				<?php endforeach ?>
                       			<?php endforeach ?>
                    </select>           		
        				 </div>
        				 <div class="form-group col-md-6">
        				    <label>&nbsp</label>
        				    <select name="kota_asal" class="form-control" >
                        <option value="">--Pilih Kota/ Kabupaten--</option>
                    </select>           		
        				 </div>
                 <div class="form-group col-md-6">
                    <label>Alamat Tujuan</label>
                    <select name="provinsi_tujuan" class="form-control">
                            <option value="">--Pilih Provinsi--</option>
                            <?php foreach ($provinsi as $key): ?>
                              <?php foreach ($key->results as $v): ?>
                                <option value="<?php echo $v->province_id ?>"><?php echo $v->province ?></option>}
                              <?php endforeach ?>
                            <?php endforeach ?>
                    </select>               
                 </div>
                 <div class="form-group col-md-6">
                    <label>&nbsp</label>
                    <select name="kota_tujuan" class="form-control">
                        <option value="">--Pilih Kota/ Kabupaten--</option>
                    </select>               
                 </div>  
                 <div class="form-group col-md-6">
                   <label>Berat <small>*dalam gram</small></label>
                   <input type="number" min="1000" max="50000" name="weight" placeholder="Berat dalam gram" class="form-control">             
                 </div>
                 <div class="form-group col-md-6">
                    <label>Pilihan Kurir</label>
                    <select name="kurir" class="form-control">
                        <option value="">--Pilih Kurir--</option>
                        <option value="jne">JNE</option>
                        <option value="pos">POS Indonesia</option>
                        <option value="tiki">TIKI</option>
                    </select>               
                 </div>
                 <div class="form-group col-md-6 col-md-offset-6 text-right">
                    <button type="button" class="btn btn-md btn-primary" id="periksa_biaya">Periksa</button>                 
                 </div>             	
              </form>
              <div class="col-md-12" id="hasil_biaya">
                
              </div>
            </div><!-- /.box-body -->
            <div class="box-footer">
              Form Cek Biaya Pengiriman.
            </div><!-- /.box-footer-->
          </div><!-- /.box -->

          
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

<?php cutter_end() ?>      

<?php cutter_start('css') ?>

<?php cutter_end() ?>

<?php cutter_start('js') ?>
  <script type="text/javascript">
    /*BIAYA PENGIRIMAN*/
        /*asal*/
        $('#cekbiayapengiriman [name=provinsi_asal]').on('change',function(){
          var idProv = $('#cekbiayapengiriman [name=provinsi_asal]').val();
          var url = "<?php echo SITEURL.URL_ADMIN.'/pengiriman/getcity/'?>"+idProv;
          $.getJSON(url,function(res){
             var kota = res.rajaongkir.results;
             var html='';
             for (var i = 0; i < kota.length; i++) {
               html +="<option value="+kota[i].city_id+">"+kota[i].city_name+"</option>";
             }
             $('#cekbiayapengiriman [name=kota_asal]').html(html);
          })
        })
        /*tujuan*/
        $('#cekbiayapengiriman [name=provinsi_tujuan]').on('change',function(){
          var idProv = $('#cekbiayapengiriman [name=provinsi_tujuan]').val();
          var url = "<?php echo SITEURL.URL_ADMIN.'/pengiriman/getcity/'?>"+idProv;
          $.getJSON(url,function(res){
             var kota = res.rajaongkir.results;
             var html='';
             for (var i = 0; i < kota.length; i++) {
               html +="<option value="+kota[i].city_id+">"+kota[i].city_name+"</option>";
             }
             $('#cekbiayapengiriman [name=kota_tujuan]').html(html);
          })
        })
        /*periksa_biaya*/
        $('#periksa_biaya').on('click',function(e){
          e.preventDefault();
          $('#hasil_biaya').html("<p style=\"color:green\"><i class=\"fa fa-refresh fa-spin\"></i> Mohon menunggu, sedang mengambil data...</p>");
          var cekbiaya = $('#cekbiayapengiriman [name=cekbiaya]').val();
          var origin =$('#cekbiayapengiriman [name=kota_asal]').val();
          var destination =$('#cekbiayapengiriman [name=kota_tujuan]').val();
          var weight=$('#cekbiayapengiriman [name=weight]').val();
          var kurir =$('#cekbiayapengiriman [name=kurir]').val();
          if (origin == '' || destination ==''|| weight== 0|| kurir=='') {
            $('#hasil_biaya').html("<p style=\"color:red\"><b>Form harus dilengkapi...!</b></p>");
            return false;
          }else if(weight > 30000){
            $('#hasil_biaya').html("<p style=\"color:red\"><b>Berat barang melampaui batas...!</b></p>");
            return false;
          }else{
            url ="<?php echo SITEURL.URL_ADMIN.'/pengiriman/getcost' ?>";
            $.ajax({
              type: "POST",
              url: url,
              dataType: 'json',
              data: "cekbiaya="+cekbiaya+"&origin="+origin+"&destination="+destination+"&weight="+weight+"&courier="+kurir,
              success: function(res){

                var namaKurir = res.rajaongkir.results[0].name;
                var html ="<h4 class=\"text-center\">"+namaKurir+"</h4>"; 
                html  +="<div class=\"table-responsive\"><table class=\"table\">"
                      +"<thead>"
                      +"<tr><th>Jenis Layanan</th><th>Biaya</th><th>Estimasi</th></tr>"
                      +"</thead><tbody>";
                var costs = res.rajaongkir.results[0].costs;

                if (costs.length < 1) {
                  html +="<tr><td colspan=\"3\">Tidak ada data untuk ditampilkan..</td></tr>";
                }else{
                  for (var i = 0; i < costs.length; i++) {
                    var estimasi='';
                    if (costs[i].cost[0].etd == "") {estimasi ='-';}else{estimasi = costs[i].cost[0].etd+" hari";}
                    html +="<tr>"
                            +"<td>"+costs[i].service+" - "+costs[i].description+"</td>"
                            +"<td>"+toRp(costs[i].cost[0].value)+"</td>"
                            +"<td>"+estimasi+"</td>"
                            +"</tr>";
                  }
                }
                html +="</tbody></table></div>";
                $('#hasil_biaya').html(html);
              }
            });
          }
          
        })

        function showEDP() {
          $('#pengirim_default').toggle(function(e){

          });
        }
        // bagian set default pengirim
        $('#pengirim_default [name=prov_pengirim]').on('change',function(){
          var idProv = $('#pengirim_default [name=prov_pengirim]').val();
          var url = "<?php echo SITEURL.URL_ADMIN.'/pengiriman/getcity/'?>"+idProv;
          $.getJSON(url,function(res){
             var kota = res.rajaongkir.results;
             var html='';
             for (var i = 0; i < kota.length; i++) {
               html +="<option value="+kota[i].city_id+">"+kota[i].city_name+"</option>";
             }
             $('#pengirim_default [name=kota_pengirim]').html(html);
          })
        })

        $('#btn_pengirim_default').on('click',function(e){
          e.preventDefault();
          if ($('#pengirim_default [name=prov_pengirim]').val() == '') {
            alert('Pilih Provinsi !');
          }else{
            var idprov = $('#pengirim_default [name=prov_pengirim]').val();
            var namaprov = $('#pengirim_default [name=prov_pengirim] option:selected').text();
            var idkota = $('#pengirim_default [name=kota_pengirim]').val();
            var namakota = $('#pengirim_default [name=kota_pengirim] option:selected').text();
            url ="<?php echo SITEURL.URL_ADMIN.'/pengiriman/addPengirim' ?>";
            $.ajax({
              type :"POST",
              url : url,
              dataType : "json",
              data :"submit=&idprov="+idprov+"&namaprov="+namaprov+"&idkota="+idkota+"&namakota="+namakota,
              success: function(res){
                // console.log(res);
                if (res == 'ok') {
                  alert("Data Berhasil di Update.");
                  window.location.reload();
                }else{
                  alert('Gagal update data, silahkan coba lagi,,,');
                }
              }
            });
            // alert($('#pengirim_default [name=prov_pengirim] option:selected').text());
          }
              
        });
  </script>
<?php cutter_end() ?>