<?php cutter_start('content') ?>
<div class="login-area">
<div class="container">
    	<div class="row">
				<div class="col-md-9 col-sm-9">
					<div class="product-items-area">
						<h2 class="header-title">Register Pelanggan Baru</h2>
						<div class="col-md-12">
							<p>Selamat datang pelanggan <?php echo $namatoko ?></p> 
							<p>Silahkan masukkan informasi anda pada form dibawah ini, informasi akan
								kami gunakan sebagai data pelanggan <?php echo $namatoko ?>.
							 </p>	
						</div>
						<form action="" method="POST" id="fomr_register">
							<input type="hidden" name="submit" value="register">
							<div class="form-group col-md-6">
								<label class="control-label">
									Nama Lengkap
								</label>
								<input type="text" class="form-control" name="nama">
							</div>
							<div style="clear:both"></div>
							<div class="form-group col-md-6">
								<label class="control-label">
									Alamat Email
								</label>
								<input type="email" class="form-control" name="email">
							</div>
							<div class="form-group col-md-6">
								<label class="control-label">
									NO. HP
								</label>
								<input type="text" class="form-control" name="no_hp">
							</div>
							<div class="form-group col-md-6">
								<label class="control-label">
									Password
								</label>
								<input type="password" id="password" class="form-control" name="password">
							</div>
							<div class="form-group col-md-6">
								<label class="control-label">
									Ulangi Password
								</label>
								<input type="password" class="form-control" name="repassword">
							</div>
							<div class="form-group col-md-12">
								<label class="control-label">
									Alamat
								</label>
								<textarea class="form-control" name="alamat"></textarea>
							</div>
							<div class="form-group col-md-6">
								<label class="control-label">
									Provinsi
								</label>
								<select name="provinsi" class="form-control" required>
									<option value="">Pilih Kota / Kabupaten</option>
									<?php foreach ($provinsi as $key): ?>
                       					<?php foreach ($key->results as $v): ?>
                       						<option value="<?php echo $v->province_id ?>"><?php echo $v->province ?></option>}
                       					<?php endforeach ?>
                       				<?php endforeach ?>
								</select>
								<input type="hidden" value="" name="provinsihidden" id="NamaProv">
							</div>
							<div class="form-group col-md-6">
								<label class="control-label">
									Kabupaten / Kota
								</label>
								<select name="kabupaten" class="form-control" readonly>
									<option value="">Pilih Kabupaten</option>}
								</select>
								<input type="hidden" value="" name="idKotaHidden" id="idKotaHidden">
							</div>
							<div class="form-group col-md-6">
								<label class="control-label">
									Kode Pos
								</label>
								<input type="text" name="kodepos" class="form-control" >
							</div>
							<div style="clear:both">
								<button class="btn">Register</button>	
							</div>
							
							<br>
							<p class="btn" ><a href="<?php echo SITEURL.'home/login' ?>" style="color:orange"><i class="fa fa-link" style="color:orange"></i>&nbsp Sudah punya akun ? Login Sekarang</a></p>
							<br><br>
						</form>
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
				
				
				<!-- <div class="testmonial-area fix">
					<h2 class="header-title">Testimonial</h2>
					<div id="owl-testmonial" class="owl-carousel">
						<div class="testmonial fix">
							<span><i class="fa fa-quote-left"></i></span>
							<p>Lorem ipsum dolor consetetuer adipiscing elit. Aenean commdo ligula eget dolor. Aenean massa.</p>
							<h3>-MatthE Jensen</h3>
							<img src="<?php echo ASSETS ?>frontend/img/testmonial.jpg" alt="">
						</div>
						<div class="testmonial fix">
							<span><i class="fa fa-quote-left"></i></span>
							<p>Lorem ipsum dolor consetetuer adipiscing elit. Aenean commdo ligula eget dolor. Aenean massa.</p>
							<h3>-MatthE Jensen</h3>
							<img src="<?php echo ASSETS ?>frontend/img/testmonial.jpg" alt="">
						</div>
					</div>
				</div> -->
				<!-- <div class="subscribe-area">
					<h2>Subscribe Letter</h2>
					<form action="#">
						<div class="input-group">
							<input type="text" class="form-control" placeholder="Enter your E-mail">
							<button type="button" class="btn"><i class="fa fa-envelope-o"></i></button>
						</div>
					</form>
				</div> -->
				</div>
				</div>   			
		</div>
	</div>
</div>
<?php cutter_end() ?>

<?php cutter_start('js') ?>
	<script src="<?php echo ASSETS ?>frontend/js/validate/jquery.validate.min.js"></script>	
	<script src="<?php echo ASSETS ?>frontend/js/validate/validate.pesan.error.js"></script>	
	<script type="text/javascript">
		$(document).ready(function(){
			// bagian set kabupaten kota
	        $('#fomr_register [name=provinsi]').on('change',function(){
	          $('#fomr_register [name=provinsihidden]').val($('#fomr_register [name=provinsi] option:selected').text());
	          $('#fomr_register [name=kabupaten]').prop('disabled', false);
	          var idProv = $('#fomr_register [name=provinsi]').val();
	          var url = "<?php echo SITEURL.URL_ADMIN.'/pengiriman/getcity/'?>"+idProv;
	          $.getJSON(url,function(res){
	             var kota = res.rajaongkir.results;
	             var html='<option value="">Pilih Kota / Kabupaten</option>';
	             for (var i = 0; i < kota.length; i++) {
	               html +="<option value="+kota[i].city_id+">"+kota[i].city_name+"</option>";
	             }
	             $('#fomr_register [name=kabupaten]').html(html);
	          })
	        })

	        $('#fomr_register [name=kabupaten]').on('change', function(){
	        	$('#idKotaHidden').val($('#fomr_register [name=kabupaten] option:selected').text());
	        })

	        //validasi register
	        $('#fomr_register').validate({
	        	rules:{
	        		nama : {
	        			required:true,
						maxlength:50,
						minlength:5
	        		},
	        		email : {
	        			required:true,
						email:true
	        		},
	        		password : {
	        			required : true,
	                    minlength : 5
		            },
		            repassword : {
		            		required : true,
		                    minlength : 5,
		                    equalTo : "#password"
		                },
		            alamat : {
		            	required:true,
		            	minlength: 20
		            },
		            provinsi:{
		            	required:true
		            },
		            kabupaten:{
		            	required:true
		            },
		            kodepos :{
		            	required : true,
		            	number:true,
		            	minlength :5,
		            	maxlength :6
		            }

	        	},
	        	submitHandler:function(){
	        		$(form).submit()
	        	}
	        })
		})
	</script>
<?php cutter_end() ?>