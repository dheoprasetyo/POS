<script>
	function sum(){
		var harga_beli = document.getElementById('harga_beli').value;
		var harga_jual = document.getElementById('harga_jual').value;
		var result = parseInt(harga_jual)-parseInt(harga_beli);
		if(!isNaN(result)){
			document.getElementById('profit').value = result;
		}
	}
</script>
<?php 
$kode2 = $_GET['id'];
$sql = $conn->query("SELECT * FROM barang WHERE kode_barcode ='$kode2'");
$tampil = $sql->fetch_assoc(); 
$satuan = $tampil['satuan'];?>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               Ubah Barang
                            </h2>
                        </div>

                           <div class="body">
                           <form method="POST">
                           	<label for="">Kode Barcode</label>
                            <div class="form-group">
                                 <div class="form-line">
                                     <input type="text" value="<?= $tampil['kode_barcode']; ?>" class="form-control" name="kode"/>
                                        </div>
                                    </div>

                            <label for="">Nama Barang</label>
                            <div class="form-group">
                                 <div class="form-line">
                                     <input type="text" value="<?= $tampil['nama_barang']; ?>" class="form-control" name="nama"/>
                                        </div>
                             </div>

                            <label for="">Satuan</label>
                            <div class="form-group">
                            <div class="form-line">
                                    <select name="satuan" class="form-control show-tick">
                                        <option value="LUSIN" <?php if($satuan =='LUSIN'){ echo "selected";} ?>>LUSIN</option>
                                        <option value="PACK" <?php if($satuan =='PACK'){ echo "selected";} ?> >PACK</option>
                                        <option value="PCS" <?php if($satuan =='PCS'){ echo "selected";} ?>>PCS</option>
                                    </select>
                            </div>

                            <label for="">Stock</label>
                            <div class="form-group">
                                 <div class="form-line">
                                     <input type="number" value="<?= $tampil['stok']; ?>" class="form-control" name="stok"/>
                                        </div>
                                    </div>

                            <label for="">Harga Beli</label>
                            <div class="form-group">
                                 <div class="form-line">
                                     <input type="number" id="harga_beli" onkeyup="sum()" value="<?= $tampil['harga_beli']; ?>" class="form-control" name="hbeli"/>
                                        </div>
                                    </div>

                            <label for="">Harga Jual</label>
                            <div class="form-group">
                                 <div class="form-line">
                                     <input type="number" id="harga_jual" onkeyup="sum()" value="<?= $tampil['harga_jual']; ?>" class="form-control" name="hjual"/>
                                        </div>
                                    </div>

                            <label for="">Profit</label>
                            <div class="form-group">
                                 <div class="form-line">
                                     <input type="number" id="profit" value="<?= $tampil['profit']; ?>" readonly="" style="background-color: #e7e3e9; " value="0" class="form-control" name="profit"/>
                                        </div>
                                    </div>

                            <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                                </form>

<?php 
if (isset($_POST['simpan'])) {
 	$kode = $_POST['kode'];
 	$nama = $_POST['nama'];
 	$satuan = $_POST['satuan'];
    $stok = $_POST['stok'];
 	$hbeli = $_POST['hbeli'];
 	$hjual = $_POST['hjual'];
 	$profit = $_POST['profit'];

 	$sql2 = $conn->query("UPDATE barang SET  kode_barcode='$kode', nama_barang='$nama',satuan = '$satuan',harga_beli = '$hbeli',stok = '$stok',harga_jual= '$hjual', profit='$profit' WHERE kode_barcode='$kode2' ");

 	if($sql2){
 		?>
 		<script type="text/javascript">alert('DAta Berhasil Diubah'); window.location.href="?page=barang";</script>
 		<?php 
 		
 	}

 } ?>