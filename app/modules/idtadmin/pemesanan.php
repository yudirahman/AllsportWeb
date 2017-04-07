<?php 
/**
* 
*/
class Pemesanan extends Base
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
					'tahuntoko'		=> $this->siteinfo('tahun'),
					'dataPemesanan' => $this->getDataPemesanan()
				];
		$this->render->view_admin('admin/pemesanan/index',$data);
	}

	public function konfirmasi($id_order)
	{
		$this->is_session();

		if (isset($_POST['id_order'])) {
			$sql = "UPDATE orders SET status_order = ".$_POST['status']." WHERE id_order=".$_POST['id_order']." ";
			$query = $this->db->set_data($sql);	
			if ($query) {
				echo "<script>alert('Order sudah di konfirmasi);window.location.href=\"".SITEURL.URL_ADMIN."/laporan/datalaporan\"</script>";
			}else{
				header('location='.SITEURL.URL_ADMIN.'/pemesanan/konfirmasi/'.$id_order);
				exit;
			}
		}
		/*assign variable*/
		$data = [
					'namatoko' 		=> $this->siteinfo('nama'),
					'title_page'	=> 'Dashboard Administrator',
					'username'		=> $_SESSION['username_user'],
					'avatar'		=> $_SESSION['avatar'],
					'tahuntoko'		=> $this->siteinfo('tahun'),
					'dataPemesanan' => $this->getDataPemesananById($id_order),
					'dataProduk' 	=> $this->produkByIdOrder($id_order)
				];
		$this->render->view_admin('admin/pemesanan/detail',$data);
	}



	public function getDataPemesanan()
	{
		$sql = "SELECT * FROM orders where status_order = 1 ORDER BY tgl_order desc";
		if (!empty($this->db->get_data($sql))) {
			return 	$this->db->get_data($sql);
		}else{
			return array();
		}
	}

	public function getDataPemesananById($id_order)
	{
		$sql = "SELECT * FROM orders LEFT JOIN pelanggan ON (orders.id_pelanggan = pelanggan.id_pelanggan)
		where status_order = 1 AND id_order = $id_order";
		if (!empty($this->db->get_data($sql))) {
			return 	$this->db->get_data($sql);
		}else{
			return array();
		}
	}

	public function produkByIdOrder($id_order)
	{
		$sql = "SELECT * FROM produk p LEFT JOIN produk_order po ON 
									   (p.id_produk = po.id_produk) WHERE po.id_order =".$id_order." ";

		if (!empty($this->db->get_data($sql))) {
			return 	$this->db->get_data($sql);
		}else{
			return array();
		}
	}
}
?>