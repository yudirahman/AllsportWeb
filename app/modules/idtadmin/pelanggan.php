<?php 
/**
* 
*/
class Pelanggan extends Base
{
	
	public function index()
	{
		$this->is_session();

		/*assign variable*/
		$data = [
					'namatoko' 		=> $this->siteinfo('nama'),
					'title_page'	=> 'Dashboard Administrator',
					'username'		=> $_SESSION['username_user'],
					'avatar'		=> $_SESSION['avatar'],
					'tahuntoko'		=> $this->siteinfo('tahun')
				];
		$this->render->view_admin('admin/pelanggan/index',$data);
	}

	public function add()
	{
		
	}
}
?>