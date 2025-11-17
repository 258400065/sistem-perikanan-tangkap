-- Database: perikanan_tangkap
-- Sistem Informasi Perikanan Tangkap - Dinas Perikanan Gresik

CREATE DATABASE IF NOT EXISTS perikanan_tangkap;
USE perikanan_tangkap;

-- Tabel Users (Admin/Pegawai)
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    nama_lengkap VARCHAR(100) NOT NULL,
    email VARCHAR(100),
    role ENUM('admin', 'pegawai') DEFAULT 'pegawai',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Tabel Data BBM
CREATE TABLE bbm_data (
    id INT AUTO_INCREMENT PRIMARY KEY,
    jenis_bbm VARCHAR(50) NOT NULL,
    jumlah DECIMAL(10,2) NOT NULL,
    satuan VARCHAR(20) NOT NULL,
    harga_per_liter DECIMAL(10,2),
    total_harga DECIMAL(15,2),
    tanggal_entry DATE NOT NULL,
    keterangan TEXT,
    created_by INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (created_by) REFERENCES users(id)
);

-- Tabel SOP Pengajuan
CREATE TABLE sop (
    id INT AUTO_INCREMENT PRIMARY KEY,
    judul VARCHAR(200) NOT NULL,
    deskripsi TEXT,
    isi_sop TEXT NOT NULL,
    status ENUM('aktif', 'tidak_aktif') DEFAULT 'aktif',
    created_by INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (created_by) REFERENCES users(id)
);

-- Tabel File Upload
CREATE TABLE files (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_file VARCHAR(255) NOT NULL,
    nama_asli VARCHAR(255) NOT NULL,
    jenis_file VARCHAR(50) NOT NULL,
    ukuran_file INT NOT NULL,
    kategori ENUM('pengajuan', 'dokumen', 'lainnya') DEFAULT 'dokumen',
    deskripsi TEXT,
    path_file VARCHAR(500) NOT NULL,
    uploaded_by INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (uploaded_by) REFERENCES users(id)
);

-- Tabel Activity Log
CREATE TABLE activity_log (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    aktivitas VARCHAR(255) NOT NULL,
    keterangan TEXT,
    ip_address VARCHAR(45),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

-- Insert default admin user
-- Username: admin
-- Password: admin123 (harus diganti setelah login pertama)
INSERT INTO users (username, password, nama_lengkap, email, role) VALUES
('admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Administrator', 'admin@gresikkab.go.id', 'admin');
