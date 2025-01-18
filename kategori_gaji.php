<?php
// Memasukkan file koneksi database
include('database_project.php');

// Mengambil data kategori gaji
$sql = "SELECT * FROM kategori_gaji"; // Pastikan tabel kategori_gaji ada di database Anda
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategori Gaji - Azzam Furniture</title>
    <link rel="stylesheet" href="style.css"> <!-- Menghubungkan file CSS -->
</head>
<body>

<header>
    <h1>Kategori Gaji - Azzam Furniture</h1>
</header>

<nav>
    <a href="index.php">Kembali ke Home</a>
</nav>

<h2>Daftar Kategori Gaji</h2>

<!-- Tabel Menampilkan Data Kategori Gaji -->
<table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>ID Kategori Gaji</th>
            <th>Kategori Sales</th>
        </tr>
    </thead>
    <tbody>
        <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id_kategori_gaji']; ?></td>
                <td><?php echo $row['kategori_sales']; ?></td>
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
