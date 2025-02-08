<?php
// Koneksi ke database
include 'koneksi.php';

// Query untuk mengambil data pegawai
$query = "SELECT p.id_pegawai, p.nama, p.alamat, p.tanggal_lahir, p.jenis_kelamin, j.nama_jabatan, c.nama_cabang ,j.gaji_pokok
          FROM Pegawai p
          JOIN Jabatan j ON p.id_jabatan = j.id_jabatan
          JOIN Cabang c ON p.id_cabang = c.id_cabang";
$query_cabang = "SELECT * FROM Cabang LIMIT 3";
$result_cabang = mysqli_query($koneksi, $query_cabang);
$result = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kepegawaian</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4 flex space-x-4">
        <!-- Table Karyawan -->
        <div class="w-3/4 bg-white shadow-md rounded-lg p-4">
            <h1 class="text-3xl font-bold text-center mb-8">Data Kepegawaian GYM</h1>
            <a href="tambah_pegawai.php" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Tambah Pegawai</a>
            <table class="min-w-full">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase">Nama</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase">Alamat</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase">Jabatan</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase">Cabang</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase">Gaji</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td class="px-6 py-4"><?= $row['nama'] ?></td>
                        <td class="px-6 py-4"><?= $row['alamat'] ?></td>
                        <td class="px-6 py-4"><?= $row['nama_jabatan'] ?></td>
                        <td class="px-6 py-4"><?= $row['nama_cabang'] ?></td>
                        <td class="px-6 py-4"><?= $row['gaji_pokok'] ?></td>
                        <td class="px-6 py-4">
                            <a href="edit.php?id=<?= $row['id_pegawai'] ?>" class="text-blue-500 hover:text-blue-700 border-solid">Edit</a>
                            <a href="hapus.php?id=<?= $row['id_pegawai'] ?>" class="text-red-500 hover:text-red-700 ml-2 border-solid" onclick="return confirm('Apakah Anda yakin?')">Hapus</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
        
        <!-- Tabel List 3 Cabang Teratas -->
        <div class="w-1/4 bg-white shadow-md rounded-lg p-4">
            <table class="min-w-full">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase">Cabang</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <?php while ($cabang = mysqli_fetch_assoc($result_cabang)): ?>
                    <tr>
                        <td class="px-6 py-4"><?= $cabang['nama_cabang'] ?></td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
            <a href="cabang.php" class="mt-4 inline-block bg-blue-500 text-white px-4 py-2 rounded w-full text-center">Show All</a>
        </div>
    </div>
</body>
</html>