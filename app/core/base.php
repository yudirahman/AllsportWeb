<?php

/**
 * Class Base
 */
class Base 
{
	/**
	 * Base constructor.
	 */
	function __construct()
	{
		$this->db = new Db();
		$this->render = Cutter::init();
	}

	/**
	 * @return bool
	 */
	public function is_session()
	{
		if (!empty($_SESSION['username_user'])) {
			return true;
		} else {
			header('location:'.SITEURL.URL_ADMIN.'/home/login');
		}	
	}

	/**
	 * @param $field
	 * @return mixed
	 */
	public function siteinfo($field)
	{
		$sql = "SELECT * FROM profil WHERE aktif='Y' ";
		$data = $this->db->get_data($sql);

		foreach ($data as $row) {
			return $row[$field];
		}
	}

	public function masterKategoriProduk()
	{
		$sql = "SELECT * FROM kategori_produk ORDER BY nama_kategori ASC";
		$data = $this->db->get_data($sql);

		if (sizeof($data) > 0) {
			return $data;
		}else{
			return array();
		}
	}

	public function masterProduk()
	{
		$sql = "SELECT p.*, kp.* FROM produk p 
				LEFT JOIN kategori_produk kp 
				ON (p.id_kategori_produk = kp.id_kategori_produk) 
				ORDER BY p.id_produk DESC;
				";

		$data = $this->db->get_data($sql);

		if (sizeof($data) > 0) {
			return $data;
		} else{
			return array();
		}
	}

	public function masterProdukDiskon()
	{
		$sql = "SELECT p.*, kp.* FROM produk p 
				LEFT JOIN kategori_produk kp 
				ON (p.id_kategori_produk = kp.id_kategori_produk) 
				WHERE diskon > 0 ORDER BY rand() DESC LIMIT 4;
				";

		$data = $this->db->get_data($sql);

		if (sizeof($data) > 0) {
			return $data;
		} else{
			return array();
		}
	}

	public function masterProdukDiskonAll()
	{
		$sql = "SELECT p.*, kp.* FROM produk p 
				LEFT JOIN kategori_produk kp 
				ON (p.id_kategori_produk = kp.id_kategori_produk) 
				WHERE diskon > 0 ORDER BY rand();
				";

		$data = $this->db->get_data($sql);

		if (sizeof($data) > 0) {
			return $data;
		} else{
			return array();
		}
	}

	public function masterProdukbyIdCart($id)
	{
		$sql = "SELECT p.*, kp.* FROM produk p 
				LEFT JOIN kategori_produk kp 
				ON (p.id_kategori_produk = kp.id_kategori_produk) 
				where p.id_produk = ".$id.";
				";

		$data = $this->db->get_data($sql);

		if (sizeof($data) > 0) {
			return $data;
		} else{
			return array();
		}
	}

	public function itemcart()
	{
		include ROOT_LIBS.'cart.php';
		$cart = new Cart();
		$items = $cart->getItems();
		return $items;
	}


}