<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../../admin/login.php");
    exit();
}

include '../../config/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $koordinat = $_POST['koordinat'];
    $kepadatan = $_POST['kepadatan'];

    $stmt = $conn->prepare("INSERT INTO wilayah (koordinat, kepadatan) VALUES (?, ?)");
    $stmt->execute([$koordinat, $kepadatan]);

    header("Location: view_wilayah.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Wilayah</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Tambah Data Wilayah</h2>
        <form method="POST">
            <div class="form-group">
                <label>Koordinat</label>
                <input type="text" name="koordinat" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Kepadatan</label>
                <select name="kepadatan" class="form-control" required>
                    <option value="Padat">Padat</option>
                    <option value="Ramai">Ramai</option>
                    <option value="Sepi">Sepi</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success btn-block">Simpan</button>
            <a href="view_wilayah.php" class="btn btn-secondary btn-block">Kembali</a>
        </form>
    </div>
</body>
</html>