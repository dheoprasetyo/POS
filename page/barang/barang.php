<!-- Basic Examples -->
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Data Barang
                            </h2>
                            
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>Nomor</th>
                                            <th>Kode Barcode</th>
                                            <th>Nama Barang</th>
                                            <th>Satuan</th>
                                            <th>Stok</th>
                                            <th>Harga Beli</th>
                                            <th>Harga Jual</th>
                                            <th>Profit</th>
                                            <th>Aksi</th>
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
                                            <td>
                                                <a href="?page=barang&aksi=ubah&id=<?= $row['kode_barcode'] ?>" class="btn btn-success">Ubah</a>
                                                <a  onclick="return confirm('yakin ?')" href="?page=barang&aksi=hapus&id=<?= $row['kode_barcode'] ?>" class="btn btn-danger">Hapus</a>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                       
                                    </tbody>
                                </table>
                                <a href="?page=barang&aksi=tambah" class="btn btn-primary">Tambah Data</a>
                                <a href="page/barang/cetak.php" target="blank" class="btn btn-default">Cetak</a>
