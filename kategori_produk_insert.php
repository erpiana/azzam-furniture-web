<?php
// Memasukkan file koneksi database
include('database_project.php');

// Proses jika form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_kategori_produk = $_POST['nama_kategori_produk'];

    // Menyimpan data ke database
    $sql = "INSERT INTO kategori_produk (nama_kategori_produk) 
            VALUES ('$nama_kategori_produk')";

    if ($conn->query($sql) === TRUE) {
        // Mengalihkan setelah berhasil menambahkan
        header("Location: kategori_produk.php");
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
    <title>Tambah Kategori Produk - Azzam Furniture</title>
</head>
<body>

<h2 style="text-align: center;">Tambah Kategori Produk</h2>

<form method="POST" style="text-align: center;">
    <table style="margin: 0 auto;">
        <tr>
            <td>Nama Kategori Produk:</td>
            <td><input type="text" name="nama_kategori_produk" required></td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center;">
                <input type="submit" value="Tambah Kategori Produk">
            </td>
        </tr>
    </table>
</form>

</body>
</html>
