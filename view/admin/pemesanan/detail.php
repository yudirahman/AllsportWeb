<?php cutter_start('content') ?>
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Detail Order
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Detail Order</li>
          </ol>
        </section>
        <!-- Main content -->
        <section class="content">
          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Detail Order</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <?php 
              // echo '<pre>';
              // print_r($dataPemesanan);
              // echo '</pre>';
              $kodeOrder = '';
              $namaPelanggan = '';
              $alamat = '';
              $kota = '';
              $provinsi ='';
              $kodepos ='';
              $nohp = '';
              $kurir = '';
              $biayakirim ='';
              $total_bayar='';
              $tgl_tf = '';
              $jam_tf = '';
              $bank ='';
              $pemilik_rek='';
              $jumlah_tf = '';
              $id_order ='';

              foreach ($dataPemesanan as $val) {
                $kodeOrder = $val['kode_order'];
                $namaPelanggan = $val['nama'];
                $alamat = $val['alamat'];
                $kota = $val['kota'];
                $provinsi = $val['provinsi'];
                $kodepos = $val['kodepos'];
                $nohp = $val['no_hp'];
                $kurir = $val['kurir'];
                $biayakirim = $val['biaya_kirim'];
                $total_bayar = $val['total_bayar'];
                $tgl_tf = date('d-m-Y', strtotime($val['tgl_tf']));
                $jam_tf = $val['jam_tf'];
                $bank = $val['bank'];
                $pemilik_rek = $val['pemilik_rek'];
                $jumlah_tf = $val['jumlah_tf'];
                $id_order= $val['id_order'];
              }
               ?>
              <h4>Kode Order : <?php echo $kodeOrder ?></h4>
              <table class="table table-bordered">
                <thead>
                  <tr style="background:#F6F7F2">
                    <td colspan="4"><b>Informasi Produk</b></td>
                  </tr>
                  <tr>
                    <td>Gambar</td>
                    <td>Kode</td>
                    <td>Nama Produk</td>
                    <td>Harga</td>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($dataProduk as $val): ?>
                    <td><img src="<?php echo FILES.'image/produk/thumb/'.$val['image'] ?>"></td>
                    <td><?php echo $val['kd_produk'] ?></td>
                    <td><?php echo $val['nama_produk'] ?></td>
                    <td><?php echo ($val['diskon'] > 0) ? 'Rp. '.number_format($val['harga_diskon'],2) : 'Rp. '.number_format($val['harga_produk'],2) ; 
                        echo ' x '.$val['qty'];
                        ?>
                     </td>
                  <?php endforeach ?>
                </tbody>
              </table>
              
              <p></p>

              <table class="table table-bordered">
                <thead>
                  <tr style="background:#F6F7F2">
                    <td colspan="3"><b>Informasi Pengiriman</b></td>
                  </tr>
                </thead>
                <tbody>
                  <td style="width:40%">To : <br>
                    <?php echo $namaPelanggan.'<br>'.$alamat.'<br>'.$kota.', '.$provinsi.' , '.$kodepos.'<br> No. HP '.$nohp;  ?>
                  </td>
                  <td>Kirim melalui : <?php echo strtoupper($kurir) ?></td>
                  <td>Biaya Pengiriman : Rp. <?php echo number_format($biayakirim ,2) ?></td>
                </tbody>
              </table>

              <p></p>
              
              <table class="table table-bordered">
                <thead>
                  <tr style="background:#F6F7F2">
                    <td colspan="5"><b>Informasi Pembayaran</b></td>
                  </tr>
                  <tr>
                    <td>Total Tagihan</td>
                    <td>Tanggal Transfer</td>
                    <td>Bank</td>
                    <td>Pemilik Rekening</td>
                    <td>Jumlah Transfer</td>
                  </tr>
                </thead>
                <tbody>
                  <td><?php echo 'Rp. '.number_format($total_bayar,2) ?></tota>
                  <td><?php echo $tgl_tf.' '.$jam_tf ?></td>
                  <td><?php echo strtoupper($bank) ?></td>
                  <td><?php echo strtoupper($pemilik_rek) ?></td>
                  <td><?php echo 'Rp. '.$jumlah_tf ?></td>
                </tbody>
              </table>
              <br>
              <br>
              
              <div class="pull-right">
                <div style="padding-right:25px">
                  <form method="POST" action="">
                    <div class ="form-group">
                      <input type="hidden" name="id_order" value="<?php echo $id_order ?>">
                      <select class="form-control" name="status">
                        <option value="2" >Lunas</option>
                        <option value="3" >Batalkan</option>
                      </select>
                    </div>
                    <div class ="form-group">
                      <button class="button btn-warning">Konfirmasi</button>
                    </div>
                  </form>
                </div>
              </div>
              <br>
              <br>
              <br>
              <br>
            </div><!-- /.box-body -->
            <div class="box-footer">
              Footer
            </div><!-- /.box-footer-->
          </div><!-- /.box -->

        </section><!-- /.content -->
      </div>
<?php cutter_end() ?>
