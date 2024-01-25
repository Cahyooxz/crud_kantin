<?php
// deklarasi parametet koneksi database
$server = "localhost";
// username dan password adalah bawaan dari xampp
$username = "root";
$password = ""; 
$database = "db_kajur"; 

$db = mysqli_connect($server, $username, $password, $database);

// cek koneksi
if (!$db){
    die("Koneksi Database Gagal : ". mysqli_connect_error());
}
?>