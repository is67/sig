<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
    exit();
}

include '../../config/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $rt = $_POST['rt'];
    $rw = $_POST['rw'];
    $desa = $_POST['desa'];
    $alamat_asal = $_POST['alamat_asal'];
    $alamat_tujuan = $_POST['alamat_tujuan'];
    $tanggal_perpindahan = $_POST['tanggal_perpindahan'];
    $keterangan = $_POST['keterangan'];
    $status = $_POST['status'];

    $query = "INSERT INTO laporan (nik, nama, rt, rw, desa, alamat_asal, alamat_tujuan, tanggal_perpindahan, keterangan, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->execute([$nik, $nama, $rt, $rw, $desa, $alamat_asal, $alamat_tujuan, $tanggal_perpindahan, $keterangan, $status]);

    header("Location: view_laporan.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Laporan</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Tambah Laporan</h2>
        <form method="POST">
            <div class="form-group">
                <label>NIK:</label>
                <input type="text" name="nik" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Nama:</label>
                <input type="text" name="nama" class="form-control" required>
            </div>
            <div class="form-group">
                <label>RT:</label>
                <input type="number" name="rt" class="form-control" required>
            </div>
            <div class="form-group">
                <label>RW:</label>
                <input type="number" name="rw" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Desa:</label>
                <input type="text" name="desa" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Alamat Asal:</label>
                <input type="text" name="alamat_asal" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Alamat Tujuan:</label>
                <input type="text" name="alamat_tujuan" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Tanggal Perpindahan:</label>
                <input type="date" name="tanggal_perpindahan" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Keterangan:</label>
                <textarea name="keterangan" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label>Status:</label>
                <select name="status" class="form-control">
                    <option value="Diproses">Diproses</option>
                    <option value="Selesai">Selesai</option>
                    <option value="Ditolak">Ditolak</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="view_laporan.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>
</html> 