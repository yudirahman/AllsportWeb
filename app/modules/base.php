<?php 
/**
* 
*/
class Base 
{
	function __construct()
	{
		$this->db = new db();
	}

	public function is_session()
	{
		if (!empty($_SESSION['username_user'])) {
			return true;
		} else {
			header('location:?url=adminmode&act=login');
		}	
	}

	public function siteinfo($field)
	{
		$sql = "SELECT * FROM profil WHERE aktif='Y' ";
		$data = $this->db->get_data($sql);

		foreach ($data as $row) {
			return $row[$field];
		}
	}

}