<?php
// Memasukkan file koneksi database
include('database_project.php');

// Mengambil data showroom
$sql = "SELECT * FROM showroom"; // Pastikan tabel showroom ada di database Anda
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Showroom - Azzam Furniture</title>
    <link rel="stylesheet" href="style.css"> <!-- Menghubungkan file CSS -->
</head>
<body>

<header>
    <h1>Showroom - Azzam Furniture</h1>
</header>

<nav>
    <a href="index.php">Kembali ke Home</a>
</nav>

<h2>Daftar Showroom</h2>

<!-- Tombol Insert -->
<a href="showroom_insert.php" class="button">Tambah Showroom</a>

<!-- Tabel Menampilkan Data Showroom -->
<table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>ID Showroom</th>
            <th>Lokasi Showroom</th>
            <th>ID Wilayah</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id_showroom']; ?></td>
                <td><?php echo $row['lokasi_showroom']; ?></td>
                <td><?php echo $row['id_wilayah']; ?></td>
                <td>
                    <!-- Tombol Edit -->
                    <a href="showroom_edit.php?id=<?php echo $row['id_showroom']; ?>" class="button">Edit</a>
                    <!-- Tombol Delete -->
                    <a href="showroom_delete.php?id=<?php echo $row['id_showroom']; ?>" class="button" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</a>
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
