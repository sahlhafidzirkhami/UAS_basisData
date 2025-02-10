<?php
$host = "localhost"; // Nama host database (bisa juga IP server database)
$user = "root"; // Username database
$password = ""; // Password database (kosong jika default XAMPP)
$database = "SahlHafidzIrkhami_IF-11_kepegawain"; // Nama database yang digunakan

// Membuat koneksi ke database
$koneksi = mysqli_connect($host, $user, $password, $database);

// Cek apakah koneksi berhasil
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
