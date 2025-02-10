<?php
include '../../koneksi.php';

$jabatan = null; // Inisialisasi variabel untuk mencegah error

if (isset($_GET['id'])) {
    $id_jabatan = $_GET['id'];

    $query = "SELECT * FROM jabatan WHERE id_jabatan = $id_jabatan";
    $result = mysqli_query($koneksi, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $jabatan = mysqli_fetch_assoc($result);
    } else {
        echo "<p class='text-red-500 text-center'>Data tidak ditemukan!</p>";
    }
}

if (isset($_POST['id_jabatan'])) {
    $id_jabatan = $_POST['id_jabatan'];
    $nama_jabatan = $_POST['nama_jabatan'];
    $gaji_pokok = $_POST['gaji_pokok'];

    $query = "UPDATE jabatan SET nama_jabatan = '$nama_jabatan', gaji_pokok = '$gaji_pokok' WHERE id_jabatan = $id_jabatan";

    if (mysqli_query($koneksi, $query)) {
        echo "<script>alert('Data Jabatan berhasil diperbarui'); window.location='jabatan.php';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui data'); window.location='edit_jabatan.php?id=$id_jabatan';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Jabatan</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold text-center mb-8">Edit Jabatan</h1>

        <?php if ($jabatan): ?>
            <form action="edit_jabatan.php" method="POST">
                <input type="hidden" name="id_jabatan" value="<?= $jabatan['id_jabatan'] ?>">
                <div class="mb-4">
                    <label for="nama_jabatan" class="block text-gray-700">Nama Jabatan</label>
                    <input type="text" name="nama_jabatan" id="nama_jabatan" class="w-full px-4 py-2 border rounded-lg" value="<?= htmlspecialchars($jabatan['nama_jabatan']) ?>" required>
                </div>
                <div class="mb-4">
                    <label for="gaji_pokok" class="block text-gray-700">Gaji Pokok</label>
                    <input type="text" name="gaji_pokok" id="gaji_pokok" class="w-full px-4 py-2 border rounded-lg" value="<?= htmlspecialchars($jabatan['gaji_pokok']) ?>" required>
                </div>
                <div class="text-center">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Simpan</button>
                </div>
            </form>
        <?php else: ?>
            <p class="text-red-500 text-center">jabatan tidak ditemukan atau terjadi kesalahan.</p>
        <?php endif; ?>
    </div>
</body>
</html>
