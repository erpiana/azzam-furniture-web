<?php
// Memasukkan file koneksi database
include('database_project.php');

// Mengambil data transaksi
$sql = "SELECT * FROM transaksi"; // Pastikan tabel transaksi ada di database Anda
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi - Azzam Furniture</title>
    <link rel="stylesheet" href="style.css"> <!-- Menghubungkan file CSS -->
</head>
<body>

<header>
    <h1>Transaksi - Azzam Furniture</h1>
</header>

<nav>
    <a href="index.php">Kembali ke Home</a>
</nav>

<h2>Daftar Transaksi</h2>

<!-- Tombol Insert -->
<a href="transaksi_insert.php" class="button">Tambah Transaksi</a>

<!-- Tabel Menampilkan Data Transaksi -->
<table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>ID Transaksi</th>
            <th>Tanggal Transaksi</th>
            <th>Status Transaksi</th>
            <th>ID Showroom</th>
            <th>ID Pelanggan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id_transaksi']; ?></td>
                <td><?php echo $row['tgl_transaksi']; ?></td>
                <td><?php echo $row['status_transaksi']; ?></td>
                <td><?php echo $row['id_showroom']; ?></td>
                <td><?php echo $row['id_pelanggan']; ?></td>
                <td>
                    <!-- Tombol Edit -->
                    <a href="transaksi_edit.php?id=<?php echo $row['id_transaksi']; ?>" class="button">Edit</a>
                    <!-- Tombol Delete -->
                    <a href="transaksi_delete.php?id=<?php echo $row['id_transaksi']; ?>" class="button" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</a>
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
