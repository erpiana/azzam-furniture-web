<?php
// Memasukkan file koneksi database
include('database_project.php');

// Mengambil data pelanggan
$sql = "SELECT * FROM pelanggan"; // Pastikan tabel pelanggan ada di database Anda
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pelanggan - Azzam Furniture</title>
    <link rel="stylesheet" href="style.css"> <!-- Menghubungkan file CSS -->
</head>
<body>

<header>
    <h1>Pelanggan - Azzam Furniture</h1>
</header>

<nav>
    <a href="index.php">Kembali ke Home</a>
</nav>

<h2>Daftar Pelanggan</h2>

<!-- Tombol Insert -->
<a href="pelanggan_insert.php" class="button">Tambah Pelanggan</a>

<!-- Tabel Menampilkan Data Pelanggan -->
<table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>ID Pelanggan</th>
            <th>Nama Pelanggan</th>
            <th>No HP Pelanggan</th>
            <th>Alamat Pelanggan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id_pelanggan']; ?></td>
                <td><?php echo $row['nama_pelanggan']; ?></td>
                <td><?php echo $row['no_hp_pelanggan']; ?></td>
                <td><?php echo $row['alamat_pelanggan']; ?></td>
                <td>
                    <!-- Tombol Edit -->
                    <a href="pelanggan_edit.php?id=<?php echo $row['id_pelanggan']; ?>" class="button">Edit</a>
                    <!-- Tombol Delete -->
                    <a href="pelanggan_delete.php?id=<?php echo $row['id_pelanggan']; ?>" class="button" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</a>
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
