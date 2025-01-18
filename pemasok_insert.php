<?php
// Memasukkan file koneksi database
include('database_project.php');

// Proses jika form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tgl_pemasok = $_POST['tgl_pemasokan'];
    $harga_bahan = $_POST['harga_bahan'];
    $ketersediaan = $_POST['ketersediaan'];
    $id_bahan = $_POST['id_bahan'];
    $id_vendor = $_POST['id_vendor'];

    // Menyimpan data ke database
    $sql = "INSERT INTO pemasok (tgl_pemasokan, harga_bahan, ketersediaan, id_bahan, id_vendor) 
            VALUES ('$tgl_pemasokan', '$harga_bahan', '$ketersediaan', '$id_bahan', '$id_vendor')";

    if ($conn->query($sql) === TRUE) {
        // Mengalihkan setelah berhasil menambahkan
        header("Location: pemasok.php");
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
    <title>Tambah Pemasok - Azzam Furniture</title>
</head>
<body>

<h2 style="text-align: center;">Tambah Pemasok</h2>

<form method="POST" style="text-align: center;">
    <table style="margin: 0 auto;">
        <tr>
            <td>Tanggal Pemasok:</td>
            <td><input type="date" name="tgl_pemasokan" required></td>
        </tr>
        <tr>
            <td>Harga Bahan:</td>
            <td><input type="number" name="harga_bahan" required></td>
        </tr>
        <tr>
            <td>Ketersediaan:</td>
            <td><input type="text" name="ketersediaan" required></td>
        </tr>
        <tr>
            <td>ID Bahan:</td>
            <td><input type="number" name="id_bahan" required></td>
        </tr>
        <tr>
            <td>ID Vendor:</td>
            <td><input type="number" name="id_vendor" required></td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center;">
                <input type="submit" value="Tambah Pemasok">
            </td>
        </tr>
    </table>
</form>

</body>
</html>
