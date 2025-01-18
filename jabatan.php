<?php
// Memasukkan file koneksi database
include('database_project.php');

// Mengambil data jabatan
$sql = "SELECT * FROM jabatan"; // Pastikan tabel jabatan ada di database Anda
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jabatan - Azzam Furniture</title>
    <link rel="stylesheet" href="style.css"> 
</head>
<body>

<header>
    <h1>Jabatan - Azzam Furniture</h1>
</header>

<nav>
    <a href="index.php">Kembali ke Home</a>
</nav>

<h2>Daftar Jabatan</h2>

<!-- Tabel Menampilkan Data Jabatan -->
<table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>ID Jabatan</th>
            <th>Jabatan</th>
        </tr>
    </thead>
    <tbody>
        <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id_jabatan']; ?></td>
                <td><?php echo $row['jabatan']; ?></td>
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
