<?php 
/**
* Home
*/
class Home extends Base
{
	
	public function index()
	{
		/*assign variable*/
		$data['title_page'] = 'Home';
		$data['namatoko'] = $this->siteinfo('nama');
		$data['slider_produk'] = $this->sliderProduk(3);
		$data['masterkategori'] = $this->masterKategoriProduk();
		$data['produk_futsal'] = $this->produkByKategory(8);
		$data['jersey'] = $this->produkByKategory(9);
		$data['sepatu_bola'] = $this->produkByKategory(1);
		$data['session'] = isset($_SESSION['username']);
		$data['items'] = $this->itemcart();
		$data['masterproduk'] = $this->masterProduk();
		$data['masterdiskon'] = $this->masterProdukDiskon();
		$this->render->view('web/home/index',$data);
	}

	public function register()
	{
		if (isset($_SESSION['username'])) {
			header('location:'.SITEURL.'home');
		}

		/*assign variable*/
		$data['namatoko'] = $this->siteinfo('nama');
		$data['session'] = isset($_SESSION['username']);
		$data['masterkategori'] = $this->masterKategoriProduk();
		$data['items'] = $this->itemcart();
		$data['masterdiskon'] = $this->masterProdukDiskon();
		$data['masterproduk'] = $this->masterProduk();
		if (isset($_POST['submit'])) {
			// echo '<pre>';
			// print_r($_POST);
			// die();
			$nama = $_POST['nama'];
			$email = $_POST['email'];
			$password = md5($_POST['password']);
			$alamat = htmlspecialchars($_POST['alamat']);
			$provinsi = $_POST['provinsihidden'];
			$kota = $_POST['kabupaten'];
			$idprovinsi = $_POST['provinsi'];
			$namakota = $_POST['idKotaHidden'];
			$nohp = $_POST['no_hp'];
			$kodepos = $_POST['kodepos'];

			if ($this->cek_email($email) == true) {
				$_SESSION['session_message'] = "Register Pelanggan Gagal <br>Email <b>".$email."</b> sudah terdaftar !. <br><a href=\"javascrpt:void(0)\" onclick=\"window.history.back()\" >Kembali ke Form Register.</a>";
				$data['title_page'] = 'Register Pelanggan Gagal';
				$this->render->view('web/home/register_konfirmasi',$data);
			} else {
				if ($this->addPelanggan($nama,$email,$password,$alamat,$provinsi,$kota,$kodepos,$nohp,$idprovinsi,$namakota) == true) {
					$_SESSION['session_message'] = "Registrasi Sukses. Silahkan klik <a href=\" ".SITEURL."home/login \" >disini untuk login.</a>";
					$data['title_page'] = 'Register Pelanggan Sukses';
					$this->render->view('web/home/register_konfirmasi',$data);
				} else {
					$_SESSION['session_message'] = "Registrasi Gagal.";
					$data['title_page'] = 'Register Pelanggan Gagal !!! #unknownError <br><a href=\"javascrpt:void(0)\" onclick=\"window.history.back()\" >Kembali ke Form Register.</a>';
					$this->render->view('web/home/register_konfirmasi',$data);
				}	
			}
			
		} else {
			$data['title_page'] = 'Register Pelanggan';
			$data['provinsi'] = json_decode($this->getProvinsi());
			$this->render->view('web/home/register',$data);	
		}
		
		
	}

