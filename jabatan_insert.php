<?php
// Memasukkan file koneksi database
include('database_project.php');

// Proses jika form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $jabatan = $_POST['jabatan'];

    // Menyimpan data ke database
    $sql = "INSERT INTO jabatan (jabatan) VALUES ('$jabatan')";

    if ($conn->query($sql) === TRUE) {
        // Mengalihkan setelah berhasil menambahkan
        header("Location: jabatan.php");
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
    <title>Tambah Jabatan - Azzam Furniture</title>
</head>
<body>

<h2 style="text-align: center;">Tambah Jabatan</h2>

<form method="POST" style="text-align: center;">
    <table style="margin: 0 auto;">
        <tr>
            <td>Jabatan:</td>
            <td><input type="text" name="jabatan" required></td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center;">
                <input type="submit" value="Tambah Jabatan">
            </td>
        </tr>
    </table>
</form>

</body>
</html>
