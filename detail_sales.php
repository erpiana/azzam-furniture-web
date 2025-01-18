<?php
// Memasukkan file koneksi database
include('database_project.php');

// Mengambil data dari view z_detail_sales
$sql = "SELECT * FROM z_detail_sales"; // Mengambil data dari view
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Sales - Azzam Furniture</title>
    <link rel="stylesheet" href="style.css"> <!-- Menghubungkan file CSS -->
</head>
<body>

<header>
    <h1>Detail Sales - Azzam Furniture</h1>
</header>

<nav>
    <a href="index.php">Kembali ke Home</a>
</nav>

<h2>Daftar Detail Sales</h2>

<!-- Tabel Menampilkan Data Sales -->
<table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>ID Sales</th>
            <th>Nama Sales</th>
            <th>Fax Sales</th>
            <th>Jumlah Gaji</th>
            <th>Bonus</th>
            <th>Kategori Sales</th>
            <th>Lokasi Showroom</th>
            <th>Nama Wilayah</th>
        </tr>
    </thead>
    <tbody>
        <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id_sales']; ?></td>
                <td><?php echo $row['nama_sales']; ?></td>
                <td><?php echo $row['fax_sales']; ?></td>
                <td><?php echo number_format($row['jumlah_gaji'], 2, ',', '.'); ?></td>
                <td><?php echo number_format($row['bonus'], 2, ',', '.'); ?></td>
                <td><?php echo $row['kategori_sales']; ?></td>
                <td><?php echo $row['lokasi_showroom']; ?></td>
                <td><?php echo $row['nama_wilayah']; ?></td>
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
