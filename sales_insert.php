<?php
// Memasukkan file koneksi database
include('database_project.php');

// Proses jika form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_sales = $_POST['nama_sales'];
    $no_hp_sales = $_POST['no_hp_sales'];
    $fax_sales = $_POST['fax_sales'];
    $id_wilayah = $_POST['id_wilayah'];

    // Menyimpan data ke database
    $sql = "INSERT INTO sales (nama_sales, no_hp_sales, fax_sales, id_wilayah) 
            VALUES ('$nama_sales', '$no_hp_sales', '$fax_sales', '$id_wilayah')";

    if ($conn->query($sql) === TRUE) {
        // Mengalihkan setelah berhasil menambahkan
        header("Location: sales.php");
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
    <title>Tambah Sales - Azzam Furniture</title>
</head>
<body>

<h2 style="text-align: center;">Tambah Sales</h2>

<form method="POST" style="text-align: center;">
    <table style="margin: 0 auto;">
        <tr>
            <td>Nama Sales:</td>
            <td><input type="text" name="nama_sales" required></td>
        </tr>
        <tr>
            <td>No. HP Sales:</td>
            <td><input type="text" name="no_hp_sales" required></td>
        </tr>
        <tr>
            <td>Fax Sales:</td>
            <td><input type="text" name="fax_sales" required></td>
        </tr>
        <tr>
            <td>ID Wilayah:</td>
            <td><input type="number" name="id_wilayah" required></td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center;">
                <input type="submit" value="Tambah Sales">
            </td>
        </tr>
    </table>
</form>

</body>
</html>
