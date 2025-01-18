<?php
// Memasukkan file koneksi database
include('database_project.php');

// Mengambil data pemasok
$sql = "SELECT * FROM pemasok"; // Pastikan tabel pemasok ada di database Anda
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemasok - Azzam Furniture</title>
    <link rel="stylesheet" href="style.css"> <!-- Menghubungkan file CSS -->
</head>
<body>

<header>
    <h1>Pemasok - Azzam Furniture</h1>
</header>

<nav>
    <a href="index.php">Kembali ke Home</a>
</nav>

<h2>Daftar Pemasok</h2>

<!-- Tombol Insert -->
<a href="pemasok_insert.php" class="button">Tambah Pemasok</a>

<!-- Tabel Menampilkan Data Pemasok -->
<table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>ID Pemasok</th>
            <th>Tanggal Pemasokan</th>
            <th>Harga Bahan</th>
            <th>Ketersediaan</th>
            <th>ID Bahan</th>
            <th>ID Vendor</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id_pemasok']; ?></td>
                <td><?php echo $row['tgl_pemasokan']; ?></td>
                <td><?php echo number_format($row['harga_bahan'], 2, ',', '.'); ?></td>
                <td><?php echo $row['ketersediaan']; ?></td>
                <td><?php echo $row['id_bahan']; ?></td>
                <td><?php echo $row['id_vendor']; ?></td>
                <td>
                    <!-- Tombol Edit -->
                    <a href="pemasok_edit.php?id=<?php echo $row['id_pemasok']; ?>" class="button">Edit</a>
                    <!-- Tombol Delete -->
                    <a href="pemasok_delete.php?id=<?php echo $row['id_pemasok']; ?>" class="button" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</a>
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
