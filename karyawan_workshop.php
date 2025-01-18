<?php
// Memasukkan file koneksi database
include('database_project.php');

// Mengambil data karyawan workshop
$sql = "SELECT * FROM karyawan_workshop"; // Pastikan tabel karyawan_workshop ada di database Anda
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Karyawan Workshop - Azzam Furniture</title>
    <link rel="stylesheet" href="style.css"> <!-- Menghubungkan file CSS -->
</head>
<body>

<header>
    <h1>Karyawan Workshop - Azzam Furniture</h1>
</header>

<nav>
    <a href="index.php">Kembali ke Home</a>
</nav>

<h2>Daftar Karyawan Workshop</h2>

<!-- Tombol Insert -->
<a href="karyawan_workshop_insert.php" class="button">Tambah Karyawan Workshop</a>

<!-- Tabel Menampilkan Data Karyawan Workshop -->
<table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>ID Karyawan Workshop</th>
            <th>Tanggal Bergabung</th>
            <th>Status</th>
            <th>ID Workshop</th>
            <th>ID Karyawan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id_karyawan_workshop']; ?></td>
                <td><?php echo $row['tanggal_bergabung']; ?></td>
                <td><?php echo $row['status']; ?></td>
                <td><?php echo $row['id_workshop']; ?></td>
                <td><?php echo $row['id_karyawan']; ?></td>
                <td>
                    <!-- Tombol Edit -->
                    <a href="karyawan_workshop_edit.php?id=<?php echo $row['id_karyawan_workshop']; ?>" class="button">Edit</a>
                    <!-- Tombol Delete -->
                    <a href="karyawan_workshop_delete.php?id=<?php echo $row['id_karyawan_workshop']; ?>" class="button" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</a>
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
