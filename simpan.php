<?php
function hitungTotal($jumlah, $harga)
{
    return $jumlah * $harga;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.html');
    exit;
}

$kode     = htmlspecialchars($_POST['kode'] ?? '');
$nama     = htmlspecialchars($_POST['nama'] ?? '');
$kategori = htmlspecialchars($_POST['kategori'] ?? '');
$kondisi  = htmlspecialchars($_POST['kondisi'] ?? '');
$jumlah   = (int) ($_POST['jumlah'] ?? 0);
$harga    = (float) ($_POST['harga'] ?? 0);
$total    = hitungTotal($jumlah, $harga);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ringkasan Input Barang</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>SIM-Barang</h1>
        <p>Ringkasan Data Barang</p>
    </header>

    <main>
        <section>
            <h2>Data Barang Berhasil Diinput</h2>
            <div class="tabel-wrapper">
                <table>
                    <tr><th>Kode Barang</th><td><?= $kode ?></td></tr>
                    <tr><th>Nama Barang</th><td><?= $nama ?></td></tr>
                    <tr><th>Kategori</th><td><?= $kategori ?></td></tr>
                    <tr><th>Kondisi</th><td><?= $kondisi ?></td></tr>
                    <tr><th>Jumlah</th><td><?= $jumlah ?></td></tr>
                    <tr><th>Harga Satuan</th><td>Rp <?= number_format($harga, 0, ',', '.') ?></td></tr>
                    <tr><th>Total Estimasi Nilai Aset</th><td>Rp <?= number_format($total, 0, ',', '.') ?></td></tr>
                </table>
            </div>
            <p><a href="index.html">&larr; Kembali ke halaman utama</a></p>
        </section>
    </main>

    <footer>
        <p>&copy; 2026 SIM-Barang | Putri Alika Sari | 062530801592 | 3IB</p>
    </footer>
</body>
</html>