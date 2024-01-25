<?php
// panggil koneksi database
include "../config/koneksi.php";

if(isset($_GET['id'])){
    $kd_barang = $_GET['id'];

    // perintah query untuk menghapus data pada tabel barang
    $query = mysqli_query($db,"DELETE FROM tb_barang WHERE kd_barang='$kd_barang'");

    // cek hasil query
    if ($query) {
        // jika berhasil tampilkan pesan berhasil delete data
        header('Location: ../partials/tampil_data.php?alert=4');
    } else {
        // jika gagal tampilkan pesan kesalahan
        header('Location: ../partials/tampil_data.php?alert=1');
    }
}
?>