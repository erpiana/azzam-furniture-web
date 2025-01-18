<?php
// Memasukkan file koneksi database
include('database_project.php');

// Mengambil data vendor
$sql = "SELECT * FROM vendor"; // Pastikan tabel vendor ada di database Anda
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendor - Azzam Furniture</title>
    <link rel="stylesheet" href="style.css"> <!-- Menghubungkan file CSS -->
</head>
<body>

<header>
    <h1>Vendor - Azzam Furniture</h1>
</header>

<nav>
    <a href="index.php">Kembali ke Home</a>
</nav>

<h2>Daftar Vendor</h2>

<!-- Tombol Insert -->
<a href="vendor_insert.php" class="button">Tambah Vendor</a>

<!-- Tabel Menampilkan Data Vendor -->
<table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>ID Vendor</th>
            <th>Nama Vendor</th>
            <th>No Telepon</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id_vendor']; ?></td>
                <td><?php echo $row['nama_vendor']; ?></td>
                <td><?php echo $row['no_telp_vendor']; ?></td>
                <td><?php echo $row['alamat_vendor']; ?></td>
                <td>
                    <!-- Tombol Edit -->
                    <a href="vendor_edit.php?id=<?php echo $row['id_vendor']; ?>" class="button">Edit</a>
                    <!-- Tombol Delete -->
                    <a href="vendor_delete.php?id=<?php echo $row['id_vendor']; ?>" class="button" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</a>
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
