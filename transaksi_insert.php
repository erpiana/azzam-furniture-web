<?php
// Memasukkan file koneksi database
include('database_project.php');

// Proses jika form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tgl_transaksi = $_POST['tgl_transaksi'];
    $status_transaksi = $_POST['status_transaksi'];
    $id_showroom = $_POST['id_showroom'];
    $id_pelanggan = $_POST['id_pelanggan'];

    // Menyimpan data ke database
    $sql = "INSERT INTO transaksi (tgl_transaksi, status_transaksi, id_showroom, id_pelanggan) 
            VALUES ('$tgl_transaksi', '$status_transaksi', '$id_showroom', '$id_pelanggan')";

    if ($conn->query($sql) === TRUE) {
        // Mengalihkan setelah berhasil menambahkan
        header("Location: transaksi.php");
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
    <title>Tambah Transaksi - Azzam Furniture</title>
</head>
<body>

<h2 style="text-align: center;">Tambah Transaksi</h2>

<form method="POST" style="text-align: center;">
    <table style="margin: 0 auto;">
        <tr>
            <td>Tanggal Transaksi:</td>
            <td><input type="date" name="tgl_transaksi" required></td>
        </tr>
        <tr>
            <td>Status Transaksi:</td>
            <td>
                <select name="status_transaksi" required>
                    <option value="berhasil">Berhasil</option>
                    <option value="gagal">Gagal</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>ID Showroom:</td>
            <td><input type="number" name="id_showroom" required></td>
        </tr>
        <tr>
            <td>ID Pelanggan:</td>
            <td><input type="number" name="id_pelanggan" required></td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center;">
                <input type="submit" value="Tambah Transaksi">
            </td>
        </tr>
    </table>
</form>

</body>
</html>
