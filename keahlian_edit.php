<?php
// Memasukkan file koneksi database
include('database_project.php');

// Mengambil data keahlian berdasarkan ID
if (isset($_GET['id'])) {
    $id_keahlian = $_GET['id'];
    $sql = "SELECT * FROM keahlian WHERE id_keahlian = '$id_keahlian'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}

// Proses jika form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_keahlian = $_POST['nama_keahlian'];

    // Menyimpan perubahan ke database
    $sql = "UPDATE keahlian SET nama_keahlian='$nama_keahlian' WHERE id_keahlian='$id_keahlian'";

    if ($conn->query($sql) === TRUE) {
        // Mengalihkan setelah berhasil mengedit
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
    <title>Edit Keahlian - Azzam Furniture</title>
</head>
<body>

<h2 style="text-align: center;">Edit Keahlian</h2>

<form method="POST" style="text-align: center;">
    <table style="margin: 0 auto;">
        <tr>
            <td>Nama Keahlian:</td>
            <td><input type="text" name="nama_keahlian" value="<?php echo $row['nama_keahlian']; ?>" required></td>
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
