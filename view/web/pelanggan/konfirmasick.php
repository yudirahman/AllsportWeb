<?php cutter_start('content') ?>
	<div class="login-area">
<div class="container">
    	<div class="row">
				<div class="col-md-9 col-sm-9">
					<div class="product-items-area">
						<h2 class="header-title">Konfirmasi Order</h2>
						<p>Berikut adalah data order anda, silahkan lakukan konfirmasi pembayaran 
						pada order yang belum di konfirmasi.</p>
						<table class="table table-bordered" id="dataTable">
							<thead>
								<tr>
									<td>No</td>
									<td>Tanggal Order</td>
									<td>Kode Order</td>
									<td>Total Bayar</td>
									<td>Status Order</td>
									<td>#</td>
								</tr>
							</thead>
							<tbody>
								<?php if (sizeof($orderan) > 0 ): ?>
									<?php $no=1; foreach ($orderan as $val): 
										if ($val['status_order'] == 0) {
											$status = '<span style="color:red">UNPAID</span>';
										}else if($val['status_order'] == 1){
											$status = '<span style="color:#F29B34">UNVERIFIED</span>';
										}else if ($val['status_order'] == 2) {
											$status = '<span style="color:green">VERIFIED</span>';
										}else{
											$status = '<span style="color:grey">CANCELED</span>';
										}
									?>
										<tr>
											<td><?php echo $no++; ?></td>
											<td><?php echo '<i class="fa fa-calendar"></i> '.date("d-m-Y", strtotime($val['tgl_order'])).' &nbsp<i class="fa fa-clock-o"></i> '.date("H:i", strtotime($val['tgl_order'])) ?></td>
											<td><?php echo $val['kode_order'] ?></td>
											<td><?php echo 'Rp. <span class="pull-right">'.number_format($val['total_bayar'],2).'</span>' ?></td>
											<td><b><?php echo $status ?></b></td>

											<td style="text-align:center;width:15%">
													<?php if ($val['status_order'] == 0): ?>
													<input type="button" class="button btn-warning" value="Konfirmasi" onclick="modalDetail(<?php echo $val['id_order'] ?>)" /> 	
																											
													<?php elseif ($val['status_order'] == 1): ?>
													Pembayaran anda sedang kami verifikasi.
													<?php elseif($val['status_order'] == 2): ?>	
													Pembayaran sudah di verifikasi dan barang segera dikirim.
													<?php else :?>
													Pembayaran tidak dapar diverifikasi, order dibatalkan.
													<?php endif ?>
											</td>
										</tr>							
									<?php endforeach ?>
								<?php else: ?>
								<tr>
									<td colspan="6"> Data tidak tersedia...</td>
								</tr>									
								<?php endif ?>
							</tbody>
						</table>
						<br>
						<br>
					</div>
				</div> 
				<div class="col-md-3 col-sm-3">
				<div class="product-catagori-area">
				<div class="best-seller-area">
					<h2 class="header-title">PRODUK DISKON</h2>
					<?php foreach ($masterdiskon as $row): ?>
						<div class="best-sell-product" style="min-height:150px">
						<div class="best-product-img">
							<a href="#"><img src="<?php echo FILES. 'image/produk/thumb/'.$row['image'] ?>" alt="product"></a>
						</div>
						<div class="best-product-content">
							<h2><a href="<?php echo SITEURL.'produk/detail/'.$row['id_produk'] ?>"><?php echo $row['nama_produk'] ?></a></h2>
							<h3><span style="color:orange" class="blink_me"> Diskon <?php echo $row['diskon'] ?> %</span></h3>
						</div>
					</div>
					<?php endforeach ?>
					<p class="view-details">
						<a href="<?php echo SITEURL.'produk/kategori/diskon' ?>">Selengkapnya</a>
					</p>
				</div>
				</div>
				</div>   			
		</div>
	</div>
