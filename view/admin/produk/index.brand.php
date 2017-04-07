<?php cutter_start('content') ?>
      <!-- =============================================== -->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <?php echo $halaman?>
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">List Brand Produk</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal_tambah_brand"><i class="fa fa-plus"></i> Tambah</button>
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
                      <th style="width:10%">#</th>
                      <th>Brand Produk</th>
                      <th style="width:10%">Option</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1; foreach ($brand as $row): ?>
                      <tr>
                        <td><img src="<?php echo FILES.'image/brand/thumb/'.$row['image'] ?>" alt="<?php echo $row['nama_brand'] ?>"></td>
                        <td><?php echo $row['nama_brand'] ?></td>
                        <td>
                          <button class="btn btn-sm btn-warning" onclick="BrandEdit(<?php echo $row['id_brand'] ?>)"><i class="fa fa-pencil"></i></button>
                          <button class="btn btn-sm btn-danger" onclick="BrandDelete(<?php echo $row['id_brand'] ?>)"><i class="fa fa-trash"></i></button>
                        </td>
                      </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>
              </div>                
            </div><!-- /.box-body -->
            <div class="box-footer">
              Daftar Nama brand Produk
            </div><!-- /.box-footer-->
          </div><!-- /.box -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <!-- Modal Tambah brand -->
      <div class="modal fade" tabindex="-1" role="dialog" id="modal_tambah_brand">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Tambah brand Produk</h4>
            </div>
            <div class="modal-body">
              <form action="<?php echo SITEURL.URL_ADMIN.'/produk/brand' ?>" method="POST" role="form" id="form_tambah_brand" enctype="multipart/form-data">
                    <div class="form-group">
                      <input type="hidden" name="submit" value="add">
                      <label for="nama_brand">Nama Brand</label>
                      <input type="text" class="form-control" id="nama_brand" name="nama_brand" required>
                    </div>
                    <div class="form-group">
                      <label for="">Gambar Brand </label>
                      <input type="file" accept="image/*" class="form-control filestyle" name="image" required>
                    </div>
                    
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save</button>
              </form>
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->

      <!-- Modal Edit Brand -->
      <div class="modal fade" tabindex="-1" role="dialog" id="modal_edit_brand">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Edit brand Produk</h4>
            </div>
            <div class="modal-body">
              <form action="<?php echo SITEURL.URL_ADMIN.'/produk/brand' ?>" method="POST" role="form" id="form_edit_brand" enctype="multipart/form-data" >
                    <div class="form-group">
                      <input type="hidden" name="submit" value="edit">
                      <input type="hidden" name="id" id="id" value="">
                      <input type="hidden" name="oldimage">
                      <label for="nama_brand">Nama brand</label>
                      <input type="text" class="form-control" id="nama_brand" name="nama_brand" required>
                    </div>
                    <div class="form-group">
                      <label for="">Gambar Brand </label>
                      <div id="imageEdit">
                        
                      </div>
                      <input type="file" accept="image/*" class="form-control filestyle" name="image" >
                      <span><small>*Kosongkan kalo tidak diganti</small></span>
                    </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save</button>
              </form>
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->

      <!-- Modal Hapus Brand -->
      <div class="modal fade" tabindex="-1" role="dialog" id="modal_hapus_brand">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Hapus brand Produk</h4>
            </div>
            <div class="modal-body">
              <form action="<?php echo SITEURL.URL_ADMIN.'/produk/brand' ?>" method="POST" role="form" id="form_edit_brand">
                    <div class="form-group">
                      <input type="hidden" name="submit" value="delete">
                      <input type="hidden" name="id" id="id" value="">
                      <input type="hidden" name="oldimage">
                    </div>
                    <p id="p_id"></p>
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


<!-- Start CSS Here -->
<?php cutter_start('css') ?>

<?php cutter_end() ?>
<!-- Start JS Here -->
<?php cutter_start('js') ?>
  <script type="text/javascript">
    function BrandEdit(id) {
          $('#modal_edit_brand').modal('show');
          var url = "<?php echo SITEURL.URL_ADMIN.'/produk/databrandWhere/"+id+"' ?>";
          $.getJSON(url,function(res) {
              $('#form_edit_brand [name=id]').val(res.id);
              $('#form_edit_brand [name=nama_brand]').val(res.nama_brand);
              $('#form_edit_brand [name=oldimage]').val(res.image);
              $('#imageEdit').html("<img src=\"<?php echo FILES.'image/brand/thumb/' ?>"+res.image+"\">");
          });
    }
    function BrandDelete(id) {
          $('#modal_hapus_brand').modal('show');
          var url = "<?php echo SITEURL.URL_ADMIN.'/produk/databrandWhere/"+id+"' ?>";
          $.getJSON(url,function(res) {
              $('#form_edit_brand [name=id]').val(res.id);
              $('#form_edit_brand [name=oldimage]').val(res.image);

              $('#p_id').html("Hapus brand <b>"+res.nama_brand+"</b> ?");
          });
    }
  </script>
<?php cutter_end() ?>