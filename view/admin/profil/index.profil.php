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
              <h3 class="box-title">Data Toko</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <?php echo (isset($_SESSION['errmsg'])) ? $_SESSION['errmsg'] : '';
              ?>
              <form action="<?php echo SITEURL.URL_ADMIN.'/profil/dataprofil' ?>" method="POST" role="form" enctype="multipart/form-data">
              	<?php foreach ($dataprofil as $v): ?>
                <div class="col-md-6">
              	  <div class="form-group">
  					        <label for="namatoko">Nama Toko</label>
                    <input type="hidden" name="submit">
                		<input type="text" name="namatoko" class="form-control" id="namatoko" value="<?php echo $v['nama'] ?>">              	 	
              	  </div>
              	</div>
              	<div class="col-md-6">
              	  <div class="form-group">
  						      <label for="telp">Telp</label>
  	              		<input type="text" name="telp" class="form-control" id="telp" value="<?php echo $v['telp'] ?>">              	 	
  	              	</div>              		
              	</div>
              	<div class="col-md-6">
              	  <div class="form-group">
  					        <label for="slogan">Slogan</label>
                		<textarea class="form-control" name="slogan" id="slogan" rows="3"><?php echo $v['slogan'] ?></textarea>             	 	
              	  </div>
              	</div>
              	<div class="col-md-6">
              	  <div class="form-group">
  					        <label for="alamat">Alamat</label>
                		<textarea class="form-control" name="alamat" id="alamat" rows="3"><?php echo $v['alamat'] ?></textarea>             	 	
              	  </div>
              	</div>
              	<div class="col-md-12">
              	  <div class="form-group">
        					  <label for="profil">Profil Lengkap</label>
                		<textarea class="form-control" name="profil" id="profil" rows="3"><?php echo $v['profiltoko'] ?></textarea> 
              	  </div>
              	</div>
              	<div class="col-md-6">
                  <label>Foto Toko</label>
                  <div class="text-xs-center">
                    <?php ($v['foto']=='') ? $foto = 'nofoto.jpg' : $foto = $v['foto'] ?>
                    <img src="<?php echo FILES.'image/profil/thumb/'.$foto ?>" alt="Foto Toko" class="img-thumbnail" width='200px'>
                  </div>
              	  <div class="form-group">
						        <label></label>
	              		<input type="file" accept="image/*" class="form-control filestyle" name="foto">
                    <span><small>*biarkan kosong bila tidak diganti.</small></span>               	 	
	              	</div>              		
              	</div>
                <div class="col-md-6">
                  <label>Logo</label>
                  <div class="text-xs-center">
                    <?php ($v['logo']=='') ? $logo = 'nofoto.jpg' : $logo=$v['logo'] ?>
                    <img src="<?php echo FILES.'image/profil/thumb/'.$logo ?>" alt="Foto Toko" class="img-thumbnail" width='200px'>
                  </div>
                  <div class="form-group">
                    <label></label>
                    <input type="file" accept="image/*" class="form-control filestyle" name="logo">
                    <span><small>*biarkan kosong bila tidak diganti.</small></span>  
                  </div>                  
                </div>
              	<div class="col-md-12">
              		<div class="form-group pull-right">
              			<button class="btn btn-md btn-primary">Simpan</button>
              		</div>
              	</div>
                <?php endforeach ?>
              </form>
            </div><!-- /.box-body -->
            <div class="box-footer">
            	Form Profil Toko
            </div>
          </div><!-- /.box -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
<?php cutter_end() ?>

<?php cutter_start('css') ?>

<?php cutter_end() ?>

<?php cutter_start('js') ?>

<?php cutter_end() ?>
