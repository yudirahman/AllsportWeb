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
              <h3 class="box-title">List Kategori Produk</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal_tambah_kategori"><i class="fa fa-plus"></i> Tambah</button>
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
                      <th>Kategori</th>
                      <th>Keterangan</th>
                      <th style="width:10%">Option</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1; foreach ($kategori as $row): ?>
                      <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $row['nama_kategori'] ?></td>
                        <td><?php echo $row['keterangan'] ?></td>
                        <td>
                          <button class="btn btn-sm btn-warning" onclick="katProdukEdit(<?php echo $row['id_kategori_produk'] ?>)"><i class="fa fa-pencil"></i></button>
                          <button class="btn btn-sm btn-danger" onclick="katProdukDelete(<?php echo $row['id_kategori_produk'] ?>)"><i class="fa fa-trash"></i></button>
                        </td>
                      </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>
              </div>                
            </div><!-- /.box-body -->
            <div class="box-footer">
              Daftar Nama Kategori Produk
            </div><!-- /.box-footer-->
          </div><!-- /.box -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <!-- Modal Tambah Kategory -->
      <div class="modal fade" tabindex="-1" role="dialog" id="modal_tambah_kategori">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Tambah Kategori Produk</h4>
            </div>
            <div class="modal-body">
              <form action="<?php echo SITEURL.URL_ADMIN.'/produk/kategori' ?>" method="POST" role="form" id="form_tambah_kategori">
                    <div class="form-group">
                      <input type="hidden" name="submit" value="add">
                      <label for="nama_kategori">Nama Kategori</label>
                      <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" required>
                    </div>
                    <div class="form-group">
                      <label for="keterangan">Keterangan</label>
                      <textarea class="form-control" id="keterangan" name="keterangan"></textarea>
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

      <!-- Modal Edit Kategory -->
      <div class="modal fade" tabindex="-1" role="dialog" id="modal_edit_kategori">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Edit Kategori Produk</h4>
            </div>
            <div class="modal-body">
              <form action="<?php echo SITEURL.URL_ADMIN.'/produk/kategori' ?>" method="POST" role="form" id="form_edit_kategori">
                    <div class="form-group">
                      <input type="hidden" name="submit" value="edit">
                      <input type="hidden" name="id" id="id" value="">
                      <label for="nama_kategori">Nama Kategori</label>
                      <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" required>
                    </div>
                    <div class="form-group">
                      <label for="keterangan">Keterangan</label>
                      <textarea class="form-control" id="keterangan" name="keterangan"></textarea>
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

      <!-- Modal Hapus Kategory -->
      <div class="modal fade" tabindex="-1" role="dialog" id="modal_hapus_kategori">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Hapus Kategori Produk</h4>
            </div>
            <div class="modal-body">
              <form action="<?php echo SITEURL.URL_ADMIN.'/produk/kategori' ?>" method="POST" role="form" id="form_edit_kategori">
                    <div class="form-group">
                      <input type="hidden" name="submit" value="delete">
                      <input type="hidden" name="id" id="id" value="">
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
    function katProdukEdit(id) {
          $('#modal_edit_kategori').modal('show');
          var url = "<?php echo SITEURL.URL_ADMIN.'/produk/dataKategoriWhere/"+id+"' ?>";

          $.getJSON(url,function(res) {
              $('#form_edit_kategori [name=id]').val(res.id);
              $('#form_edit_kategori [name=nama_kategori]').val(res.nama_kategori);
              $('#form_edit_kategori [name=keterangan]').text(res.keterangan);
          });
    }
    function katProdukDelete(id) {
          $('#modal_hapus_kategori').modal('show');
          var url = "<?php echo SITEURL.URL_ADMIN.'/produk/dataKategoriWhere/"+id+"' ?>";
          $.getJSON(url,function(res) {
              $('#form_edit_kategori [name=id]').val(res.id);
              $('#p_id').html("Hapus Kategori <b>"+res.nama_kategori+"</b> ?");
          });
    }
  </script>
<?php cutter_end() ?>