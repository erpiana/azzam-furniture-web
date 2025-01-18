<?php
// Memasukkan file koneksi database
include('database_project.php');

// Mengambil data workshop
$sql = "SELECT * FROM workshop"; // Pastikan tabel workshop ada di database Anda
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Workshop - Azzam Furniture</title>
    <link rel="stylesheet" href="style.css"> <!-- Menghubungkan file CSS -->
</head>
<body>

<header>
    <h1>Workshop - Azzam Furniture</h1>
</header>

<nav>
    <a href="index.php">Kembali ke Home</a>
</nav>

<h2>Daftar Workshop</h2>

<!-- Tombol Insert -->
<a href="workshop_insert.php" class="button">Tambah Workshop</a>

<!-- Tabel Menampilkan Data Workshop -->
<table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>ID Workshop</th>
            <th>Lokasi Workshop</th>
            <th>No HP Workshop</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id_workshop']; ?></td>
                <td><?php echo $row['lokasi_workshop']; ?></td>
                <td><?php echo $row['no_hp_workshop']; ?></td>
                <td>
                    <!-- Tombol Edit -->
                    <a href="workshop_edit.php?id=<?php echo $row['id_workshop']; ?>" class="button">Edit</a>
                    <!-- Tombol Delete -->
                    <a href="workshop_delete.php?id=<?php echo $row['id_workshop']; ?>" class="button" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</a>
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
