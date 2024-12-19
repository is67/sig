<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../../admin/login.php");
    exit();
}

include '../../config/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $koordinat = $_POST['koordinat'];
    $kepadatan = $_POST['kepadatan'];

    $stmt = $conn->prepare("UPDATE wilayah SET koordinat=?, kepadatan=? WHERE id=?");
    $stmt->execute([$koordinat, $kepadatan, $id]);

    header("Location: view_wilayah.php");
    exit();
}

$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM wilayah WHERE id=?");
$stmt->execute([$id]);
$wilayah = $stmt->fetch();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Wilayah</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Edit Data Wilayah</h2>
        <form method="POST">
            <input type="hidden" name="id" value="<?php echo $wilayah['id']; ?>">
            <div class="form-group">
                <label>Koordinat</label>
                <input type="text" name="koordinat" class="form-control" value="<?php echo $wilayah['koordinat']; ?>" required>
            </div>
            <div class="form-group">
                <label>Kepadatan</label>
                <select name="kepadatan" class="form-control" required>
                    <option value="Padat" <?php if ($wilayah['kepadatan'] == 'Padat') echo 'selected'; ?>>Padat</option>
                    <option value="Ramai" <?php if ($wilayah['kepadatan'] == 'Ramai') echo 'selected'; ?>>Ramai</option>
                    <option value="Sepi" <?php if ($wilayah['kepadatan'] == 'Sepi') echo 'selected'; ?>>Sepi</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success btn-block">Update</button>
            <a href="view_wilayah.php" class="btn btn-secondary btn-block">Kembali</a>
        </form>
    </div>
</body>
</html>