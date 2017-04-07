<?php cutter_start('content') ?>
	<div class="contact-us-area">
		<div class="breadcurb-area">
			<div class="container">
				<ul class="breadcrumb">
					<li><a href="#">Home</a></li>
					<li>Contact</li>
				</ul>
			</div>
		</div>
		<div class="map-area">
			<div class="contact-map">
				<div id="googleMap" style="width:100%;height:400px"></div>
				<script>
				function myMap() {
				  var mapCanvas = document.getElementById("googleMap");
				  var mapOptions = {
				    	center: new google.maps.LatLng(-8.651004, 116.531444), 
				    	zoom: 10
				  	}
				  var map = new google.maps.Map(mapCanvas, mapOptions);
				}
				</script>
				<script src="//maps.googleapis.com/maps/api/js?key=AIzaSyBFRRVbKFf-gAwjNv_5jVOy9nY_y4fjQ54&callback=myMap"></script>
			</div>
		</div>
		<div class="contact-information">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-sm-6">
						<div class="contact-details">
							<div class="contact-head">
								<h2>INFORMASI </h2>
								<p>Yang terhormat pelanggan setia Allsport, anda dapat menghubungi kami melalui informasi kontak dibawah ini, atau anda dapat meninggalkan pesan kepada kami dengan mengisikan form disamping. Terimakasih, Salam Allsport.</p>
							</div>
							<div class="contact-bottom">
								<p><span><i class="fa fa-phone"></i></span> Telpon: +62 81800000000</p>
								<p><span><i class="fa fa-envelope"></i></span> E-mail: sudana@gmail.com</p>
								<p><span><i class="fa fa-link"></i></span> Website: <a href="#">www.allsport.com</a></p>
								<p><span><i class="fa fa-map-marker"></i></span> Alamat: Jalan Cenderawasih No 212, Ohayo</p>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-sm-6">
						<div class="contact-leave-message">
							<img src="//localhost/allsport/files/image/profil/1065537591toko_olahraga2.jpg" class="img-thumbnail" >
						</div>
					</div>
					<!-- <div class="col-md-6 col-sm-6">
						<div class="contact-leave-message">
							<div class="contact-head">
								<h2>Form Kirim Pesan</h2>
							</div>
							<form action="#" class="form-horizontal">
								<div class="form-group col-md-6">
									<label class="control-label">
										Subject / Hal
									</label>
									<input type="text" class="form-control">
								</div>
								<div class="form-group col-md-6">
									<label class="control-label">
										E-mail
									</label>
									<input type="text" class="form-control">
								</div>
								<div class="form-group col-md-6">
									<label class="control-label">
										Kode Order
									</label>
									<input type="text" class="form-control">
								</div>
								<div class="form-group col-md-6">
									<label class="control-label">
										Lampiran
									</label>
									<input type="file" class="form-control">
								</div>
								<div class="form-group col-md-12">
									<label class="control-label">
										Pesan
									</label>
									<textarea rows="5" class="form-control"></textarea>
								</div>
								<button class="btn">Kirim Pesan</button>
							</form>
						</div>
					</div> -->
				</div>
			</div>
		</div>
	</div>
<?php cutter_end() ?>
<?php cutter_start('js') ?>
<?php cutter_end() ?>