<?php
// Memasukkan file koneksi database
include('database_project.php');

// Proses jika form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $deskripsi_produk = $_POST['deskripsi_produk'];
    $tanggal_produk = $_POST['tanggal_produk'];
    $harga = $_POST['harga'];
    $id_kategori_produk = $_POST['id_kategori_produk'];

    // Menyimpan data ke database
    $sql = "INSERT INTO produk (deskripsi_produk, tanggal_produk, harga, id_kategori_produk) 
            VALUES ('$deskripsi_produk', '$tanggal_produk', '$harga', '$id_kategori_produk')";

    if ($conn->query($sql) === TRUE) {
        // Mengalihkan setelah berhasil menambahkan
        header("Location: produk.php");
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
    <title>Tambah Produk - Azzam Furniture</title>
</head>
<body>

<h2 style="text-align: center;">Tambah Produk</h2>

<form method="POST" style="text-align: center;">
    <table style="margin: 0 auto;">
        <tr>
            <td>Deskripsi Produk:</td>
            <td><input type="text" name="deskripsi_produk" required></td>
        </tr>
        <tr>
            <td>Tanggal Produk:</td>
            <td><input type="date" name="tanggal_produk" required></td>
        </tr>
        <tr>
            <td>Harga:</td>
            <td><input type="number" name="harga" required></td>
        </tr>
        <tr>
            <td>ID Kategori Produk:</td>
            <td><input type="text" name="id_kategori_produk" required></td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center;">
                <input type="submit" value="Tambah Produk">
            </td>
        </tr>
    </table>
</form>

</body>
</html>
