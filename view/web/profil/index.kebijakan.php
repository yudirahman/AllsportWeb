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
				<div class="col-md-8">
					<div class="about-header-content">
						<h1 class="about-title">Bantuan</h1>
						<?php echo $v['kebijakantoko']; ?>
					</div>
				</div>
				<div class="col-md-4" style="min-height:400px">
					<div class="about-header-img">
						<?php ($v['foto']=='') ? $foto = 'nofoto.jpg' : $foto = $v['foto'] ?>
						<img src="<?php echo FILES.'image/profil/'.$foto ?>" class="img-thumbnail">
					</div>
				</div>
				<?php endforeach ?>
			</div>
		</div>
	</div>
	
<?php cutter_end() ?>
