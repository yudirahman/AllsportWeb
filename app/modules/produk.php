<?php
/**
* Produk Module
*/
class Produk extends Base
{
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		echo 'produk';
	}

	public function kategori()
	{
		// echo 'profil';
		/*assign variable*/
		$data['namatoko'] = $this->siteinfo('nama');
		$data['tahuntoko'] = $this->siteinfo('tahun');
		$data['title_page'] = 'Administrator';
		$data['halaman'] = 'Kategori Produk';
		extract($data);
		include ROOT_VIEW.'admin/produk/index.kategori.php';
	}
}