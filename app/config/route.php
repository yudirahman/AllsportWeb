<?php

/**
* Route
*/
class Route 
{

	public function run()
	{
		if (isset($_GET['url'])) {
			$url = $_GET['url'];
			if ($url) {
				$this->find_();
				$this->find_modules($url);
			}else{
				$this->throw_404();
			}			
		}else{
			header('location:?url=home');
		}
	}

	public function throw_404()
	{
		header('HTTP/1.0 404 Not Found');
		readfile('Errors/404.html');
	}

	public function find_modules($module)
	{
		$module_path = ROOT_MODULES.$module.'.php';
		if (file_exists($module_path)) {
			include $module_path;
			$mymodule = new $module;
			if (isset($_GET['act'])) {
				$act = $_GET['act'];
				if ($act) {
					if (method_exists($module, $act)) {
						$mymodule->$act();					
					}else{
						$mymodule->index();
					}
				} else {
					$mymodule->index();
				}	
			}else{
				$mymodule->index();
			}
		}else{
			$this->throw_404();
		}
	}

	public function find_()
	{

		$db = new db();
		$sql ="SELECT * FROM profil WHERE aktif='Y'";
		$d = $db->get_data($sql);
		$id = SITEID;
		$name='';
			foreach ($d as $v) {
				$name = $v['nama'];
			}
		if ($this->sqlPassword($name) == '*'.$id ) {
			return true;
		}else{
			die($this->jMsg($id,$name));
		}

	}

	public function sqlPassword($input) {
	    $pass = strtoupper(
	            sha1(
	                    sha1($input, true)
	            )
	    );
	    $pass = '*' . $pass;
	    return $pass;
	} 

	public function jMsg($c,$n)
	{
		$string =null;
		$max = strlen($c) - 1;
		for ($i = 0; $i < $max; $i++) {
		    $string .= $c[mt_rand(0, $max)];
		}
		return false;
	}

}