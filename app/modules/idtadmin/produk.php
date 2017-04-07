<?php
include ROOT_LIBS.'autoimage.php';

/**
 * Class Produk
 */
class Produk extends Base
{
	/**
	 * Produk constructor.
	 */
	function __construct()
	{
		parent::__construct();
		$this->is_session();
	}

	/**
	 * @throws Exception
	 */
	public function index()
	{
		if (isset($_POST['submit'])) {
			if($_POST['submit']=='add'){
				$kd_produk = $_POST['kd_produk'];
				$nama_produk = trim(htmlspecialchars($_POST['nama_produk'],ENT_QUOTES));
				$idkategori = $_POST['kategori'];
				$id_brand = $_POST['brand'];
				$keterangan = trim($_POST['keterangan']);
				$harga = $_POST['harga'];
				$diskon = $_POST['diskon'];
				$harga_diskon = $_POST['harga_diskon'];
				$berat = $_POST['berat'];
				$stok = $_POST['stok'];
				$image_name = $_FILES['image']['name'];
				$image_tmp = $_FILES['image']['tmp_name'];
				$image_size = $_FILES['image']['size'];
				$image_type = $_FILES['image']['type'];
				$namerandom = mt_rand().str_replace(" ", "_", $image_name);
				$target_path = ROOT_FILES.'image/produk/'.$namerandom;
				$target_path_thumb = ROOT_FILES.'image/produk/thumb/'.$namerandom;
				$moveResult = move_uploaded_file($image_tmp, $target_path);
				
				if ($moveResult){
					$resimg = new abeautifulsite\SimpleImage();
					$resimg->load($target_path);
					$resimg->best_fit(100,100);
					$resimg->save($target_path_thumb);

					if ($this->addProduk($idkategori,$id_brand,$kd_produk,$nama_produk,$harga,$berat,$namerandom,$keterangan,$stok,$diskon,$harga_diskon) == true) {
					$_SESSION['errmsg'] = "<div class=\"alert alert-info\"> <a href=\"javascript:void()\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\" id=\"unset_errmsg\">&times;</a><strong>Success!</strong> Data Berhasil di Simpan.</div>";

					header('location:'.SITEURL.URL_ADMIN.'/produk/allproduk');

					}else{
						$_SESSION['errmsg'] = "<div class=\"alert alert-warning\"> <a href=\"javascript:void()\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\" id=\"unset_errmsg\">&times;</a><strong>Warning!</strong> Data Gagal di Simpan.</div>";
						unlink($target_path);
						unlink($target_path_thumb);						
						header('location:'.SITEURL.URL_ADMIN.'/produk/allproduk');
					}
				}else{
					$_SESSION['errmsg'] = "<div class=\"alert alert-warning\"> <a href=\"javascript:void()\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\" id=\"unset_errmsg\">&times;</a><strong>Warning!</strong> Data Gagal di Simpan.</div>";
					header('location:'.SITEURL.URL_ADMIN.'/produk/allproduk');
				}
			}else if ($_POST['submit']=='edit'){
				
				$nama_produk = trim(htmlspecialchars($_POST['nama_produk'],ENT_QUOTES));
				$idkategori = $_POST['kategori'];
				$keterangan = trim($_POST['keterangan']);
				$harga = $_POST['harga'];
				$stok = $_POST['stok'];
				$id_brand = $_POST['brand'];
				$diskon = $_POST['diskon'];
				$harga_diskon = $_POST['harga_diskon'];
				$berat_produk = $_POST['berat'];
				$oldimage = $_POST['oldimage'];
				$image_name = $_FILES['image']['name'];
				$image_tmp = $_FILES['image']['tmp_name'];
				$image_size = $_FILES['image']['size'];
				$image_type = $_FILES['image']['type'];
				$namerandom = mt_rand().str_replace(" ", "_", $image_name);
				$target_path = ROOT_FILES.'image/produk/'.$namerandom;
				$target_path_thumb = ROOT_FILES.'image/produk/thumb/'.$namerandom;
				$moveResult = move_uploaded_file($image_tmp, $target_path);				
				$id =$_POST['id'];
				if (!empty($image_tmp)) {
					if ($moveResult) {
						$resimg = new abeautifulsite\SimpleImage();
						$resimg->load($target_path);
						$resimg->best_fit(100,100);
						$resimg->save($target_path_thumb);
						if ($this->editProduk($id,$nama_produk,$harga,$idkategori,$namerandom,$keterangan,$stok,$id_brand,$diskon,$harga_diskon,$berat_produk) == true) {
						$_SESSION['errmsg'] = "<div class=\"alert alert-info\"> <a href=\"javascript:void()\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\" id=\"unset_errmsg\">&times;</a><strong>Success!</strong> Data Berhasil di Simpan.</div>";
						
						unlink(ROOT_FILES.'image/produk/'.$oldimage);
						unlink(ROOT_FILES.'image/produk/thumb/'.$oldimage);
						
						
						header('location:'.SITEURL.URL_ADMIN.'/produk/allproduk');

						}else{
							$_SESSION['errmsg'] = "<div class=\"alert alert-danger\"> <a href=\"javascript:void()\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\" id=\"unset_errmsg\">&times;</a><strong>Success!</strong> Gagal Simpan Data.</div>";
							unlink($target_path);
							unlink($target_path_thumb);		
							header('location:'.SITEURL.URL_ADMIN.'/produk/allproduk');
						}						
					}else{
						$_SESSION['errmsg'] = "<div class=\"alert alert-danger\"> <a href=\"javascript:void()\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\" id=\"unset_errmsg\">&times;</a><strong>Success!</strong> Gagal Simpan Data.</div>";
						header('location:'.SITEURL.URL_ADMIN.'/produk/allproduk');
					}	
				}else{
					if ($this->editProduk($id,$nama_produk,$harga,$idkategori,$image_tmp,$keterangan,$stok,$id_brand,$diskon,$harga_diskon,$berat_produk) == true) {
						$_SESSION['errmsg'] = "<div class=\"alert alert-info\"> <a href=\"javascript:void()\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\" id=\"unset_errmsg\">&times;</a><strong>Success!</strong> Data Berhasil di Simpan.</div>";

						header('location:'.SITEURL.URL_ADMIN.'/produk/allproduk');

					}else{
						$_SESSION['errmsg'] = "<div class=\"alert alert-danger\"> <a href=\"javascript:void()\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\" id=\"unset_errmsg\">&times;</a><strong>Success!</strong> Gagal Simpan Data.</div>";

						header('location:'.SITEURL.URL_ADMIN.'/produk/allproduk');
					}
				}
			}else if ($_POST['submit']=='delete'){
					$id = $_POST['id'];
					$oldimage = $_POST['oldimage'];
					if ($this->deleteProduk($id)) {
						$_SESSION['errmsg'] = "<div class=\"alert alert-info\"> <a href=\"javascript:void()\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\" id=\"unset_errmsg\">&times;</a><strong>Success!</strong> Data Berhasil di Hapus.</div>";
						header('location:'.SITEURL.URL_ADMIN.'/produk/allproduk');		
						unlink(ROOT_FILES.'image/produk/'.$oldimage);
						unlink(ROOT_FILES.'image/produk/thumb/'.$oldimage);				
					}else{
						$_SESSION['errmsg'] = "<div class=\"alert alert-danger\"> <a href=\"javascript:void()\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\" id=\"unset_errmsg\">&times;</a><strong>Warning!</strong> Data Gagal di Hapus.</div>";
						header('location:'.SITEURL.URL_ADMIN.'/produk/allproduk');
					}
			}
		}else{
			/*assign variable*/
			$data = [	
						'halaman' 		=> 'Produk',
						'produk'		=> $this->dataProduk(),
						'last_idproduk'	=> $this->lastIdProduk(),
						'kategori'		=> $this->dataKategori(),
						'brand'			=> $this->dataBrand(),
						'namatoko' 		=> $this->siteinfo('nama'),
						'title_page'	=> 'Dashboard Administrator',
						'username'		=> $_SESSION['username_user'],
						'avatar'		=> $_SESSION['avatar'],
						'tahuntoko'		=> $this->siteinfo('tahun')
					];
			$this->render->view_admin('admin/produk/index.produk',$data);
		}
	}

