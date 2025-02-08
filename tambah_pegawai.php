<?php
// Proses form tambah data
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'koneksi.php';
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $id_jabatan = $_POST['id_jabatan'];
    $id_cabang = $_POST['id_cabang'];

    $query = "INSERT INTO Pegawai (nama, alamat, tanggal_lahir, jenis_kelamin, id_jabatan, id_cabang) 
              VALUES ('$nama', '$alamat', '$tanggal_lahir', '$jenis_kelamin', '$id_jabatan', '$id_cabang')";
    mysqli_query($koneksi, $query);
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pegawai</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold text-center mb-8">Tambah Pegawai</h1>

        <!-- Form Tambah Data -->
        <form action="tambah.php" method="POST" class="bg-white shadow-md rounded-lg p-6 max-w-lg mx-auto">
            <div class="mb-4">
                <label for="nama" class="block text-gray-700">Nama</label>
                <input type="text" name="nama" id="nama" class="w-full px-4 py-2 border rounded-lg" required>
            </div>
            <div class="mb-4">
                <label for="alamat" class="block text-gray-700">Alamat</label>
                <input type="text" name="alamat" id="alamat" class="w-full px-4 py-2 border rounded-lg" required>
            </div>
            <div class="mb-4">
                <label for="tanggal_lahir" class="block text-gray-700">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="w-full px-4 py-2 border rounded-lg" required>
            </div>
            <div class="mb-4">
                <label for="jenis_kelamin" class="block text-gray-700">Jenis Kelamin</label>
                <select name="jenis_kelamin" id="jenis_kelamin" class="w-full px-4 py-2 border rounded-lg" required>
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="id_jabatan" class="block text-gray-700">Jabatan</label>
                <select name="id_jabatan" id="id_jabatan" class="w-full px-4 py-2 border rounded-lg" required>
                    <!-- Ambil data jabatan dari database -->
                    <?php
                    include 'koneksi.php';
                    $query = "SELECT * FROM Jabatan";
                    $result = mysqli_query($koneksi, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='{$row['id_jabatan']}'>{$row['nama_jabatan']}</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="mb-4">
                <label for="id_cabang" class="block text-gray-700">Cabang</label>
                <select name="id_cabang" id="id_cabang" class="w-full px-4 py-2 border rounded-lg" required>
                    <!-- Ambil data cabang dari database -->
                    <?php
                    $query = "SELECT * FROM Cabang";
                    $result = mysqli_query($koneksi, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='{$row['id_cabang']}'>{$row['nama_cabang']}</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="text-center">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Simpan</button>
                <a href="index.php" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-700 ml-2">Batal</a>
            </div>
        </form>
    </div>
</body>
</html>