	public function login()
	{
		if (isset($_SESSION['username'])) {
			header('location:'.SITEURL.'home');
		}
		/*assign variable*/
		$data['title_page'] = 'Login Pelanggan';
		$data['session'] = isset($_SESSION['username']);
		$data['masterkategori'] = $this->masterKategoriProduk();
		$data['items'] = $this->itemcart();
		$data['masterdiskon'] = $this->masterProdukDiskon();
		$data['masterproduk'] = $this->masterProduk();
		if (isset($_POST['submit'])) {
			$email = $_POST['email'];
			$password = md5($_POST['password']);

			if ($this->cekLoginPelanggan($email, $password) != false) {
				foreach ($this->cekLoginPelanggan($email, $password) as $row) {
					$_SESSION['id_pelanggan'] = $row['id_pelanggan'];
					$_SESSION['username'] = $row['email'];
					$_SESSION['namapelanggan'] = $row['nama'];
					$_SESSION['emailpelanggan'] = $row['email'];

				}
				echo json_encode(array("msg" => "Ok"));
			} else {
				echo json_encode(array("msg" => "Opps... Gagal Login"));
			}
			
		} else {
			$this->render->view('web/home/login',$data);
		}
		
	}

	public function logout()
	{
		unset($_SESSION['id_pelanggan']);
		unset($_SESSION['username']);
		unset($_SESSION['namapelanggan']);
		header("location:".SITEURL."home");
	}

	public function user()
	{
		echo 'user';
	}

	public function addPelanggan($nama,$email,$password,$alamat,$provinsi,$kota,$kodepos,$nohp,$idprovinsi,$namakota)
	{
		$sql = "INSERT INTO pelanggan SET 
							nama = '".$nama."',
							email = '".$email."',
							password = '".$password."',
							alamat = '".$alamat."',
							provinsi ='".$provinsi."',
							kota = '".$namakota."',
							idprovinsi = ".$idprovinsi." ,
							idkota = ".$kota.",
							no_hp = '".$nohp."',
							kodepos = ".$kodepos."
				";
		$query = $this->db->set_data($sql);
		if ($query) {
			return true;
		} else {
			return false;
		}
		
	}

	public function updatePelanggan($nama,$alamat,$provinsi,$kota,$kodepos,$id_pelanggan,$nohp,$idprovinsi,$idkota)
	{
		$sql = "UPDATE pelanggan SET 
							nama = '".$nama."',
							no_hp = '".$nohp."',
							alamat = '".$alamat."',
							provinsi ='".$provinsi."',
							kota = '".$kota."',
							kodepos = ".$kodepos.",
							idprovinsi = ".$idprovinsi.",
							idkota =".$idkota."
						WHERE id_pelanggan = ".$id_pelanggan."
				";
		$query = $this->db->set_data($sql);
		if ($query) {
			return true;
		} else {
			return false;
		}
	}

	public function cek_email($email)
	{
		$sql = "SELECT email from pelanggan where email = '".$email."' ";
		$data = $this->db->get_data($sql);

		if (!empty($data)) {
			return true;
		} else {
			return false;
		}
		
	}

	public function cekLoginPelanggan($email,$password)
	{
		$sql = "SELECT * from pelanggan where email = '".$email."' AND password = '".$password."' ";
		$data = $this->db->get_data($sql);

		if (!empty($data)) {
			return $data;
		} else {
			return false;
		} 
	}

	public function sliderProduk($jml)
	{
		$sql = "SELECT * FROM produk ORDER BY diskon DESC, id_produk DESC LIMIT ".$jml."";
		$data = $this->db->get_data($sql);
		if (!empty($data)) {
			return $data;
		}else{
			return array();
		}
	}

	public function produkByKategory($id_kategori_produk)
	{
		$sql = "SELECT * FROM produk WHERE id_kategori_produk = ".$id_kategori_produk." ORDER BY rand() LIMIT 6 ";
		$data = $this->db->get_data($sql);
		if (!empty($data)) {
			return $data;
		}else{
			return array();
		}
	}

