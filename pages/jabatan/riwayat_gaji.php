<?php
include '../../koneksi.php';

$query = "SELECT rg.id_riwayat, j.nama_jabatan, rg.gaji_lama, rg.gaji_baru, rg.tanggal_perubahan
FROM riwayat_gaji rg
JOIN jabatan j ON rg.id_jabatan = j.id_jabatan
ORDER BY rg.tanggal_perubahan DESC;
";
$result = mysqli_query($koneksi, $query);   
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Riwayat Gaji</title>
</head>
<body>
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold text-center mb-8">Riwayat Gaji</h1>
        <a href="jabatan.php" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">⬅️ Kembali</a>
        <table class="min-w-full">
            <thead class="bg-gray-200">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase">ID Riwayat</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase">Tgl Perubahan</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase">Nama Jabatan</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase">Gaji Lama</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase">Gaji Baru</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td class="px-6 py-4"><?= $row['id_riwayat'] ?></td>
                    <td class="px-6 py-4"><?= $row['tanggal_perubahan'] ?></td>
                    <td class="px-6 py-4"><?= $row['nama_jabatan'] ?></td>
                    <td class="px-6 py-4"><?= "Rp " . number_format($row['gaji_lama'], 0, ',', '.') ?></td>
                    <td class="px-6 py-4"><?= "Rp " . number_format($row['gaji_baru'], 0, ',', '.') ?></td>

                </tr>
                <?php endwhile; ?>
            </tbody>

            </table>
    </body>
</html>