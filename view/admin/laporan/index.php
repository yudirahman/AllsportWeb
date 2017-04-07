<?php cutter_start('content') ?>
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Laporan Penjualan
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Laporan Penjualan</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Data Penjualan</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <table class="table table-striped table-bordered" id="datatable">
                <thead>
                  <tr>
                    <td style="width:5%">No</td>
                    <td style="width:15%">Tgl. Bayar</td>
                    <td style="width:10%">No. Nota</td>
                    <td>Produk</td>
                    <td>@Harga</td>
                    <td>Biaya Kirim</td>
                    <td style="width:15%">Total Bayar</td>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    // var_dump($dataPenjualan);
                   ?>
                  <?php if (sizeof($dataPenjualan) > 0): ?>
                    <?php $no=1 ;foreach ($dataPenjualan as $val): ?>
                      <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo date("d-m-Y", strtotime($val['tgl_tf'])) ?>  <?php echo $val['jam_tf'] ?></td>
                        <td><?php echo $val['kode_order'] ?></td>
                        <td>
                          <?php 
                             foreach ($dataProdukOrder as $row) {
                              foreach ($row as $key) {
                                  if ($val['id_order'] == $key['id_order']) {
                                      echo ' - '.$key['nama_produk'].'<br>' ;
                                    }                                
                              }
                               
                             }
                           ?>
                        </td>
                        <td style="text-align:right">
                          <?php 
                             foreach ($dataProdukOrder as $row) {
                              foreach ($row as $key) {
                                  if ($val['id_order'] == $key['id_order']) {
                                      if ($key['diskon'] > 0 ) {
                                        echo '  '.number_format($key['harga_diskon'],2).' @ '.$key['qty'].'<br>';
                                      } else {
                                        echo '  '.number_format($key['harga_produk'],2).' @ '.$key['qty'].'<br>';
                                      }

                                    }                                
                              }
                               
                             }
                           ?>
                        </td>
                        <td style="text-align:right"><?php echo number_format($val['biaya_kirim'],2) ?></td>
                        <td style="text-align:right"><?php echo number_format($val['total_bayar'] ,2) ?></td>
                      </tr>
                    <?php endforeach ?>
                  <?php else: ?>
                    <tr>
                      <td colspan="5"> Data order tidak ada</td>
                    </tr>
                  <?php endif ?>
                  
                </tbody>
                <!-- <tfoot>
                  <tr>
                    <td colspan="5">Rp. </td>
                  </tr>
                </tfoot> -->
              </table>
            </div><!-- /.box-body -->
            <div class="box-footer">
              Footer
            </div><!-- /.box-footer-->
          </div><!-- /.box -->

          <div class="box">
            <div class="box-header">
              <h3 class="box-title"><i class="fa fa-file-pdf-o"></i> Cetak Laporan Penjualan</h3>
            </div>
            <div class="box-body" style="min-height:300px">
              <div class ="col-md-6" style="border:1px solid #E7E7E7; padding:10px;background:#E7E7E7">
                <form action="<?php echo SITEURL.URL_ADMIN.'/laporan/cetakLaporan' ?>" method="POST">
                  <div class="form-group">
                    <label>Dari Tanggal</label>
                    <input type="date" class="form-control" name="tgl_mulai" required>                  
                  </div>
                  <div class="form-group">
                    <label>Sampai dengan Tanggal</label>
                    <input type="date" class="form-control" name="tgl_selesai" required>                  
                  </div>
                  <div class="form-group pull-right">
                    <button class="btn btn-warning">Cetak</button>                  
                  </div>
              </form>
              </div>
              <div class ="col-md-6">
                <p>Gunakan Form Disamping Untuk Mencetak Laporan Penjualan<br>
                  Laporan akan dicetak berdasarkan tanggal yang di inputkan. 
                </p>
              </div>
            </div>
          </div>
        </section><!-- /.content -->
      </div>
<?php cutter_end() ?>
