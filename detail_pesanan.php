<?php
// Memasukkan file koneksi database
include('database_project.php');

// Mengambil data dari view z_detail_pesanan
$sql = "SELECT * FROM z_detail_pesanan"; // Mengambil data dari view
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pesanan - Azzam Furniture</title>
    <link rel="stylesheet" href="style.css"> <!-- Menghubungkan file CSS -->
</head>
<body>

<header>
    <h1>Detail Pesanan - Azzam Furniture</h1>
</header>

<nav>
    <a href="index.php">Kembali ke Home</a>
</nav>

<h2>Daftar Detail Pesanan</h2>

<!-- Tabel Menampilkan Data Pesanan -->
<table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>ID Pesanan</th>
            <th>Tanggal Pemesanan</th>
            <th>Nama Pelanggan</th>
            <th>Nama Kategori Produk</th>
            <th>Deskripsi Produk</th>
            <th>Jumlah Pesanan</th>
        </tr>
    </thead>
    <tbody>
        <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id_pesanan']; ?></td>
                <td><?php echo $row['tanggal_pemesanan']; ?></td>
                <td><?php echo $row['nama_pelanggan']; ?></td>
                <td><?php echo $row['nama_kategori_produk']; ?></td>
                <td><?php echo $row['deskripsi_produk']; ?></td>
                <td><?php echo $row['jumlah_pesanan_produk']; ?></td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>

</body>
</html>

<?php
// Menutup koneksi
$conn->close();
?>
