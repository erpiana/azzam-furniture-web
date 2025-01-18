<?php
// Memasukkan file koneksi database
include('database_project.php');

// Menangani proses form submit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_karyawan = $_POST['nama_karyawan'];
    $no_hp_karyawan = $_POST['no_hp_karyawan'];
    $alamat_karyawan = $_POST['alamat_karyawan'];

    // Query untuk menyimpan data karyawan ke dalam database
    $sql = "INSERT INTO karyawan (nama_karyawan, no_hp_karyawan, alamat_karyawan) 
            VALUES ('$nama_karyawan', '$no_hp_karyawan', '$alamat_karyawan')";

    if ($conn->query($sql) === TRUE) {
        // Redirect setelah berhasil
        header("Location: karyawan.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Karyawan - Azzam Furniture</title>
</head>
<body>

<h2 style="text-align: center;">Tambah Karyawan</h2>

<form method="POST" style="text-align: center;">
    <table style="margin: 0 auto;">
        <tr>
            <td>Nama Karyawan:</td>
            <td><input type="text" name="nama_karyawan" required></td>
        </tr>
        <tr>
            <td>No HP:</td>
            <td><input type="text" name="no_hp_karyawan" required></td>
        </tr>
        <tr>
            <td>Alamat:</td>
            <td><input type="text" name="alamat_karyawan" required></td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center;">
                <input type="submit" value="Tambah Karyawan">
            </td>
        </tr>
    </table>
</form>

</body>
</html>
