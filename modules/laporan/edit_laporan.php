<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
    exit();
}

include '../../config/database.php';

$id = $_GET['id'];
$query = "SELECT * FROM laporan WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->execute([$id]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);

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

    $query = "UPDATE laporan SET nik=?, nama=?, rt=?, rw=?, desa=?, alamat_asal=?, alamat_tujuan=?, tanggal_perpindahan=?, keterangan=?, status=? WHERE id=?";
    $stmt = $conn->prepare($query);
    $stmt->execute([$nik, $nama, $rt, $rw, $desa, $alamat_asal, $alamat_tujuan, $tanggal_perpindahan, $keterangan, $status, $id]);

    header("Location: view_laporan.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Laporan</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Edit Laporan</h2>
        <form method="POST">
            <div class="form-group">
                <label>NIK:</label>
                <input type="text" name="nik" class="form-control" value="<?php echo htmlspecialchars($row['nik']); ?>" required>
            </div>
            <div class="form-group">
                <label>Nama:</label>
                <input type="text" name="nama" class="form-control" value="<?php echo htmlspecialchars($row['nama']); ?>" required>
            </div>
            <div class="form-group">
                <label>RT:</label>
                <input type="number" name="rt" class="form-control" value="<?php echo htmlspecialchars($row['rt']); ?>" required>
            </div>
            <div class="form-group">
                <label>RW:</label>
                <input type="number" name="rw" class="form-control" value="<?php echo htmlspecialchars($row['rw']); ?>" required>
            </div>
            <div class="form-group">
                <label>Desa:</label>
                <input type="text" name="desa" class="form-control" value="<?php echo htmlspecialchars($row['desa']); ?>" required>
            </div>
            <div class="form-group">
                <label>Alamat Asal:</label>
                <input type="text" name="alamat_asal" class="form-control" value="<?php echo htmlspecialchars($row['alamat_asal']); ?>" required>
            </div>
            <div class="form-group">
                <label>Alamat Tujuan:</label>
                <input type="text" name="alamat_tujuan" class="form-control" value="<?php echo htmlspecialchars($row['alamat_tujuan']); ?>" required>
            </div>
            <div class="form-group">
                <label>Tanggal Perpindahan:</label>
                <input type="date" name="tanggal_perpindahan" class="form-control" value="<?php echo htmlspecialchars($row['tanggal_perpindahan']); ?>" required>
            </div>
            <div class="form-group">
                <label>Keterangan:</label>
                <textarea name="keterangan" class="form-control"><?php echo htmlspecialchars($row['keterangan']); ?></textarea>
            </div>
            <div class="form-group">
                <label>Status:</label>
                <select name="status" class="form-control">
                    <option value="Diproses" <?php echo $row['status'] == 'Diproses' ? 'selected' : ''; ?>>Diproses</option>
                    <option value="Selesai" <?php echo $row['status'] == 'Selesai' ? 'selected' : ''; ?>>Selesai</option>
                    <option value="Ditolak" <?php echo $row['status'] == 'Ditolak' ? 'selected' : ''; ?>>Ditolak</option>
                </select>
            </div>
            <button type="submit" class="btn btn-warning">Update</button>
            <a href="view_laporan.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>
</html> 