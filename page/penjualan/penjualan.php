<?php 
 $kode = $_GET['kodepj']; 
 $kasir = $data['nama'];?>
 <div class="row clearfix">

                           <div class="body">
                           <form method="POST">
                            <div class="col-md-2">
                                     <input type="text" name = "kode" value="<?= $kode; ?>" class="form-control" readonly = ""/>
                                        </div>
                                  

                             <div class="col-md-2">
                                     <input type="text" name = "kode_barcode" class="form-control" autofocus="" />
                                        </div>
                                  
                            <div class="col-md-2">
                                    <input type="submit" name="simpan" value="Tambahkan" class="btn btn-primary">
                                    </div>

                              </form>
                          </div>

<?php 

	if (isset($_POST['simpan'])) {
		$date = date("Y-m-d");
	 	$kd_pj = $_POST['kode'];
	 	$barcode = $_POST['kode_barcode'];
	 	$barang = $conn->query("SELECT * FROM barang WHERE kode_barcode = '$barcode'");
	 	$data_barang = $barang->fetch_assoc();
	 	$harga_jual = $data_barang['harga_jual'];
	 	$jumlah = 1;
	 	$total = $jumlah * $harga_jual;
	 	$barang2 = $conn->query("SELECT * FROM barang Where kode_barcode = '$barcode'");
	 	while ($data_barang2= $barang2->fetch_assoc()){
	 		$sisa = $data_barang2['stok'];
	 		if($sisa == 0){
			?>
	 			<script type ="text/javascript">
	 			alert("Stok barang habis");
	 			window.location.href="?page=penjualan&kodepj=<?= $kode; ?>"</script>
	 			<?php  
	 		}
	 		else{
	 			$conn->query("INSERT INTO penjualan (kode_penjualan, kode_barcode, jumlah, total, tgl_penjualan) VALUES ('$kd_pj','$barcode', '$jumlah', '$total', '$date')");
	 		}

	 	}


	 }
	 ?>
	 <br><br><br><br>
<form method="POST">
	<div class= "col-md-2">
		<label for="">Pelanggan</label>
		<select name="pelanggan" class="form-control show-tick">
			<?php 
			$pelanggan = $conn->query("SELECT * FROM pelanggan order by kode_pelanggan");
			while($d_pelanggan=$pelanggan->fetch_assoc()){
				echo "<option value='$d_pelanggan[kode_pelanggan]'>$d_pelanggan[nama]</option>";
			
			}
			 ?>
		</select>
	</div>
