<?php cutter_start('content') ?>
	<div class="login-area">
<div class="container">
    	<div class="row">
				<div class="col-md-9 col-sm-9">
					<div class="product-items-area">
						<h2 class="header-title"><i class="fa fa-user"></i> Data Pelanggan</h2>
						<div class="col-md-12">
							<p>Selamat datang pelanggan <?php echo $namatoko ?></p> 
							<p>Dibawah ini adalah data detail anda, data akan kami gunakan sebagai alamat pengiriman default, silahkan lakukan perubahan jika merasa diperlukan. 
							 </p>
							 <?php echo (!empty($msg)) ? "<p>".$msg."</p>": '' ?>	
						</div>
						<form action="" method="POST" id="fomr_register">

						<?php $idpelanggan=''; foreach ($datapelanggan as $v): $idpelanggan=$v['id_pelanggan'];  ?>
							<input type="hidden" name="submit" value="update">
							<input type="hidden" name="id_pelanggan" value="<?php echo $v['id_pelanggan'] ?>">
							<div class="form-group col-md-6">
								<label class="control-label">
									Nama Lengkap
								</label>
								<input type="text" class="form-control" name="nama" value="<?php echo $v['nama'] ?>">
							</div>
							<div class="form-group col-md-6" style="clear:both">
								<label class="control-label">
									No Hp
								</label>
								<input type="no_hp" class="form-control" name="no_hp" value="<?php echo $v['no_hp'] ?>" />
							</div>
							<div class="form-group col-md-6">
								<label class="control-label">
									Alamat Email
								</label>
								<input type="email" class="form-control" name="email" value="<?php echo $v['email'] ?>" readonly>
							</div>
							<div class="form-group col-md-12">
								<label class="control-label">
									Alamat
								</label>
								<textarea class="form-control" name="alamat"><?php echo $v['alamat'] ?></textarea>
							</div>
							<div class="form-group col-md-6">
								<label class="control-label">
									Provinsi
								</label>
								<select name="provinsi" class="form-control" required>
									<?php foreach ($provinsi as $key): ?>
                       					<?php foreach ($key->results as $val): ?>
                       						<?php $selected = ($val->province == $v['provinsi']) ? 'selected' : '' ?>
                       						<option value="<?php echo $val->province_id ?>" <?php echo $selected ?> ><?php echo $val->province ?></option>}
                       					<?php endforeach ?>
                       				<?php endforeach ?>
								</select>
								<input type="hidden" value="<?php echo $v['provinsi'] ?>" name="provinsihidden" id="NamaProv">
							</div>
							<div class="form-group col-md-6">
								<label class="control-label">
									Kabupaten / Kota
								</label>
								<select name="kabupaten" class="form-control" readonly required>
									<option value="<?php echo $v['kota'] ?>"><?php echo $v['kota'] ?></option>}
								</select>
								<input type="hidden" value="<?php echo $v['kota'] ?>" name="namakota" id="namakota">
							</div>
							<div class="form-group col-md-6">
								<label class="control-label">
									Kode Pos
								</label>
								<input type="text" name="kodepos" value="<?php echo $v['kodepos'] ?>" class="form-control" >
							</div>
							<div style="clear:both">
								<button class="btn">UPDATE DATA</button>	
							</div>
							
							<br>
							<p class="text-right"><i class="fa fa-key"></i> <a href="javascript:updatePass()" class="underlinetitik">Update Password</a> | <i class="fa fa-envelope"></i> <a href="javascript:gantiEmail()" class="underlinetitik">Update Email</a></p>
							<br><br>
						<?php endforeach ?>
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
				</div>
				</div>   			
		</div>
	</div>
</div>

<div id="modalGantiPass" class="modal fade" role="dialog">
		  <div class="modal-dialog">
		    <!-- Modal content-->
		    <div class="modal-content">
		    	<div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h4 class="modal-title">Ganti Password</h4>
		      </div>
		      <div class="modal-body">
		        <form id="fmModalGantiPass">
		        	<div class="form-group">
		        		<input type="hidden" name="idpelanggan" id="idpelangganGantiPass" value="<?php echo $idpelanggan ?>">
		        		<label>Password Lama</label> 
		        		<input type="password" name="passlama" class="form-control">
		        	</div>
		        	<div class="form-group">
		        		
		        		<label>Password Baru</label> 
		        		<input type="password" name="passbaru1" class="form-control">
		        	</div>
		        	<div class="form-group">
		        		
		        		<label>Ulangi Password Baru</label> 
		        		<input type="password" name="passbaru2" class="form-control">
		        	</div>
		        	<div class="form-group">
		        		<button class="btn btn-warning" id="buttonUpdatePassModal">Update</button>
		        	</div>
		        </form>
		      </div>
		    </div>
		  </div>
		</div>

