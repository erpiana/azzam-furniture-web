<?php
// Memasukkan file koneksi database
include('database_project.php');

// Proses jika form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $jumlah_gaji = $_POST['jumlah_gaji'];
    $bonus = $_POST['bonus'];
    $id_sales = $_POST['id_sales'];
    $id_kategori_gaji = $_POST['id_kategori_gaji'];

    // Menyimpan data ke database
    $sql = "INSERT INTO gaji (jumlah_gaji, bonus, id_sales, id_kategori_gaji) 
            VALUES ('$jumlah_gaji', '$bonus', '$id_sales', '$id_kategori_gaji')";

    if ($conn->query($sql) === TRUE) {
        header("Location: gaji.php");
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
    <title>Tambah Data Gaji</title>
</head>
<body>

<h2 style="text-align: center;">Tambah Data Gaji</h2>

<form method="POST" style="text-align: center;">
    <table style="margin: 0 auto;">
        <tr>
            <td>Jumlah Gaji:</td>
            <td><input type="number" name="jumlah_gaji" required></td>
        </tr>
        <tr>
            <td>Bonus:</td>
            <td><input type="number" name="bonus" required></td>
        </tr>
        <tr>
            <td>ID Sales:</td>
            <td><input type="text" name="id_sales" required></td>
        </tr>
        <tr>
            <td>ID Kategori Gaji:</td>
            <td><input type="text" name="id_kategori_gaji" required></td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center;">
                <input type="submit" value="Tambah Data Gaji">
            </td>
        </tr>
    </table>
</form>

</body>
</html>
