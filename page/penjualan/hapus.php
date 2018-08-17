<?php
	$jumlah = $_GET['jumlah']; 
	$id = $_GET['id'];
	$kode_pj = $_GET['kode_pj'];
	$harga_jual = $_GET['harga_jual'];
	$kode_b = $_GET['kode_b']; 

	$sql = $conn->query("DELETE FROM penjualan WHERE id='$id'");
	$sql2 = $conn->query("UPDATE barang SET stok=(stok+$jumlah) WHERE kode_barcode='$kode_b'");

	if ($sql || $sql1 || $sql2){
		?>
		<script> window.location.href="?page=penjualan&kodepj=<?= $kode_pj ?>";</script>
		<?php 
	}
	 ?>
