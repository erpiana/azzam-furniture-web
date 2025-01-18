<?php
// Memasukkan file koneksi database
include('database_project.php');

// Proses jika form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_bahan = $_POST['nama_bahan'];
    $satuan_ukur = $_POST['satuan_ukur'];
    $harga_unit = $_POST['harga_unit'];

    // Menyimpan data ke database
    $sql = "INSERT INTO bahan_baku (nama_bahan, satuan_ukur, harga_unit) 
            VALUES ('$nama_bahan', '$satuan_ukur', '$harga_unit')";

    if ($conn->query($sql) === TRUE) {
        // Mengalihkan setelah berhasil menambahkan
        header("Location: bahan_baku.php");
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
    <title>Tambah Bahan Baku - Azzam Furniture</title>
</head>
<body>

<h2 style="text-align: center;">Tambah Bahan Baku</h2>

<form method="POST" style="text-align: center;">
    <table style="margin: 0 auto;">
        <tr>
            <td>Nama Bahan:</td>
            <td><input type="text" name="nama_bahan" required></td>
        </tr>
        <tr>
            <td>Satuan Ukur:</td>
            <td><input type="text" name="satuan_ukur" required></td>
        </tr>
        <tr>
            <td>Harga Unit:</td>
            <td><input type="number" name="harga_unit" required></td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center;">
                <input type="submit" value="Tambah Bahan Baku">
            </td>
        </tr>
    </table>
</form>

</body>
</html>
