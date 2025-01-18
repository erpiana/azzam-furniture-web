<?php
// Memasukkan file koneksi database
include('database_project.php');

// Proses jika form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $lokasi_showroom = $_POST['lokasi_showroom'];
    $id_wilayah = $_POST['id_wilayah'];

    // Menyimpan data ke database
    $sql = "INSERT INTO showroom (lokasi_showroom, id_wilayah) 
            VALUES ('$lokasi_showroom', '$id_wilayah')";

    if ($conn->query($sql) === TRUE) {
        // Mengalihkan setelah berhasil menambahkan
        header("Location: showroom.php");
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
    <title>Tambah Showroom - Azzam Furniture</title>
</head>
<body>

<h2 style="text-align: center;">Tambah Showroom</h2>

<form method="POST" style="text-align: center;">
    <table style="margin: 0 auto;">
        <tr>
            <td>Lokasi Showroom:</td>
            <td><input type="text" name="lokasi_showroom" required></td>
        </tr>
        <tr>
            <td>ID Wilayah:</td>
            <td><input type="number" name="id_wilayah" required></td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center;">
                <input type="submit" value="Tambah Showroom">
            </td>
        </tr>
    </table>
</form>

</body>
</html>