	public function pelanggan()
	{
		/*assign variable*/
		if (empty($_SESSION['username'])) {
			header('location:'.SITEURL.'home/login');
			exit;
		}else{
			if (isset($_POST['submit'])) {
				$nama = $_POST['nama'];
				$alamat= $_POST['alamat'];
				$provinsi= $_POST['provinsihidden'];
				$kota= $_POST['namakota'];
				$kodepos= $_POST['kodepos'];
				$id_pelanggan= $_POST['id_pelanggan'];
				$nohp = $_POST['no_hp'];
				$idprovinsi = $_POST['provinsi'] ;
				$idkota = $_POST['kabupaten'] ;

				if ($this->updatePelanggan($nama,$alamat,$provinsi,$kota,$kodepos,$id_pelanggan,$nohp,$idprovinsi,$idkota)==true) {
					$data['msg'] = 'Data Berhasil di Perbaharui';					
				}else{
					$data['msg'] = 'Gagal Perbaharui Data, Silahkan Coba Beberapa Saat Lagi...';
				}
			}

			$data['title_page'] = 'Pelanggan';
			$data['namatoko'] = $this->siteinfo('nama');
			$data['slider_produk'] = $this->sliderProduk(3);
			$data['masterkategori'] = $this->masterKategoriProduk();
			$data['produk_futsal'] = $this->produkByKategory(8);
			$data['jersey'] = $this->produkByKategory(9);
			$data['sepatu_bola'] = $this->produkByKategory(1);
			$data['session'] = isset($_SESSION['username']);
			$data['items'] = $this->itemcart();
			$data['masterproduk'] = $this->masterProduk();
			$data['masterdiskon'] = $this->masterProdukDiskon();
			$data['datapelanggan'] = $this->datapelangganlogin();
			$data['provinsi'] = json_decode($this->getProvinsi());
			$this->render->view('web/pelanggan/index',$data);
		}

	}

	public function updateEmailPelanggan()
	{
		$sql = "UPDATE pelanggan SET email='".$_POST['email']."' where id_pelanggan=".$_POST['idpelanggan']." ";
		$query = $this->db->set_data($sql);
		if ($query) {
			echo 'ok';
		} else {
			echo 'gagal';
		}
		
	}

	public function updatePassPelanggan()
	{
		//cek password lama
		$sql = "SELECT password FROM pelanggan WHERE password='".md5($_POST['passlama'])."' AND id_pelanggan=".$_POST['idpelanggan']." ";
		$query1 = $this->db->get_data($sql);

		if (!empty($query1)) {
			$sql = "UPDATE pelanggan SET password='".md5($_POST['passbaru1'])."' where id_pelanggan=".$_POST['idpelanggan']." ";
			$query = $this->db->set_data($sql);
			if ($query) {
				echo 'ok';
			} else {
				echo 'gagal';
			}
		} else {
			echo 'gagal';
		}
		
		
	}

	public function pelangganck()
	{
		/*assign variable*/
		if (empty($_SESSION['username'])) {
			header('location:'.SITEURL.'home/login');
			exit;
		}

		$data['title_page'] = 'Pelanggan';
		$data['namatoko'] = $this->siteinfo('nama');
		$data['origin'] = $this->siteinfo('idkota');
		$data['slider_produk'] = $this->sliderProduk(3);
		$data['masterkategori'] = $this->masterKategoriProduk();
		$data['produk_futsal'] = $this->produkByKategory(8);
		$data['jersey'] = $this->produkByKategory(9);
		$data['sepatu_bola'] = $this->produkByKategory(1);
		$data['session'] = isset($_SESSION['username']);
		$data['items'] = $this->itemcart();
		$data['masterproduk'] = $this->masterProduk();
		$data['masterdiskon'] = $this->masterProdukDiskon();
		$data['datapelanggan'] = $this->datapelangganlogin();
		$data['provinsi'] = json_decode($this->getProvinsi());
		$this->render->view('web/pelanggan/pelanggan_checkout',$data);
	}

