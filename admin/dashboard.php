<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body style="background-image: url('../assets/images/bg.jpg'); background-size: cover; background-position: center;">
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: rgba(255, 255, 255, 0.8);">
        <a class="navbar-brand" href="#">CENDOL</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="../assets/images/admin.jpg" alt="Profile" class="rounded-circle" style="width: 30px; height: 30px;">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <h6 class="dropdown-header"><?php echo $_SESSION['username']; ?></h6>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#profileModal">Lihat Profil</a>
                        <a class="dropdown-item" href="logout.php">Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <h2 class="text-light">Dashboard</h2>
        <p class="lead text-light">Kelola data penduduk, wilayah, dan laporan di sini.</p>
        <div class="row">
            <div class="col-md-4">
                <div class="card border-0 shadow" style="background-color: rgba(255, 255, 255, 0.8);">
                    <div class="card-body">
                        <h5 class="card-title text-danger">Data Penduduk</h5>
                        <p class="card-text">Kelola data penduduk dengan mudah.</p>
                        <a href="../modules/penduduk/view_penduduk.php" class="btn btn-primary">Lihat Data</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow" style="background-color: rgba(255, 255, 255, 0.8);">
                    <div class="card-body">
                        <h5 class="card-title text-danger">Data Wilayah</h5>
                        <p class="card-text">Lihat dan analisis data wilayah.</p>
                        <a href="../modules/wilayah/view_wilayah.php" class="btn btn-primary">Lihat Data</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow" style="background-color: rgba(255, 255, 255, 0.8);">
                    <div class="card-body">
                        <h5 class="card-title text-danger">Data Laporan</h5>
                        <p class="card-text">Buat dan kelola laporan dengan mudah.</p>
                        <a href="../modules/laporan/view_laporan.php" class="btn btn-primary">Lihat Data</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- Modal Profil -->
<div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="profileModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="background-color: #343a40; color: white;"> <!-- Ubah warna latar belakang modal -->
            <div class="modal-header">
                <h5 class="modal-title" id="profileModalLabel">Profil Admin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <img src="../assets/images/admin.jpg" alt="Foto Profil" class="rounded-circle" style="width: 150px; height: 150px; border: 3px solid #007bff;"> <!-- Tambahkan border -->
                <h5 class="mt-3"><?php echo $_SESSION['username']; ?></h5>
                <p>Email: admin@example.com</p> <!-- Ganti dengan email yang sesuai -->
                <p>Role: Administrator</p>
                <p>Bergabung sejak: <?php echo date("Y"); ?></p> <!-- Tanggal bergabung -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Tutup</button> <!-- Ubah warna tombol -->
            </div>
        </div>
    </div>
</div>

    <footer class="text-center mt-5">
        <p class="text-light"> </p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html> 