<?php
// Memasukkan file koneksi database
include('database_project.php');

// Mengambil data keahlian karyawan berdasarkan ID
if (isset($_GET['id'])) {
    $id_keahlian_karyawan = $_GET['id'];
    $sql = "SELECT * FROM keahlian_karyawan WHERE id_keahlian_karyawan = '$id_keahlian_karyawan'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}

// Proses jika form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_karyawan = $_POST['id_karyawan'];
    $id_keahlian = $_POST['id_keahlian'];

    $sql = "UPDATE keahlian_karyawan SET id_karyawan='$id_karyawan', id_keahlian='$id_keahlian' 
            WHERE id_keahlian_karyawan='$id_keahlian_karyawan'";

    if ($conn->query($sql) === TRUE) {
        header("Location: keahlian_karyawan.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Keahlian Karyawan - Azzam Furniture</title>
</head>
<body>

<h2 style="text-align: center;">Edit Keahlian Karyawan</h2>

<form method="POST" style="text-align: center;">
    <table style="margin: 0 auto;">
        <tr>
            <td>ID Karyawan:</td>
            <td><input type="text" name="id_karyawan" value="<?php echo $row['id_karyawan']; ?>" required></td>
        </tr>
        <tr>
            <td>ID Keahlian:</td>
            <td><input type="text" name="id_keahlian" value="<?php echo $row['id_keahlian']; ?>" required></td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center;">
                <input type="submit" value="Simpan Perubahan">
            </td>
        </tr>
    </table>
</form>

</body>
</html>
