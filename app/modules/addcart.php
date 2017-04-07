<?php 
/**
* 
*/
class Addcart extends Base
{
	
	public function index()
	{
		/*assign variable*/
			$data['title_page'] = 'Checkout Produk';
			$data['masterkategori'] = $this->masterKategoriProduk();
			$data['masterproduk'] = $this->masterProduk();
			$data['session'] = isset($_SESSION['username']);
			$data['items'] = $this->itemcart();
			$data['masterdiskon'] = $this->masterProdukDiskon();	
		   	$this->render->view('web/cart/checkout',$data);
	}

	public function add()
	{
		include ROOT_LIBS.'cart.php';
		if (isset($_POST['item'])) {
			$item = $_POST['item'];
			$cart = new Cart();
			if ($cart->add($item)) {
				echo 'ok'; 
			}else{
				echo 'gagal';
			}
				
		}else{
			echo json_encode('no item');
		}
	}

	public function update()
	{
		include ROOT_LIBS.'cart.php';
		if (isset($_POST['item'])) {
			$item = $_POST['item'];
			$qty = $_POST['qty'];
			$cart = new Cart();
			$cart->update($item, $qty);
			echo 'ok'; 
				
		}else{
			echo json_encode('no item');
		}
	}

	public function remove()
	{
		include ROOT_LIBS.'cart.php';
		if (isset($_POST['item'])) {
			$item = $_POST['item'];
			$cart = new Cart();
			$cart->remove($item);
			echo 'ok'; 
		}else{
			echo json_encode('no item');
		}
	}

	public function getCartItem()
	{
		$cart = new Cart();
		echo json_encode($cart->getItems());
	}
}

?>