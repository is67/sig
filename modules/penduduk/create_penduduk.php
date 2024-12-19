<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../../admin/login.php");
    exit();
}

include '../../config/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $rt_rw = $_POST['rt_rw'];
    $status_pernikahan = $_POST['status_pernikahan'];

    $stmt = $conn->prepare("INSERT INTO penduduk (nik, nama, alamat, rt_rw, status_pernikahan) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$nik, $nama, $alamat, $rt_rw, $status_pernikahan]);

    header("Location: view_penduduk.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Penduduk</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Tambah Data Penduduk</h2>
        <form method="POST">
            <div class="form-group">
                <label>NIK</label>
                <input type="text" name="nik" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <textarea name="alamat" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label>RT/RW</label>
                <input type="text" name="rt_rw" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Status Pernikahan</label>
                <select name="status_pernikahan" class="form-control" required>
                    <option value="Belum Menikah">Belum Menikah</option>
                    <option value="Menikah">Menikah</option>
                    <option value="Cerai">Cerai</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success btn-block">Simpan</button>
            <a href="view_penduduk.php" class="btn btn-secondary btn-block">Kembali</a>
        </form>
    </div>
</body>
</html>