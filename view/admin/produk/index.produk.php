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
          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Daftar Produk</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-sm btn-primary" onclick="showModalAddProduk()"><i class="fa fa-plus"></i> Tambah</button>
                <!-- <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button> -->
                <!-- <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button> -->
              </div>
            </div>
            <div class="box-body">
              <?php echo (isset($_SESSION['errmsg'])) ? $_SESSION['errmsg'] : '';
              ?>
              <div class="table-responsive">
                <table class="table table-striped table-bordered" id="datatable">
                  <thead>
                    <tr>
                      <th style="width:5%">No</th>
                      <th style="width:10%">Gambar</th>
                      <th>Kode</th>
                      <th>Kategori</th>
                      <th>Brand</th>
                      <th>Nama Produk</th>
                      <th>Harga / Item</th>
                      <th>Diskon</th>
                      <th>Harga Diskon</th>
                      <th>Stok</th>
                      <th style="width:10%">Option</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1; foreach ($produk as $row): ?>
                      <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php 
                            $image = (!empty($row['image'])) ? $row['image'] : 'default.png';
                            echo "<img src=\"".FILES.'image/produk/thumb/'.$image."\" class=\"img-responsive\">";
                            ?>
                        </td>
                        <td><?php echo $row['kd_produk'] ?></td>
                        <td><?php echo $row['nama_kategori'] ?></td>
                        <td><?php echo $row['nama_brand'] ?></td>
                        <td><?php echo $row['nama_produk'] ?></td>
                        <td><?php echo "Rp. ".number_format($row['harga_produk'],2) ?></td>
                        <td><?php echo ($row['diskon'] > 0 ) ? $row['diskon'].' %' : ' - ' ;?></td>
                        <td><?php echo ($row['diskon'] > 0 ) ? "Rp. ".number_format($row['harga_diskon'],2) : ' - ' ;?></td>
                        <td><?php echo $row['stok'] ?></td>
                        <td>
                          <button class="btn btn-sm btn-warning" onclick="ProdukEdit(<?php echo $row['id_produk'] ?>)"><i class="fa fa-pencil"></i></button>
                          <button class="btn btn-sm btn-danger" onclick="ProdukDelete(<?php echo $row['id_produk'] ?>)"><i class="fa fa-trash"></i></button>
                        </td>
                      </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>
              </div> 
            </div><!-- /.box-body -->
            <div class="box-footer">
              Daftar Nama Produk
            </div><!-- /.box-footer-->
          </div><!-- /.box -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <!-- Modal Tambah Produk -->
      <div class="modal fade" tabindex="-1" role="dialog" id="modal_tambah_produk">
        <div class="modal-dialog" role="document">
          <form action="<?php echo SITEURL.URL_ADMIN.'/produk/index' ?>" method="POST" role="form" id="form_tambah_kategori" enctype="multipart/form-data">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Tambah Produk</h4>
            </div>
            <div class="modal-body">
                    <div class="form-group">
                      <input type="hidden" name="submit" value="add">
                      <label for="nama_produk">Kode Produk</label>
                      <input type="text" class="form-control" id="kd_produk" name="kd_produk" value="<?php echo 'KP'.$last_idproduk ?>" required readonly>
                    </div>
                    <div class="form-group">
                      <label for="nama_produk">Nama Produk</label>
                      <input type="text" class="form-control" id="nama_produk" name="nama_produk" required>
                    </div>
                    <div class="form-group">
                      <label for="kategori">Kategori</label>
                      <select name="kategori" id="kategori" class="form-control">
                        <option value="">--Pilih Kategori--</option>
                        <?php foreach ($kategori as $row): ?>
                          <option value="<?php echo $row['id_kategori_produk'] ?>"><?php echo $row['nama_kategori'] ?></option>
                        <?php endforeach ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="brand">Brand</label>
                      <select name="brand" id="brand" class="form-control">
                        <option value="">--Pilih Brand--</option>
                        <?php foreach ($brand as $row): ?>
                          <option value="<?php echo $row['id_brand'] ?>"><?php echo $row['nama_brand'] ?></option>
                        <?php endforeach ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="">Gambar Produk</label>
                      <input type="file" accept="image/*" class="form-control filestyle" name="image" required>
                    </div>
                    <div class="form-group">
                      <label for="stok">Jumlah / Stok</label>
                      <input type="number" min="0" max="50" name="stok" id="stok" class="form-control" value="0">
                    </div>
                    <div class="form-group">
                      <label for="harga">Harga Item</label>
                      <input type="text"  id="harga" class="form-control" value="0">
                      <input type="hidden" name="harga" id="get_harga">
                      <span class="text-right"><small> <a href="javascript:void(0)" onclick="displayDiskon()">Adakan Discount + </a> </small></span>
                    </div>

                    <div id="diskonArea" style="display:none">
                    <div class="form-group">
                      <label for="diskon">Diskon dalam ( % )</label>
                      <input type="number" min="0" max="80"  id="diskon" class="form-control" name="diskon" value="0">
                    </div>
                    <div class="form-group">
                      <label for="harga_diskon">Harga Setelah Diskon</label>
                      <input type="text"  id="harga_diskon" class="form-control" value="0" readonly>
                      <input type="hidden" name="harga_diskon" id="get_harga_diskon" value="0">
                    </div>  
                    </div>
                    
                    <div class="form-group">
                      <label for="berat">Berat Item dalam ( gram )</label>
                      <input type="number" min="100" max="5000" id="berat" class="form-control" name="berat">
                    </div>
                    <div class="form-group">
                      <label for="keterangan_produk">Keterangan</label>
                      <textarea class="form-control" id="keterangan_produk" name="keterangan"></textarea>
                    </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
          </div><!-- /.modal-content -->
          </form>
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->

      <!-- Modal Edit Produk -->
      <div class="modal fade" tabindex="-1" role="dialog" id="modal_edit_produk">
        <div class="modal-dialog" role="document">
         <form action="<?php echo SITEURL.URL_ADMIN.'/produk/index' ?>" method="POST" id="form_edit_produk" enctype="multipart/form-data" >
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Edit Produk</h4>
            </div>
            <div class="modal-body">
                    <div class="form-group">
                      <input type="hidden" name="submit" value= "edit"/>
                      <input type="hidden" name="id" value="">
                      <label for="kd_produk">Kode Produk</label>
                      <input type="text" class="form-control" id="kd_produk" name="kd_produk" required readonly>
                    </div>
                    <div class="form-group">
                      <label for="nama_produk">Nama Produk</label>
                      <input type="text" class="form-control" id="nama_produk" name="nama_produk" required>
                    </div>
                    <div class="form-group">
                      <label for="kategori">Kategori</label>
                      <select name="kategori" id="kategori" class="form-control">

                      </select>
                    </div>
                    <div class="form-group">
                      <label for="brand">Brand</label>
                      <select name="brand" id="brand" class="form-control">

                      </select>
                    </div>
                    <div class="form-group">
                      <label for="">Gambar Produk</label>
                      <input type="hidden" name="oldimage" value="">
                      <input type="file" accept="image/*" class="form-control filestyle" name="image">
                      <span><small>*biarkan kosong jika gambar tidak di ganti</small></span>
                    </div>
                    <div class="form-group">
                      <label for="stok">Jumlah / Stok</label>
                      <input type="number" min="0" max="50" name="stok" id="stok" class="form-control" value="0">
                    </div>
                    <div class="form-group">
                      <label for="harga">Harga Item</label>
                      <input type="text"  id="editharga"  class="form-control" value="0">
                      <input type="hidden" name="harga" id="editget_harga">
                    </div>
                    <div class="form-group">
                      <label for="diskon">Diskon dalam ( % )</label>
                      <input type="number" min="0" max="80"  id="edit_diskon" class="form-control" name="diskon" value="0">
                    </div>
                    <div class="form-group">
                      <label for="harga_diskon">Harga Setelah Diskon</label>
                      <input type="text"  id="edit_harga_diskon" class="form-control" value="0" readonly>
                      <input type="hidden" name="harga_diskon" id="edit_get_harga_diskon" value="0">
                    </div>  
                    <div class="form-group">
                      <label for="berat">Berat Item dalam ( gram )</label>
                      <input type="number" min="100" max="5000" id="berat" class="form-control" name="berat">
                    </div>
                    <div class="form-group">
                      <label for="edit_keterangan_produk">Keterangan</label>
                      <textarea class="form-control" id="edit_keterangan_produk" name="keterangan"></textarea>
                    </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save Change</button>
            </div>
          </div><!-- /.modal-content -->
          </form>
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->

      <!-- Modal Hapus Produk -->
      <div class="modal fade" tabindex="-1" role="dialog" id="modal_hapus_produk">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Hapus Produk</h4>
            </div>
            <div class="modal-body">
              <form action="<?php echo SITEURL.URL_ADMIN.'/produk/index' ?>" method="POST" role="form" id="form_delete_produk">
                    <div class="form-group">
                      <input type="hidden" name="submit" value="delete">
                      <input type="hidden" name="id" id="id" value="">
                      <input type="hidden" name="oldimage">
                    </div>
                    <div id="image_delete">
                              
                    </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-danger">Hapus</button>
              </form>
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->
<?php cutter_end() ?>

