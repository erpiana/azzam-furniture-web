<?php
// Memasukkan file koneksi database
include('database_project.php');

// Proses jika form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tgl_pengolahan = $_POST['tgl_pengolahan'];
    $status = $_POST['status'];
    $id_produk = $_POST['id_produk'];
    $id_workshop = $_POST['id_workshop'];

    // Menyimpan data ke database
    $sql = "INSERT INTO produk_workshop (tgl_pengolahan, status, id_produk, id_workshop) 
            VALUES ('$tgl_pengolahan', '$status', '$id_produk', '$id_workshop')";

    if ($conn->query($sql) === TRUE) {
        // Mengalihkan setelah berhasil menambahkan
        header("Location: produk_workshop.php");
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
    <title>Tambah Produk Workshop - Azzam Furniture</title>
</head>
<body>

<h2 style="text-align: center;">Tambah Produk Workshop</h2>

<form method="POST" style="text-align: center;">
    <table style="margin: 0 auto;">
        <tr>
            <td>Tanggal Pengolahan:</td>
            <td><input type="date" name="tgl_pengolahan" required></td>
        </tr>
        <tr>
            <td>Status:</td>
            <td>
                <select name="status" required>
                    <option value="proses">Proses</option>
                    <option value="selesai">Selesai</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>ID Produk:</td>
            <td><input type="number" name="id_produk" required></td>
        </tr>
        <tr>
            <td>ID Workshop:</td>
            <td><input type="number" name="id_workshop" required></td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center;">
                <input type="submit" value="Tambah Produk Workshop">
            </td>
        </tr>
    </table>
</form>

</body>
</html>
