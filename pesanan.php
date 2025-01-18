<?php
// Memasukkan file koneksi database
include('database_project.php');

// Mengambil data pesanan
$sql = "SELECT * FROM pesanan"; // Pastikan tabel pesanan ada di database Anda
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesanan - Azzam Furniture</title>
    <link rel="stylesheet" href="style.css"> <!-- Menghubungkan file CSS -->
</head>
<body>

<header>
    <h1>Pesanan - Azzam Furniture</h1>
</header>

<nav>
    <a href="index.php">Kembali ke Home</a>
</nav>

<h2>Daftar Pesanan</h2>

<!-- Tombol Insert -->
<a href="pesanan_insert.php" class="button">Tambah Pesanan</a>

<!-- Tabel Menampilkan Data Pesanan -->
<table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>ID Pesanan</th>
            <th>Tanggal Pemesanan</th>
            <th>ID Pelanggan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id_pesanan']; ?></td>
                <td><?php echo $row['tanggal_pemesanan']; ?></td>
                <td><?php echo $row['id_pelanggan']; ?></td>
                <td>
                    <!-- Tombol Edit -->
                    <a href="pesanan_edit.php?id=<?php echo $row['id_pesanan']; ?>" class="button">Edit</a>
                    <!-- Tombol Delete -->
                    <a href="pesanan_delete.php?id=<?php echo $row['id_pesanan']; ?>" class="button" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</a>
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