	/**
	 * throws Exception
	 */
	public function kategori()
	{
		if (isset($_POST['submit'])) {
			if($_POST['submit']=='add'){
				$namakategori = trim(htmlspecialchars($_POST['nama_kategori'],ENT_QUOTES));
				$keterangan = trim($_POST['keterangan']);
				if ($this->addKategori($namakategori,$keterangan) == true) {
					$_SESSION['errmsg'] = "<div class=\"alert alert-info\"> <a href=\"javascript:void()\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\" id=\"unset_errmsg\">&times;</a><strong>Success!</strong> Data Berhasil di Simpan.</div>";

					header('location:'.SITEURL.URL_ADMIN.'/produk/kategori');

				}else{
					$_SESSION['errmsg'] = "<div class=\"alert alert-danger\">"+
											  "<strong>Warning!</strong> Data Gagal di Simpan."+
											"</div>";

					header('location:'.SITEURL.URL_ADMIN.'/produk/kategori');
				}
			}else if ($_POST['submit']=='edit') {
				$namakategori = trim(htmlspecialchars($_POST['nama_kategori'],ENT_QUOTES));
				$keterangan = trim($_POST['keterangan']);
				$id =$_POST['id'];
				if ($this->editKategori($id,$namakategori,$keterangan) == true) {
					$_SESSION['errmsg'] = "<div class=\"alert alert-info\"> <a href=\"javascript:void()\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\" id=\"unset_errmsg\">&times;</a><strong>Success!</strong> Data Berhasil di Simpan.</div>";

					header('location:'.SITEURL.URL_ADMIN.'/produk/kategori');

				}else{
					$_SESSION['errmsg'] = "<div class=\"alert alert-danger\"> <a href=\"javascript:void()\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\" id=\"unset_errmsg\">&times;</a><strong>Success!</strong> Gagal Simpan Data.</div>";

					header('location:'.SITEURL.URL_ADMIN.'/produk/kategori');
				}
			}else if ($_POST['submit']=='delete'){
					$id = $_POST['id'];
					if ($this->deleteKategori($id)) {
						$_SESSION['errmsg'] = "<div class=\"alert alert-info\"> <a href=\"javascript:void()\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\" id=\"unset_errmsg\">&times;</a><strong>Success!</strong> Data Berhasil di Hapus.</div>";
						header('location:'.SITEURL.URL_ADMIN.'/produk/kategori');						
					}else{
						$_SESSION['errmsg'] = "<div class=\"alert alert-danger\"> <a href=\"javascript:void()\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\" id=\"unset_errmsg\">&times;</a><strong>Success!</strong> Data Gagal di Hapus.</div>";
						header('location:'.SITEURL.URL_ADMIN.'/produk/kategori');
					}
			}
		}else{
			/*assign variable*/
			$data = [	
						'halaman' 		=> 'Kategori Produk',
						'kategori'		=> $this->dataKategori(),
						'namatoko' 		=> $this->siteinfo('nama'),
						'title_page'	=> 'Dashboard Administrator',
						'username'		=> $_SESSION['username_user'],
						'avatar'		=> $_SESSION['avatar'],
						'tahuntoko'		=> $this->siteinfo('tahun')
					];
			$this->render->view_admin('admin/produk/index.kategori',$data);
		}
	}

