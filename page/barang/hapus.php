<?php 
$kode2 = $_GET['id'];
$sql = $conn->query("DELETE FROM barang WHERE kode_barcode ='$kode2'");
if ($sql) {
	# code...
?>
<script type="text/javascript">alert('DAta Berhasil Diapus'); window.location.href="?page=barang";</script>
<?php } ?>