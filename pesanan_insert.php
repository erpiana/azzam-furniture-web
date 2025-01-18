<?php
// Memasukkan file koneksi database
include('database_project.php');

// Proses jika form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tanggal_pemesanan = $_POST['tanggal_pemesanan'];
    $id_pelanggan = $_POST['id_pelanggan'];

    // Menyimpan data ke database
    $sql = "INSERT INTO pesanan (tanggal_pemesanan, id_pelanggan) 
            VALUES ('$tanggal_pemesanan', '$id_pelanggan')";

    if ($conn->query($sql) === TRUE) {
        // Mengalihkan setelah berhasil menambahkan
        header("Location: pesanan.php");
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
    <title>Tambah Pesanan - Azzam Furniture</title>
</head>
<body>

<h2 style="text-align: center;">Tambah Pesanan</h2>

<form method="POST" style="text-align: center;">
    <table style="margin: 0 auto;">
        <tr>
            <td>Tanggal Pemesanan:</td>
            <td><input type="date" name="tanggal_pemesanan" required></td>
        </tr>
        <tr>
            <td>ID Pelanggan:</td>
            <td><input type="number" name="id_pelanggan" required></td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center;">
                <input type="submit" value="Tambah Pesanan">
            </td>
        </tr>
    </table>
</form>

</body>
</html>
