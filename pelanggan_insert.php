<?php
// Memasukkan file koneksi database
include('database_project.php');

// Proses jika form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_pelanggan = $_POST['nama_pelanggan'];
    $no_hp_pelanggan = $_POST['no_hp_pelanggan'];
    $alamat_pelanggan = $_POST['alamat_pelanggan'];

    // Menyimpan data ke database
    $sql = "INSERT INTO pelanggan (nama_pelanggan, no_hp_pelanggan, alamat_pelanggan) 
            VALUES ('$nama_pelanggan', '$no_hp_pelanggan', '$alamat_pelanggan')";

    if ($conn->query($sql) === TRUE) {
        // Mengalihkan setelah berhasil menambahkan
        header("Location: pelanggan.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Menutup koneksi
$conn->close();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pelanggan - Azzam Furniture</title>
</head>
<body>

<h2 style="text-align: center;">Tambah Pelanggan</h2>

<form method="POST" style="text-align: center;">
    <table style="margin: 0 auto;">
        <tr>
            <td>Nama Pelanggan:</td>
            <td><input type="text" name="nama_pelanggan" required></td>
        </tr>
        <tr>
            <td>No HP Pelanggan:</td>
            <td><input type="text" name="no_hp_pelanggan" required></td>
        </tr>
        <tr>
            <td>Alamat Pelanggan:</td>
            <td><input type="text" name="alamat_pelanggan" required></td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center;">
                <input type="submit" value="Tambah Pelanggan">
            </td>
        </tr>
    </table>
</form>

</body>
</html>
