<div class="row mt-4">
    <div class="col-md-12 mt-5">
        <div class="page-header">
            <h4>
                <i class='bi bi-pencil-square text-primary'></i>
                Ubah Data Barang
            </h4>
        </div> <!-- page-header -->
        <?php
        if(isset($_GET['id'])) {
            $kd_barang = $_GET['id'];
            $query = mysqli_query($db, "SELECT * FROM tb_barang WHERE kd_barang='$kd_barang'") or
                die('Query Error : '.mysqli_error($db));
            while($data = mysqli_fetch_assoc($query)) {
                $kd_barang = $data['kd_barang'];
                $nama_barang = $data['nama_barang'];
                $stok = $data['stok'];
            }
        }      
        ?>
        <div class="panel panel-default">
            <div class="panel-body">
                <form class="form-horizontal" method="POST" action="../controller/proses_ubah_barang.php">
                    <div class="form-group mb-2 mt-4">
                        <label class="col-sm-2 control-label">Kode Barang</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" name="kd_barang" value="<?php echo $kd_barang; ?>" readonly>
                        </div>
                    </div>

                    <div class="form-group mb-2">
                        <label class="col-sm-2 control-label">Nama Barang</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="nama_barang" autocomplete="off" value="<?php echo $nama_barang; ?>" required>
                        </div>
                    </div>

                    <div class="form-group mb-2">
                        <label class="col-sm-2 control-label">Stok Barang</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="stok" autocomplete="off" value="<?php echo $stok; ?>" required>
                        </div>
                    </div>

                    <hr/>
                    <div class="form-group mb-2">
                        <div class="col-sm-offset-2 col-sm-10">
                            <input type="submit" class="btn btn-primary text-light btn-submit" name="ubah" value="Simpan">
                            <a href="../partials/tampil_data.php" class="btn btn-danger btn-reset">Batal</a>
                        </div>
                    </div>
                </form>
            </div> <!-- panel-body -->
        </div> <!-- panel- -->
    </div> <!-- col -->
</div> <!-- row -->