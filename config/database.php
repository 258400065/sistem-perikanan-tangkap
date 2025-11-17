<?php
// Konfigurasi Database
// Sesuaikan dengan setting cPanel Anda

define('DB_HOST', 'localhost');
define('DB_USER', 'root'); // Ganti dengan username database cPanel
define('DB_PASS', ''); // Ganti dengan password database cPanel
define('DB_NAME', 'perikanan_tangkap'); // Nama database

// Koneksi Database
try {
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    
    if ($conn->connect_error) {
        die("Koneksi database gagal: " . $conn->connect_error);
    }
    
    // Set charset ke UTF-8
    $conn->set_charset("utf8mb4");
    
} catch (Exception $e) {
    die("Error: " . $e->getMessage());
}

// Fungsi untuk mencegah SQL Injection
function clean_input($data) {
    global $conn;
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $conn->real_escape_string($data);
}

// Fungsi untuk log aktivitas
function log_activity($user_id, $aktivitas, $keterangan = '') {
    global $conn;
    $ip_address = $_SERVER['REMOTE_ADDR'];
    
    $stmt = $conn->prepare("INSERT INTO activity_log (user_id, aktivitas, keterangan, ip_address) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isss", $user_id, $aktivitas, $keterangan, $ip_address);
    $stmt->execute();
    $stmt->close();
}
?>
