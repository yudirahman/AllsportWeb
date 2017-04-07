<?php 
/**
* Search
*/
class Search extends Base
{
	public function index()
	{
		if(isset($_POST['k'])){
			$k = $_POST['k'];
			$q = $_POST['q'];

			if (!empty($this->searchResult($k,$q))) {
				$data['is_search'] = $this->searchResult($k,$q) ;
			}
			header('location:'.SITEURL.'search/index/'.$k.'/'.$q);	
		}

		$data['title_page'] = 'Pencarian';
		$data['masterkategori'] = $this->masterKategoriProduk();	
		$data['session'] = isset($_SESSION['username']);
		$data['items'] = $this->itemcart();
		$data['masterproduk'] = $this->masterProduk();
		$this->render->view('web/produk/pencarian',$data);
	}

	public function searchResult($k,$q)
	{
			$sql = "SELECT p.*, kp.nama_kategori  
				FROM produk p left join kategori_produk kp ON 
				(p.id_kategori_produk = kp.id_kategori_produk)
				WHERE kp.id_kategori_produk LIKE '%".htmlspecialchars($k)."%' AND p.nama_produk
				LIKE '%".htmlspecialchars($q)."%'";
		
		// die($sql);		
		$data = $this->db->get_data($sql);
		return $data;
	}
}