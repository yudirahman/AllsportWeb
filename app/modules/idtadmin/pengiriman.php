<?php 
/**
* Pengiriman
*/
class Pengiriman extends Base
{
	
	public function index()
	{
		$this->is_session();
		if ($this->is_connected() == true){
			$data = [	
						'halaman' 		=> 'Pengiriman',
						'provinsi' 		=> json_decode($this->getProvinsi()),
						'defaultPengirim'=> $this->dataDefaultPengirim(),
						'namatoko' 		=> $this->siteinfo('nama'),
						'title_page'	=> 'Dashboard Administrator',
						'username'		=> $_SESSION['username_user'],
						'avatar'		=> $_SESSION['avatar'],
						'tahuntoko'		=> $this->siteinfo('tahun')
					];
			$this->render->view_admin('admin/pengiriman/index.biaya',$data);

		}else{
			echo json_encode(array('status'=>0, 'pesan' =>'Halaman ini butuh koneksi internet, pastikan anda terhubung internet.'));
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

	public function dataDefaultPengirim()
	{
		$tahun = date('Y');
		$sql = "SELECT idprovinsi,nama_provinsi,idkota,namakota FROM profil where aktif='Y' AND tahun=".$tahun."";
		return $this->db->get_data($sql);
	}

	public function addPengirim()
	{
		if (isset($_POST['submit'])) {
			$idProv = $_POST['idprov'];
			$namaProv = $_POST['namaprov'];
			$idKota = $_POST['idkota'];
			$namaKota = $_POST['namakota'];

			$sql = "UPDATE profil SET idprovinsi=".$idProv.",
									  nama_provinsi='".$namaProv."',
									  idkota=".$idKota.",
									  namakota ='".$namaKota."'
					WHERE id_profil=2";
			$query= $this->db->set_data($sql);
			if ($query) {
				echo json_encode('ok');
			}else{
				echo json_encode('error');
			}

		}else{
				echo json_encode('error');
		}
	}

	public function is_connected()
	{
	    $connected = @fsockopen("www.google.com", 443); 
	    //website, port  (try 80 or 443)
	    if ($connected){
	        $is_conn = true; //action when connected
	        fclose($connected);
	    }else{
	        $is_conn = false; //action in connection failure
	    }
	    return $is_conn;

	}

}
?>