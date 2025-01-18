<?php
// Memasukkan file koneksi database
include('database_project.php');

// Mengambil data produk
$sql = "SELECT * FROM produk"; // Pastikan tabel produk ada di database Anda
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk - Azzam Furniture</title>
    <link rel="stylesheet" href="style.css"> <!-- Menghubungkan file CSS -->
</head>
<body>

<header>
    <h1>Produk - Azzam Furniture</h1>
</header>

<nav>
    <a href="index.php">Kembali ke Home</a>
</nav>

<h2>Daftar Produk</h2>

<!-- Tombol Insert -->
<a href="produk_insert.php" class="button">Tambah Produk</a>

<!-- Tabel Menampilkan Data Produk -->
<table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>ID Produk</th>
            <th>Deskripsi Produk</th>
            <th>Tanggal Produk</th>
            <th>Harga</th>
            <th>Kategori Produk</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id_produk']; ?></td>
                <td><?php echo $row['deskripsi_produk']; ?></td>
                <td><?php echo $row['tanggal_produk']; ?></td>
                <td><?php echo number_format($row['harga'], 2, ',', '.'); ?></td>
                <td><?php echo $row['id_kategori_produk']; ?></td>
                <td>
                    <!-- Tombol Edit -->
                    <a href="produk_edit.php?id=<?php echo $row['id_produk']; ?>" class="button">Edit</a>
                    <!-- Tombol Delete -->
                    <a href="produk_delete.php?id=<?php echo $row['id_produk']; ?>" class="button" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</a>
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
