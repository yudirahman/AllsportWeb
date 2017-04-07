<?php 
include ROOT_LIBS.'autoimage.php';

/*
* User
*/

class User extends Base
{
	/**
	 *
     */
	function __construct()
	{
		parent::__construct();
		$this->is_session();
	}

	public function index()
	{
		/*assign variable*/
		if (isset($_POST['submit'])){
			if($_POST['submit'] == 'add'){
				$namalengkap = trim(htmlspecialchars($_POST['nama_lengkap'],ENT_QUOTES));
				$username = $_POST['username'];
				$password = $_POST['password'];
				$level = $_POST['level'];
				$isactive = $_POST['isactive'];
				$image_name = $_FILES['image']['name'];
				$image_tmp = $_FILES['image']['tmp_name'];
				$image_size = $_FILES['image']['size'];
				$image_type = $_FILES['image']['type'];
				$namerandom = mt_rand().str_replace(" ", "_", $image_name);
				$target_path = ROOT_FILES.'image/users/'.$namerandom;
				$target_path_thumb = ROOT_FILES.'image/users/thumb/'.$namerandom;
				$moveResult = move_uploaded_file($image_tmp, $target_path);
				
				if ($moveResult){
					$resimg = new abeautifulsite\SimpleImage();
					$resimg->load($target_path);
					$resimg->best_fit(100,100);
					$resimg->save($target_path_thumb);

					if ($this->addUser($namalengkap,$username,$password,$level,$isactive,$namerandom) == true) {
					$_SESSION['errmsg'] = "<div class=\"alert alert-info\"> <a href=\"javascript:void()\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\" id=\"unset_errmsg\">&times;</a><strong>Success!</strong> Data Berhasil di Simpan.</div>";

					header('location:'.SITEURL.URL_ADMIN.'/user/alluser');

					}else{
						$_SESSION['errmsg'] = "<div class=\"alert alert-warning\"> <a href=\"javascript:void()\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\" id=\"unset_errmsg\">&times;</a><strong>Warning!</strong> Data Gagal di Simpan.</div>";
						unlink($target_path);
						unlink($target_path_thumb);						
						header('location:'.SITEURL.URL_ADMIN.'/user/alluser');
					}
				}else{
					$_SESSION['errmsg'] = "<div class=\"alert alert-warning\"> <a href=\"javascript:void()\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\" id=\"unset_errmsg\">&times;</a><strong>Warning!</strong> Data Gagal di Simpan.</div>";
					header('location:'.SITEURL.URL_ADMIN.'/user/alluser');
				}
			}elseif ($_POST['submit'] == 'edit'){
				echo 'edit';
			}elseif ($_POST['submit'] == 'delete'){
				echo 'delete';
			}else{
				die('error');
			}
		}else{

			$data = [	
						'halaman' 		=> 'Administrasi User',
						'datauser'  	=> $this->dataUsers(),
						'namatoko' 		=> $this->siteinfo('nama'),
						'title_page'	=> 'Dashboard Administrator',
						'username'		=> $_SESSION['username_user'],
						'avatar'		=> $_SESSION['avatar'],
						'tahuntoko'		=> $this->siteinfo('tahun')
					];
			$this->render->view_admin('admin/user/index.user',$data);
		}
	}

	public function dataUsers()
	{
		$data = [];
		$sql = "SELECT * FROM users";
		$data = $this->db->get_data($sql);
		return $data;
	}

	public function dataUserWhere($id='')
	{
		$data = [];
		$sql = "SELECT * FROM users where id_user='".$id."' ";
		$data = $this->db->get_data($sql);
		if (!empty($data)) {
			foreach ($data as $row) {
				$data = [
							'id' => $row['id_user'],
							'nama' => $row['nama'],
							'username' => $row['username'],
							'status' => $row['status'],
							'level' => $row['level'],
							'image' => $row['foto']
						];
			}
			echo json_encode($data);
		}else{
			echo json_encode(array());
		}
		
	}

	public function addUser($namalengkap,$username,$password,$level,$isactive,$namerandom)
	{
		$sql = "INSERT INTO users (nama,username,password,level,status,foto) 
				VALUES('".$namalengkap."','".$username."','".$password."','".$level."','".$isactive."','".$namerandom."')";
		// die($sql);
		$query = $this->db->set_data($sql);		
		if ($query) {
			return true;
		}else{
			return false;
		}
	}
}