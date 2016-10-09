<?php include ROOT_VIEW.'back_tpl/header.php'; ?>
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
              <h3 class="box-title">Informasi & Kebijakan</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <form role="form">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="info">Judul</label>
                    <input type="text" name="info" class="form-control" id="info">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="profil">Konten</label>
                    <textarea name="isi" class="form-control" id="profil"></textarea>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group pull-right">
                    <button class="btn btn-md btn-primary">Simpan</button>
                  </div>
                </div>
              </form>
            </div><!-- /.box-body -->
            <div class="box-footer">
              Form Informasi & Kebijakan
            </div><!-- /.box-footer-->
          </div><!-- /.box -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
<?php include ROOT_VIEW.'back_tpl/footer.php'; ?>

