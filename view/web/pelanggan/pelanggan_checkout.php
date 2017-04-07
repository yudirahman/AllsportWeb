<?php cutter_start('content') ?>
	<div class="login-area">
<div class="container">
    	<div class="row">
				<div class="col-md-9 col-sm-9">
					<div class="product-items-area">
						<h2 class="header-title"><i class="fa fa-cart-arrow-down"></i> Checkout</h2>
						<form action="<?php echo SITEURL.'home/simpanOrder' ?>" method="POST" id="fomr_register" />

						<div class="col-md-12">
							<h4>1. Keranjang Belanja</h4> 
						</div>
						<table class="table table-bordered">
						<thead style="background-color:grey; color:#fff;font-weight:bold">
							<tr>
								<td style="width:5%">No</td>
								<td>Image</td>
								<td>Item</td>
								<td style="width:8%">Berat</td>
								<td style="width:8%">Qty</td>
								<td>Harga / Item</td>
							</tr>
						</thead>
						<tbody>
							<?php
												if(!empty($items)){
													$total = 0;
													$totalberat =0;
													$no=1;
													foreach($items as $id=>$qty) {
														foreach($masterproduk as $product) {
															if($product['id_produk'] == $id)
																break;
														}
														if(!isset($product['nama_produk']))
															continue;
															if ($product['diskon'] > 0) {
																$harganya = $product['harga_diskon'];
															}else{
																$harganya = $product['harga_produk'];
															}
															$beratx = $product['berat_produk'];
														echo'
														<tr>
															<td>'.$no.'<input type="hidden" name="idproduk[]" value="'.$product['id_produk'].'"><input type="hidden" name="qty[]" value="'.$qty.'"></td>
															<td width="20%"><a href="javascript:void(0)"><img src='.FILES."image/produk/".$product['image'].' alt="list"></a></td>
															<td><a href="javascript:void(0)">'.$product['nama_produk'].'</a></td>
															<td>'.$beratx.' gram <input type="hidden" class="beratproduk" value="'.$product['berat_produk'].'"></td>
															<td>'.$qty.'</td>
															<td>Rp. '.number_format($harganya,2).'</td>
														</tr>
															';
														$no++;
														$total += $harganya * $qty;
														$totalberat += $beratx * $qty;
													}
													echo '
													</tbody>
														<tfoot>
															<tr style="font-weight:bold">
																<td colspan="5">Subtotal</td>
																<td >Rp. '.number_format($total,2).'</td>
																<input type="hidden" name="totalberat" value="'.$totalberat.'" />
																<input type="hidden" name="subtotal" value="'.$total.'" />
															</tr>
														</tfoot>
													';
												}
												else{
													echo '<tr><td colspan="6" class="text-center">Cart Kosong</td></tr>';
												}
											?>
						
					
						</table>
						<div class="col-md-12">
							<h4>2. Alamat Pengiriman</h4> 
						</div>

						<table class="table table-bordered">
							<thead style="background-color:grey; color:#fff;font-weight:bold">
								<tr>
									<td> #
										<!-- <div class="form-group">  -->
											<!-- <input type="radio" name="pengiriman" id="pengirimandefault" checked/>
											<label for="pengirimandefault"> Kirim ke Alamat Saya</label> -->
										<!-- </div> -->
									</td>
									<td>:</td>
									<td>#
										<!-- <div class="form-group">  -->
											<!-- <input type="radio" name="pengiriman" id="pengirimanlain"/> -->
											<!-- <label for="pengirimanlain"> Kirim ke Alamat Lain</label> -->
										<!-- </div> -->
									</td>
								</tr>
							</thead>
							<tbody id="dataPengirimanDefault">
								<?php foreach ($datapelanggan as $val): ?>
								<tr>
									<td style="width:30%">Nama Penerima</td>
									<td style="width:2%">:</td>
									<td><?php echo $val['nama'] ?></td>
								</tr>
								<tr>
									<td style="width:30%">No Hp Penerima</td>
									<td style="width:2%">:</td>
									<td><?php echo $val['no_hp'] ?></td>
								</tr>
								<tr>
									<td style="width:30%">Alamat Penerima</td>
									<td style="width:2%">:</td>
									<td><?php echo $val['alamat'] ?></td>
								</tr>
								<tr>
									<td style="width:30%">Provinsi</td>
									<td style="width:2%">:</td>
									<td><?php echo $val['provinsi'] ?> <input type="hidden" name=""></td>
								</tr>
								<tr>
									<td style="width:30%">Kabupaten / Kota</td>
									<td style="width:2%">:</td>
									<td><?php echo $val['kota'] ?> <input type="hidden" name="kota_tujuan" value="<?php echo $val['idkota'] ?>"></td>
								</tr>
								<tr>
									<td style="width:30%">Kode Pos</td>
									<td style="width:2%">:</td>
									<td><?php echo $val['kodepos'] ?></td>
								</tr>
								<?php endforeach ?>
							</tbody>
							<!-- <tbody id="dataPengirimanLain" class="hideshow">
								<?php foreach ($datapelanggan as $val): ?>
								<tr>
									<td style="width:30%">Nama Penerima</td>
									<td style="width:2%">:</td>
									<td><input type="text" name="nama" class="form-control" required /></td>
								</tr>
								<tr>
									<td style="width:30%">No Hp Penerima</td>
									<td style="width:2%">:</td>
									<td><input type="text" name="nohp" class="form-control" required /></td>
								</tr>
								<tr>
									<td style="width:30%">Alamat Penerima</td>
									<td style="width:2%">:</td>
									<td><textarea rows="3" class="form-control" name="alamat" ></textarea></td>
								</tr>
								<tr>
									<td style="width:30%">Provinsi</td>
									<td style="width:2%">:</td>
									<td>
										<select name="provinsi" class="form-control" required>
											<option value="">Pilih Kota / Kabupaten</option>
											<?php foreach ($provinsi as $key): ?>
		                       					<?php foreach ($key->results as $v): ?>
		                       						<option value="<?php echo $v->province_id ?>"><?php echo $v->province ?></option>}
		                       					<?php endforeach ?>
		                       				<?php endforeach ?>
										</select>
									</td>
								</tr>
								<tr>
									<td style="width:30%">Kabupaten / Kota</td>
									<td style="width:2%">:</td>
									<td>
										<select name="kabupaten" class="form-control" readonly>
											<option value="">Pilih Kabupaten</option>}
										</select>
									</td>
								</tr>
								<tr>
									<td style="width:30%">Kode Pos</td>
									<td style="width:2%">:</td>
									<td><input type="text" name="kodepos" class="form-control" required /></td>
								</tr>
								<?php endforeach ?>
							</tbody> -->	
						</table>
						<div class="col-md-12">
							<h4>3. Biaya Pengiriman</h4> 
						</div>
						<div class="form-group col-md-6" style="margin-left: -15px">
							<input type="hidden" name="cekbiaya">
							<select class="form-control" name="kurir" id="periksa_biaya" required>
								<option value="">Pilih Kurir Untuk Pengiriman</option>
								<option value="jne">JNE</option>
								<option value="tiki">TIKI</option>
								<option value="pos">Pos Indonesia</option>
							</select>
						</div>
						<table class="table table-bordered">
							<thead style="background-color:grey; color:#fff;font-weight:bold">
								<tr>
									<td>Pilihan Kurir</td><td>Biaya Pengiriman</td><td>Estimasi</td>
								</tr>
							</thead>
							<tbody id="hasil_biaya">
								<tr>
									<td colspan="3"> Silahkan Pilih Kurir Untuk Pengiriman</td>
								</tr>
							</tbody>
						</table>
						
						<div class="col-md-12">
							<h4>4. Grand Total Yang Harus Dibayar.</h4> 
						</div>
						<table class="table table-bordered">
							<thead style="background-color:grey; color:#fff;font-weight:bold">
								<tr>
									<td>Total yang harus dibayar</td>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td class="text-right"><b id="grandTotal">Rp. 0.00</b></td>
									<input type="hidden" name="grandTotalInput" id="grandTotalInput" value="" />
								</tr>
							</tbody>
						</table>
							<br>
							<p>- Dengan melanjutkan ke proses order, anda akan menerima email berupa no rekening tujuan transfer. Jika dalam
								2 x 24 jam anda tidak melakukan pembayaran, maka order akan otomatis terhapus.</p>
							<br>
							<p class="text-right"><input type="submit" class="btn btn-warning" value="PROSES ORDER"></p>
						</form>
						<br>
						<br>
						<br>
						<br>
						<br>
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
	
<?php cutter_end() ?>

<?php cutter_start('css') ?>
	<style type="text/css">
		.hideshow{
			display: none;
		}
	</style>
<?php cutter_end() ?>

<?php cutter_start('js') ?>
	<script type="text/javascript">
		$(document).ready(function(){

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

