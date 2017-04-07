<?php 
include ROOT_LIBS.'autoimage.php';
/**
* Profil
*/
class Profil extends Base
{	
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		/*assign variable*/
		if (isset($_POST['submit'])) {
			$nama = trim(htmlspecialchars($_POST['namatoko'],ENT_QUOTES));
			$telp = trim(htmlspecialchars($_POST['telp'],ENT_QUOTES));
			$slogan = trim(htmlspecialchars($_POST['slogan'],ENT_QUOTES));
			$alamat = htmlspecialchars($_POST['alamat']);
			$profil_lengkap = $_POST['profil'];
			/*foto*/
			$foto_name = $_FILES['foto']['name'];
			$foto_tmp = $_FILES['foto']['tmp_name'];
			$foto_size = $_FILES['foto']['size'];
			$foto_type = $_FILES['foto']['type'];
			$fotonamerandom = mt_rand().str_replace(" ", "_", $foto_name);
			$fototarget_path = ROOT_FILES.'image/profil/'.$fotonamerandom;
			$fototarget_path_thumb = ROOT_FILES.'image/profil/thumb/'.$fotonamerandom;
			$moveResultfoto = move_uploaded_file($foto_tmp, $fototarget_path);
			/*Logo*/
			$logo_name = $_FILES['logo']['name'];
			$logo_tmp = $_FILES['logo']['tmp_name'];
			$logo_size = $_FILES['logo']['size'];
			$logo_type = $_FILES['logo']['type'];
			$logonamerandom = mt_rand().str_replace(" ", "_", $logo_name);
			$logotarget_path = ROOT_FILES.'image/profil/'.$logonamerandom;
			$logotarget_path_thumb = ROOT_FILES.'image/profil/thumb/'.$logonamerandom;
			$moveResultlogo = move_uploaded_file($logo_tmp, $logotarget_path);

			if ((!empty($foto_tmp))&&(!empty($logo_tmp))) {
				if ($moveResultfoto AND $moveResultlogo) {
					$resfoto = new abeautifulsite\SimpleImage();
					$resfoto->load($fototarget_path);
					$resfoto->thumbnail(200, 175, 'top');
					$resfoto->save($fototarget_path_thumb);	
					$resfoto->load($logotarget_path);
					$resfoto->thumbnail(200, 175, 'top');
					$resfoto->save($logotarget_path_thumb);
					if ($this->update_all($nama,$slogan,$alamat,$telp,$profil_lengkap,$fotonamerandom,$logonamerandom)) {
						$_SESSION['errmsg'] = "<div class=\"alert alert-info\"> <a href=\"javascript:void()\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\" id=\"unset_errmsg\">&times;</a><strong>Success!</strong> Data Berhasil di Simpan.</div>";

						header('location:'.SITEURL.URL_ADMIN.'/profil/dataprofil');
					}else{
						$_SESSION['errmsg'] = "<div class=\"alert alert-warning\"> <a href=\"javascript:void()\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\" id=\"unset_errmsg\">&times;</a><strong>Warning!</strong> Data Gagal di Simpan.</div>";
						unlink($fototarget_path);
						unlink($fototarget_path_thumb);	
						unlink($logotarget_path);
						unlink($logotarget_path_thumb);					
						header('location:'.SITEURL.URL_ADMIN.'/profil/dataprofil');
					}
				}else{
					$_SESSION['errmsg'] = "<div class=\"alert alert-warning\"> <a href=\"javascript:void()\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\" id=\"unset_errmsg\">&times;</a><strong>Warning!</strong> Data Gagal di Simpan.</div>";
					header('location:'.SITEURL.URL_ADMIN.'/profil/dataprofil');
				}
			}else if((!empty($foto_tmp))&&(empty($logo_tmp))){
				if ($moveResultfoto) {
					$resfoto = new abeautifulsite\SimpleImage();
					$resfoto->load($fototarget_path);
					$resfoto->thumbnail(200, 175, 'top');
					$resfoto->save($fototarget_path_thumb);	
					if ($this->update_foto($nama,$slogan,$alamat,$telp,$profil_lengkap,$fotonamerandom)) {
						$_SESSION['errmsg'] = "<div class=\"alert alert-info\"> <a href=\"javascript:void()\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\" id=\"unset_errmsg\">&times;</a><strong>Success!</strong> Data Berhasil di Simpan.</div>";

						header('location:'.SITEURL.URL_ADMIN.'/profil/dataprofil');
					}else{
						$_SESSION['errmsg'] = "<div class=\"alert alert-warning\"> <a href=\"javascript:void()\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\" id=\"unset_errmsg\">&times;</a><strong>Warning!</strong> Data Gagal di Simpan.</div>";
						unlink($fototarget_path);
						unlink($fototarget_path_thumb);	
						header('location:'.SITEURL.URL_ADMIN.'/profil/dataprofil');
					}
				}else{
					$_SESSION['errmsg'] = "<div class=\"alert alert-warning\"> <a href=\"javascript:void()\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\" id=\"unset_errmsg\">&times;</a><strong>Warning!</strong> Data Gagal di Simpan.</div>";
					header('location:'.SITEURL.URL_ADMIN.'/profil/dataprofil');
				}
			}else if((empty($foto_tmp))&&(!empty($logo_tmp))){
				if ($moveResultlogo) {
					$resfoto = new abeautifulsite\SimpleImage();
					$resfoto->load($logotarget_path);
					$resfoto->thumbnail(200, 175, 'top');
					$resfoto->save($logotarget_path_thumb);
					if ($this->update_logo($nama,$slogan,$alamat,$telp,$profil_lengkap,$logonamerandom)) {
						$_SESSION['errmsg'] = "<div class=\"alert alert-info\"> <a href=\"javascript:void()\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\" id=\"unset_errmsg\">&times;</a><strong>Success!</strong> Data Berhasil di Simpan.</div>";

						header('location:'.SITEURL.URL_ADMIN.'/profil/dataprofil');
					}else{
						$_SESSION['errmsg'] = "<div class=\"alert alert-warning\"> <a href=\"javascript:void()\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\" id=\"unset_errmsg\">&times;</a><strong>Warning!</strong> Data Gagal di Simpan.</div>";
						unlink($logotarget_path);
						unlink($logotarget_path_thumb);	
						header('location:'.SITEURL.URL_ADMIN.'/profil/dataprofil');
					}
				}else{
					$_SESSION['errmsg'] = "<div class=\"alert alert-warning\"> <a href=\"javascript:void()\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\" id=\"unset_errmsg\">&times;</a><strong>Warning!</strong> Data Gagal di Simpan.</div>";
					header('location:'.SITEURL.URL_ADMIN.'/profil/dataprofil');
				}
			}else{
				if ($this->update_no_image($nama,$slogan,$alamat,$telp,$profil_lengkap)) {
					$_SESSION['errmsg'] = "<div class=\"alert alert-info\"> <a href=\"javascript:void()\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\" id=\"unset_errmsg\">&times;</a><strong>Success!</strong> Data Berhasil di Simpan.</div>";
					header('location:'.SITEURL.URL_ADMIN.'/profil/dataprofil');
				}else{
					$_SESSION['errmsg'] = "<div class=\"alert alert-warning\"> <a href=\"javascript:void()\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\" id=\"unset_errmsg\">&times;</a><strong>Warning!</strong> Data Gagal di Simpan.</div>";
					header('location:'.SITEURL.URL_ADMIN.'/profil/dataprofil');
				}
			}
		}

