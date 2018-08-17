<?php 
$conn = new mysqli("localhost", "root", "", "pos"); 
 ?>

<style>
	@media print{
		input.noPrint{
			display: none;
		}
	}
</style>
<table border="1" width="100%" style="border-collapse: collapse;">
	<caption>Laporan Data Barang</caption>
	<thead>
		<tr>
			<th>No</th>
			<th>Kode Barcode</th>
			<th>Nama BArang</th>
			<th>Satuan</th>
			<th>Stok</th>
			<th>Harga Beli</th>
			<th>Harga Jual</th>
			<th>Profit</th>
		</tr>
	</thead>
	<tbody>
		<?php 
			  $no = 1;
			  $sql = $conn->query("SELECT * FROM barang");
			  while($row = $sql->fetch_assoc()) {?>
			  <tr>
			    <td><?=$no++ ?></td>
			    <td><?=$row['kode_barcode']  ?></td>
			    <td><?=$row['nama_barang']  ?></td>
			    <td><?=$row['satuan']  ?></td>
			    <td><?=$row['stok']  ?></td>
			    <td><?=$row['harga_beli'] ?></td>
			    <td><?=$row['harga_jual']  ?></td>
			    <td><?=$row['profit']  ?></td>
			                                           
			   </tr>
        <?php } ?>
	</tbody>
</table>
<br>
<input type="button" class="noPrint" value="Cetak" onclick="window.print()">