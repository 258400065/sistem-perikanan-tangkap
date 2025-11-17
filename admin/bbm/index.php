<?php
require_once '../../config/database.php';
require_once '../../config/session.php';
require_login();

// Proses Delete
if (isset($_GET['delete'])) {
    $id = clean_input($_GET['delete']);
    $conn->query("DELETE FROM bbm_data WHERE id = $id");
    log_activity($_SESSION['user_id'], 'Delete BBM', "Hapus data BBM ID: $id");
    header("Location: index.php?msg=deleted");
    exit();
}

// Ambil semua data BBM
$result = $conn->query("SELECT * FROM bbm_data ORDER BY tanggal_entry DESC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data BBM - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
</head>
<body>
    <?php include '../includes/navbar.php'; ?>
    <div class="container-fluid">
        <div class="row">
            <?php include '../includes/sidebar.php'; ?>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2"><i class="bi bi-fuel-pump"></i> Data BBM</h1>
                    <a href="create.php" class="btn btn-primary"><i class="bi bi-plus-circle"></i> Tambah Data BBM</a>
                </div>
                <?php if (isset($_GET['msg'])): ?>
                <div class="alert alert-success alert-dismissible fade show">
                    <?php
                    if ($_GET['msg'] == 'created') echo 'Data BBM berhasil ditambahkan!';
                    if ($_GET['msg'] == 'updated') echo 'Data BBM berhasil diupdate!';
                    if ($_GET['msg'] == 'deleted') echo 'Data BBM berhasil dihapus!';
                    ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
                <?php endif; ?>
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="table-dark">
                                    <tr>
                                        <th>No</th><th>Tanggal</th><th>Jenis BBM</th><th>Jumlah</th><th>Harga/Liter</th><th>Total Harga</th><th>Keterangan</th><th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; while($row = $result->fetch_assoc()): ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= date('d/m/Y', strtotime($row['tanggal_entry'])) ?></td>
                                        <td><span class="badge bg-info"><?= $row['jenis_bbm'] ?></span></td>
                                        <td><?= $row['jumlah'] ?> <?= $row['satuan'] ?></td>
                                        <td>Rp <?= number_format($row['harga_per_liter'], 0, ',', '.') ?></td>
                                        <td><strong>Rp <?= number_format($row['total_harga'], 0, ',', '.') ?></strong></td>
                                        <td><?= $row['keterangan'] ?: '-' ?></td>
                                        <td>
                                            <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i></a>
                                            <a href="index.php?delete=<?= $row['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus data ini?')"><i class="bi bi-trash"></i></a>
                                        </td>
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
