<?php
// Koneksi ke database
include 'koneksi.php';

// Pastikan ada parameter id yang dikirim
if (isset($_GET['id'])) {
    $id_pegawai = $_GET['id'];

    // Query untuk menghapus pegawai berdasarkan id_pegawai
    $query = "DELETE FROM pegawai WHERE id_pegawai = $id_pegawai";

    if (mysqli_query($koneksi, $query)) {
        echo "<script>alert('Data pegawai berhasil dihapus'); window.location='index.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus data'); window.location='index.php';</script>";
    }
} else {
    echo "<script>alert('ID tidak ditemukan'); window.location='index.php';</script>";
}
?>
