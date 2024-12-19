<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../../admin/login.php");
    exit();
}

include '../../config/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $rt_rw = $_POST['rt_rw'];
    $status_pernikahan = $_POST['status_pernikahan'];

    $stmt = $conn->prepare("UPDATE penduduk SET nik=?, nama=?, alamat=?, rt_rw=?, status_pernikahan=? WHERE id=?");
    $stmt->execute([$nik, $nama, $alamat, $rt_rw, $status_pernikahan, $id]);

    header("Location: view_penduduk.php");
    exit();
}

$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM penduduk WHERE id=?");
$stmt->execute([$id]);
$penduduk = $stmt->fetch();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Penduduk</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Edit Data Penduduk</h2>
        <form method="POST">
            <input type="hidden" name="id" value="<?php echo $penduduk['id']; ?>">
            <div class="form-group">
                <label>NIK</label>
                <input type="text" name="nik" class="form-control" value="<?php echo $penduduk['nik']; ?>" required>
            </div>
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" value="<?php echo $penduduk['nama']; ?>" required>
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <textarea name="alamat" class="form-control" required><?php echo $penduduk['alamat']; ?></textarea>
            </div>
            <div class="form-group">
                <label>RT/RW</label>
                <input type="text" name="rt_rw" class="form-control" value="<?php echo $penduduk['rt_rw']; ?>" required>
            </div>
            <div class="form-group">
                <label>Status Pernikahan</label>
                <select name="status_pernikahan" class="form-control" required>
                    <option value="Belum Menikah" <?php if ($penduduk['status_pernikahan'] == 'Belum Menikah') echo 'selected'; ?>>Belum Menikah</option>
                    <option value="Menikah" <?php if ($penduduk['status_pernikahan'] == 'Menikah') echo 'selected'; ?>>Menikah</option>
                    <option value="Cerai" <?php if ($penduduk['status_pernikahan'] == 'Cerai') echo 'selected'; ?>>Cerai</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success btn-block">Update</button>
            <a href="view_penduduk.php" class="btn btn-secondary btn-block">Kembali</a>
        </form>
    </div>
</body>
</html>