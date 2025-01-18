<?php
// Memasukkan file koneksi database
include('database_project.php');

// Mengambil data jabatan berdasarkan ID
if (isset($_GET['id'])) {
    $id_jabatan = $_GET['id'];
    $sql = "SELECT * FROM jabatan WHERE id_jabatan = '$id_jabatan'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}

// Proses jika form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $jabatan = $_POST['jabatan'];

    // Menyimpan perubahan ke database
    $sql = "UPDATE jabatan SET jabatan='$jabatan' WHERE id_jabatan='$id_jabatan'";

    if ($conn->query($sql) === TRUE) {
        // Mengalihkan setelah berhasil mengedit
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
    <title>Edit Jabatan - Azzam Furniture</title>
</head>
<body>

<h2 style="text-align: center;">Edit Jabatan</h2>

<form method="POST" style="text-align: center;">
    <table style="margin: 0 auto;">
        <tr>
            <td>Jabatan:</td>
            <td><input type="text" name="jabatan" value="<?php echo $row['jabatan']; ?>" required></td>
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
