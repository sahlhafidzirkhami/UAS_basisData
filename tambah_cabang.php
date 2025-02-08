<?php
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'koneksi.php';

    $nama_cabang = $_POST['nama_cabang'];
    $alamat_cabang = $_POST['alamat_cabang'];

    $query = "INSERT INTO cabang (nama_cabang, alamat_cabang) 
    VALUES ('$nama_cabang','$alamat_cabang')";
    mysqli_query($koneksi, $query);
    header('Location: cabang.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Cabang</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mx-auto p-4"></div>

    <h1 class="text-3xl font-bold text-center mb-8">Tambah Cabang</h1>
    <form method="POST" action="tambah_cabang.php" class="bg-white shadow-md rounded-lg p-6 max-w-lg mx-auto">
        <div class="mb-4"></div>
            <label for="nama_cabang" class="block text-gray-700">Nama Cabang</label>
            <input type="text" name="nama_cabang" id="nama_cabang" class="w-full px-4 py-2 border rounded-lg" required>
        </div>
        <div class="mb-4">
            <label for="alamat_cabang" class="block text-gray-700">Alamat Cabang</label>
            <input type="text" name="alamat_cabang" id="alamat_cabang" class="w-full px-4 py-2 border rounded-lg" required>
        </div>
        <div class="text-center">
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Simpan</button>
        </div>
    </form>
    </body>
</html>