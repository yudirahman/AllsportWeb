<?php 
/**
* Home
*/
class Home extends Base
{
	public function index()
	{
		/*assign variable*/
		$data['title_page'] = 'Home';
		$data['produk'] = array('a' => 'asu');
		$data['session'] = isset($_SESSION['username']);
		extract($data);
		include ROOT_VIEW.'home/index.php';
	}

	public function register()
	{
		/*assign variable*/
		$data['title_page'] = 'register';
		$data['produk'] = array('a' => 'asu');
		$data['session'] = isset($_SESSION['username']);
		extract($data);
		include ROOT_VIEW.'home/register.php';
	}

	public function login()
	{
		/*assign variable*/
		$data['title_page'] = 'register';
		$data['produk'] = array('a' => 'asu');
		$data['session'] = isset($_SESSION['username']);
		extract($data);
		include ROOT_VIEW.'home/login.php';
	}

}