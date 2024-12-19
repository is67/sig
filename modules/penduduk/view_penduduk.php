<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
    exit();
}

include '../../config/database.php';
$stmt = $conn->query("SELECT * FROM penduduk");
$penduduk = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Penduduk</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Data Penduduk</h2>
        <a href="create_penduduk.php" class="btn btn-success mb-3">Tambah Data Penduduk</a>
        <a href="../../admin/dashboard.php" class="btn btn-secondary mb-3">Kembali ke Dashboard</a>
        <table class="table table-striped table-bordered mt-3">
            <thead class="thead-dark">
                <tr>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>RT/RW</th>
                    <th>Status Pernikahan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($penduduk as $p): ?>
                <tr>
                    <td><?php echo $p['nik']; ?></td>
                    <td><?php echo $p['nama']; ?></td>
                    <td><?php echo $p['alamat']; ?></td>
                    <td><?php echo $p['rt_rw']; ?></td>
                    <td><?php echo $p['status_pernikahan']; ?></td>
                    <td>
                        <a href="edit_penduduk.php?id=<?php echo $p['id']; ?>" class="btn btn-warning">Edit</a>
                        <a href="delete_penduduk.php?id=<?php echo $p['id']; ?>" class="btn btn-danger">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>