	//kirim email
	public function sendmail($kd_order,$total_bayar,$email)
	{
		date_default_timezone_set('Etc/UTC');
		require ROOT_LIBS.'vendor/autoload.php';
		//Create a new PHPMailer instance
		$mail = new PHPMailer;
		//Tell PHPMailer to use SMTP
		$mail->isSMTP();
		//Enable SMTP debugging
		// 0 = off (for production use)
		// 1 = client messages
		// 2 = client and server messages
		$mail->SMTPDebug = 0;
		//Ask for HTML-friendly debug output
		$mail->Debugoutput = 'html';
		//Set the hostname of the mail server
		$mail->Host = 'smtp.gmail.com';
		// use
		// $mail->Host = gethostbyname('smtp.gmail.com');
		// if your network does not support SMTP over IPv6
		//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
		$mail->Port = 587;
		//Set the encryption system to use - ssl (deprecated) or tls
		$mail->SMTPSecure = 'tls';
		//Whether to use SMTP authentication
		$mail->SMTPAuth = true;
		//Username to use for SMTP authentication - use full email address for gmail
		$mail->Username = "yudirahmanjr@gmail.com";
		//Password to use for SMTP authentication
		$mail->Password = "yud121314";
		//Set who the message is to be sent from
		$mail->setFrom('allsportproduct@gmail.com', 'Allsport');
		//Set an alternative reply-to address
		$mail->addReplyTo('allsportproduct@gmail.com', 'Allsport Product');
		//Set who the message is to be sent to
		$mail->addAddress($email,'Pelanggan');
		//Set the subject line
		$mail->Subject = 'Tagihan Order Allsport #'.$kd_order;
		//Read an HTML message body from an external file, convert referenced images to embedded,
		//convert HTML into a basic plain-text alternative body
		$mail->msgHTML('
						<p>Order anda berhasil kami simpan dengan kode <b>'.$kd_order.'</b>, silahkan lakukan pembayaran melalui no Rekening
							di bawah ini. 
						</p>
						<table style="border:1px solid black;border-collapse: collapse;width: 100%;" >
						<tr style="background:#EBBD63">
							<th style="border: 1px solid black;padding:10px">Nama Bank</th>
							<th style="border: 1px solid black;padding:10px">No Rekening</th>
							<th style="border: 1px solid black;padding:10px">Atas Nama</th>
						</tr>
						<tr>
							<td style="border: 1px solid black;padding:10px"> Bank BRI </td>
							<td style="border: 1px solid black;padding:10px"> 040901005267504 </td>
							<td style="border: 1px solid black;padding:10px"> Sudana Irsyad Anry </td>
						</tr>
						<tr>
							<td style="border: 1px solid black;padding:10px;text-align:center" colspan="3"> 
							<b><i>Total yang harus anda bayar sejumlah Rp. '.number_format($total_bayar,2).' </i></b> 
							</td>
						</tr>
						</table>
						<br><br>
						<p>Setelah melakukan pembayaran, simpan bukti transfer anda dan kembali ke website Allsport 
						untuk melakukan konfirmasi. Terimakasih. <p>
						
						');
		//Replace the plain text body with one created manually
		//$mail->AltBody = 'This is a plain-text message body';
		//Attach an image file
		//$mail->addAttachment('images/phpmailer_mini.png');
		//send the message, check for errors
		if (!$mail->send()) {
		    return false;
		    // . $mail->ErrorInfo;
		} else {
		    return true;
		}
	}

	//kirim email
	public function sendmailkonfirmasi($kd_order,$total_bayar,$email,$bank,$pemilik_rek,$tgl_transfer,$jam_transfer)
	{
		date_default_timezone_set('Etc/UTC');
		require ROOT_LIBS.'vendor/autoload.php';
		//Create a new PHPMailer instance
		$mail = new PHPMailer;
		//Tell PHPMailer to use SMTP
		$mail->isSMTP();
		//Enable SMTP debugging
		// 0 = off (for production use)
		// 1 = client messages
		// 2 = client and server messages
		$mail->SMTPDebug = 0;
		//Ask for HTML-friendly debug output
		$mail->Debugoutput = 'html';
		//Set the hostname of the mail server
		$mail->Host = 'smtp.gmail.com';
		// use
		// $mail->Host = gethostbyname('smtp.gmail.com');
		// if your network does not support SMTP over IPv6
		//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
		$mail->Port = 587;
		//Set the encryption system to use - ssl (deprecated) or tls
		$mail->SMTPSecure = 'tls';
		//Whether to use SMTP authentication
		$mail->SMTPAuth = true;
		//Username to use for SMTP authentication - use full email address for gmail
		$mail->Username = "yudirahmanjr@gmail.com";
		//Password to use for SMTP authentication
		$mail->Password = "yud121314";
		//Set who the message is to be sent from
		$mail->setFrom('allsportproduct@gmail.com', 'Allsport');
		//Set an alternative reply-to address
		$mail->addReplyTo('allsportproduct@gmail.com', 'Allsport Product');
		//Set who the message is to be sent to
		$mail->addAddress($email,'Pelanggan');
		//Set the subject line
		$mail->Subject = 'Konfirmasi pembayaran Order Allsport #'.$kd_order;
		//Read an HTML message body from an external file, convert referenced images to embedded,
		//convert HTML into a basic plain-text alternative body
		$mail->msgHTML('
						<p>Konfirmasi pembayaran untuk kode order <b>'.$kd_order.'</b>, telah tersimpan ke sistem kami dengan data sebagai berikut : 
						</p>
						<table style="border:1px solid black;border-collapse: collapse;width: 100%;" >
						<tr style="background:green">
							<th style="border: 1px solid black;padding:10px"> Bank</th>
							<th style="border: 1px solid black;padding:10px">Pemilik Rekening </th>
							<th style="border: 1px solid black;padding:10px"> Tanggal Transfer</th>
							<th style="border: 1px solid black;padding:10px"> Jumlah Transfer</th>
						</tr>
						<tr>
							<td style="border: 1px solid black;padding:10px"> '.$bank.' </td>
							<td style="border: 1px solid black;padding:10px"> '.$pemilik_rek.' </td>
							<td style="border: 1px solid black;padding:10px"> '.$tgl_transfer.' '.$jam_transfer.' </td>
							<td style="border: 1px solid black;padding:10px"> '.$total_bayar.' </td>
						</tr>
						
						</table>
						<br><br>
						<p>Kami akan melakukan verifikasi atas pembayaran yang anda lakukan, anda dapat melihat status order di bagian Riwayat Order. <p>
						
						');
		//Replace the plain text body with one created manually
		//$mail->AltBody = 'This is a plain-text message body';
		//Attach an image file
		//$mail->addAttachment('images/phpmailer_mini.png');
		//send the message, check for errors
		if (!$mail->send()) {
		    return false;
		    // . $mail->ErrorInfo;
		} else {
		    return true;
		}
	}


	public function datapelangganlogin()
	{
		$sql = "SELECT * FROM pelanggan WHERE id_pelanggan=".$_SESSION['id_pelanggan']." ";
		$data = $this->db->get_data($sql);
		if (!empty($data)) {
			return $data;
		}else{
			return array();
		}
	}

	public function konfirmasick()
	{
		/*assign variable*/
		if (empty($_SESSION['username'])) {
			header('location:'.SITEURL.'home/login');
			exit;
		}		

		$data['title_page'] = 'Pelanggan';
		$data['namatoko'] = $this->siteinfo('nama');
		$data['origin'] = $this->siteinfo('idkota');
		$data['slider_produk'] = $this->sliderProduk(3);
		$data['masterkategori'] = $this->masterKategoriProduk();
		$data['produk_futsal'] = $this->produkByKategory(8);
		$data['jersey'] = $this->produkByKategory(9);
		$data['sepatu_bola'] = $this->produkByKategory(1);
		$data['session'] = isset($_SESSION['username']);
		$data['items'] = $this->itemcart();
		$data['masterproduk'] = $this->masterProduk();
		$data['masterdiskon'] = $this->masterProdukDiskon();
		$data['datapelanggan'] = $this->datapelangganlogin();
		$data['provinsi'] = json_decode($this->getProvinsi());
		$data['orderan'] = $this->produk_order_by_idPelanggan();
		$this->render->view('web/pelanggan/konfirmasick',$data);
	}

	public function histori()
	{
		/*assign variable*/
		if (empty($_SESSION['username'])) {
			header('location:'.SITEURL.'home/login');
			exit;
		}		

		$data['title_page'] = 'Pelanggan';
		$data['namatoko'] = $this->siteinfo('nama');
		$data['origin'] = $this->siteinfo('idkota');
		$data['slider_produk'] = $this->sliderProduk(3);
		$data['masterkategori'] = $this->masterKategoriProduk();
		$data['produk_futsal'] = $this->produkByKategory(8);
		$data['jersey'] = $this->produkByKategory(9);
		$data['sepatu_bola'] = $this->produkByKategory(1);
		$data['session'] = isset($_SESSION['username']);
		$data['items'] = $this->itemcart();
		$data['masterproduk'] = $this->masterProduk();
		$data['masterdiskon'] = $this->masterProdukDiskon();
		$data['datapelanggan'] = $this->datapelangganlogin();
		$data['provinsi'] = json_decode($this->getProvinsi());
		$data['orderan'] = $this->produk_order_by_idPelangganHistori();
		$this->render->view('web/pelanggan/histori',$data);
	}

	public function konfirm()
	{

		$dateCreate = date_create($_POST['tgl_transfer']);
		$date = date_format( $dateCreate, "Y-m-d");
		$jmTf = $_POST['jam_transfer'].":".$_POST['menit_transfer'];
		$sql = "UPDATE orders SET 
							bank = '".$_POST['nama_bank']."',
							pemilik_rek = '".$_POST['nama_pemilik_bank']."',
							jumlah_tf = '".$_POST['jumlah_transfer']."',
							tgl_tf = '".$date."',
							jam_tf = '".$jmTf."',
							status_order = 1
				where id_order = ".$_POST['id_order']." ";
		// die($sql);
		$query = $this->db->set_data($sql);
		// die($query);
		if ($query) {
			echo 'ok';
			$this->sendmailkonfirmasi($_POST['kode_order'],
									  $_POST['jumlah_transfer'],
									  $_POST['email_pelanggan'],
									  $_POST['nama_bank'],
									  $_POST['nama_pemilik_bank'],
									  $date,
									  $jmTf
									  );
		} else {
			echo 'gagal';
		}
		
	}

	public function simpanOrder()
	{


		$x = 3; // Amount of digits
		$min = pow(10,$x);
		$max = pow(10,$x+1)-1;
		$rand = rand($min, $max);

		$kurir = $_POST['kurir'];
		$totalbiayakirim = $_POST['totalbiayakirim'];
		$grandTotalInput = $_POST['grandTotalInput'];
		$emailKirim = $_SESSION['emailpelanggan'];

		if ($this->insertOrders($rand, $kurir, $totalbiayakirim, $grandTotalInput)) {
			$sql = "SELECT max(id_order) as lastID from orders";
			$data = $this->db->get_data($sql);
			foreach ($data as $v) {
				$lastID = $v['lastID'];
			}

			$idprodukArray = $_POST['idproduk'];
			for ($i=0; $i < count($idprodukArray) ; $i++) { 
				$this->insertProdukOrders($lastID, $_POST['idproduk'][$i], $_POST['qty'][$i]);
				$this->subtractingStok($_POST['idproduk'][$i], $_POST['qty'][$i] );		
			}

			$this->sendmail($rand,$grandTotalInput,$emailKirim);
			unset($_SESSION[$_SERVER['SERVER_NAME'].'_cart_attributes']);
			unset($_SESSION[$_SERVER['SERVER_NAME'].'_cart']);

			header('location:'.SITEURL.'home/konfirmasick');

			
		} else {
			echo 'error';
		}
		

		// echo '<pre>';
		// print_r($_POST);

	}

	public function insertOrders($rand, $kurir, $totalbiayakirim, $grandTotalInput)
	{
		
		$sql = "INSERT INTO orders SET  kode_order = '".$rand."' ,
										id_pelanggan = ".$_SESSION['id_pelanggan'].",
										kurir = '".$kurir."',
										biaya_kirim =".$totalbiayakirim." ,
										total_bayar =".$grandTotalInput."  ";

		$query = $this->db->set_data($sql);
		if ($query) {
			return true;
		}else{
			return false;
		}
	}

	public function insertProdukOrders($id_order, $idproduk, $qty)
	{
		$sql = "INSERT INTO produk_order SET  id_order = ".$id_order." ,
										id_produk = ".$idproduk.",
										qty = ".$qty." ";

		$query = $this->db->set_data($sql);
		if ($query) {
			return true;
		}else{
			return false;
		}
	}

	public function subtractingStok($idproduk,$qty)
	{
		$sql = "UPDATE produk SET  
								   stok = stok - ".$qty." WHERE id_produk = ".$idproduk."  ";

		$query = $this->db->set_data($sql);
		if ($query) {
			return true;
		}else{
			return false;
		}
	}

	public function produk_order_by_idPelanggan()
	{
		$sql = "SELECT * FROM orders WHERE id_pelanggan=".$_SESSION['id_pelanggan']." AND status_order = 0 ORDER BY tgl_order desc ";
		$data = $this->db->get_data($sql);
		if (!empty($data)) {
			return $data;
		}else{
			return array();
		}
	}

	public function produk_order_by_idPelangganHistori()
	{
		$sql = "SELECT * FROM orders WHERE id_pelanggan=".$_SESSION['id_pelanggan']." AND status_order <> 0 ORDER BY tgl_order desc ";
		$data = $this->db->get_data($sql);
		if (!empty($data)) {
			return $data;
		}else{
			return array();
		}
	}

	public function getJsonDataOrder()
	{
		$idOrder = $_POST['id_order'];
		$sql = "SELECT * FROM orders p  
				LEFT JOIN produk_order po ON p.id_order = po.id_order 
				LEFT JOIN pelanggan pl ON p.id_pelanggan = pl.id_pelanggan
				LEFT JOIN produk pr ON pr.id_produk = po.id_produk
				WHERE p.id_pelanggan=".$_SESSION['id_pelanggan']." AND p.id_order=".$idOrder."
				";
		$data = $this->db->get_data($sql);
		if (!empty($data)) {
			echo json_encode($data);
		}else{
			echo json_encode(array());
		}
	}

	public function getProvinsi($id='')
	{
		$curl = curl_init();
		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://api.rajaongkir.com/starter/province?id=".$id,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_HTTPHEADER => array(
		    "key: 2b95e941a220332402220122f9bba405"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  return "cURL Error #:" . $err;
		} else {
		  return $response;
		}
	}

	public function getCity($id='')
	{
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://api.rajaongkir.com/starter/city?id=&province=$id",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_HTTPHEADER => array(
		    "key: 2b95e941a220332402220122f9bba405"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
		  echo $response;
		}
	}

	public function getCost()
	{
		if (isset($_POST['cekbiaya'])) {
		$origin = $_POST['origin'];
		$destination = $_POST['destination'];
		$weight = $_POST['weight'];
		$courier = $_POST['courier'];

		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://api.rajaongkir.com/starter/cost",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => "origin=".$origin."&destination=".$destination."&weight=".$weight."&courier=".$courier."",
		  CURLOPT_HTTPHEADER => array(
		    "content-type: application/x-www-form-urlencoded",
		    "key: 2b95e941a220332402220122f9bba405"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
		  echo $response;
		}
		}else{
			echo "error";
		}
		
	}

}