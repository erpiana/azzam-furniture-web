<?php
// Memasukkan file koneksi database
include('database_project.php');

// Mengambil data bahan baku
$sql = "SELECT * FROM bahan_baku"; // Pastikan tabel bahan_baku ada di database Anda
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bahan Baku - Azzam Furniture</title>
    <link rel="stylesheet" href="style.css"> <!-- Menghubungkan file CSS -->
</head>
<body>

<header>
    <h1>Bahan Baku - Azzam Furniture</h1>
</header>

<nav>
    <a href="index.php">Kembali ke Home</a>
</nav>

<h2>Daftar Bahan Baku</h2>

<!-- Tombol Insert -->
<a href="bahan_baku_insert.php" class="button">Tambah Bahan Baku</a>

<!-- Tabel Menampilkan Data Bahan Baku -->
<table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>ID Bahan</th>
            <th>Nama Bahan</th>
            <th>Satuan Ukur</th>
            <th>Harga Unit</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id_bahan']; ?></td>
                <td><?php echo $row['nama_bahan']; ?></td>
                <td><?php echo $row['satuan_ukur']; ?></td>
                <td><?php echo number_format($row['harga_unit'], 2, ',', '.'); ?></td>
                <td>
                    <!-- Tombol Edit -->
                    <a href="bahan_baku_edit.php?id=<?php echo $row['id_bahan']; ?>" class="button">Edit</a>
                    <!-- Tombol Delete -->
                    <a href="bahan_baku_delete.php?id=<?php echo $row['id_bahan']; ?>" class="button" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</a>
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
