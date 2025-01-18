<?php
// Memasukkan file koneksi database
include('database_project.php');

// Mengambil data keahlian
$sql = "SELECT * FROM keahlian"; // Pastikan tabel keahlian ada di database Anda
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keahlian - Azzam Furniture</title>
    <link rel="stylesheet" href="style.css"> <!-- Menghubungkan file CSS -->
</head>
<body>

<header>
    <h1>Keahlian - Azzam Furniture</h1>
</header>

<nav>
    <a href="index.php">Kembali ke Home</a>
</nav>

<h2>Daftar Keahlian</h2>

<!-- Tombol Insert -->
<a href="keahlian_insert.php" class="button">Tambah Keahlian</a>

<!-- Tabel Menampilkan Data Keahlian -->
<table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>ID Keahlian</th>
            <th>Nama Keahlian</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id_keahlian']; ?></td>
                <td><?php echo $row['nama_keahlian']; ?></td>
                <td>
                    <!-- Tombol Edit -->
                    <a href="keahlian_edit.php?id=<?php echo $row['id_keahlian']; ?>" class="button">Edit</a>
                    <!-- Tombol Delete -->
                    <a href="keahlian_delete.php?id=<?php echo $row['id_keahlian']; ?>" class="button" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</a>
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
