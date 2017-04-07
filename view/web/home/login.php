<?php cutter_start('content') ?>
<div class="login-area">
<div class="container">
    	<div class="row">
				<div class="col-md-9 col-sm-9">
					<div class="product-items-area">
						<h2 class="header-title">Login Pelanggan </h2>
						<div class="col-md-12">
							<p>Selamat datang pelanggan Allsport</p> 
							<p>Silahkan masukkan alamat email yang pernah anda gunakan untuk mendaftar pada
							   sistem kami.
							 </p>	
						</div>
						<form action="#" class="form-horizontal" id="form_login">
							<div class="form-group col-md-6">
								<label class="control-label">
									Masukkan Email
								</label>
								<input type="hidden" name="submit" value="login">
								<input type="email" class="form-control" name="email" required>
							</div>
							<div class="form-group col-md-6">
								<label class="control-label">
									Password
								</label>
								<input type="password" class="form-control" name="password" required>
							</div>
							<button class="btn">Login</button>
							<br>
							<p class="btn"><a href="<?php echo SITEURL.'home/register' ?>" style="color:orange"><i class="fa fa-link" style="color:orange"></i>&nbsp Belum punya akun ? Register Sekarang</a></p>
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
				
				
				</div>
				</div>   			
		</div>
	</div>
</div>
<?php cutter_end() ?>

<?php cutter_start('js') ?>
	<script >
		$(document).ready(function () {
			$('#form_login').on('submit', function(e){
				e.preventDefault()
				$.ajax({
					type : "post",
					url : "<?php echo SITEURL.'home/login' ?>",
					dataType : "json",
					data : $('#form_login').serializeArray(),
					success : function(res){
						if (res.msg == 'Ok') {
							var items = "<?php echo sizeof($items) ?>";
							if (items != "0") {
								window.location.href="<?php echo SITEURL.'home/pelangganck' ?>";
							} else{
								window.location.href="<?php echo SITEURL.'home/pelanggan' ?>";
							}
							
						}else{
							alert(res.msg)
						}
					}
				})
			})
		})
	</script>
<?php cutter_end() ?>