<?php cutter_start('css') ?>

<?php cutter_end() ?>

<?php cutter_start('js') ?>
  <script type="text/javascript">
    /*PRODUK*/
        function showModalAddProduk() {
          $('#modal_tambah_produk').modal('show');
          CKEDITOR.replace('keterangan_produk',editor_config2);
          $('#harga').autoNumeric();
          $('#harga').on('change',function(){
            $('#get_harga').val($('#harga').autoNumeric('get'));
               var hargaDiskon = ($('#get_harga').val()) - ( ($('#get_harga').val()) * ($('#diskon').val()) / (100) );
              if ($('#diskon').val() == 0) {
                $('#harga_diskon').val('-');
                $('#get_harga_diskon').val(0);
              }else{
                $('#harga_diskon').val(hargaDiskon).autoNumeric();
                $('#harga_diskon').trigger("blur");
                $('#get_harga_diskon').val($('#harga_diskon').autoNumeric('get'));
              }
          });

          if ($('#diskon').val() == 0) {
            $('#harga_diskon').val('-');
          }else{
            $('#harga_diskon').autoNumeric();
          }

          $('#diskon').on('change', function(){
            var hargaDiskon = ($('#get_harga').val()) - ( ($('#get_harga').val()) * ($('#diskon').val()) / (100) );
            if ($('#diskon').val() == 0) {
              $('#harga_diskon').val('-');
              $('#get_harga_diskon').val(0);
            }else{
              $('#harga_diskon').val(hargaDiskon).autoNumeric();
              $('#harga_diskon').trigger("blur");
              $('#get_harga_diskon').val($('#harga_diskon').autoNumeric('get'));
            }
          })

        }

        function displayDiskon() {
          $('#diskonArea').toggle('slow');
        }

        function ProdukEdit(id) {
          
          var url = "<?php echo SITEURL.URL_ADMIN.'/produk/dataProdukWhere/"+id+"' ?>";
          $.getJSON(url,function(res){
              $('#modal_edit_produk').modal('show');
              var ck_ed = CKEDITOR.instances['edit_keterangan_produk'];
              if(ck_ed){
                  ck_ed.destroy(true);
              }
              
              $("#form_edit_produk [name=id]").val(res.id);
              $("#form_edit_produk [name=nama_produk]").val(res.nama_produk);
              $("#form_edit_produk [name=kd_produk]").val(res.kd_produk);
              $.getJSON("<?php echo SITEURL.URL_ADMIN.'/produk/dataKategoriJson' ?>",function(e){
                $("#form_edit_produk [name=kategori]").html('');
                $.each(e, function(i,val){
                  var selectedKategori = (e[i]['id_kategori_produk'] == res.id_kategori_produk ) ? 'selected' : '';                  
                  $("#form_edit_produk [name=kategori]").append("<option value=\""+e[i]['id_kategori_produk']+"\" "+selectedKategori+" >"+e[i]['nama_kategori']+"</option>");
                });
              });
              $.getJSON("<?php echo SITEURL.URL_ADMIN.'/produk/dataBrandJson' ?>",function(e){
                $("#form_edit_produk [name=brand]").html('');
                $.each(e, function(i,val){
                  var selectedKategori = (e[i]['id_brand'] == res.id_brand ) ? 'selected' : '';                  
                  $("#form_edit_produk [name=brand]").append("<option value=\""+e[i]['id_brand']+"\" "+selectedKategori+" >"+e[i]['nama_brand']+"</option>");
                });
              });

              $('#form_edit_produk [name=oldimage]').val(res.image);
              $('#form_edit_produk [name=stok]').val(res.stok);
              $('#form_edit_produk [name=diskon]').val(res.diskon);
              
              if (res.diskon == 0) {
                $('#edit_harga_diskon').val('-');
              }else{
                $('#edit_harga_diskon').val(res.harga_diskon).trigger("blur");  
              }
              $('#editharga').val(res.harga).trigger("blur");
              $("#form_edit_produk [name=berat]").val(res.berat_produk);
              $("#form_edit_produk [name=keterangan]").text(res.keterangan);
              CKEDITOR.replace('edit_keterangan_produk',editor_config2);
          });
              

              $('#edit_harga_diskon').autoNumeric();
              $('#edit_harga_diskon').on('change',function(){
                $('#edit_get_harga_diskon').val($('#edit_harga_diskon').autoNumeric('get'));          
              });
              $('#editharga').autoNumeric();
              $('#editharga').on('change',function(){
                $('#editget_harga').val($('#editharga').autoNumeric('get'));

                  var hargaDiskon = ($('#editget_harga').val()) - ( ($('#editget_harga').val()) * ($('#edit_diskon').val()) / (100) );
                  // console.log(hargaDiskon);
                  if ($('#edit_diskon').val() == 0) {
                    $('#edit_harga_diskon').val('-');
                    $('#edit_get_harga_diskon').val(0);
                  }else{
                    $('#edit_harga_diskon').val(hargaDiskon).autoNumeric();
                    $('#edit_harga_diskon').trigger("blur");
                    $('#edit_get_harga_diskon').val($('#edit_harga_diskon').autoNumeric('get'));
                  }          
              });

              // if ($('#edit_diskon').val() == 0) {
              //   $('#edit_harga_diskon').val('-');
              // }else{
              //   $('#edit_harga_diskon').autoNumeric();
              // }
             

              $('#edit_diskon').on('change', function(){
                var hargaDiskon = ($('#editget_harga').val()) - ( ($('#editget_harga').val()) * ($('#edit_diskon').val()) / (100) );
                // console.log(hargaDiskon);
                if ($('#edit_diskon').val() == 0) {
                  $('#edit_harga_diskon').val('-');
                  $('#edit_get_harga_diskon').val(0);
                }else{
                  $('#edit_harga_diskon').val(hargaDiskon).autoNumeric();
                  $('#edit_harga_diskon').trigger("blur");
                  $('#edit_get_harga_diskon').val($('#edit_harga_diskon').autoNumeric('get'));
                }
              })
        }

        function ProdukDelete(id) {
          $('#modal_hapus_produk').modal('show');
          var url = "<?php echo SITEURL.URL_ADMIN.'/produk/dataProdukWhere/"+id+"' ?>";
          $.getJSON(url,function(res) {
              var img = (res.image != '') ? res.image : 'default.png';
              $('#form_delete_produk [name=id]').val(res.id);
              $('#form_delete_produk [name=oldimage]').val(res.image);
              $('#image_delete').html("<p>Apa anda yakin akan menghapus produk <b>"+res.nama_produk+"</b> ?</p><img src=\"<?php echo FILES.'/image/produk/thumb/'?>"+img+"\">");
          });
        }

      /*ENDPRODUK*/
  </script>
<?php cutter_end() ?>