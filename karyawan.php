<?php
// Memasukkan file koneksi database
include('database_project.php');

// Query untuk mengambil data karyawan
$query = "SELECT id_karyawan, nama_karyawan, no_hp_karyawan, alamat_karyawan 
          FROM karyawan";

$result = $conn->query($query);

// Validasi query
if (!$result) {
    die("Error dalam query: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Karyawan - Azzam Furniture</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <h1>Data Karyawan - Azzam Furniture</h1>
</header>

<nav>
    <a href="index.php">Kembali ke Home</a>
</nav>

<h2>Daftar Karyawan</h2>

<!-- Tombol Insert -->
<a href="karyawan_insert.php" class="button">Tambah Karyawan</a>

<!-- Tabel Menampilkan Data Karyawan -->
<table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>ID Karyawan</th>
            <th>Nama Karyawan</th>
            <th>No HP</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id_karyawan']; ?></td>
                <td><?php echo $row['nama_karyawan']; ?></td>
                <td><?php echo $row['no_hp_karyawan']; ?></td>
                <td><?php echo $row['alamat_karyawan']; ?></td>
                <td>
                    <a href="karyawan_edit.php?id=<?php echo $row['id_karyawan']; ?>" class="button">Edit</a>
                    <a href="karyawan_delete.php?id=<?php echo $row['id_karyawan']; ?>" class="button" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>

</body>
</html>

<?php
$conn->close();
?>
