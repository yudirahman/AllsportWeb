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
              <h3 class="box-title">Bantuan</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <?php echo (isset($_SESSION['errmsg'])) ? $_SESSION['errmsg'] : '';
              ?>
              <form action="<?php echo SITEURL.URL_ADMIN.'/profil/infokebijakan' ?>" method="POST"  role="form">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="profil">Konten Informasi Bantuan</label>
                    <input type="hidden" name="submit">
                    <?php foreach ($dataprofil as $v): ?>
                    <textarea name="isikebijakan" class="form-control" id="profil"><?php echo $v['kebijakantoko'] ?></textarea>
                    <?php endforeach ?>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group pull-right">
                    <button type="submit" class="btn btn-md btn-primary">Simpan</button>
                  </div>
                </div>
              </form>
            </div><!-- /.box-body -->
            <div class="box-footer">
              Form Informasi Bantuan
            </div><!-- /.box-footer-->
          </div><!-- /.box -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
<?php cutter_end() ?>

<?php cutter_start('css') ?>

<?php cutter_end() ?>

<?php cutter_start('js') ?>

<?php cutter_end() ?>
