            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               Tambah Pelanggan
                            </h2>
                        </div>

                           <div class="body">
                           <form method="POST">
                           	<label for="">Nama</label>
                            <div class="form-group">
                                 <div class="form-line">
                                     <input type="text" class="form-control" name="nama"/>
                                        </div>
                                    </div>

                            <label for="">Alamat</label>
                            <div class="form-group">
                                 <div class="form-line">
                                     <input type="text" class="form-control" name="alamat"/>
                                        </div>
                             </div>

                            <label for="">Telepon</label>
                            <div class="form-group">
                                 <div class="form-line">
                                     <input type="text" class="form-control" name="telepon"/>
                                        </div>
                                    </div>


                            <label for="">Email</label>
                            <div class="form-group">
                                 <div class="form-line">
                                     <input type="email" class="form-control" name="email"/>
                                        </div>
                                    </div>

                           

                           

                            <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                                </form>

<?php 
if (isset($_POST['simpan'])) {
 	$nama = $_POST['nama'];
 	$alamat = $_POST['alamat'];
 	$telepon = $_POST['telepon'];
 	$email = $_POST['email'];

 	$sql = $conn->query("INSERT INTO pelanggan VALUES ('','$nama','$alamat','$email','$telepon')");

 	if($sql){
 		?>
 		<script type="text/javascript">alert('DAta Berhasil Disimpan'); window.location.href="?page=pelanggan";</script>
 		<?php 
 		
 	}

 } ?>