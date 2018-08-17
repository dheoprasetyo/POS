<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Data Pelanggan
                            </h2>
                            
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>Nomor</th>
                                            <th>Nama</th>
                                            <th>Alamat</th>
                                            <th>Telepon</th>
                                            <th>Email</th>
                                            <th>Aksi</th>
                                            
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <?php 
                                        $no = 1;
                                        $sql = $conn->query("SELECT * FROM pelanggan");
                                        while($row = $sql->fetch_assoc()) {?>
                                        <tr>
                                            <td><?=$no++ ?></td>
                                            <td><?=$row['nama']  ?></td>
                                            <td><?=$row['alamat']  ?></td>
                                            <td><?=$row['telepon']  ?></td>
                                            <td><?=$row['email']  ?></td>
                                            <td>
                                                <a href="?page=pelanggan&aksi=ubah&id=<?= $row['kode_pelanggan'] ?>" class="btn btn-success">Ubah</a>
                                                <a  onclick="return confirm('yakin ?')" href="?page=pelanggan&aksi=hapus&id=<?= $row['kode_pelanggan'] ?>" class="btn btn-danger">Hapus</a>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                       
                                    </tbody>
                                </table>
                                <a href="?page=pelanggan&aksi=tambah" class="btn btn-primary">Tambah Data</a>