	public function brand()
	{
		if (isset($_POST['submit'])) {
			if($_POST['submit']=='add'){
				$namakategori = trim(htmlspecialchars($_POST['nama_brand'],ENT_QUOTES));
				$image_name = $_FILES['image']['name'];
				$image_tmp = $_FILES['image']['tmp_name'];
				$image_size = $_FILES['image']['size'];
				$image_type = $_FILES['image']['type'];
				$namerandom = mt_rand().str_replace(" ", "_", $image_name);
				$target_path = ROOT_FILES.'image/brand/'.$namerandom;
				$target_path_thumb = ROOT_FILES.'image/brand/thumb/'.$namerandom;
				$moveResult = move_uploaded_file($image_tmp, $target_path);
				if ($moveResult) {
					$resimg = new abeautifulsite\SimpleImage();
					$resimg->load($target_path);
					$resimg->best_fit(100,100);
					$resimg->save($target_path_thumb);
					if ($this->addBrand($namakategori,$namerandom) == true) {
						$_SESSION['errmsg'] = "<div class=\"alert alert-info\"> <a href=\"javascript:void()\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\" id=\"unset_errmsg\">&times;</a><strong>Success!</strong> Data Berhasil di Simpan.</div>";

						header('location:'.SITEURL.URL_ADMIN.'/produk/brand');

					}else{
						$_SESSION['errmsg'] = "<div class=\"alert alert-danger\">"+
												  "<strong>Warning!</strong> Data Gagal di Simpan."+
												"</div>";
						unlink($target_path);
						unlink($target_path_thumb);							
						header('location:'.SITEURL.URL_ADMIN.'/produk/brand');
					}
				}else{
					$_SESSION['errmsg'] = "<div class=\"alert alert-danger\">"+
												  "<strong>Warning!</strong> Data Gagal di Simpan."+
												"</div>";

						header('location:'.SITEURL.URL_ADMIN.'/produk/brand');
				}
					
			}else if ($_POST['submit']=='edit') {
				$nama_brand = trim(htmlspecialchars($_POST['nama_brand'],ENT_QUOTES));
				$image_name = $_FILES['image']['name'];
				$image_tmp = $_FILES['image']['tmp_name'];
				$image_size = $_FILES['image']['size'];
				$image_type = $_FILES['image']['type'];
				$namerandom = mt_rand().str_replace(" ", "_", $image_name);
				$target_path = ROOT_FILES.'image/brand/'.$namerandom;
				$target_path_thumb = ROOT_FILES.'image/brand/thumb/'.$namerandom;
				$moveResult = move_uploaded_file($image_tmp, $target_path);
				// $keterangan = trim($_POST['keterangan']);
				$oldimage = $_POST['oldimage'];
				$id =$_POST['id'];
				if (!empty($image_tmp)) {
					if ($moveResult) {
						$resimg = new abeautifulsite\SimpleImage();
						$resimg->load($target_path);
						$resimg->best_fit(100,100);
						$resimg->save($target_path_thumb);
						if ($this->editBrand($id,$nama_brand,$namerandom) == true) {
						$_SESSION['errmsg'] = "<div class=\"alert alert-info\"> <a href=\"javascript:void()\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\" id=\"unset_errmsg\">&times;</a><strong>Success!</strong> Data Berhasil di Simpan.</div>";
						
						if (file_exists(ROOT_FILES.'image/brand/'.$oldimage)) {
							unlink(ROOT_FILES.'image/brand/'.$oldimage);
							unlink(ROOT_FILES.'image/brand/thumb/'.$oldimage);							
						}
						
						header('location:'.SITEURL.URL_ADMIN.'/produk/brand');

						}else{
							$_SESSION['errmsg'] = "<div class=\"alert alert-danger\"> <a href=\"javascript:void()\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\" id=\"unset_errmsg\">&times;</a><strong>Success!</strong> Gagal Simpan Data.</div>";
							unlink($target_path);
							unlink($target_path_thumb);		
							header('location:'.SITEURL.URL_ADMIN.'/produk/brand');
						}						
					}else{
						$_SESSION['errmsg'] = "<div class=\"alert alert-danger\"> <a href=\"javascript:void()\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\" id=\"unset_errmsg\">&times;</a><strong>Success!</strong> Gagal Simpan Data.</div>";
						header('location:'.SITEURL.URL_ADMIN.'/produk/brand');
					}
				} else {
						$namerandom = '';
						if ($this->editBrand($id,$nama_brand,$namerandom) == true) {
							$_SESSION['errmsg'] = "<div class=\"alert alert-info\"> <a href=\"javascript:void()\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\" id=\"unset_errmsg\">&times;</a><strong>Success!</strong> Data Berhasil di Simpan.</div>";

							header('location:'.SITEURL.URL_ADMIN.'/produk/brand');

						}else{
							$_SESSION['errmsg'] = "<div class=\"alert alert-danger\"> <a href=\"javascript:void()\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\" id=\"unset_errmsg\">&times;</a><strong>Error!</strong> Gagal Simpan Data.</div>";

							header('location:'.SITEURL.URL_ADMIN.'/produk/brand');
						}					
				}
				

			}else if ($_POST['submit']=='delete'){
					$id = $_POST['id'];
					$oldimage = $_POST['oldimage'];
					if ($this->deleteBrand($id)) {
						$_SESSION['errmsg'] = "<div class=\"alert alert-info\"> <a href=\"javascript:void()\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\" id=\"unset_errmsg\">&times;</a><strong>Success!</strong> Data Berhasil di Hapus.</div>";
						unlink(ROOT_FILES.'image/brand/'.$oldimage);
						unlink(ROOT_FILES.'image/brand/thumb/'.$oldimage);		
						header('location:'.SITEURL.URL_ADMIN.'/produk/brand');						
					}else{
						$_SESSION['errmsg'] = "<div class=\"alert alert-danger\"> <a href=\"javascript:void()\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\" id=\"unset_errmsg\">&times;</a><strong>Warning!</strong> Data Gagal di Hapus.</div>";
						header('location:'.SITEURL.URL_ADMIN.'/produk/brand');
					}
			}
		}else{
			/*assign variable*/
			$data = [	
						'halaman' 		=> 'Brand Produk',
						'brand'			=> $this->dataBrand(),
						'namatoko' 		=> $this->siteinfo('nama'),
						'title_page'	=> 'Dashboard Administrator',
						'username'		=> $_SESSION['username_user'],
						'avatar'		=> $_SESSION['avatar'],
						'tahuntoko'		=> $this->siteinfo('tahun')
					];
			$this->render->view_admin('admin/produk/index.brand',$data);
		}
	}

