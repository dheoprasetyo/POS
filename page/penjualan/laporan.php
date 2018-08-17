<?php 
 error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
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
	<caption>Laporan Penjualan</caption>
	<thead>
		<tr>
			<th>No</th>
			<th>Tanggal</th>
			<th>Kode Barcode</th>
			<th>Nama BArang</th>
			<th>Harga Jual</th>
			<th>Jumlah</th>
			<th>Total</th>
			<th>Profit</th>
		</tr>
	</thead>
	<tbody>
		<?php 

			  $tgl_awal = $_POST['tgl_awal'];
			  $tgl_akhir = $_POST['tgl_akhir'];
			  $no = 1;
			  $sql = $conn->query("SELECT * FROM penjualan,barang WHERE penjualan.kode_barcode=barang.kode_barcode AND tgl_penjualan BETWEEN '$tgl_awal' AND '$tgl_akhir' ");
			  while($row = $sql->fetch_assoc()) {
			  	$profit = $row['profit'] * $row['jumlah'];?>
			  <tr>
			    <td><?=$no++ ?></td>
			    <td><?=date('d F Y', strtotime($row['tgl_penjualan']))?></td>
			    <td><?=$row['kode_barcode']  ?></td>
			    <td><?=$row['nama_barang']  ?></td>
			    <td><?=number_format($row['harga_jual'])  ?></td>
			    <td><?=$row['jumlah']  ?></td>
			    <td><?=number_format($row['total']) ?></td>
			    <td><?=number_format($profit) ?></td>
			                                           
			   </tr>
        <?php 
    		$total_pj = $total_pj + $row['total'];
    		$total_profit = $total_profit + $profit;
    	} ?>
	</tbody>
			<th colspan="6">Total Penjualan</th>
			<td><?=number_format($total_pj)  ?></td>
			<td><?=number_format($total_profit) ?></td>
</table>
<br>
<input type="button" class="noPrint" value="Cetak" onclick="window.print()">