<?php 
/**
* Customer
*/
class Profil extends Base
{	
	function __construct()
	{
		parent::__construct();
	}

	public function profil()
	{
		// echo 'profil';
		/*assign variable*/
		$data['namatoko'] = $this->siteinfo('nama');
		$data['tahuntoko'] = $this->siteinfo('tahun');
		$data['title_page'] = 'Administrator';
		$data['halaman'] = (!empty($_GET['act'])) ? ucfirst($_GET['act']) : '';
		extract($data);
		include ROOT_VIEW.'admin/profil/index.profil.php';
	}

	public function infokebijakan()
	{
		/*assign variable*/
		$data['namatoko'] = $this->siteinfo('nama');
		$data['tahuntoko'] = $this->siteinfo('tahun');
		$data['title_page'] = 'Administrator';
		$data['halaman'] = 'Informasi & Kebijakan';
		extract($data);
		include ROOT_VIEW.'admin/profil/index.kebijakan.php';
	}

}