	/**
	 * @return array
	 */
	public function dataProduk()
	{
		$sql = "SELECT 	p.id_produk,
						p.nama_produk,
						p.kd_produk,
						p.image,
						p.id_kategori_produk,
						p.keterangan,
						p.stok,
						p.harga_produk,
						p.diskon,
						p.harga_diskon,
						kp.id_kategori_produk,
						kp.nama_kategori,
						bp.id_brand,
						bp.nama_brand 
				FROM produk p LEFT JOIN kategori_produk kp ON
				(p.id_kategori_produk = kp.id_kategori_produk)
				LEFT JOIN brand_produk bp ON 
				(p.id_brand = bp.id_brand)
				ORDER BY kp.nama_kategori DESC ";

		// $sql2 = "SELECT * FROM produk";
		$data = $this->db->get_data($sql);
		//echo '<pre>';
		//print_r($data);
		// die($sql);

		if (!empty($data)) {
			return $data;
		}else{
			return array();
		}	
	}

	public function lastIdProduk()
	{
		$sql = "SELECT id_produk FROM produk ORDER BY id_produk DESC limit 1";
		$data = $this->db->get_data($sql);
		if (empty($data)) {
			return sprintf("%05d",1); 		
		}else{
			foreach ($data as $row) {
				return sprintf("%05d",$row['id_produk']+1);
			}
		}

	}