</div>

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="modalDetail">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
	    <div class="modal-header">
	    	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
	  		<h4>Detail Order</h4>
	  	</div>
	  	<div class="modal-body">
	  		<p><b>Kode Order : # <span id="kd_order"></span></b></p>
	  		<div id="info">
	  		<table class="table table-bordered">
	  			<tr style="background:#F6F7F2">
	  				<td colspan="3"><b>Produk </b></td>
	  			</tr>
	  			<tbody id="dataProdukModal">
		  			<tr>
		  				<td></td>
		  				<td></td>
		  				<td></td>
		  			</tr>
	  			</tbody>
	  		</table>
	  		<table class="table table-bordered">
	  			<tr style="background:#F6F7F2">
	  				<td colspan="3"><b>Pengiriman </b></td>
	  			</tr>
	  		<tbody id="dataPengirimanModal">
	  			<tr>
	  				<td></td>
	  				<td></td>
	  				<td></td>
	  			</tr>
	  		</tbody>
	  		<tfoot>
	  			<tr style="background:#F6F7F2">
	  				<td colspan="3" style="text-align:center"><b><i>Total Bayar <span id="totalModal"></span></i></b></td>
	  			</tr>
	  		</tfoot>
	  		</table>
	  		</div>
	  		<p class="pull-right"><a href="javascript:tginfo()">Hide/Show</a></p>
	  		<table class="table table-bordered">
	  			<tr style="background:#F6F7F2">
	  				<td colspan="3"><b>Konfirmasi Pembayaran </b></td>
	  			</tr>
	  			<tr>
	  				<td style="width:35%">
	  					<p>
	  						Silahkan cantumkan bukti pembayaran ada pada form disamping.
	  						Pastikan anda telah menyelesaikan transfer pembayaran sesuai dengan total tagihan
	  						yang tertera pada email dan mentransfer ke no rekening berikut.


	  					</p>
	  					<p>
	  					<b>
	  						Bank BRI <br>
	  						a/n Sudana Irsyad Anry <br>
	  						No. Rekening : 040901005267504
	  					</b>
	  					<br>
	  					<br>
	  					<br>
	  						<i>Notice : Apabila terjadi kesalahan informasi pada saat transfer, mohon hubungi kami. </i>
	  					</p>
	  				</td>
	  				<td colspan="2" style="background:#EDF9FF">
	  					<form id="fmKonfirmasi">
	  						<b>Nama Bank :</b>
	  						<input type="hidden" name="id_order" id="id_order_fmKonfirmasi">
	  						<input type="hidden" name="kode_order" id="kd_order_fmKonfirmasi">
	  						<input type="hidden" name="email_pelanggan" id="email_order_fmKonfirmasi">
	  						<p><input type="text" name="nama_bank" size="50" id="nama_bank"/><br><small>Contoh : Bank BRI</small></p>
	  						
	  						<b>Nama Pemilik Rekening :</b>
	  						<p><input type="text" name="nama_pemilik_bank" size="50" id="nama_pemilik_bank" /><br><small>Contoh : Alex Imanuel</small></p>
	  						
	  						<b>Jumlah & Tanggal Transfer :</b>
	  						<p><input type="text" name="jumlah_transfer" id="jumlah_transfer" /><!-- <input type="hidden" name="jumlah_transfer" id="get_jumlah_transfer" value="" />  --><i class="fa fa-calendar"></i> <input type="text" name="tgl_transfer" id="tglTransfer" size="10"> 
	  							<i class="fa fa-clock-o"></i>
	  							<select name="jam_transfer" id="jam_transfer">
	  								<?php 
	  									for ($i=1; $i < 25; $i++) { 
	  										echo '<option value="'.sprintf('%02d', $i).'">'.sprintf('%02d', $i).'</option>';
	  									}
	  								?>
	  							</select>
	  							.
	  							<select name="menit_transfer" id="menit_transfer">
	  								<?php 
	  									for ($i=0; $i < 60; $i++) { 
	  										echo '<option value="'.sprintf('%02d', $i).'">'.sprintf('%02d', $i).'</option>';
	  									}
	  								?>
	  							</select>
	  						<br><small>Contoh : 210000 12/12/2016 16:04</small>
	  						</p>
	  						<p></p>	  						
	  						<p></p>
	  						<p></p>
	  						<p class="pull-right"><input type="button" class="button btn-warning" value="Kirim Konfirmasi" id="submitFormKonfirmasi"></p>
	  					</form>
	  				</td>
	  			</tr>
	  		</table>
	  	</div>
    </div>
  </div>
</div>
		
<?php cutter_end() ?>

<?php cutter_start('css') ?>
	 <link rel="stylesheet" type="text/css" href="<?php echo ASSETS ?>backend/plugins/datatables/dataTables.bootstrap.css">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<style type="text/css">
		.hideshow{
			display: none;
		}
	</style>
<?php cutter_end() ?>

