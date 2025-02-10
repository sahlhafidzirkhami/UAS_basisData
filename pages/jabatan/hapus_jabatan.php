<?php
include '../../koneksi.php';

if (isset($_GET['id'])) {
    $id_jabatan = $_GET['id'];

    $query = "DELETE FROM jabatan WHERE id_jabatan = '$id_jabatan'";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        echo "<script>alert('Data cabang berhasil dihapus'); window.location='jabatan.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus data'); window.location='jabatan.php';</script>";
    }
}
?>