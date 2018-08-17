<?php 
$kode = $_GET['id'];
$sql = $conn->query("SELECT * FROM pelanggan WHERE kode_pelanggan ='$kode'");
$tampil = $sql->fetch_assoc(); 
$satua?>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               Ubah Pelanggan
                            </h2>
                        </div>

                           <div class="body">
                           <form method="POST">
                            <label for="">Nama</label>
                            <div class="form-group">
                                 <div class="form-line">
                                     <input type="text" class="form-control" value="<?= $tampil['nama'] ?>" name="nama"/>
                                        </div>
                                    </div>

                            <label for="">Alamat</label>
                            <div class="form-group">
                                 <div class="form-line">
                                     <input type="text" class="form-control"  value="<?= $tampil['alamat'] ?>" name="alamat"/>
                                        </div>
                             </div>

                            <label for="">Telepon</label>
                            <div class="form-group">
                                 <div class="form-line">
                                     <input type="text" class="form-control"  value="<?=$tampil['telepon'] ?>" name="telepon"/>
                                        </div>
                                    </div>


                            <label for="">Email</label>
                            <div class="form-group">
                                 <div class="form-line">
                                     <input type="email" class="form-control"  value="<?= $tampil['email'] ?>" name="email"/>
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

    $sql = $conn->query("UPDATE pelanggan SET nama = '$nama', alamat= '$alamat',telepon= '$telepon', email= '$email' WHERE kode_pelanggan='$kode'");

    if($sql){
        ?>
        <script type="text/javascript">alert('DAta Berhasil Diubah'); window.location.href="?page=pelanggan";</script>
        <?php 
        
    }

 } ?>
