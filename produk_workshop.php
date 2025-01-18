<?php
// Memasukkan file koneksi database
include('database_project.php');

// Mengambil data produk workshop
$sql = "SELECT * FROM produk_workshop"; // Pastikan tabel produk_workshop ada di database Anda
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk Workshop - Azzam Furniture</title>
    <link rel="stylesheet" href="style.css"> <!-- Menghubungkan file CSS -->
</head>
<body>

<header>
    <h1>Produk Workshop - Azzam Furniture</h1>
</header>

<nav>
    <a href="index.php">Kembali ke Home</a>
</nav>

<h2>Daftar Produk Workshop</h2>

<!-- Tombol Insert -->
<a href="produk_workshop_insert.php" class="button">Tambah Produk Workshop</a>

<!-- Tabel Menampilkan Data Produk Workshop -->
<table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>ID Produk Workshop</th>
            <th>Tanggal Pengolahan</th>
            <th>Status</th>
            <th>ID Produk</th>
            <th>ID Workshop</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id_produk_workshop']; ?></td>
                <td><?php echo $row['tgl_pengolahan']; ?></td>
                <td><?php echo $row['status']; ?></td>
                <td><?php echo $row['id_produk']; ?></td>
                <td><?php echo $row['id_workshop']; ?></td>
                <td>
                    <!-- Tombol Edit -->
                    <a href="produk_workshop_edit.php?id=<?php echo $row['id_produk_workshop']; ?>" class="button">Edit</a>
                    <!-- Tombol Delete -->
                    <a href="produk_workshop_delete.php?id=<?php echo $row['id_produk_workshop']; ?>" class="button" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</a>
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
