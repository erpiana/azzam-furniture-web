<?php
// Memasukkan file koneksi database
include('database_project.php');

// Proses jika form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_karyawan = $_POST['id_karyawan'];
    $id_keahlian = $_POST['id_keahlian'];

    // Menyimpan data ke database
    $sql = "INSERT INTO keahlian_karyawan (id_karyawan, id_keahlian) 
            VALUES ('$id_karyawan', '$id_keahlian')";

    if ($conn->query($sql) === TRUE) {
        // Mengalihkan setelah berhasil menambahkan
        header("Location: keahlian_karyawan.php");
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
    <title>Tambah Keahlian Karyawan - Azzam Furniture</title>
</head>
<body>

<h2 style="text-align: center;">Tambah Keahlian Karyawan</h2>

<form method="POST" style="text-align: center;">
    <table style="margin: 0 auto;">
        <tr>
            <td>ID Karyawan:</td>
            <td><input type="number" name="id_karyawan" required></td>
        </tr>
        <tr>
            <td>ID Keahlian:</td>
            <td><input type="number" name="id_keahlian" required></td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center;">
                <input type="submit" value="Tambah Keahlian Karyawan">
            </td>
        </tr>
    </table>
</form>

</body>
</html>
