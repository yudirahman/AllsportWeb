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
              <h3 class="box-title">Data Toko</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <form role="form">
              	<div class="col-md-6">
              	  <div class="form-group">
					<label for="namatoko">Nama Toko</label>
              		<input type="text" name="namatoko" class="form-control" id="namatoko">              	 	
              	  </div>
              	</div>
              	<div class="col-md-6">
              	  <div class="form-group">
						<label for="telp">Telp</label>
	              		<input type="text" name="telp" class="form-control" id="telp">              	 	
	              	</div>              		
              	</div>
              	<div class="col-md-6">
              	  <div class="form-group">
					<label for="slogan">Slogan</label>
              		<textarea class="form-control" name="slogan" id="slogan" rows="3"></textarea>             	 	
              	  </div>
              	</div>
              	<div class="col-md-6">
              	  <div class="form-group">
					<label for="alamat">Alamat</label>
              		<textarea class="form-control" name="alamat" id="alamat" rows="3"></textarea>             	 	
              	  </div>
              	</div>
              	<div class="col-md-12">
              	  <div class="form-group">
					<label for="profil">Profil Lengkap</label>
              		<textarea class="form-control" name="profil" id="profil" rows="3"></textarea>             	 	
              	  </div>
              	</div>
              	<div class="col-md-12">
              	  <div class="form-group">
						<label>Logo</label>
	              		<input type="file" name="logo">              	 	
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
            	Form Profil Toko
            </div>
          </div><!-- /.box -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
<?php include ROOT_VIEW.'back_tpl/footer.php'; ?>

