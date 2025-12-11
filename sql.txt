CREATE DATABASE db_laundry_crafty;
USE db_laundry_crafty;

-- user login
CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL,
  nama VARCHAR(100) NOT NULL
);

-- contoh user: admin / admin123 (password di-hash PHP, lihat di bawah)
INSERT INTO users(username,password,nama)
VALUES ('admin', '$2y$10$W/3JvV1Se1PZpW95e9vErOHXKqBmR2hD0JfhX7kKGBG5wK7QE/2Zu', 'Administrator');
-- hash di atas = password "admin123"

-- tabel laundry
CREATE TABLE laundry (
  id INT AUTO_INCREMENT PRIMARY KEY,
  kode VARCHAR(20) NOT NULL,
  nama_pelanggan VARCHAR(100) NOT NULL,
  tanggal_masuk DATE NOT NULL,
  tanggal_keluar DATE DEFAULT NULL,
  berat_kg DECIMAL(6,2) NOT NULL,
  harga_per_kg INT NOT NULL,
  total INT NOT NULL,
  status ENUM('MASUK','KELUAR') NOT NULL DEFAULT 'MASUK'
);