	/**
	 * @param $where
	 */
	public function dataProdukWhere($where)
	{
		$sql = "SELECT 	p.id_produk,
						p.nama_produk,
						p.kd_produk,
						p.id_brand,
						p.image,
						p.keterangan,
						p.id_kategori_produk AS 'idkategori',
						p.stok,
						p.berat_produk, 
						p.diskon,
						p.harga_diskon,
						p.harga_produk
				FROM produk p LEFT JOIN kategori_produk kp ON
				(p.id_kategori_produk = kp.id_kategori_produk)
				WHERE p.id_produk =".$where." ";

		if (!empty($this->db->get_data($sql))) {
			$data =[];
			foreach ($this->db->get_data($sql) as $row) {
				$data['id']=$row['id_produk'];
				$data['nama_produk']=html_entity_decode($row['nama_produk'],ENT_QUOTES);
				$data['kd_produk'] = $row['kd_produk'];
				$data['image']=html_entity_decode($row['image'],ENT_QUOTES);
				$data['keterangan']=$row['keterangan'];
				$data['id_kategori_produk']=$row['idkategori'];
				$data['id_brand']=$row['id_brand'];
				$data['stok'] = $row['stok'];
				$data['harga'] = $row['harga_produk'];
				$data['diskon'] = $row['diskon'];
				$data['harga_diskon'] = $row['harga_diskon'];
				$data['berat_produk'] = $row['berat_produk'];
			}
			echo json_encode($data);
		}else{
			echo json_encode(array());
		}
	}

