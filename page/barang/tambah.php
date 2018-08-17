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
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               Tambah Barang
                            </h2>
                        </div>

                           <div class="body">
                           <form method="POST">
                           	<label for="">Kode Barcode</label>
                            <div class="form-group">
                                 <div class="form-line">
                                     <input type="text" class="form-control" name="kode"/>
                                        </div>
                                    </div>

                            <label for="">Nama Barang</label>
                            <div class="form-group">
                                 <div class="form-line">
                                     <input type="text" class="form-control" name="nama"/>
                                        </div>
                             </div>

                            <label for="">Satuan</label>
                            <div class="form-group">
                            <div class="form-line">
                                    <select name="satuan" class="form-control show-tick">
                                        <option value="">-- Pilih satuan --</option>
                                        <option value="LUSIN">LUSIN</option>
                                        <option value="PACK">PACK</option>
                                        <option value="PCS">PCS</option>
                                    </select>
                            </div>

                            <label for="">Stock</label>
                            <div class="form-group">
                                 <div class="form-line">
                                     <input type="number" class="form-control" name="stok"/>
                                        </div>
                                    </div>

                            <label for="">Harga Beli</label>
                            <div class="form-group">
                                 <div class="form-line">
                                     <input type="number" id="harga_beli" onkeyup="sum()" class="form-control" name="hbeli"/>
                                        </div>
                                    </div>

                            <label for="">Harga Jual</label>
                            <div class="form-group">
                                 <div class="form-line">
                                     <input type="number" id="harga_jual" onkeyup="sum()" class="form-control" name="hjual"/>
                                        </div>
                                    </div>

                            <label for="">Profit</label>
                            <div class="form-group">
                                 <div class="form-line">
                                     <input type="number" id="profit" readonly="" style="background-color: #e7e3e9; " value="0" class="form-control" name="profit"/>
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

 	$sql = $conn->query("INSERT INTO barang VALUES ('$kode','$nama','$satuan','$hbeli','$stok','$hjual','$profit')");

 	if($sql){
 		?>
 		<script type="text/javascript">alert('DAta Berhasil Disimpan'); window.location.href="?page=barang";</script>
 		<?php 
 		
 	}

 } ?>