<div id="modalGantiEmail" class="modal fade" role="dialog">
		  <div class="modal-dialog">
		    <!-- Modal content-->
		    <div class="modal-content">
		    	<div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h4 class="modal-title">Ganti Email</h4>
		      </div>
		      <div class="modal-body">
		        <form>
		        	<div class="form-group">
		        		<input type="hidden" name="idpelanggan" id="idpelangganGantiEmail" value="<?php echo $idpelanggan ?>">
		        		<label>Masukkan Alamat Email Anda</label> 
		        		<input type="email" name="emailBaru" class="form-control" id="emailBaruModal" required>
		        	</div>
		        	<div class="form-group">
		        		<button class="btn btn-warning" id="updateEmailModal">Update</button>
		        	</div>
		        </form>
		      </div>
		    </div>
		  </div>
		</div>

<?php cutter_end() ?>

<?php cutter_start('css') ?>
	<style type="text/css">
		.underlinetitik{
			text-decoration: underline;
		}
	</style>
<?php cutter_end() ?>

<?php cutter_start('js') ?>
	<script src="<?php echo ASSETS ?>frontend/js/validate/jquery.validate.min.js"></script>	
	<script src="<?php echo ASSETS ?>frontend/js/validate/validate.pesan.error.js"></script>	
	<script type="text/javascript">
	//update password
		function updatePass (id) {
			$('#modalGantiPass').modal({
				backdrop : false,
				keyboard :'static'
			});	
		}

		function gantiEmail(id) {
			$('#modalGantiEmail').modal({
				backdrop : false,
				keyboard : 'static'
			})
		}

		$(document).ready(function(){
			//pasang triger
			// $('#fomr_register [name=provinsi]').blur();

			// bagian set kabupaten kota
	        $('#fomr_register [name=provinsi]').on('change',function(){
	          $('#fomr_register [name=provinsihidden]').val($('#fomr_register [name=provinsi] option:selected').text());
	          $('#fomr_register [name=kabupaten]').prop('disabled', false);
	          var idProv = $('#fomr_register [name=provinsi]').val();
	          var url = "<?php echo SITEURL.URL_ADMIN.'/pengiriman/getcity/'?>"+idProv;
	          $.getJSON(url,function(res){
	             var kota = res.rajaongkir.results;
	             var html='<option value=\"\"></option>';
	             for (var i = 0; i < kota.length; i++) {
	               html +="<option value="+kota[i].city_id+">"+kota[i].city_name+"</option>";
	             }
	             $('#fomr_register [name=kabupaten]').html(html);
	          })
	        })

	        $('#fomr_register [name=kabupaten]').on('change',function(){
	        	$('#namakota').val($('#fomr_register [name=kabupaten] option:selected').text());
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

	        //updateEmail
	        $('#updateEmailModal').on('click',function(e){
	        	e.preventDefault();
	        	var idpelanggan = $('#idpelangganGantiEmail').val();
	        	var emailBaru = $('#emailBaruModal').val();
	        	if (ValidateEmail(emailBaru)) {
	        		$.ajax({
	        			url : "<?php echo SITEURL.'home/updateEmailPelanggan' ?>",
	        			type: 'post',
	        			data : 'idpelanggan='+idpelanggan+'&email='+emailBaru,
	        			success:function(res){
	        				if (res == 'ok') {
	        					alert('Email berhasil di Update, silahkan login dengan Email baru');
	        					getOut();
	        				} else{
	        					alert('Gagal update Email');
	        				}
	        			}
	        		})
	        	} else{
	        		alert('Masukkan Alamat Email Yang Benar !');
	        	}
	        	

	        })
	         //updatePass
	        $('#buttonUpdatePassModal').on('click',function(e){
	        	e.preventDefault();
	        	var idpelanggan = $('#idpelangganGantiEmail').val();
	        	var passlama = $('#fmModalGantiPass [name=passlama]').val();
	        	var passbaru1 = $('#fmModalGantiPass [name=passbaru1]').val();
	        	var passbaru2 = $('#fmModalGantiPass [name=passbaru2]').val();

	        	if (passbaru1 == passbaru2) {
	        		$.ajax({
	        			url : "<?php echo SITEURL.'home/updatePassPelanggan' ?>",
	        			type: 'post',
	        			data : 'idpelanggan='+idpelanggan+'&passlama='+passlama+'&passbaru1='+passbaru1,
	        			success:function(res){
	        				if (res == 'ok') {
	        					alert('Password berhasil di Update, silahkan login dengan password baru');
	        					getOut();
	        				} else{
	        					alert('Gagal update password');
	        				}
	        			}
	        		})
	        	} else{
	        		alert('Password tidak sama !');
	        	}
	        	

	        })

		})

		function ValidateEmail(mail)   
		{  
		 if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(mail))  
		  {  
		    return (true)  
		  }  
		    // alert("You have entered an invalid email address!")  
		    return (false)  
		}  
	</script>
<?php cutter_end() ?>