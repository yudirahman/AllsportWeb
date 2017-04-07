<?php 
/**
* 
*/
class Laporan extends Base
{
	
	public function index()
	{
		$this->is_session();

		/*assign variable*/
		$dataProdukOrder = array();
		foreach ($this->getDataPenjualan() as $row) {
			$dataProdukOrder[] = $this->getProdukDariPenjualan($row['id_order']);
		}

		

		$data = [
					'namatoko' 		=> $this->siteinfo('nama'),
					'title_page'	=> 'Dashboard Administrator',
					'username'		=> $_SESSION['username_user'],
					'avatar'		=> $_SESSION['avatar'],
					'tahuntoko'		=> $this->siteinfo('tahun'),
					'dataPenjualan' => $this->getDataPenjualan(),
					'dataProdukOrder' => $dataProdukOrder
				];
		$this->render->view_admin('admin/laporan/index',$data);
	}

	public function cetakLaporan()
	{   
		require ROOT_LIBS.'vendor/autoload.php';
		// create new PDF document
		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

		// set document information
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('Allsport');
		$pdf->SetTitle('Laporan Penjualan');
		$pdf->SetSubject('Laporan Penjualan');
		$pdf->SetKeywords('Laporan Penjualan');

		// set default header data
		$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
		$pdf->setFooterData(array(0,64,0), array(0,64,128));

		// set header and footer fonts
		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

		// set default monospaced font
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

		// set margins
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

		// set auto page breaks
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

		// set image scale factor
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

		// set some language-dependent strings (optional)
		if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
		    require_once(dirname(__FILE__).'/lang/eng.php');
		    $pdf->setLanguageArray($l);
		}

		// ---------------------------------------------------------

		$pdf->setPrintHeader(false);

		// set default font subsetting mode
		$pdf->setFontSubsetting(true);

		// Set font
		// dejavusans is a UTF-8 Unicode font, if you only need to
		// print standard ASCII chars, you can use core fonts like
		// helvetica or times to reduce file size.
		//$pdf->SetFont('dejavusans', '', 14, '', true);

		// Add a page
		// This method has several options, check the source code documentation for more information.
		$pdf->AddPage('L');

		// set text shadow effect
		//$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));

		// Set some content to print
		$html ='';
		$html .='
		<p style="text-align:center;font-size:24px;">[ Laporan Penjualan Toko Allsport ]</p>
		<small style="text-align:center;font-size:12px">Tanggal '.date('d/m/Y', strtotime($_POST['tgl_mulai'])).'  s/d '.$_POST['tgl_selesai'].' </small>
		<p></p>
		<table style=" border-collapse: collapse;width: 100%;border: 1px solid #3E4651">
			<tbody>
			<tr style="height:25px;border: 1px solid #3E4651;background-color: #d2d7d3; font-weight: bold;text-align: center;">
				<td style="height:55px;padding:15px;border: 1px solid #3E4651;width:5%"><br><br>No</td>
				<td style="padding:15px;border: 1px solid #3E4651;width:10%"><br><br>Tanggal</td>
				<td style="padding:15px;border: 1px solid #3E4651;width:8%"><br><br>No. Nota</td>
				<td style="padding:15px;border: 1px solid #3E4651;width:33%"><br><br>Produk</td>
				<td style="padding:15px;border: 1px solid #3E4651;width:15%"><br><br>Harga / Item</td>
				<td style="padding:15px;border: 1px solid #3E4651"><br><br>Biaya Kirim</td>
				<td style="padding:15px;border: 1px solid #3E4651"><br><br>Total Bayar</td>
			</tr>';
			
