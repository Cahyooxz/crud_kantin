<?php
// panggil koneksi database
include "../config/koneksi.php"; 

if (isset($_POST['ubah'])){
    if(isset($_POST['kd_barang'])) {
        $kd_barang = $_POST['kd_barang'];
        $nama_barang = $_POST['nama_barang'];
        $stok = $_POST['stok'];
    
        // perintah query untuk mengubah data pada tabel is_siswa
        $query = mysqli_query($db, "UPDATE tb_barang SET nama_barang='$nama_barang', stok='$stok' WHERE kd_barang='$kd_barang'");
        
        // cek query
        if($query) {
            // jika berhasil tampilkan pesan berhasil update data
            header('Location: ../partials/tampil_data.php?alert=3');
        } else {
            // jika gagal tampilkan pesan kesalahan
            header('Location: ../partials/tampil_data.php?alert=1');
        }
    }
}
?>