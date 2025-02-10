<?php
include '../../koneksi.php';

if (isset($_GET['id'])) {
    $id_cabang = $_GET['id'];

    $query = "DELETE FROM Cabang WHERE id_cabang = '$id_cabang'";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        header("Location: cabang.php");
        exit();
    } else {
        echo "Gagal menghapus data: " . mysqli_error($koneksi);
    }
}
?>
