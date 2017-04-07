<?php 
/**
* Customer
*/
class Pelanggan extends Base
{
	public function index()
	{
		/*assign variable*/
		$data['title_page'] = 'Home';
		$data['masterkategori'] = $this->masterKategoriProduk();
		$data['produk_futsal'] = $this->produkByKategory(8);
		$data['jersey'] = $this->produkByKategory(9);
		$data['sepatu_bola'] = $this->produkByKategory(1);
		$data['session'] = isset($_SESSION['username']);
		$data['items'] = $this->itemcart();
		$data['masterproduk'] = $this->masterProduk();
		$data['masterdiskon'] = $this->masterProdukDiskon();
		$this->render->view('web/pelanggan/index',$data);
	}

}