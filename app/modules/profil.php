<?php 
/**
* Profil dan Kebijakan
*/
class Profil extends Base
{
	public function index()
	{
		$data['title_page'] = 'Profil Toko';
		$data['dataprofil'] = $this->mdataprofil();
		$data['session'] = isset($_SESSION['username']);
		$data['masterkategori'] = $this->masterKategoriProduk();
		$data['items'] = $this->itemcart();
			$data['masterproduk'] = $this->masterProduk();
		$this->render->view('web/profil/index.profil',$data);				
	}

	/*
	* Kebijakan dan privasi
	*/
	public function kebijakan()
	{
		$data['title_page'] = 'Bantuan';
		$data['dataprofil'] = $this->mdataprofil();
		$data['session'] = isset($_SESSION['username']);
		$data['masterkategori'] = $this->masterKategoriProduk();
		$data['items'] = $this->itemcart();
			$data['masterproduk'] = $this->masterProduk();
		$this->render->view('web/profil/index.kebijakan',$data);			
	}	

	/*
	* Ambil data
	*/
	public function mdataprofil()
	{
		$sql = "SELECT * FROM profil WHERE aktif='Y' LIMIT 1";
		return $this->db->get_data($sql);

	}
}
