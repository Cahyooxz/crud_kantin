<?php
session_start();

include'../config/koneksi.php';

$user = $_POST["user"];
$pass = $_POST["pass"]; 

$data = mysqli_query($db, "select * from tb_login where user='$user' and pass='$pass'");
$cek = mysqli_num_rows($data);

if ($cek > 0){
    $_SESSION['user'] = $user;
    header("location: ../partials/tampil_data.php");
}else{
    header("location: ../?pesan=gagal");
}
?>