<?php 
include ROOT_LIBS.'paginator.class.php';

/**
* Home
*/
class Produk extends Base
{

	public function index()
	{
	
		/*assign variable*/
			$data['title_page'] = 'All Produk';
			$data['masterkategori'] = $this->masterKategoriProduk();
			$data['masterproduk'] = $this->masterProduk();
			$data['session'] = isset($_SESSION['username']);
			$num_rows = count($this->masterProduk());
			$pages = new Paginator($num_rows,9);
			$data['pages'] = $pages->display_pages();
			$data['results'] = $this->masterProdukLimit($pages->limit_start,$pages->limit_end);
			$data['pageinfo'] = "Halaman : $pages->current_page dari $pages->num_pages";
			$data['items'] = $this->itemcart();
		   	$this->render->view('web/produk/index.produk',$data);
	
		
	}

	public function kategori()
	{
		if (isset($_GET['act'])) {

			if ($_GET['act'] === 'diskon') {
				//diskon
				$data['namakategori'] = 'Produk Diskon';
				$data['title_page'] = 'Produk Berdasarkan Kategori';
				$data['masterkategori'] = $this->masterKategoriProduk();
				$data['masterprodukbykategory'] = $this->masterProdukDiskonAll();
				$data['items'] = $this->itemcart();
				$data['masterproduk'] = $this->masterProduk();
				$data['session'] = isset($_SESSION['username']);
			   	$this->render->view('web/produk/bykategori',$data);


			} else {
				foreach ($this->masterprodukbykategory($_GET['act']) as $row) {
					$data['namakategori'] = $row['nama_kategori'];
				}
				/*assign variable*/
				
				$data['title_page'] = 'Produk Berdasarkan Kategori';
				$data['masterkategori'] = $this->masterKategoriProduk();
				$data['masterprodukbykategory'] = $this->masterprodukbykategory($_GET['act']);
				$data['items'] = $this->itemcart();
				$data['masterproduk'] = $this->masterProduk();
				$data['session'] = isset($_SESSION['username']);
			   	$this->render->view('web/produk/bykategori',$data);	
			}
			
		} else {
			header("location:".SITEURL."produk");
		}
	}

	public function detail()
	{
		if (isset($_GET['act'])) {
			/*assign variable*/
			$data['title_page'] = 'Produk Detail';
			$data['masterkategori'] = $this->masterKategoriProduk();
			$data['masterprodukbyid'] = $this->masterprodukbyid($_GET['act']);
			$data['session'] = isset($_SESSION['username']);
			$data['masterproduk'] = $this->masterProduk();
			$data['items'] = $this->itemcart();
			foreach ($this->masterprodukbyid($_GET['act']) as $val) {
				$data['serupa'] = $this->produkserupa($val['nama_produk'],$val['id_produk']);
			}
			
		   	$this->render->view('web/produk/detail',$data);

		}else{
			header("location:".SITEURL."produk");
		}
	}

	public function cari()
	{
		if(isset($_POST['k'])){
			$k = $_POST['k'];
			$q = $_POST['q'];

			header('location:'.SITEURL.'produk/cari/'.$k.'/'.$q);	
		}
		if (empty($_GET['params'])) {
			$_GET['params'] ='';
		}
		
		$data['title_page'] = 'Cari Produk';
		$data['katacari'] = $_GET['params'];
		$data['masterkategori'] = $this->masterKategoriProduk();
		$data['masterproduk'] = $this->masterProduk();
		$data['is_search'] = $this->searchResult($_GET['act'],$_GET['params']) ;
		$data['items'] = $this->itemcart();
		$data['session'] = isset($_SESSION['username']);
		$this->render->view('web/produk/pencarian',$data);
	}

	public function masterprodukbykategory($id_kategori)
	{
		$sql = "SELECT p.*, kp.* FROM produk p 
				LEFT JOIN kategori_produk kp 
				ON (p.id_kategori_produk = kp.id_kategori_produk) 
				where p.id_kategori_produk = ".$id_kategori." ORDER BY p.id_produk DESC ";

		$data = $this->db->get_data($sql);

		if (sizeof($data) > 0) {
			return $data;
		} else{
			return array();
		}
	}

	public function masterprodukbyid($id)
	{
		$sql = "SELECT p.*, kp.* FROM produk p 
				LEFT JOIN kategori_produk kp 
				ON (p.id_kategori_produk = kp.id_kategori_produk) 
				where p.id_produk = ".$id." ";

		$data = $this->db->get_data($sql);

		if (sizeof($data) > 0) {
			return $data;
		} else{
			return array();
		}
	}



	public function masterProdukLimit($start, $end)
	{
		$sql = "SELECT p.*, kp.* FROM produk p 
				LEFT JOIN kategori_produk kp 
				ON (p.id_kategori_produk = kp.id_kategori_produk) 
				ORDER BY p.nama_produk ASC LIMIT ".$start.", ".$end."
				";

		$data = $this->db->get_data($sql);

		if (sizeof($data) > 0) {
			return $data;
		} else{
			return array();
		}
	}

	public function produkserupa($nama,$id)
	{
		$sql = "SELECT p.*, kp.* FROM produk p 
				LEFT JOIN kategori_produk kp 
				ON (p.id_kategori_produk = kp.id_kategori_produk) 
				where p.nama_produk LIKE '%".$this->fWord($nama)."%' 
				AND p.id_produk <> ".$id."
				ORDER BY p.nama_produk ASC";

		$data = $this->db->get_data($sql);

		if (sizeof($data) > 0) {
			return $data;
		} else{
			return array();
		}
	}

	public function searchResult($k,$q)
	{
		if (!empty($q)) {
			$sql = "SELECT p.*, kp.nama_kategori  
				FROM produk p left join kategori_produk kp ON 
				(p.id_kategori_produk = kp.id_kategori_produk)
				WHERE kp.id_kategori_produk LIKE '%".htmlspecialchars($k)."%' AND p.nama_produk
				LIKE '%".htmlspecialchars($q)."%'";
		} else {
			$sql = "SELECT p.*, kp.nama_kategori  
				FROM produk p left join kategori_produk kp ON 
				(p.id_kategori_produk = kp.id_kategori_produk)
				WHERE kp.id_kategori_produk LIKE '%".htmlspecialchars($k)."%' ";
		}
				
		// die($sql);		
		$data = $this->db->get_data($sql);
		return $data;
	}

	public function fWord($string)
	{
		$arr = explode(' ',trim($string));
		return $arr[0]; 
	}

}