<?php
// Memasukkan file koneksi database
include('database_project.php');

// Mengambil data bahan_produk
$sql = "SELECT * FROM bahan_produk"; // Pastikan tabel bahan_produk ada di database Anda
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bahan Produk - Azzam Furniture</title>
    <link rel="stylesheet" href="style.css"> 
</head>
<body>

<header>
    <h1>Bahan Produk - Azzam Furniture</h1>
</header>

<nav>
    <a href="index.php">Kembali ke Home</a>
</nav>

<h2>Daftar Bahan Produk</h2>

<!-- Tombol Insert -->
<a href="bahan_produk_insert.php" class="button">Tambah Bahan Produk</a>

<!-- Tabel Menampilkan Data Bahan Produk -->
<table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>ID Bahan Produk</th>
            <th>Jumlah Bahan</th>
            <th>Harga Bahan</th>
            <th>ID Produk</th>
            <th>ID Bahan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id_bahan_produk']; ?></td>
                <td><?php echo $row['jumlah_bahan']; ?></td>
                <td><?php echo number_format($row['harga_bahan'], 2, ',', '.'); ?></td>
                <td><?php echo $row['id_produk']; ?></td>
                <td><?php echo $row['id_bahan']; ?></td>
                <td>
                    <!-- Tombol Edit -->
                    <a href="bahan_produk_edit.php?id=<?php echo $row['id_bahan_produk']; ?>" class="button">Edit</a>
                    <!-- Tombol Delete -->
                    <a href="bahan_produk_delete.php?id=<?php echo $row['id_bahan_produk']; ?>" class="button" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</a>
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
