<?php cutter_start('content') ?>
	<div class="breadcurb-area">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="<?php echo SITEURL.'home' ?>">Home</a></li>
				<li><?php echo $title_page; ?></li>
			</ul>
		</div>
	</div>
	<div class="about-header">
		<div class="container">
			<div class="row">
				<?php foreach ($dataprofil as $v): ?>
				<div class="col-md-6">
					<div class="about-header-img">
						<?php ($v['foto']=='') ? $foto = 'nofoto.jpg' : $foto = $v['foto'] ?>
						<img src="<?php echo FILES.'image/profil/'.$foto ?>" class="img-thumbnail">
					</div>
				</div>
				<div class="col-md-6">
					<div class="about-header-content">
						<h1 class="about-title">Profil Toko <?php echo $v['nama'] ?></h1>
						<?php echo $v['profiltoko'] ?>
					</div>
				</div>
				<?php endforeach ?>
			</div>
		</div>
	</div>
	<div class="our-services-area">
			<div class="container">
				<div class="our-services-header">
					<h1 class="about-title">Mengapa Memilih Kami ?</h1>
				</div>
				<div class="row">
					<div class="col-md-4">
						<div class="single-services">
							<div class="sigle-services-icon">
								<i class="fa fa-laptop"></i>
							</div>
							<div class="sigle-services-content fix">
								<h2>AMAN</h2>
								<p>Berbelanja di toko kami tanpa takut penipuan, karna alamat dan tempat kami sudah jelas.</p>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="single-services">
							<div class="sigle-services-icon">
								<i class="fa fa-cogs"></i>
							</div>
							<div class="sigle-services-content fix">
								<h2>Barang Update</h2>
								<p>Menyediakan barang-barang terbaru dan terus update perkembangan masa kini. </p>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="single-services">
							<div class="sigle-services-icon">
								<i class="fa fa-mobile"></i>
							</div>
							<div class="sigle-services-content fix">
								<h2>SHOP ON THE GO</h2>
								<p>Nikmati berelanja dari perangkat mobile anda dimanapun berada. </p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
<?php cutter_end() ?>
