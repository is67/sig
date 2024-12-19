<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
    exit();
}

include '../../config/database.php';

// Query untuk mengambil data laporan
$query = "SELECT * FROM laporan";
$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Laporan</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        a { padding: 10px; background-color: #4CAF50; color: white; text-decoration: none; border-radius: 5px; }
        a:hover { background-color: #45a049; }
    </style>
</head>
<body>
    <h2>Data Laporan</h2>
    <a href="add_laporan.php">Tambah Laporan</a>
    <a href="../../admin/dashboard.php" class="btn btn-secondary mb-3">Kembali ke Dashboard</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>RT</th>
                <th>RW</th>
                <th>Desa</th>
                <th>Alamat Asal</th>
                <th>Alamat Tujuan</th>
                <th>Tanggal Perpindahan</th>
                <th>Keterangan</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($result as $row): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['id']); ?></td>
                    <td><?php echo htmlspecialchars($row['nik']); ?></td>
                    <td><?php echo htmlspecialchars($row['nama']); ?></td>
                    <td><?php echo htmlspecialchars($row['rt']); ?></td>
                    <td><?php echo htmlspecialchars($row['rw']); ?></td>
                    <td><?php echo htmlspecialchars($row['desa']); ?></td>
                    <td><?php echo htmlspecialchars($row['alamat_asal']); ?></td>
                    <td><?php echo htmlspecialchars($row['alamat_tujuan']); ?></td>
                    <td><?php echo htmlspecialchars($row['tanggal_perpindahan']); ?></td>
                    <td><?php echo htmlspecialchars($row['keterangan']); ?></td>
                    <td><?php echo htmlspecialchars($row['status']); ?></td>
                    <td>
                        <a href="edit_laporan.php?id=<?php echo htmlspecialchars($row['id']); ?>">Edit</a> | 
                        <a href="delete_laporan.php?id=<?php echo htmlspecialchars($row['id']); ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>