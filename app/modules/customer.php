<?php 
/**
* Customer
*/
class Customer extends Base
{
	public function index()
	{
		/*assign variable*/
		$data['title_page'] = 'Home';
		$data['produk'] = array('a' => 'asu');
		extract($data);
		include ROOT_VIEW.'home/template.php';
	}

}