<br>
<br>
<br>
<br>
<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Daftar Belanjaan
                            </h2>
                            
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-striped ">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Barcode</th>
                                            <th>Nama Barang</th>
                                            <th>Harga</th>
                                            <th>Jumlah</th>
                                            <th>Total</th>
                                            <th>Aksi</th>
                                            
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <?php 
                                        $no = 1;
                                        $sql = $conn->query("SELECT * FROM penjualan, barang WHERE penjualan.kode_barcode=barang.kode_barcode AND kode_penjualan='$kode'");
                                        while($row = $sql->fetch_assoc()) {?>
                                        <tr>
                                            <td><?=$no++ ?></td>
                                            <td><?=$row['kode_barcode']  ?></td>
                                            <td><?=$row['nama_barang']  ?></td>
                                            <td><?=$row['harga_jual']  ?></td>
                                            <td><?=$row['jumlah']  ?></td>
                                            <td><?=$row['total']  ?></td>
                                            <td>
                                                <a href="?page=penjualan&aksi=tambah&id=<?= $row['id'] ?>&kode_pj=<?= $row['kode_penjualan'] ?>&harga_jual=<?= $row['harga_jual'] ?>&kode_b=<?= $row['kode_barcode'] ?>" title="tambah" class="btn btn-success"><i class="material-icons">add</i></a>
                                                 <a href="?page=penjualan&aksi=kurang&id=<?= $row['id'] ?>&kode_pj=<?= $row['kode_penjualan'] ?>&harga_jual=<?= $row['harga_jual'] ?>&kode_b=<?= $row['kode_barcode'] ?>" title="kurang" class="btn btn-success"><i class="material-icons">remove</i></a>
                                                <a  onclick="return confirm('yakin ?')" href="?page=penjualan&aksi=hapus&id=<?= $row['id'] ?>&kode_pj=<?= $row['kode_penjualan'] ?>&harga_jual=<?= $row['harga_jual'] ?>&kode_b=<?= $row['kode_barcode'] ?>&jumlah=<?= $row['jumlah'] ?>" title="hapus" class="btn btn-danger"><i class="material-icons">clear</i></a>
                                            </td>
                                        </tr>
                                        <?php
                                        $total_bayar = $total_bayar + $row['total']; } ?>
                                       
                                    </tbody>
                                    <tr>
                                    	<th colspan="5" style="text-align: right;">Total</th>
                                    	<td><input type="number" name="total_bayar" readonly= "" style="text-align: right;" id = "total_bayar" onkeyup="hitung();" value="<?= $total_bayar; ?>"></td>
                                    </tr>
                                    <tr>
                                    	<th colspan="5" style="text-align: right;">Diskon</th>
                                    	<td><input type="number" style="text-align: right;" onkeyup="hitung();" name="diskon" id="diskon"></td>
                                    </tr>
                                     <tr>
                                    	<th colspan="5" style="text-align: right;">Potongan Diskon</th>
                                    	<td><input type="number" style="text-align: right;" name="potongan" id="potongan"></td>
                                    </tr>
                                     <tr>
                                    	<th colspan="5" style="text-align: right;">Sub Total</th>
                                    	<td><input type="number" style="text-align: right;" name="s_total" id="s_total"></td>
                                    </tr>
                                     <tr>
                                    	<th colspan="5" style="text-align: right;">Bayar</th>
                                    	<td><input type="number"  onkeyup="hitung();" style="text-align: right;" name="bayar" id="bayar"></td>
                                    </tr>
                                     <tr>
                                    	<th colspan="5" style="text-align: right;">Kembali</th>
                                    	<td><input type="number" style="text-align: right;" name="kembali" id="kembali">

                                    		<input type="submit" name="simpan_pj" value="simpan" class="btn btn-info">

                                            <input type="submit"  value="cetak struk" class="btn btn-success" onclick="window.open('page/penjualan/cetak.php?kode_pjl=<?= $kode; ?>&kasir=<?= $kasir; ?>','mywindow','width-600px,heigh=600px,left=300px')">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </form>
<?php 
if(isset($_POST['simpan_pj'])){
	$pelanggan= $_POST['pelanggan'];
	$total_bayar = $_POST['total_bayar'];
	$diskon = $_POST['diskon'];
	$potongan = $_POST['potongan'];
	$s_total = $_POST['s_total'];
	$bayar = $_POST['bayar'];
	$kembali = $_POST['kembali'];

	$conn->query("INSERT INTO penjualan_detail VALUES('$kode','$bayar','$kembali','$diskon','$potongan','$s_total')");
	$conn->query("UPDATE penjualan SET id_pelanggan='$pelanggan' WHERE kode_penjualan='$kode'");
}
	?>

<script type="text/javascript">
	function hitung(){
	var total_bayar = document.getElementById('total_bayar').value;	
	var diskon = document.getElementById('diskon').value;
	var diskon_pot = parseInt(total_bayar) *  parseInt(diskon) /  parseInt(100);
	if (!isNaN(diskon_pot)) {
		 var potongan = document.getElementById('potongan').value = diskon_pot;
	}
	var sub_total = parseInt(total_bayar) -  parseInt(potongan);
	if (!isNaN(sub_total)) {
		 var s_total = document.getElementById('s_total').value = sub_total;
	}
	var bayar = document.getElementById('bayar').value;
	var bayar_b = parseInt(bayar) -  parseInt(s_total);
	if (!isNaN(bayar_b)) {
		 document.getElementById('kembali').value = bayar_b;
	}
}
</script>
                                
