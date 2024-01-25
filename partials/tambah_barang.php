<div class="row mt-5">
    <div class="col-md-12 mt-4">
        <div class="page-header">
            <h4>
                <i class='bi bi-pencil-square text-primary'></i>
                Input data Barang
            </h4>
        </div> <!-- page header -->

        <div class="panel panel-default">
            <div class="panel-body">
                <form class="form-horizontal" method="POST" action="../controller/proses_simpan_barang.php">
                    <div class="form-group mb-2 mt-4">
                        <label class="col-sm-2 control-label">Kode Barang</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" name="kd_barang" maxlength="5"
                            autocomplete="off" required>
                        </div>
                    </div>

                    <div class="form-group mb-2 ">
                        <label class="col-sm-2 control-label">Nama Barang</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="nama_barang" autocomplete="off" required>
                        </div>
                    </div>
                    
                    <div class="form-group mb-2 ">
                        <label class="col-sm-2 control-label">Stok Barang</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="stok" autocomplete="off" required>
                        </div>
                    </div>

                    <hr/>
                    <div class="form-group mb-2 ">
                        <div class="col-sm-offset-2 col-sm-10">
                            <input type="submit" class="btn btn-primary text-light btn-submit" name="simpan" value="Simpan">
                            <a href="../partials/tampil_data.php" class="btn btn-danger btn-reset">Batal</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>