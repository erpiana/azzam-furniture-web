<?php
// Memasukkan file koneksi database
include('database_project.php');

// Proses jika form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_keahlian = $_POST['nama_keahlian'];

    // Menyimpan data ke database
    $sql = "INSERT INTO keahlian (nama_keahlian) 
            VALUES ('$nama_keahlian')";

    if ($conn->query($sql) === TRUE) {
        // Mengalihkan setelah berhasil menambahkan
        header("Location: keahlian.php");
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
    <title>Tambah Keahlian - Azzam Furniture</title>
</head>
<body>

<h2 style="text-align: center;">Tambah Keahlian</h2>

<form method="POST" style="text-align: center;">
    <table style="margin: 0 auto;">
        <tr>
            <td>Nama Keahlian:</td>
            <td><input type="text" name="nama_keahlian" required></td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center;">
                <input type="submit" value="Tambah Keahlian">
            </td>
        </tr>
    </table>
</form>

</body>
</html>
