<?php
// Memasukkan file koneksi database
include('database_project.php');

// Mengambil data wilayah penjualan
$sql = "SELECT * FROM wilayah_penjualan"; // Pastikan tabel wilayah_penjualan ada di database Anda
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wilayah Penjualan - Azzam Furniture</title>
    <link rel="stylesheet" href="style.css"> <!-- Menghubungkan file CSS -->
</head>
<body>

<header>
    <h1>Wilayah Penjualan - Azzam Furniture</h1>
</header>

<nav>
    <a href="index.php">Kembali ke Home</a>
</nav>

<h2>Daftar Wilayah Penjualan</h2>

<!-- Tombol Insert -->
<a href="wilayah_penjualan_insert.php" class="button">Tambah Wilayah</a>

<!-- Tabel Menampilkan Data Wilayah Penjualan -->
<table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>ID Wilayah</th>
            <th>Nama Wilayah</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id_wilayah']; ?></td>
                <td><?php echo $row['nama_wilayah']; ?></td>
                <td>
                    <!-- Tombol Edit -->
                    <a href="wilayah_penjualan_edit.php?id=<?php echo $row['id_wilayah']; ?>" class="button">Edit</a>
                    <!-- Tombol Delete -->
                    <a href="wilayah_penjualan_delete.php?id=<?php echo $row['id_wilayah']; ?>" class="button" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</a>
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
