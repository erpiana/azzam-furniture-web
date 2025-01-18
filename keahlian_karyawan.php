<?php
// Memasukkan file koneksi database
include('database_project.php');

// Mengambil data keahlian_karyawan
$sql = "SELECT * FROM keahlian_karyawan"; // Pastikan tabel keahlian_karyawan ada di database Anda
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keahlian Karyawan - Azzam Furniture</title>
    <link rel="stylesheet" href="style.css"> <!-- Menghubungkan file CSS -->
</head>
<body>

<header>
    <h1>Keahlian Karyawan - Azzam Furniture</h1>
</header>

<nav>
    <a href="index.php">Kembali ke Home</a>
</nav>

<h2>Daftar Keahlian Karyawan</h2>

<!-- Tabel Menampilkan Data Keahlian Karyawan -->
<table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>ID Keahlian Karyawan</th>
            <th>ID Karyawan</th>
            <th>ID Keahlian</th>
        </tr>
    </thead>
    <tbody>
        <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id_keahlian_karyawan']; ?></td>
                <td><?php echo $row['id_karyawan']; ?></td>
                <td><?php echo $row['id_keahlian']; ?></td>
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
