<?php
// Memasukkan file koneksi database
include('database_project.php');

// Mengambil data kategori produk
$sql = "SELECT * FROM kategori_produk"; // Pastikan tabel kategori_produk ada di database Anda
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategori Produk - Azzam Furniture</title>
    <link rel="stylesheet" href="style.css"> <!-- Menghubungkan file CSS -->
</head>
<body>

<header>
    <h1>Kategori Produk - Azzam Furniture</h1>
</header>

<nav>
    <a href="index.php">Kembali ke Home</a>
</nav>

<h2>Daftar Kategori Produk</h2>

<!-- Tombol Insert -->
<a href="kategori_produk_insert.php" class="button">Tambah Kategori Produk</a>

<!-- Tabel Menampilkan Data Kategori Produk -->
<table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>ID Kategori Produk</th>
            <th>Nama Kategori Produk</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id_kategori_produk']; ?></td>
                <td><?php echo $row['nama_kategori_produk']; ?></td>
                <td>
                    <!-- Tombol Edit -->
                    <a href="kategori_produk_edit.php?id=<?php echo $row['id_kategori_produk']; ?>" class="button">Edit</a>
                    <!-- Tombol Delete -->
                    <a href="kategori_produk_delete.php?id=<?php echo $row['id_kategori_produk']; ?>" class="button" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</a>
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
