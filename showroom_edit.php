<?php
// Memasukkan file koneksi database
include('database_project.php');

// Mengambil data showroom berdasarkan ID
if (isset($_GET['id'])) {
    $id_showroom = $_GET['id'];
    $sql = "SELECT * FROM showroom WHERE id_showroom = '$id_showroom'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}

// Proses jika form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $lokasi_showroom = $_POST['lokasi_showroom'];
    $id_wilayah = $_POST['id_wilayah'];

    // Menyimpan perubahan ke database
    $sql = "UPDATE showroom SET lokasi_showroom='$lokasi_showroom', id_wilayah='$id_wilayah' WHERE id_showroom='$id_showroom'";

    if ($conn->query($sql) === TRUE) {
        // Mengalihkan setelah berhasil mengedit
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
    <title>Edit Showroom - Azzam Furniture</title>
</head>
<body>

<h2 style="text-align: center;">Edit Showroom</h2>

<form method="POST" style="text-align: center;">
    <table style="margin: 0 auto;">
        <tr>
            <td>Lokasi Showroom:</td>
            <td><input type="text" name="lokasi_showroom" value="<?php echo $row['lokasi_showroom']; ?>" required></td>
        </tr>
        <tr>
            <td>ID Wilayah:</td>
            <td><input type="number" name="id_wilayah" value="<?php echo $row['id_wilayah']; ?>" required></td>
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
