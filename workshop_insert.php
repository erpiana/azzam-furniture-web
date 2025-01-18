<?php
// Memasukkan file koneksi database
include('database_project.php');

// Proses jika form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $lokasi_workshop = $_POST['lokasi_workshop'];
    $no_hp_workshop = $_POST['no_hp_workshop'];

    // Menyimpan data ke database
    $sql = "INSERT INTO workshop (lokasi_workshop, no_hp_workshop) 
            VALUES ('$lokasi_workshop', '$no_hp_workshop')";

    if ($conn->query($sql) === TRUE) {
        // Mengalihkan setelah berhasil menambahkan
        header("Location: workshop.php");
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
    <title>Tambah Workshop - Azzam Furniture</title>
</head>
<body>

<h2 style="text-align: center;">Tambah Workshop</h2>

<form method="POST" style="text-align: center;">
    <table style="margin: 0 auto;">
        <tr>
            <td>Lokasi Workshop:</td>
            <td><input type="text" name="lokasi_workshop" required></td>
        </tr>
        <tr>
            <td>No HP Workshop:</td>
            <td><input type="text" name="no_hp_workshop" required></td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center;">
                <input type="submit" value="Tambah Workshop">
            </td>
        </tr>
    </table>
</form>

</body>
</html>
