<?php 
include 'profil.php';
include 'produk.php';
/**
* Adminmode
*/
class Adminmode extends Base
{
	private $profil;

	function __construct()
	{
		parent::__construct();
		$this->profil = new profil();
		$this->produk = new produk();
	}

	/*
	* Home atawa dashboard
	*/
	public function index()
	{
		/*Cek udah login apa belum*/
		$this->is_session();

		/*assign variable*/
		$data['namatoko'] = $this->siteinfo('nama');
		$data['tahuntoko'] = $this->siteinfo('tahun');
		$data['title_page'] = 'Administrator';
		extract($data);
		include ROOT_VIEW.'admin/home/index.php';
	}

	/*
	* Kategori produk
	*/
	public function kategoriproduk()
	{
		$this->produk->kategori();
	}

	/*
	* Profil 
	*/
	public function profil()
	{
		$this->profil->profil();
	}

	/*
	* informasi & kebijakan
	*/
	public function infokebijakan()
	{
		$this->profil->infokebijakan();
	}

	/*
	* Login
	*/
	public function login()
	{
		if (isset($_POST['username'])) {
			/*Cek data login*/
			$username = $_POST['username'];
			$password = md5($_POST['password']);

			if ($this->cek_login($username,$password) == true) {
				header('location:?url=adminmode');
			} else {
				$_SESSION['errmsg'] = "<h4 class=\"text-danger\"></i>Gagal Login !</h4>";
				header('location:?url=adminmode&act=login');
			}
			
		} else {
			/*assign variable*/
			$data['title_page'] = 'Login | Administrator';
			extract($data);
			include ROOT_VIEW.'admin/login/index.php';	
		}		
	}

	/*
	* Logout
	*/
	public function logout()
	{
		session_destroy();
		header('location:?url=adminmode&act=login');
	}

	/*
	* Cek Login
	*/
	public function cek_login($username,$password)
	{
		$sql="SELECT * FROM users WHERE username ='".$username."' AND password ='".$password."'";
		$data = $this->db->get_data($sql);
		if (sizeof($data) > 0) {
			foreach ($data as $row) {
				$_SESSION['id_user'] = $row['id_user'];
				$_SESSION['nama_user'] = $row['nama'];
				$_SESSION['username_user'] = $row['username'];
			}
			return true;
		}else{
			return false;
		}
	}

	public function cek_session()
	{
		session_destroy();
		echo '<pre>';			
		var_dump($_SESSION);
		echo '</pre>';
	}
}