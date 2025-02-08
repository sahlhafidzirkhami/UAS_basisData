<?php
// Koneksi ke database
include 'koneksi.php';

// Cek apakah id_pegawai dikirim melalui GET
if (isset($_GET['id'])) {
    $id_pegawai = $_GET['id'];

    // Ambil data pegawai berdasarkan id
    $query = "SELECT * FROM pegawai WHERE id_pegawai = $id_pegawai";
    $result = mysqli_query($koneksi, $query);
    $pegawai = mysqli_fetch_assoc($result);
}

// Ambil daftar jabatan
$query_jabatan = "SELECT * FROM jabatan";
$result_jabatan = mysqli_query($koneksi, $query_jabatan);

// Ambil daftar cabang
$query_cabang = "SELECT * FROM cabang";
$result_cabang = mysqli_query($koneksi, $query_cabang);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pegawai</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold text-center mb-8">Edit Pegawai</h1>

        <form action="proses_edit.php" method="POST" class="bg-white p-6 rounded-lg shadow-md">
            <input type="hidden" name="id_pegawai" value="<?= $pegawai['id_pegawai'] ?>">

            <label class="block text-sm font-medium text-gray-700">Nama</label>
            <input type="text" name="nama" value="<?= $pegawai['nama'] ?>" required class="w-full px-4 py-2 border rounded-lg mb-4">

            <label class="block text-sm font-medium text-gray-700">Alamat</label>
            <textarea name="alamat" required class="w-full px-4 py-2 border rounded-lg mb-4"><?= $pegawai['alamat'] ?></textarea>

            <label class="block text-sm font-medium text-gray-700">Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" value="<?= $pegawai['tanggal_lahir'] ?>" required class="w-full px-4 py-2 border rounded-lg mb-4">

            <label class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
            <select name="jenis_kelamin" required class="w-full px-4 py-2 border rounded-lg mb-4">
                <option value="L" <?= ($pegawai['jenis_kelamin'] == 'L') ? 'selected' : '' ?>>Laki-laki</option>
                <option value="P" <?= ($pegawai['jenis_kelamin'] == 'P') ? 'selected' : '' ?>>Perempuan</option>
            </select>

            <label class="block text-sm font-medium text-gray-700">Jabatan</label>
            <select name="id_jabatan" required class="w-full px-4 py-2 border rounded-lg mb-4">
                <?php while ($row = mysqli_fetch_assoc($result_jabatan)) : ?>
                    <option value="<?= $row['id_jabatan'] ?>" <?= ($pegawai['id_jabatan'] == $row['id_jabatan']) ? 'selected' : '' ?>>
                        <?= $row['nama_jabatan'] ?>
                    </option>
                <?php endwhile; ?>
            </select>

            <label class="block text-sm font-medium text-gray-700">Cabang</label>
            <select name="id_cabang" required class="w-full px-4 py-2 border rounded-lg mb-4">
                <?php while ($row = mysqli_fetch_assoc($result_cabang)) : ?>
                    <option value="<?= $row['id_cabang'] ?>" <?= ($pegawai['id_cabang'] == $row['id_cabang']) ? 'selected' : '' ?>>
                        <?= $row['nama_cabang'] ?>
                    </option>
                <?php endwhile; ?>
            </select>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan Perubahan</button>
            <a href="index.php" class="bg-gray-500 text-white px-4 py-2 rounded ml-2">Batal</a>
        </form>
    </div>
</body>
</html>
