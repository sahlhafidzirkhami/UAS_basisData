<?php
require_once '../../koneksi.php';
$query = "SELECT * FROM Jabatan";
$result = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jabatan</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold text-center mb-8">Data Jabatan</h1>
        <a href="../../" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">⬅️ Kembali</a>
        <a href="tambah_jabatan.php" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Tambah Jabatan</a>
        <a href="riwayat_gaji.php" class="bg-green-500 text-white px-4 py-2 rounded mb-4 inline-block">Riwayat</a>
        <table class="min-w-full">
            <thead class="bg-gray-200">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase">ID Jabatan</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase">Nama Jabatan</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase">Gaji</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td class="px-6 py-4"><?= $row['id_jabatan'] ?></td>
                    <td class="px-6 py-4"><?= $row['nama_jabatan'] ?></td>
                    <td class="px-6 py-4"><?= "Rp " . number_format($row['gaji_pokok'], 0, ',', '.') ?></td>
                    <td class="px-6 py-4">
                    <a href="edit_jabatan.php?id=<?= $row['id_jabatan'] ?>" class="text-blue-500 hover:text-blue-700 border-solid">Edit</a>
                    <a href="hapus_jabatan.php?id=<?= $row['id_jabatan'] ?>" class="text-red-500 hover:text-red-700 ml-2 border-solid" onclick="return confirm('Apakah Anda yakin?')">Hapus</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>

            </table>
    </body>