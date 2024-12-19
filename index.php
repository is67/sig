<?php include 'includes/header.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CENDOL - Landing Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body style="background-image: url('assets/images/bg.jpg'); background-size: cover; background-position: center;">
    <div class="overlay"></div>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: rgba(255, 255, 255, 0.8);">
        <div class="container">
            <a class="navbar-brand font-weight-bold" href="#" style="color: #ffffff;">CENDOL</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container text-center mt-5">
        <!-- Title Section -->
        <h1 class="display-4 font-weight-bold text-light text-uppercase" style="letter-spacing: 3px;">Selamat Datang di Aplikasi <strong>CENDOL</strong></h1>
        <p class="lead text-light mb-5" style="font-size: 1.25rem; font-weight: 500;">Cek Endapan Data dan Optimalisasi Lahan</p>

        <!-- Description Section -->
        <p class="text-light mb-5" style="font-size: 1.125rem; font-weight: 400;">
            Aplikasi <strong>CENDOL</strong> (Cek Endapan Data dan Optimalisasi Lahan) adalah platform web yang dirancang untuk membantu pengelolaan data penduduk, wilayah, dan laporan administratif secara efisien. 
            Dengan fitur peta interaktif, aplikasi ini memungkinkan analisis kepadatan wilayah, pengelolaan data tempat tinggal penduduk, dan pembuatan laporan administrasi dengan mudah. 
            Khusus untuk admin, tersedia akses penuh untuk manajemen data, termasuk pengaturan akun dan informasi pribadi. Mengusung antarmuka sederhana, <strong>CENDOL</strong> mendukung pengambilan keputusan yang lebih cepat dan akurat dalam pengelolaan data demografi serta lahan.
        </p>

        <!-- Features Section -->
        <div class="row justify-content-center mt-5">
            <div class="col-md-3">
                <div class="card border-0 shadow-lg gradient-border">
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold text-dark">Data Penduduk</h5>
                        <p class="card-text text-muted">Kelola data penduduk dengan mudah.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-lg gradient-border">
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold text-dark">Data Wilayah</h5>
                        <p class="card-text text-muted">Lihat dan analisis data wilayah.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-lg gradient-border">
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold text-dark">Data Laporan</h5>
                        <p class="card-text text-muted">Buat dan kelola laporan dengan mudah.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-lg gradient-border">
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold text-dark">Profil Admin</h5>
                        <p class="card-text text-muted">Kelola profil admin dengan aman.</p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Login Button -->
        <a href="admin/login.php" class="btn btn-success btn-lg mt-5 shadow-lg">Login</a>
    </div>

    <!-- Footer -->
    <footer class="text-center mt-5 bg-dark text-light py-4">
        <p>&copy; 2023 CENDOL. All rights reserved.</p>
    </footer>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
