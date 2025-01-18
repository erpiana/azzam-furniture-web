<?php
// Memasukkan file koneksi database
include('database_project.php');

// Mengambil data sales
$sql = "SELECT * FROM sales"; // Pastikan tabel sales ada di database Anda
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales - Azzam Furniture</title>
    <link rel="stylesheet" href="style.css"> <!-- Menghubungkan file CSS -->
</head>
<body>

<header>
    <h1>Sales - Azzam Furniture</h1>
</header>

<nav>
    <a href="index.php">Kembali ke Home</a>
</nav>

<h2>Daftar Sales</h2>

<!-- Tombol Insert -->
<a href="sales_insert.php" class="button">Tambah Sales</a>

<!-- Tabel Menampilkan Data Sales -->
<table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>ID Sales</th>
            <th>Nama Sales</th>
            <th>No. HP Sales</th>
            <th>Fax Sales</th>
            <th>ID Wilayah</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id_sales']; ?></td>
                <td><?php echo $row['nama_sales']; ?></td>
                <td><?php echo $row['no_hp_sales']; ?></td>
                <td><?php echo $row['fax_sales']; ?></td>
                <td><?php echo $row['id_wilayah']; ?></td>
                <td>
                    <!-- Tombol Edit -->
                    <a href="sales_edit.php?id=<?php echo $row['id_sales']; ?>" class="button">Edit</a>
                    <!-- Tombol Delete -->
                    <a href="sales_delete.php?id=<?php echo $row['id_sales']; ?>" class="button" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</a>
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
