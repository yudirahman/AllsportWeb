<?php cutter_start('content') ?>
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Order
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Order</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Data Order</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <table class="table table-striped table-bordered" id="datatable">
                <thead>
                  <tr>
                    <td>No</td>
                    <td>Tanggal Order</td>
                    <td>Kode Order</td>
                    <td>Tagihan</td>
                    <td>#</td>
                  </tr>
                </thead>
                <tbody>
                  <?php if (sizeof($dataPemesanan) > 0): ?>
                    <?php $no=1 ;foreach ($dataPemesanan as $val): ?>
                      <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo date("d-m-Y", strtotime($val['tgl_order'])) ?></td>
                        <td><?php echo $val['kode_order'] ?></td>
                        <td>Rp. <?php echo number_format($val['total_bayar'] ,2) ?></td>
                        <td><input type="button" class="button btn-warning" value="Verifikasi" onclick="location.href='<?php echo SITEURL.URL_ADMIN.'/pemesanan/konfirmasi/'.$val['id_order'] ?>'"></td>
                      </tr>
                    <?php endforeach ?>
                  <?php else: ?>
                    <tr>
                      <td colspan="5"> Data order tidak ada</td>
                    </tr>
                  <?php endif ?>
                  
                </tbody>
              </table>
            </div><!-- /.box-body -->
            <div class="box-footer">
              Footer
            </div><!-- /.box-footer-->
          </div><!-- /.box -->

        </section><!-- /.content -->
      </div>
<?php cutter_end() ?>