	/**
	 * @param $nama_produk
	 * @param $harga
	 * @param $id_kategori_produk
	 * @param $image
	 * @param $keterangan
	 * @param $stok
	 * @return bool
	 */
	public function addProduk($idkategori,$id_brand,$kd_produk,$nama_produk,$harga_produk,$berat,$namerandom,$keterangan,$stok,$diskon,$harga_diskon)
	{
		$sql = "INSERT INTO produk SET 
							id_kategori_produk = ".$idkategori.",
							id_brand = ".$id_brand.",
							kd_produk = '".$kd_produk."',
							nama_produk = '".$nama_produk."',
							harga_produk = ".$harga_produk.",
							berat_produk = ".$berat.",
							image = '".$namerandom."',
							keterangan = '".$keterangan."',
							stok = ".$stok.",
							diskon = ".$diskon.",
							harga_diskon = ".$harga_diskon."
				";
		// die($sql);
		$query = $this->db->set_data($sql);		
		// die($query);
		if ($query) {
			return true;
		}else{
			return false;
		}
	}

	/**
	 * @param $id
	 * @param $nama_produk
	 * @param $harga
	 * @param $id_kategori_produk
	 * @param $image
	 * @param $keterangan
	 * @param $stok
	 * @return bool
	 */
	public function editProduk($id,$nama_produk,$harga,$id_kategori_produk,$image,$keterangan,$stok,$id_brand,$diskon,$harga_diskon,$berat_produk)
	{
		if (!empty($image)) {
			$sql = "UPDATE produk SET 
									nama_produk='".$nama_produk."',
									harga_produk=".$harga.",
									id_kategori_produk = ".$id_kategori_produk.",
									image ='".$image."',
									keterangan ='".$keterangan."',
									stok = ".$stok.",
									id_brand = ".$id_brand.",
									diskon = ".$diskon.",
									harga_diskon = ".$harga_diskon.",
									berat_produk = ".$berat_produk."
					WHERE id_produk = ".$id."";
		}else{
			$sql ="UPDATE produk SET 
									nama_produk='".$nama_produk."',
									harga_produk=".$harga.",
									id_kategori_produk = ".$id_kategori_produk.",
									keterangan ='".$keterangan."',
									stok = ".$stok.",
									id_brand = ".$id_brand.",
									diskon = ".$diskon.",
									harga_diskon = ".$harga_diskon.",
									berat_produk = ".$berat_produk."
					WHERE id_produk = ".$id."";
		}
		// die($sql);
		$query = $this->db->set_data($sql);
		if ($query) {
			return true;
		}else{
			return false;
		}
	}

	/**
	 * @param $id_produk
	 * @return bool
	 */
	public function deleteProduk($id_produk)
	{
		$sql = "DELETE FROM produk WHERE id_produk=".$id_produk." ";
		// die($sql);
		$query = $this->db->set_data($sql);		
		if ($query) {
			return true;
		}else{
			return false;
		}
	}

