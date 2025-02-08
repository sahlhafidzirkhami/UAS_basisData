<?php
include 'koneksi.php';

$cabang = null; // Inisialisasi variabel untuk mencegah error

if (isset($_GET['id'])) {
    $id_cabang = $_GET['id'];

    $query = "SELECT * FROM cabang WHERE id_cabang = $id_cabang";
    $result = mysqli_query($koneksi, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $cabang = mysqli_fetch_assoc($result);
    } else {
        echo "<p class='text-red-500 text-center'>Data tidak ditemukan!</p>";
    }
}

if (isset($_POST['id_cabang'])) {
    $id_cabang = $_POST['id_cabang'];
    $nama_cabang = $_POST['nama_cabang'];
    $alamat_cabang = $_POST['alamat_cabang'];

    $query = "UPDATE cabang SET nama_cabang = '$nama_cabang', alamat_cabang = '$alamat_cabang' WHERE id_cabang = $id_cabang";

    if (mysqli_query($koneksi, $query)) {
        echo "<script>alert('Data cabang berhasil diperbarui'); window.location='cabang.php';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui data'); window.location='edit_cabang.php?id=$id_cabang';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Cabang</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold text-center mb-8">Edit Cabang</h1>

        <?php if ($cabang): ?>
            <form action="edit_cabang.php" method="POST">
                <input type="hidden" name="id_cabang" value="<?= $cabang['id_cabang'] ?>">
                <div class="mb-4">
                    <label for="nama_cabang" class="block text-gray-700">Nama Cabang</label>
                    <input type="text" name="nama_cabang" id="nama_cabang" class="w-full px-4 py-2 border rounded-lg" value="<?= htmlspecialchars($cabang['nama_cabang']) ?>" required>
                </div>
                <div class="mb-4">
                    <label for="alamat_cabang" class="block text-gray-700">Alamat Cabang</label>
                    <input type="text" name="alamat_cabang" id="alamat_cabang" class="w-full px-4 py-2 border rounded-lg" value="<?= htmlspecialchars($cabang['alamat_cabang']) ?>" required>
                </div>
                <div class="text-center">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Simpan</button>
                </div>
            </form>
        <?php else: ?>
            <p class="text-red-500 text-center">Cabang tidak ditemukan atau terjadi kesalahan.</p>
        <?php endif; ?>
    </div>
</body>
</html>