			$no = 1;
			$tot = 0;
			$datax = $this->getDataPenjualanByDateDiff($_POST['tgl_mulai'],$_POST['tgl_selesai']);
		if (!empty($datax)) {
			
		
			foreach ($this->getDataPenjualanByDateDiff($_POST['tgl_mulai'],$_POST['tgl_selesai']) as $val) {
			$html .= '<tr style="padding:15px;border: 1px solid #3E4651">
			<td style="height:50px;padding:15px;border: 1px solid #3E4651;text-align: center"><br><br>'.$no++.'</td>
			<td style="padding:15px;border: 1px solid #3E4651; text-align: center"><br><br>'.date('d-m-Y', strtotime($val['tgl_tf'])).'</td>
			<td style="padding:15px;border: 1px solid #3E4651; text-align: center"><br><br>'.$val['kode_order'].'</td>
			';
			
			foreach ($this->getProdukDariPenjualan($val['id_order']) as $row) {
							if ($row['diskon'] > 0) {
								$hargax = $row['harga_diskon'];
							} else {
								$hargax = $row['harga_produk'];
							}
				$html .= '<td style="padding:15px;border: 1px solid #3E4651"><br><br> - '.$row['nama_produk'].'</td>
						<td style="padding:15px;border: 1px solid #3E4651;text-align:right"><br><br>'.number_format($hargax, 2).' @ '.$row['qty'].'</td>
						';
			}
			$html .='
			<td style="padding:15px;border: 1px solid #3E4651; text-align:right"><br><br>'.number_format($val['biaya_kirim'],2).'</td>
			<td style="padding:15px;border: 1px solid #3E4651; text-align:right"><br><br>'.number_format($val['total_bayar'],2).'</td>
			</tr>';

				$tot+= $val['total_bayar'] ;
			}
		}else{
			$html .='<tr style="padding:15px;border: 1px solid #3E4651">
						<td colspan="7" style="height:50px;padding:15px;border: 1px solid #3E4651;text-align: center">
						<br>
						<br>
						Tidak ada data penjualan tanggal '.date('d/m/Y', strtotime($_POST['tgl_mulai'])).' s/d tanggal '.date('d/m/Y', strtotime($_POST['tgl_selesai'])).'
						</td>
					</tr>';
		}
		$html .='
			<tr style="background-color: #d2d7d3; font-weight: bold;padding:15px;border: 1px solid #3E4651">
			<td style="height:50px;padding:15px;border: 1px solid #3E4651; text-align:right" colspan="6"><br><br> GRAND TOTAL PENJUALAN </td>
			<td style="padding:15px;border: 1px solid #3E4651;text-align:right"><br><br> Rp. '.number_format($tot, 2).'</td>
			</tr>
			</tbody>
		</table>
		';
		// Print text using writeHTMLCell()
		$pdf->writeHTML($html, true, false, true, false, '');

		// ---------------------------------------------------------

		// Close and output PDF document
		// This method has several options, check the source code documentation for more information.
		$pdf->Output('Laporan_penjualan_tanggal_'.date('d/m/Y', strtotime($_POST['tgl_mulai'])).'_sampai_tanggal_'.date('d/m/Y', strtotime($_POST['tgl_selesai'])).'.pdf', 'I');

	}

	public function konfirmasi($id_order)
	{
		$this->is_session();

		/*assign variable*/
		$data = [
					'namatoko' 		=> $this->siteinfo('nama'),
					'title_page'	=> 'Dashboard Administrator',
					'username'		=> $_SESSION['username_user'],
					'avatar'		=> $_SESSION['avatar'],
					'tahuntoko'		=> $this->siteinfo('tahun'),
					'dataPenjualan' => $this->getDataPemesananById($id_order)
				];
		$this->render->view_admin('admin/pemesanan/detail',$data);
	}

	public function getDataPenjualan()
	{
		$sql = "SELECT * FROM orders o
				-- LEFT JOIN produk_order po ON (o.id_order = po.id_order)
				LEFT JOIN pelanggan pl ON (o.id_pelanggan = pl.id_pelanggan)
				where status_order = 2 ORDER BY o.tgl_tf desc";
		if (!empty($this->db->get_data($sql))) {
			return 	$this->db->get_data($sql);
		}else{
			return array();
		}
	}

	public function getDataPenjualanByDateDiff($tgl_mulai,$tgl_selesai)
	{
		$sql = "SELECT * FROM orders o
				-- LEFT JOIN produk_order po ON (o.id_order = po.id_order)
				LEFT JOIN pelanggan pl ON (o.id_pelanggan = pl.id_pelanggan)
				where status_order = 2 AND o.tgl_tf >= '".$tgl_mulai."' AND o.tgl_tf <= '".$tgl_selesai."' ORDER BY o.tgl_tf desc";
		if (!empty($this->db->get_data($sql))) {
			return 	$this->db->get_data($sql);
		}else{
			return array();
		}
	}

	public function getProdukDariPenjualan($id_order)
	{
		$sql = "SELECT * FROM produk_order po
				LEFT JOIN produk p ON (po.id_produk = p.id_produk)
				where po.id_order = ".$id_order." ";
		if (!empty($this->db->get_data($sql))) {
			return 	$this->db->get_data($sql);
		}else{
			return array();
		}
	}

	public function getDataPenjualanById($id_order)
	{
		$sql = "SELECT * FROM orders where status_order = 2 AND id_order = $id_order";
		if (!empty($this->db->get_data($sql))) {
			return 	$this->db->get_data($sql);
		}else{
			return array();
		}
	}
}
?>