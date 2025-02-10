<?php

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once '../../koneksi.php';;

    $nama_jabatan = $_POST['nama_jabatan'];
    $gaji_pokok = $_POST['gaji_pokok'];

    $query = "INSERT INTO jabatan (nama_jabatan, gaji_pokok) 
    VALUES ('$nama_jabatan','$gaji_pokok')";
    mysqli_query($koneksi, $query);
    header('Location: jabatan.php');
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <title>Document</title>
</head>
<body>
    <div class="container mx-auto p-4"></div>

    <h1 class="text-3xl font-bold text-center mb-8">Tambah Jabatan</h1>
    <form method="POST" action="tambah_jabatan.php" class="bg-white shadow-md rounded-lg p-6 max-w-lg mx-auto">
        <div class="mb-4"></div>
            <label for="nama_cabang" class="block text-gray-700">Nama Jabatan</label>
            <input type="text" name="nama_jabatan" id="nama_jabatan" class="w-full px-4 py-2 border rounded-lg" required>
        </div>
        <div class="mb-4">
            <label for="alamat_cabang" class="block text-gray-700">Gaji Pokok</label>
            <input type="text" name="gaji_pokok" id="gaji_pokok" class="w-full px-4 py-2 border rounded-lg" required>
        </div>
        <div class="text-center">
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Simpan</button>
        </div>
    </form>
    </body>
</html>