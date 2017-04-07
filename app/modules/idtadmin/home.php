<?php 

/**
* Home
*/
class Home extends Base
{
	private $profil;

	function __construct()
	{
		parent::__construct();
	}

	/*
	* Home atawa dashboard
	*/
	public function index()
	{
		/*Cek udah login apa belum*/
		$this->is_session();

		/*assign variable*/
		$data = [
					'namatoko' 		=> $this->siteinfo('nama'),
					'title_page'	=> 'Dashboard Administrator',
					'username'		=> $_SESSION['username_user'],
					'avatar'		=> $_SESSION['avatar'],
					'tahuntoko'		=> $this->siteinfo('tahun')
				];
				
		$this->render->view_admin('admin/home/index',$data);
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
				header('location:'.SITEURL.URL_ADMIN.'/home');
			} else {
				$_SESSION['errmsg'] = "<h4 class=\"text-danger\"></i>Gagal Login !</h4>";
				header('location:'.SITEURL.URL_ADMIN.'/home');
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
		header('location:'.SITEURL.URL_ADMIN.'/home');
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
				$_SESSION['avatar'] = $row['foto'];
			}
			if (isset($_SESSION['errmsg'])) {
				unset($_SESSION['errmsg']);				
			}
			return true;
		}else{
			return false;
		}
	}

	public function killErrmsg()
	{
		unset($_SESSION['errmsg']);
		return true ;
	}

	public function cek_session()
	{
		session_destroy();
		echo '<pre>';			
		var_dump($_SESSION);
		echo '</pre>';
	}
}