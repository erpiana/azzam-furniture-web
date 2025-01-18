<?php
// Memasukkan file koneksi database
include('database_project.php');

// Mengambil data pesanan_produk
$sql = "SELECT * FROM pesanan_produk"; // Pastikan tabel pesanan_produk ada di database Anda
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesanan Produk - Azzam Furniture</title>
    <link rel="stylesheet" href="style.css"> <!-- Menghubungkan file CSS -->
</head>
<body>

<header>
    <h1>Pesanan Produk - Azzam Furniture</h1>
</header>

<nav>
    <a href="index.php">Kembali ke Home</a>
</nav>

<h2>Daftar Pesanan Produk</h2>

<!-- Tombol Insert -->
<a href="pesanan_produk_insert.php" class="button">Tambah Pesanan Produk</a>

<!-- Tabel Menampilkan Data Pesanan Produk -->
<table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>ID Pesanan Produk</th>
            <th>Jumlah Pesanan</th>
            <th>Harga Total</th>
            <th>ID Produk</th>
            <th>ID Pesanan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id_pesanan_produk']; ?></td>
                <td><?php echo $row['jumlah_pesanan_produk']; ?></td>
                <td><?php echo number_format($row['harga_total'], 2, ',', '.'); ?></td>
                <td><?php echo $row['id_produk']; ?></td>
                <td><?php echo $row['id_pesanan']; ?></td>
                <td>
                    <!-- Tombol Edit -->
                    <a href="pesanan_produk_edit.php?id=<?php echo $row['id_pesanan_produk']; ?>" class="button">Edit</a>
                    <!-- Tombol Delete -->
                    <a href="pesanan_produk_delete.php?id=<?php echo $row['id_pesanan_produk']; ?>" class="button" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</a>
                </td>
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