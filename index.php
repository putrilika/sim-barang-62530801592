<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}
require 'koneksi.php';

$stmt = $pdo->query("SELECT b.kode, b.nama, k.nama_kategori, b.jumlah, b.kondisi
                     FROM barang b JOIN kategori k ON b.kategori_id = k.id
                     ORDER BY b.id");
$daftar = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIM-Barang</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <header>
        <h1>SIM-Barang</h1>
        <p>Sistem  Informasi Pengelolaan Inventaris Barang Jurusan</p>
    </header>

    <nav>
        <ul>
           <li><a href="index.php">Beranda</a></li>
           <li><a href="#inventaris">Data Barang</a></li>
           <li><a href="#form-barang">Tambah Barang</a></li>
           <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>

    <main>

        <section id="inventaris">
            <h2>Inventaris Barang</h2>
             <input type="text" id="cari" placeholder="Cari barang...">
               <div class="tabel-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Nama Barang</th>
                        <th>Kategori</th>
                        <th>Jumlah</th>
                        <th>Kondisi</th>
                    </tr>
                </thead>
                <tbody id="isi-tabel">
                   <tbody id="isi-tabel">
<?php foreach ($daftar as $row): ?>
    <tr>
        <td><?= htmlspecialchars($row['kode']) ?></td>
        <td><?= htmlspecialchars($row['nama']) ?></td>
        <td><?= htmlspecialchars($row['nama_kategori']) ?></td>
        <td><?= htmlspecialchars($row['jumlah']) ?></td>
        <td><?= htmlspecialchars($row['kondisi']) ?></td>
    </tr>
<?php endforeach; ?>
</tbody>
            </table>
            </div>
        </section>

        <section id="form-barang">
            <h2>Formulir Input Barang</h2>
            <form id="form-barang-input" action="simpan.php" method="post" novalidate>
                <p>
                    <label for="kode">Kode Barang</label><br>
                    <input type="text" id="kode" name="kode" placeholder="Contoh: BRG-006" required>
                    <small class="error" id="error-kode"></small>
                </p>
                <p>
                    <label for="nama">Nama Barang</label><br>
                    <input type="text" id="nama" name="nama" placeholder="Contoh: Printer Canon" required>
                </p>
                <p>
                    <label for="kategori">Kategori</label><br>
                    <select id="kategori" name="kategori" required>
                        <option value="">-- Pilih kategori --</option>
                        <option value="Elektronik">Elektronik</option>
                        <option value="Furnitur">Furnitur</option>
                        <option value="Alat Tulis">Alat Tulis</option>
                    </select>
                </p>
                <p>
                    <label for="jumlah">Jumlah</label><br>
                    <input type="number" id="jumlah" name="jumlah" min="1" placeholder="Contoh: 10" required>
                    <small class="error" id="error-jumlah"></small>
                </p>
                <p>
    <label for="harga">Harga Satuan (Rp)</label><br>
    <input type="number" id="harga" name="harga" min="1" placeholder="Contoh: 150000" required>
                <p>
                    <label for="kondisi">Kondisi</label><br>
                    <select id="kondisi" name="kondisi" required>
                        <option value="">-- Pilih kondisi --</option>
                        <option value="Baik">Baik</option>
                        <option value="Rusak Ringan">Rusak Ringan</option>
                        <option value="Rusak Berat">Rusak Berat</option>
                    </select>
                </p>
                <button type="submit">Simpan Barang</button>
            </form>
        </section>

    </main>

    <footer>
        <p>&copy; 2026 SIM-Barang | Putri Alika Sari | 062530801592 | 3IB</p>
    </footer>
    <div id="toast" ></div>
    <script src="main.js"></script>
</body>
</html>