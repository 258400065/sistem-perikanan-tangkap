<?php
require_once '../config/database.php';
require_once '../config/session.php';
require_login();

// Statistik
total_bbm = $conn->query("SELECT COUNT(*) as total FROM bbm_data")->fetch_assoc()['total'];
total_files = $conn->query("SELECT COUNT(*) as total FROM files")->fetch_assoc()['total'];
total_sop = $conn->query("SELECT COUNT(*) as total FROM sop WHERE status='aktif'")->fetch_assoc()['total'];

// Data BBM terbaru
$bbm_terbaru = $conn->query("SELECT * FROM bbm_data ORDER BY created_at DESC LIMIT 5");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Perikanan Tangkap</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
</head>
<body>
    <?php include 'includes/navbar.php'; ?>

    <div class="container-fluid">
        <div class="row">
            <?php include 'includes/sidebar.php'; ?>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2"><i class="bi bi-speedometer2"></i> Dashboard</h1>
                    <div class="text-muted">
                        <i class="bi bi-person-circle"></i> <?= $_SESSION['nama_lengkap'] ?>
                    </div>
                </div>

                <!-- Statistik Cards -->
                <div class="row mb-4">
                    <div class="col-md-4">
                        <div class="card text-white bg-primary">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="card-title">Total Data BBM</h6>
                                        <h2><?= $total_bbm ?></h2>
                                    </div>
                                    <i class="bi bi-fuel-pump" style="font-size: 3rem; opacity: 0.3;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card text-white bg-success">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="card-title">Total File</h6>
                                        <h2><?= $total_files ?></h2>
                                    </div>
                                    <i class="bi bi-file-earmark" style="font-size: 3rem; opacity: 0.3;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card text-white bg-warning">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="card-title">SOP Aktif</h6>
                                        <h2><?= $total_sop ?></h2>
                                    </div>
                                    <i class="bi bi-clipboard-check" style="font-size: 3rem; opacity: 0.3;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Data BBM Terbaru -->
                <div class="card">
                    <div class="card-header">
                        <h5><i class="bi bi-clock-history"></i> Data BBM Terbaru</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Jenis BBM</th>
                                        <th>Jumlah</th>
                                        <th>Harga/Liter</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while($row = $bbm_terbaru->fetch_assoc()): ?>
                                    <tr>
                                        <td><?= date('d/m/Y', strtotime($row['tanggal_entry'])) ?></td>
                                        <td><?= $row['jenis_bbm'] ?></td>
                                        <td><?= $row['jumlah'] ?> <?= $row['satuan'] ?></td>
                                        <td>Rp <?= number_format($row['harga_per_liter'], 0, ',', '.') ?></td>
                                        <td>Rp <?= number_format($row['total_harga'], 0, ',', '.') ?></td>
                                    </tr>
                                    <?php endwhile; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>