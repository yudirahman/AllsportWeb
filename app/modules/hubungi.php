<?php 
/**
* Hubungi
*/
class Hubungi extends Base
{
	public function index()
	{
		$data['title_page'] = 'Hubungi Kami';
		$data['session'] = isset($_SESSION['username']);
		$data['masterkategori'] = $this->masterKategoriProduk();
		$data['items'] = $this->itemcart();
		$data['masterproduk'] = $this->masterProduk();
		$this->render->view('web/hubungi/index.hubungi',$data);
	}
}
?>