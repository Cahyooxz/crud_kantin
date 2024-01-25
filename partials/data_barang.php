<?php 
if (isset($_POST['cari'])){
    $cari = $_POST['cari'];
}else{
    $cari = '';
}
?>
<div class="row mt-4">
    <div class="col-md-12 mt-5 float-right">
        <div class="page-header">
            <h4 class="mb-3">Data Barang</h4>
                <div class="pull-right btn-tambah">
                    <form class="form-inline" method="POST" action="tampil_data.php">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon me-3">
                                <i class="bi bi-search" style="font-size:24px"></i>
                                </div>
                                <input type="text" name="cari" class="form-control" placeholder="Cari.." autocomplete="off" value="<?php echo $cari; ?>">
                            </div>
                        </div>
                    </form>
                </div>
        <?php 
        if (empty($_GET['alert'])){
            echo '';
        } elseif ($_GET['alert'] == 1){
        echo "<div class='alert alert-danger alert-dismissible' role='alert'>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
                </button>
                <strong><i class='glyphicon glyphicon-alert'></i>Gagal!</strong> Terjadi Kesalahan.
            </div>";
        } elseif ($_GET['alert'] == 2){
        echo "<div class='alert alert-success alert-dismissible' role='alert'>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
                </button>
                <strong><i class='glyphicon glyphicon-ok-circle'></i>Sukses!</strong> Data Barang berhasil disimpan.
            </div>";

        } elseif ($_GET['alert'] == 3){
            echo "<div class='alert alert-success alert-dismissible' role='alert'>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
                </button>
                <strong><i class='glyphicon glyphicon-ok-circle'></i>Sukses!</strong> Data Barang berhasil diubah.
            </div>";
        } elseif ($_GET["alert"] == 4){
            echo "<div class='alert alert-success alert-dismissible' role='alert'>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
                </button>
                <strong><i class='glyphicon glyphicon-ok-circle'></i>Sukses!</strong> Data Barang berhasil dihapus.
            </div>";
        }
        ?>
    <!-- panel -->
    <div class="content-wrapper mt-3">
        <div class="card">
            <div class="card-body">
                <div class="pembungkus d-flex justify-content-between">
                    <h4>Data Barang</h4>
                        <a class="btn btn-primary" href="?page=tambah">
                            <i class="glyphicon glyphicon-plus"></i> Tambah
                        </a>
                </div>
                <hr>
                <div class="container mt-3">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Kode Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Stok</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // pagination
                                $batas = 5;
                                include '../config/koneksi.php';

                                if(isset($cari)){
                                    $jumlah_record = mysqli_query($db, "SELECT * FROM tb_barang
                                        WHERE kd_barang LIKE '%$cari%' OR nama_barang LIKE '%$cari%'")
                                        or die('Ada kesalahan pada query jumlah_record: '.mysqli_error($db));
                                }else{
                                    $jumlah_record = mysqli_query($db, "SELECT * FROM tb_barang")
                                    or die('Ada kesalahan pada query jumlah_record: '.mysqli_error($db));
                                }

                                $jumlah = mysqli_num_rows($jumlah_record);
                                $halaman = ceil($jumlah / $batas);
                                $page = (isset($_GET['hal'])) ? (int) $_GET['hal'] :1;
                                $mulai = ($page -1) *$batas;

                                $no = 1;
                                if(isset($cari)){
                                    $query = mysqli_query($db, "SELECT * FROM tb_barang
                                        WHERE kd_barang LIKE '%$cari%' OR nama_barang LIKE '%$cari%'
                                        ORDER BY kd_barang DESC LIMIT $mulai, $batas")
                                        or die('Ada kesalahan pada query barang: '.mysqli_error($db));
                                }else{
                                    $query = mysqli_query($db, "SELECT * FROM tb_barang
                                            ORDER BY nis DESC LIMIT $mulai, $batas")
                                    or die('Ada kesalahan pada query barang: '.mysqli_error($db));
                                }

                                while ($data = mysqli_fetch_assoc($query)) {
                                    echo "<tr>
                                    <td width='50' class='center'>$no</td>
                                    <td width='60'> $data[kd_barang]</td>
                                    <td width='150'> $data[nama_barang]</td>
                                    <td width='120'> $data[stok]</td>

                                    <td width='100'>
                                        <div class=''>
                                         <a data-toggle='tooltip' data-placement='top' title='Ubah'
                                         style='margin-right:5px' class = 'btn btn-primary btn-sm'
                                         href='?page=ubah&id=$data[kd_barang]'>
                                         <i class='bi bi-pencil-square text-light'></i></a>";


                            ?>

                                        <a data-toggle="tooltip" data-placement="top" title="Hapus"
                                        class="btn btn-danger btn-sm" href="../controller/proses_hapus_barang.php?id=<?php echo $data['kd_barang'];?>" onclick="return confirm('Anda yakin ingin menghapus barang <?php echo $data['nama_barang'];?>?');">
                                        <i class="bi bi-trash-fill text-light"></i>
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
                        <?php
                        if(empty($_GET['hal'])) {
                            $halaman_aktif = '1';
                        }else{
                            $halaman_aktif = $_GET['hal'];
                        }
                        ?>

                        <a>
                            Halaman <?php echo $halaman_aktif; ?> dari <?php echo $halaman; ?> |
                            Total <?php echo $jumlah; ?> data
                        </a>

                        <nav>
                            <ul class="pagination pull right">
                                <!-- Button untuk halaman sebelumnya -->
                                <?php
                                if($halaman_aktif <='1') { ?>
                                <li class="disabled">
                                    <a href="" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                <?php
                                }else{ ?>
                                <li>
                                    <a href="?hal=<?php echo $page -1 ?>" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                <?php
                                }
                                ?>

                                <!-- Button untuk halaman selanjutnya -->
                                <?php
                                if ($halaman_aktif >= $halaman) { ?>
                                    <li class="disabled">
                                        <a href="" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                    <?php
                                    }else{ ?>
                                        <li>
                                            <a href="?hal=<?php echo $page +1 ?>" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                        </li>
                                    <?php
                                    }
                                    ?>
                                </ul>
                        </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!--//col -->
</div> <!--//row -->