<div class="row">
    <div class="col-md-12">
        <div class="page-header">
            <h4>
                Data Detail Barang
                <div class="pull-right btn-tambah">
                    <form class="form-inline" method="POST" action="../index.php">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="glyphicon glyphicon-search"></i>
                                </div>
                                <input type="text" name="cari" class="form-control" placeholder="Cari.." autocomplete="off" value="<?php echo $cari; ?>">
                            </div>
                        </div>
                    </form>
                </div>
            </h4>
            <a class="btn btn-info" href="?page=tambah">
                <i class="glyphicon glyphicon-plus"></i> tambah
            </a>
        </div>
    <!-- panel -->
    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
                <h4>Data Detail Barang
                    <a class="btn btn-info" href="?page=tambah">
                        <i class="glyphicon glyphicon-plus"></i> Tambah
                    </a>
                </h4>
                <hr>
                <div class="container mt-3">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Kode Penjualan</th>
                                    <th>Nama Barang</th>
                                    <th>Jumlah Jual</th>
                                    <th>Sub Total</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;

                                $query = mysqli_query($db,"select tb_detail_jual.kd_penjualan,
                                 tb_barang.nama_barang,
                                 tb_detail_jual.jumlah_jual, tb_detail_jual.sub_total_harga
                                 from tb_barang,tb_detail_jual where tb_barang.kd_barang = tb_detail_jual.kd_barang")
                                 or die('Ada kesalahan pada query barang: '.mysqli_error($db));

                                while ($data = mysqli_fetch_assoc($query)) {
                                    echo "<tr>
                                    <td width='50' class='center'>$no</td>
                                    <td width='60'> $data[kd_penjualan]</td>
                                    <td width='150'> $data[nama_barang]</td>
                                    <td width='150'> $data[jumlah_jual]</td>
                                    <td width='120'> $data[sub_total_harga]</td>

                                    <td width='100'>
                                        <div class=''>
                                         <a data-toggle='tooltip' data-placement='top' title='Ubah'
                                         style='margin-right:5px' class = 'btn btn-info btn-sm'
                                         href='?page=ubah&id=$data[kd_penjualan]'>
                                         <i class='glyphicon glyphicon-edit'></i></a>";
                            ?>

                                        <a data-toggle="tooltip" data-placement="top" title="Hapus"
                                        class="btn btn-danger btn-sm" href="controller/proses_hapus_barang.php?id=<?php echo $data['kd_barang'];?>" onclick="return confirm('Anda yakin ingin menghapus barang <?php echo $data['nama_barang'];?>?');">
                                        <i class="glyphicon glyphicon-trash"></i>
                                        </a>
                                <?php
                                echo "
                                        </div>
                                    </td>
                                </tr>";
                                $no++;
                                }
                                ?>
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!--//col -->
</div> <!--//row -->