		$data = [	
					'halaman' 		=> 'Profil',
					'dataprofil'	=> $this->ambildataProfil(),
					'namatoko' 		=> $this->siteinfo('nama'),
					'title_page'	=> 'Dashboard Administrator',
					'username'		=> $_SESSION['username_user'],
					'avatar'		=> $_SESSION['avatar'],
					'tahuntoko'		=> $this->siteinfo('tahun')
				];
		$this->render->view_admin('admin/profil/index.profil',$data);
	}

	public function infokebijakan()
	{
		/*assign variable*/
		if (isset($_POST['submit'])) {
			$kebijakan = $_POST['isikebijakan'];
			if ($this->update_kebijakan($kebijakan)) {
				$_SESSION['errmsg'] = "<div class=\"alert alert-info\"> <a href=\"javascript:void()\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\" id=\"unset_errmsg\">&times;</a><strong>Success!</strong> Data Berhasil di Simpan.</div>";
				header('location:'.SITEURL.URL_ADMIN.'/profil/infokebijakan');
			}else{
				$_SESSION['errmsg'] = "<div class=\"alert alert-warning\"> <a href=\"javascript:void()\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\" id=\"unset_errmsg\">&times;</a><strong>Warning!</strong> Data Gagal di Simpan.</div>";
				header('location:'.SITEURL.URL_ADMIN.'/profil/infokebijakan');
			}
		}
		
		$data = [	
					'halaman' 		=> 'Informasi Bantuan',
					'dataprofil'	=> $this->ambildataProfil(),
					'namatoko' 		=> $this->siteinfo('nama'),
					'title_page'	=> 'Dashboard Administrator',
					'username'		=> $_SESSION['username_user'],
					'avatar'		=> $_SESSION['avatar'],
					'tahuntoko'		=> $this->siteinfo('tahun')
				];
		$this->render->view_admin('admin/profil/index.kebijakan',$data);
	}

	public function ambildataProfil()
	{
		$sql = "SELECT * FROM profil WHERE aktif='Y' LIMIT 1";
		$data = $this->db->get_data($sql);
		return $data;
	}

	public function update_all($nama,$slogan,$alamat,$telp,$profil_lengkap,$foto,$logo)
	{
		$tahun = date('Y');
		$sql = "UPDATE profil SET nama 	 	='".$nama."', 
								  slogan 	='".$slogan."',
								  alamat 	='".$alamat."',
								  telp 	 	='".$telp."',
								  profiltoko ='".$profil_lengkap."',
								  foto 		='".$foto."',
								  logo 		='".$logo."'
				WHERE id_profil=2 AND tahun='".$tahun."' 
				";
		// die($sql);
		return $this->db->set_data($sql);
	}

	public function update_foto($nama,$slogan,$alamat,$telp,$profil_lengkap,$foto)
	{
		$tahun = date('Y');
		$sql = "UPDATE profil SET nama 	 	='".$nama."', 
								  slogan 	='".$slogan."',
								  alamat 	='".$alamat."',
								  telp 	 	='".$telp."',
								  profiltoko ='".$profil_lengkap."',
								  foto 		='".$foto."'
				WHERE id_profil=2 AND tahun='".$tahun."' 
				";
		// die($sql);
		return $this->db->set_data($sql);
	}

	public function update_logo($nama,$slogan,$alamat,$telp,$profil_lengkap,$logo)
	{
		$tahun = date('Y');
		$sql = "UPDATE profil SET nama 	 	='".$nama."', 
								  slogan 	='".$slogan."',
								  alamat 	='".$alamat."',
								  telp 	 	='".$telp."',
								  profiltoko ='".$profil_lengkap."',
								  logo 		='".$logo."'
				WHERE id_profil=2 AND tahun='".$tahun."' 
				";
		// die($sql);
		return $this->db->set_data($sql);
	}

	public function update_no_image($nama,$slogan,$alamat,$telp,$profil_lengkap)
	{
		$tahun = date('Y');
		$sql = "UPDATE profil SET nama 	 	='".$nama."', 
								  slogan 	='".$slogan."',
								  alamat 	='".$alamat."',
								  telp 	 	='".$telp."',
								  profiltoko ='".$profil_lengkap."'
				WHERE id_profil=2 AND tahun='".$tahun."' 
				";
		// die($sql);
		return $this->db->set_data($sql);
	}

	public function update_kebijakan($kebijakan)
	{
		$tahun = date('Y');
		$sql = "UPDATE profil SET kebijakantoko = '".$kebijakan."'
				WHERE id_profil=2 AND tahun='".$tahun."' 
				";
		// die($sql);
		return $this->db->set_data($sql);
	}

}