<?php cutter_start('js') ?>
	<!-- Datatable -->
    <script src="<?php echo ASSETS ?>backend/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo ASSETS ?>backend/plugins/datatables/dataTables.bootstrap.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="<?php echo ASSETS ?>backend/plugins/autonumeric.js"></script>
	<script type="text/javascript">


		function tginfo () {
			$('#info').toggle('slow');
		}
		function modalDetail(id){
			$('#modalDetail').modal({
				backdrop : 'static',
				keyboard : false
			});

			var url = "<?php echo SITEURL.'home/getJsonDataOrder' ?>"
			$.ajax({
				url : url,
				type : 'POST',
				dataType : 'json',
				data : 'id_order='+id,
				success : function (res) {

					//Biaya Kirim
					$('#kd_order').html(res[0].kode_order);
					$('#kd_order_fmKonfirmasi').val(res[0].kode_order);
					$('#id_order_fmKonfirmasi').val(res[0].id_order);
					$('#email_order_fmKonfirmasi').val(res[0].email);
					var dataPengirimanModal = '';
					var dataProdukModal = '';
					for (var i = 0; i < res.length; i++) {
						dataProdukModal += "<tr style=\"vertical-align: middle !important\"><td style=\"vertical-align: middle !important\"><img src=\"<?php echo FILES.'image/produk/thumb/' ?>"+res[i].image+"\"></td>"+
											"<td style=\"vertical-align: middle !important\">"+res[i].nama_produk+"</td>"+
											"<td style=\"vertical-align: middle !important\">"+toRp(res[i].harga_produk)+" x "+res[i].qty+" </td></tr>";
					};
					var kurir = '';
					if (res[0].kurir == 'pos') {kurir = 'PT. POS Indonesia'} else if(res[0].kurir == 'jne'){kurir = 'JNE (Jalur Nugraha Ekakurir)'}else{kurir = 'TIKI'}
					$('#dataPengirimanModal').html("<tr style=\"vertical-align: middle !important\"><td style=\"vertical-align: middle !important\"><b>To : <br>"+res[0].nama+"<br>"+res[0].alamat+"<br>"+res[0].kota+", "+res[0].provinsi+", Kode Pos  "+res[0].kodepos+"<br>No. HP "+res[0].no_hp+"<input type=\"hidden\" name=\"emailKirim\" value=\""+res[0].email+"\"></b></td>"+
													"<td style=\"vertical-align: middle !important\">"+kurir+"</td><td style=\"vertical-align: middle !important\">"+toRp(res[0].biaya_kirim)+"</td></tr>")
					$('#dataProdukModal').html(dataProdukModal);
					$('#totalModal').html(toRp(res[0].total_bayar));
					
				}
			})
		}

		$(document).ready(function(){
			$('#dataTable').DataTable();
			$('#tglTransfer').datepicker();
			$('#jumlah_transfer').autoNumeric();
			// $('#jumlah_transfer').on('change', function(){
			// 	$('#get_jumlah_transfer').val('#jumlah_transfer').autoNumeric('get');
			// })
			

			$('#pengirimandefault').on('click',function(){
				$('#dataPengirimanLain').addClass('hideshow');
				$('#dataPengirimanDefault').removeClass('hideshow');
			})

			$('#pengirimanlain').on('click',function(){
				// bagian set kabupaten kota
		        $('#fomr_register [name=provinsi]').on('change',function(){
		          $('#fomr_register [name=provinsihidden]').val($('#fomr_register [name=provinsi] option:selected').text());
		          $('#fomr_register [name=kabupaten]').prop('disabled', false);
		          var idProv = $('#fomr_register [name=provinsi]').val();
		          var url = "<?php echo SITEURL.URL_ADMIN.'/pengiriman/getcity/'?>"+idProv;
		          $.getJSON(url,function(res){
		             var kota = res.rajaongkir.results;
		             var html='';
		             for (var i = 0; i < kota.length; i++) {
		               html +="<option value="+kota[i].city_name+">"+kota[i].city_name+"</option>";
		             }
		             $('#fomr_register [name=kabupaten]').html(html);
		          })
		        })
				$('#dataPengirimanDefault').addClass('hideshow');
				$('#dataPengirimanLain').removeClass('hideshow');
			})

			 /*periksa_biaya*/
	        $('#periksa_biaya').on('change',function(e){
	          e.preventDefault();
	          $('#hasil_biaya').html("<tr><td colspan=\"3\"><p style=\"color:green\"><i class=\"fa fa-refresh fa-spin\"></i> Mohon menunggu, sedang mengambil data...</p></td></tr>");
	          var cekbiaya = $('#fomr_register [name=cekbiaya]').val();
	          var origin ="<?php echo $origin ?>";
	          var destination =$('#fomr_register [name=kota_tujuan]').val();
	          var weight=$('#fomr_register [name=totalberat]').val();
	          var kurir =$('#fomr_register [name=kurir]').val();
	          if (origin == '' || destination ==''|| weight== 0|| kurir=='') {
	            $('#hasil_biaya').html("<tr><td colspan=\"3\"><p style=\"color:red\"><b>Kurir harus di pilih...!</b></p></td></tr>");
	            return false;
	          }else if(weight > 30000){
	            $('#hasil_biaya').html("<tr><td colspan=\"3\"><p style=\"color:red\"><b>Berat barang melampaui batas...!</b></p></td></tr>");
	            return false;
	          }else{
	            url ="<?php echo SITEURL.'/home/getcost' ?>";
	            $.ajax({
	              type: "POST",
	              url: url,
	              dataType: 'json',
	              data: "cekbiaya="+cekbiaya+"&origin="+origin+"&destination="+destination+"&weight="+weight+"&courier="+kurir,
	              success: function(res){
	                var namaKurir = res.rajaongkir.results[0].name;
	                html  ='';
	                var costs = res.rajaongkir.results[0].costs;
	                if (costs.length < 1) {
	                  html +="<tr><td colspan=\"3\">Maaf, pengiriman tidak tersedia,  silahkan pilih kurir lain..</td></tr>";
	                }else{
	                  for (var i = 0; i < 1; i++) {
	                    var estimasi='';
	                    if (costs[i].cost[0].etd == "") {estimasi ='-';}else{estimasi = costs[i].cost[0].etd+" hari";}
	                    html +="<tr>"
	                            +"<td>"+namaKurir+"</td>"
	                            +"<td>"+toRp(costs[i].cost[0].value)+"<input type=\"hidden\" name=\"totalbiayakirim\" value="+costs[i].cost[0].value+"></td>"
	                            +"<td>"+estimasi+"</td>"
	                            +"</tr>";
	                  }
	                }

	                $('#hasil_biaya').html(html);
	                var subtotal = $('#fomr_register [name=subtotal]').val();
	                var totalbiayakirim = $('#fomr_register [name=totalbiayakirim]').val();
	                if (totalbiayakirim != 'undefined') {
	                	var totalbiayakirimx = totalbiayakirim;
	                } else{
	                	var totalbiayakirimx = 0;
	                }

	                var grandTotal = parseInt(subtotal) + parseInt(totalbiayakirimx);
	                $('#grandTotal').html(toRp(grandTotal));
	                $('#grandTotalInput').val(grandTotal);
	                
	              }
	            });
	          }
	          
	        })
			
			//submit form konfirmasi
				
			$('#submitFormKonfirmasi').on('click', function(){
				
				var nama_bank = $('#nama_bank').val();
				var nama_pemilik_bank = $('#nama_pemilik_bank').val();
				var jumlah_transfer = $('#jumlah_transfer').val();
				var tgl_transfer = $('#tglTransfer').val();
				//var kode_order = $('#kd_order').text();

				if (nama_bank == '') {
					// alert('Nama Bank Harus di Isi');
					$('#nama_bank').css('background','#F7D6B5')
					$('#nama_bank').focus();
					return;
				} else if (nama_pemilik_bank == ''){
					$('#nama_pemilik_bank').css('background','#F7D6B5')
					$('#nama_pemilik_bank').focus();
					return;
				} else if (jumlah_transfer ==''){
					$('#jumlah_transfer').css('background','#F7D6B5')
					$('#jumlah_transfer').focus();
					return;
				} else if (tgl_transfer == '') {
					$('#tglTransfer').css('background','#F7D6B5')
					$('#tglTransfer').focus();
					return;
				} else{
					var url = "<?php echo SITEURL.'home/konfirm' ?>";
					$.ajax({
						url : url,
						type : 'POST',
						// dataType : 'json',
						data : $('#fmKonfirmasi').serializeArray(),
						success:function(res){
							if (res == 'ok') {
								alert('Konfirmasi pembayaran sukses, kami akan melakukan verifikasi terlebih dahulu.');
								window.location.reload();
							} else{
								alert('Error !!!');
							}
						}
					});
				}
				
				
			})
		})

		 function toRp(angka){
            var rev     = parseInt(angka, 10).toString().split('').reverse().join('');
            var rev2    = '';
            for(var i = 0; i < rev.length; i++){
                rev2  += rev[i];
                if((i + 1) % 3 === 0 && i !== (rev.length - 1)){
                    rev2 += '.';
                }
            }

            return 'Rp. ' + rev2.split('').reverse().join('') + ',00';
        }

	</script>
<?php cutter_end() ?>

