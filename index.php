<?php
require_once 'config/database.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Perikanan Tangkap - Dinas Perikanan Gresik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        .hero { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 100px 0; }
        .feature-card { transition: transform 0.3s; }
        .feature-card:hover { transform: translateY(-10px); }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="bi bi-water"></i> Perikanan Tangkap Gresik
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="user/data-bbm.php">Data BBM</a></li>
                    <li class="nav-item"><a class="nav-link" href="user/sop.php">SOP</a></li>
                    <li class="nav-item"><a class="nav-link" href="user/downloads.php">Download</a></li>
                    <li class="nav-item"><a class="nav-link btn btn-warning text-dark px-3" href="login.php">Login Admin</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container text-center">
            <h1 class="display-4 mb-4">Sistem Informasi Perikanan Tangkap</h1>
            <p class="lead mb-5">Dinas Perikanan Kabupaten Gresik</p>
            <a href="user/data-bbm.php" class="btn btn-light btn-lg me-2"><i class="bi bi-database"></i> Lihat Data BBM</a>
            <a href="user/sop.php" class="btn btn-outline-light btn-lg"><i class="bi bi-file-text"></i> Lihat SOP</a>
        </div>
    </section>

    <!-- Features -->
    <section class="py-5">
        <div class="container">
            <h2 class="text-center mb-5">Fitur Layanan</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card feature-card h-100 text-center p-4">
                        <i class="bi bi-fuel-pump text-primary" style="font-size: 3rem;"></i>
                        <h4 class="mt-3">Data BBM</h4>
                        <p>Lihat data BBM perikanan tangkap secara real-time</p>
                        <a href="user/data-bbm.php" class="btn btn-outline-primary mt-auto">Lihat Data</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card feature-card h-100 text-center p-4">
                        <i class="bi bi-file-earmark-text text-success" style="font-size: 3rem;"></i>
                        <h4 class="mt-3">SOP Pengajuan</h4>
                        <p>Panduan lengkap prosedur pengajuan</p>
                        <a href="user/sop.php" class="btn btn-outline-success mt-auto">Lihat SOP</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card feature-card h-100 text-center p-4">
                        <i class="bi bi-download text-warning" style="font-size: 3rem;"></i>
                        <h4 class="mt-3">Download File</h4>
                        <p>Download formulir dan dokumen pendukung</p>
                        <a href="user/downloads.php" class="btn btn-outline-warning mt-auto">Download</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white py-4 mt-5">
        <div class="container text-center">
            <p class="mb-0">&copy; 2024 Dinas Perikanan Kabupaten Gresik. All Rights Reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
