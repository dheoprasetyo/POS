<?php 
$kode = $_GET['id'];
$sql = $conn->query("DELETE FROM pelanggan WHERE kode_pelanggan ='$kode'");
if ($sql) {
	# code...
?>
<script type="text/javascript">alert('DAta Berhasil Diapus'); window.location.href="?page=pelanggan";</script>
<?php } ?>