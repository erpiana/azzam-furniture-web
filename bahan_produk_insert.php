<?php
// Memasukkan file koneksi database
include('database_project.php');

// Proses jika form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $jumlah_bahan = $_POST['jumlah_bahan'];
    $harga_bahan = $_POST['harga_bahan'];
    $id_produk = $_POST['id_produk'];
    $id_bahan = $_POST['id_bahan'];

    // Menyimpan data ke database
    $sql = "INSERT INTO bahan_produk (jumlah_bahan, harga_bahan, id_produk, id_bahan) 
            VALUES ('$jumlah_bahan', '$harga_bahan', '$id_produk', '$id_bahan')";

    if ($conn->query($sql) === TRUE) {
        // Mengalihkan setelah berhasil menambahkan
        header("Location: bahan_produk.php");
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
    <title>Tambah Bahan Produk - Azzam Furniture</title>
</head>
<body>

<h2 style="text-align: center;">Tambah Bahan Produk</h2>

<form method="POST" style="text-align: center;">
    <table style="margin: 0 auto;">
        <tr>
            <td>Jumlah Bahan:</td>
            <td><input type="number" name="jumlah_bahan" required></td>
        </tr>
        <tr>
            <td>Harga Bahan:</td>
            <td><input type="number" name="harga_bahan" required></td>
        </tr>
        <tr>
            <td>ID Produk:</td>
            <td><input type="text" name="id_produk" required></td>
        </tr>
        <tr>
            <td>ID Bahan:</td>
            <td><input type="text" name="id_bahan" required></td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center;">
                <input type="submit" value="Tambah Bahan Produk">
            </td>
        </tr>
    </table>
</form>

</body>
</html>
