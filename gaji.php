<?php
// Memasukkan file koneksi database
include('database_project.php');

// Mengambil data gaji
$sql = "SELECT * FROM gaji"; // Pastikan tabel gaji ada di database Anda
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Gaji - Azzam Furniture</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <h1>Data Gaji - Azzam Furniture</h1>
</header>

<nav>
    <a href="index.php">Kembali ke Home</a>
</nav>

<h2>Daftar Gaji</h2>

<!-- Tombol Insert -->
<a href="gaji_insert.php" class="button">Tambah Data Gaji</a>

<!-- Tabel Menampilkan Data Gaji -->
<table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>ID Gaji</th>
            <th>Jumlah Gaji</th>
            <th>Bonus</th>
            <th>ID Sales</th>
            <th>ID Kategori Gaji</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id_gaji']; ?></td>
                <td><?php echo number_format($row['jumlah_gaji'], 2, ',', '.'); ?></td>
                <td><?php echo number_format($row['bonus'], 2, ',', '.'); ?></td>
                <td><?php echo $row['id_sales']; ?></td>
                <td><?php echo $row['id_kategori_gaji']; ?></td>
                <td>
                    <!-- Tombol Edit -->
                    <a href="gaji_edit.php?id=<?php echo $row['id_gaji']; ?>" class="button">Edit</a>
                    <!-- Tombol Delete -->
                    <a href="gaji_delete.php?id=<?php echo $row['id_gaji']; ?>" class="button" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</a>
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
