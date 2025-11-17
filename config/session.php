<?php
// Session Management
session_start();

// Fungsi cek login
function is_logged_in() {
    return isset($_SESSION['user_id']) && isset($_SESSION['username']);
}

// Fungsi redirect jika belum login
function require_login() {
    if (!is_logged_in()) {
        header("Location: ../login.php");
        exit();
    }
}

// Fungsi cek role admin
function is_admin() {
    return isset($_SESSION['role']) && $_SESSION['role'] === 'admin';
}

// Fungsi logout
function logout() {
    session_unset();
    session_destroy();
    header("Location: ../login.php");
    exit();
}

// Set timezone
date_default_timezone_set('Asia/Jakarta');
?>
