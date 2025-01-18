<?php
// Memasukkan file koneksi database
include('database_project.php');

// Proses jika form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_wilayah = $_POST['nama_wilayah'];

    // Menyimpan data ke database
    $sql = "INSERT INTO wilayah_penjualan (nama_wilayah) VALUES ('$nama_wilayah')";

    if ($conn->query($sql) === TRUE) {
        // Mengalihkan setelah berhasil menambahkan
        header("Location: wilayah_penjualan.php");
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
    <title>Tambah Wilayah Penjualan - Azzam Furniture</title>
</head>
<body>

<h2 style="text-align: center;">Tambah Wilayah Penjualan</h2>

<form method="POST" style="text-align: center;">
    <table style="margin: 0 auto;">
        <tr>
            <td>Nama Wilayah:</td>
            <td><input type="text" name="nama_wilayah" required></td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center;">
                <input type="submit" value="Tambah Wilayah">
            </td>
        </tr>
    </table>
</form>

</body>
</html>