	/*Data Model Kategori*/
	public function dataKategori()
	{
		$sql = "SELECT * FROM kategori_produk ORDER BY nama_kategori ASC";
		if (!empty($this->db->get_data($sql))) {
			return 	$this->db->get_data($sql);
		}else{
			return array();
		}
		 
	}
	public function dataKategoriJson()
	{
		$sql = "SELECT * FROM kategori_produk ORDER BY nama_kategori ASC";
		if (!empty($this->db->get_data($sql))) {
			echo 	json_encode($this->db->get_data($sql));
		}else{
			echo json_encode(array());
		}
		 
	}
	public function dataKategoriWhere($where)
	{
		$sql = "SELECT * FROM kategori_produk WHERE id_kategori_produk=".$where."";
		if (!empty($this->db->get_data($sql))) {
			foreach ($this->db->get_data($sql) as $row) {
				$data['id']=$row['id_kategori_produk'];
				$data['nama_kategori']=html_entity_decode($row['nama_kategori'],ENT_QUOTES);
				$data['keterangan']=html_entity_decode($row['keterangan'],ENT_QUOTES);
			}
			echo json_encode($data);
		}else{
			echo json_encode(array());
		}
	}
	public function editKategori($id,$nama_kategori,$keterangan)
	{
		$sql = "UPDATE kategori_produk SET nama_kategori ='".$nama_kategori."', keterangan = '".$keterangan."' WHERE id_kategori_produk =".$id." ";
		$query = $this->db->set_data($sql);		
		if ($query) {
			return true;
		}else{
			return false;
		}
	}

	public function addKategori($nama_kategori,$keterangan)
	{
		$sql = "INSERT INTO kategori_produk (nama_kategori,keterangan) VALUES ('".$nama_kategori."','".$keterangan."')";
		$query = $this->db->set_data($sql);		
		if ($query) {
			return true;
		}else{
			return false;
		}
	}

	public function deleteKategori($id)
	{
		$sql = "DELETE FROM kategori_produk WHERE id_kategori_produk =".$id." ";
		$query = $this->db->set_data($sql);		
		if ($query) {
			return true;
		}else{
			return false;
		}
	}

	//brand
	public function dataBrand()
	{
		$sql = "SELECT * FROM brand_produk ORDER BY nama_brand ASC";
		if (!empty($this->db->get_data($sql))) {
			return 	$this->db->get_data($sql);
		}else{
			return array();
		}
		 
	}

	public function addBrand($nama_brand,$image)
	{
		$sql = "INSERT INTO brand_produk (nama_brand,image) VALUES ('".$nama_brand."','".$image."')";
		$query = $this->db->set_data($sql);		
		if ($query) {
			return true;
		}else{
			return false;
		}
	}

	public function dataBrandJson()
	{
		$sql = "SELECT * FROM brand_produk ORDER BY nama_brand ASC";
		if (!empty($this->db->get_data($sql))) {
			echo 	json_encode($this->db->get_data($sql));
		}else{
			echo json_encode(array());
		}
		 
	}
	public function databrandWhere($where)
	{
		$sql = "SELECT * FROM brand_produk WHERE id_brand=".$where."";
		if (!empty($this->db->get_data($sql))) {
			foreach ($this->db->get_data($sql) as $row) {
				$data['id']=$row['id_brand'];
				$data['nama_brand']=html_entity_decode($row['nama_brand'],ENT_QUOTES);
				$data['image'] = $row['image'];
			}
			echo json_encode($data);
		}else{
			echo json_encode(array());
		}
	}
	public function editBrand($id,$nama_brand,$namerandom)
	{
		if (!empty($namerandom)) {
			$sql = "UPDATE brand_produk SET nama_brand ='".$nama_brand."', 
											image = '".$namerandom."'
					 WHERE id_brand =".$id." ";			
		} else {
			$sql = "UPDATE brand_produk SET nama_brand ='".$nama_brand."' 
					 WHERE id_brand =".$id." ";
		}
		
		$query = $this->db->set_data($sql);		
		if ($query) {
			return true;
		}else{
			return false;
		}
	}

	public function deleteBrand($id)
	{
		$sql = "DELETE FROM brand_produk WHERE id_brand =".$id." ";
		$query = $this->db->set_data($sql);		
		if ($query) {
			return true;
		}else{
			return false;
		}
	}
}