<?php
// Koneksi ke database
include 'koneksi.php';

// Query untuk mengambil data pegawai
$query = "SELECT p.id_pegawai, p.nama, p.alamat, p.tanggal_lahir, p.jenis_kelamin, j.nama_jabatan, c.nama_cabang 
          FROM Pegawai p
          JOIN Jabatan j ON p.id_jabatan = j.id_jabatan
          JOIN Cabang c ON p.id_cabang = c.id_cabang";
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
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold text-center mb-8">Data Kepegawaian</h1>

        <!-- Tombol Tambah Data -->
        <a href="tambah.php" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Tambah Pegawai</a>

        <!-- Tabel Data Pegawai -->
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <table class="min-w-full">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase">Nama</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase">Alamat</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase">Tanggal Lahir</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase">Jenis Kelamin</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase">Jabatan</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase">Cabang</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td class="px-6 py-4"><?= $row['nama'] ?></td>
                        <td class="px-6 py-4"><?= $row['alamat'] ?></td>
                        <td class="px-6 py-4"><?= $row['tanggal_lahir'] ?></td>
                        <td class="px-6 py-4"><?= $row['jenis_kelamin'] ?></td>
                        <td class="px-6 py-4"><?= $row['nama_jabatan'] ?></td>
                        <td class="px-6 py-4"><?= $row['nama_cabang'] ?></td>
                        <td class="px-6 py-4">
                            <a href="edit.php?id=<?= $row['id_pegawai'] ?>" class="text-blue-500 hover:text-blue-700">Edit</a>
                            <a href="hapus.php?id=<?= $row['id_pegawai'] ?>" class="text-red-500 hover:text-red-700 ml-2" onclick="return confirm('Apakah Anda yakin?')">Hapus</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>