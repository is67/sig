CREATE DATABASE cendol_db;

USE cendol_db;

CREATE TABLE penduduk (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nik VARCHAR(20) NOT NULL,
    nama VARCHAR(100) NOT NULL,
    alamat TEXT NOT NULL,
    rt_rw VARCHAR(10) NOT NULL,
    status_pernikahan ENUM('Belum Menikah', 'Menikah', 'Cerai') NOT NULL
);

CREATE TABLE wilayah (
    id INT AUTO_INCREMENT PRIMARY KEY,
    rt INT NOT NULL,
    rw INT NOT NULL,
    jumlah_jiwa INT NOT NULL,
    jumlah_kk INT NOT NULL,
    koordinat VARCHAR(50) NOT NULL,
    kepadatan ENUM('Padat', 'Ramai', 'Sepi') NOT NULL
);

CREATE TABLE laporan (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nik VARCHAR(20) NOT NULL,
    nama VARCHAR(100) NOT NULL,
    rt INT NOT NULL,
    rw INT NOT NULL,
    desa VARCHAR(100) NOT NULL,
    alamat_asal VARCHAR(255) NOT NULL,
    alamat_tujuan VARCHAR(255) NOT NULL,
    tanggal_perpindahan DATE NOT NULL,
    keterangan TEXT,
    status ENUM('Diproses', 'Selesai', 'Ditolak') DEFAULT 'Diproses',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
); 