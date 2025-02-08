<?php
include 'koneksi.php';



$query = "SELECT * FROM Cabang";
$result = mysqli_query($koneksi, $query);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cabang</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold text-center mb-8">Data Cabang</h1>
        <a href="index.php" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">⬅️ Kembali</a>
        <a href="tambah_cabang.php" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Tambah Cabang</a>
        <table class="table-auto w-full">
            <thead class="bg-gray-200">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase">Nama</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase">Alamat</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td class="px-6 py-4"><?= $row['id_cabang'] ?></td>
                        <td class="px-6 py-4"><?= $row['nama_cabang'] ?></td>
                        <td class="px-6 py-4"><?= $row['alamat_cabang'] ?></td>
                        <td class="px-6 py-4">
                            <a href="edit_cabang.php?id=<?= $row['id_cabang'] ?>" class="text-blue-500 hover:text-blue-700 border-solid">Edit</a>
                            <a href="hapus.php?id=<?= $row['id_cabang'] ?>" class="text-red-500 hover:text-red-700 ml-2 border-solid" onclick="return confirm('Apakah Anda yakin?')">Hapus</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    
    
</body>
</html>