<?php
$host = "localhost"; // Nama host server database
$user = "root";      // Username default XAMPP
$pass = "";          // Password default XAMPP (kosong)
$db   = "data_alumni_qq";  // Nama database yang telah kita buat

$koneksi = mysqli_connect($host, $user, $pass, $db);

// Cek koneksi
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>