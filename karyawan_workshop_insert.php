<?php
// Memasukkan file koneksi database
include('database_project.php');

// Proses jika form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tanggal_bergabung = $_POST['tanggal_bergabung'];
    $status = $_POST['status'];
    $id_workshop = $_POST['id_workshop'];
    $id_karyawan = $_POST['id_karyawan'];

    // Menyimpan data ke database
    $sql = "INSERT INTO karyawan_workshop (tanggal_bergabung, status, id_workshop, id_karyawan) 
            VALUES ('$tanggal_bergabung', '$status', '$id_workshop', '$id_karyawan')";

    if ($conn->query($sql) === TRUE) {
        // Mengalihkan setelah berhasil menambahkan
        header("Location: karyawan_workshop.php");
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
    <title>Tambah Karyawan Workshop - Azzam Furniture</title>
</head>
<body>

<h2 style="text-align: center;">Tambah Karyawan Workshop</h2>

<form method="POST" style="text-align: center;">
    <table style="margin: 0 auto;">
        <tr>
            <td>Tanggal Bergabung:</td>
            <td><input type="date" name="tanggal_bergabung" required></td>
        </tr>
        <tr>
            <td>Status:</td>
            <td>
                <select name="status" required>
                    <option value="Tetap">Tetap</option>
                    <option value="Kontrak">Kontrak</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>ID Workshop:</td>
            <td><input type="number" name="id_workshop" required></td>
        </tr>
        <tr>
            <td>ID Karyawan:</td>
            <td><input type="number" name="id_karyawan" required></td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center;">
                <input type="submit" value="Tambah Karyawan Workshop">
            </td>
        </tr>
    </table>
</form>

</body>
</html>
