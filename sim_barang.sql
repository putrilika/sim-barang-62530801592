CREATE DATABASE IF NOT EXISTS sim_barang;
USE sim_barang;

DROP TABLE IF EXISTS barang;
DROP TABLE IF EXISTS kategori;
DROP TABLE IF EXISTS users;

CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL
);

CREATE TABLE kategori (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nama_kategori VARCHAR(50) NOT NULL
);

CREATE TABLE barang (
  id INT AUTO_INCREMENT PRIMARY KEY,
  kode VARCHAR(20) NOT NULL UNIQUE,
  nama VARCHAR(100) NOT NULL,
  kategori_id INT NOT NULL,
  jumlah INT NOT NULL,
  harga DECIMAL(12,2) NOT NULL DEFAULT 0,
  kondisi VARCHAR(20) NOT NULL,
  FOREIGN KEY (kategori_id) REFERENCES kategori(id)
);

INSERT INTO users (username, password) VALUES
('admin', 'password123');

INSERT INTO kategori (nama_kategori) VALUES
('Elektronik'), ('Furnitur'), ('Alat Tulis');

INSERT INTO barang (kode, nama, kategori_id, jumlah, harga, kondisi) VALUES
('BRG-001', 'HP Samsung', 1, 20, 2000000, 'Baik'),
('BRG-002', 'Proyektor BenQ', 1, 5, 5000000, 'Baik'),
('BRG-003', 'Kursi Kerja', 2, 40, 500000, 'Rusak Ringan'),
('BRG-004', 'Meja Praktikum', 2, 20, 750000, 'Baik'),
('BRG-005', 'Spidol Whiteboard', 3, 30, 15000, 'Baik');