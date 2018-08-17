<?php 
 $conn = new mysqli("localhost", "root", "", "pos"); 
 error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
$kasir = $_GET['kasir'];
$kode_pj = $_GET['kode_pjl'];
?>

<h4>Struk Belanjaan</h4>
<table>
	<tr>
		<td>Toko Varokah</td>
	</tr>
	<tr>
		<td>Jalan H Jusin</td>
	</tr>
</table>

<table>
	<?php 
	$sql=$conn->query("SELECT * FROM penjualan, pelanggan WHERE penjualan.id_pelanggan=pelanggan.kode_pelanggan and kode_penjualan='$kode_pj'");
	$tampil=$sql->fetch_assoc();
	 ?>
	<tr>
		<td>Kode Penjualan &nbsp&nbsp</td>
		<td>: &nbsp&nbsp<?=$tampil['kode_penjualan']; ?></td>
	</tr>

	<tr>
		<td>Tanggal &nbsp&nbsp</td>
		<td>: &nbsp&nbsp<?=$tampil['tgl_penjualan']; ?></td>
	</tr>

	<tr>
		<td>Pelanggan &nbsp&nbsp</td>
		<td>: &nbsp&nbsp<?=$tampil['nama']; ?></td>
	</tr>

	<tr>
		<td>Kasir &nbsp&nbsp</td>
		<td>: &nbsp&nbsp<?=$kasir; ?></td>
	</tr>
	<td><hr></td>

	<?php 
	$sql2= $conn->query("SELECT * FROM penjualan, penjualan_detail, barang WHERE penjualan.kode_penjualan=penjualan_detail.kode_penjualan and penjualan.kode_barcode=barang.kode_barcode  and penjualan.kode_penjualan='$kode_pj'");
	while ($tampil2=$sql2->fetch_assoc()) {
		# code...
	 ?>
	<tr>
		<td><?=$tampil2['nama_barang']; ?></td>
		<td><?php echo number_format($tampil2['harga_jual']).',-'.'&nbsp'.'&nbsp'.'X'.'&nbsp'.'&nbsp'.$tampil2['jumlah'].'&nbsp'.'&nbsp'.'&nbsp'.'&nbsp'.':' ?></td>

		<td><?php echo number_format($tampil2['total']).',-';?></td>
	</tr>

	<?php
	$diskon=$tampil2['diskon'];
	$potongan=$tampil2['potongan'];
	$bayar=$tampil2['bayar'];
	$kembali=$tampil2['kembali'];
	$total_b=$tampil2['total_b'];
	$total_bayar=$total_bayar +$tampil2['total'];
	 } ?>
	 <tr>
	 	<td><hr></td>
	 </tr>
	 <tr>
		<th colspan="2">Total</th>
		<td>: &nbsp&nbsp<?=$total_bayar; ?></td>
	</tr>

	<tr>
		<th colspan="2">Diskon</th>
		<td>: &nbsp&nbsp<?=$diskon; ?></td>
	</tr>

	<tr>
		<th colspan="2">Potongan Diskon</th>
		<td>: &nbsp&nbsp<?=$potongan; ?></td>
	</tr>

	<tr>
		<th colspan="2">Sub Total</th>
		<td>: &nbsp&nbsp<?=$total_b; ?></td>
	</tr>

	<tr>
		<th colspan="2">Bayar</th>
		<td>: &nbsp&nbsp<?=$bayar; ?></td>
	</tr>

	<tr>
		<th colspan="2">Kembali</th>
		<td>: &nbsp&nbsp<?=$kembali; ?></td>
	</tr>
</table>

<table>
	<tr>
		<td>Barang yang sudah dibeli tidak dapat dikembalikan</td>
	</tr>
</table>
<br>
<input type="button" value="Print" onclick="window.print()">