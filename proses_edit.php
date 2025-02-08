<?php
// Koneksi ke database
include 'koneksi.php';

// Pastikan data dikirim melalui POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_pegawai = $_POST['id_pegawai'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $id_jabatan = $_POST['id_jabatan'];
    $id_cabang = $_POST['id_cabang'];

    // Query untuk update data pegawai
    $query = "UPDATE pegawai SET 
                nama = '$nama',
                alamat = '$alamat',
                tanggal_lahir = '$tanggal_lahir',
                jenis_kelamin = '$jenis_kelamin',
                id_jabatan = '$id_jabatan',
                id_cabang = '$id_cabang'
              WHERE id_pegawai = '$id_pegawai'";

    if (mysqli_query($koneksi, $query)) {
        echo "<script>alert('Data pegawai berhasil diperbarui'); window.location='index.php';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui data'); window.location='edit.php?id=$id_pegawai';</script>";
    }
} else {
    echo "<script>alert('Akses tidak valid'); window.location='index.php';</script>";
}
?>
