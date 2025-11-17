<?php
require_once '../config/database.php';
$result = $conn->query("SELECT * FROM files ORDER BY uploaded_at DESC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Download - Perikanan Tangkap Gresik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="../index.php"><i class="bi bi-water"></i> Perikanan Tangkap Gresik</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="../index.php">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="data-bbm.php">Data BBM</a></li>
                    <li class="nav-item"><a class="nav-link" href="sop.php">SOP</a></li>
                    <li class="nav-item"><a class="nav-link active" href="downloads.php">Download</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <section class="py-5 bg-primary text-white text-center">
        <div class="container">
            <h1><i class="bi bi-download"></i> Download File</h1>
            <p class="lead">Unduh dokumen dan file penting perikanan tangkap</p>
        </div>
    </section>
    <section class="py-5">
        <div class="container">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0"><i class="bi bi-folder"></i> Daftar File</h5>
                </div>
                <div class="card-body">
                    <div class="list-group">
                        <?php while($row = $result->fetch_assoc()): ?>
                        <a href="../<?= htmlspecialchars($row['file_path']) ?>" class="list-group-item list-group-item-action" download>
                            <div class="d-flex w-100 justify-content-between align-items-center">
                                <div>
                                    <h5 class="mb-1"><i class="bi bi-file-earmark-pdf"></i> <?= htmlspecialchars($row['file_name']) ?></h5>
                                    <p class="mb-1 text-muted"><?= htmlspecialchars($row['description']) ?></p>
                                    <small class="text-muted">Kategori: <span class="badge bg-secondary"><?= htmlspecialchars($row['category']) ?></span></small>
                                </div>
                                <div class="text-end">
                                    <small class="d-block text-muted"><?= date('d M Y', strtotime($row['uploaded_at'])) ?></small>
                                    <span class="badge bg-success mt-1"><i class="bi bi-download"></i> Download</span>
                                </div>
                            </div>
                        </a>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer class="bg-dark text-white py-4 mt-5">
        <div class="container text-center">
            <p class="mb-0">&copy; 2024 Dinas Perikanan Kabupaten Gresik. All Rights Reserved.</p>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
