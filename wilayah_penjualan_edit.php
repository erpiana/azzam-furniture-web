<?php
// Memasukkan file koneksi database
include('database_project.php');

// Mengambil data wilayah penjualan berdasarkan ID
if (isset($_GET['id'])) {
    $id_wilayah = $_GET['id'];
    $sql = "SELECT * FROM wilayah_penjualan WHERE id_wilayah = '$id_wilayah'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}

// Proses jika form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_wilayah = $_POST['nama_wilayah'];

    // Menyimpan perubahan ke database
    $sql = "UPDATE wilayah_penjualan SET nama_wilayah='$nama_wilayah' WHERE id_wilayah='$id_wilayah'";

    if ($conn->query($sql) === TRUE) {
        // Mengalihkan setelah berhasil mengedit
        header("Location: wilayah_penjualan.php");
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
    <title>Edit Wilayah Penjualan - Azzam Furniture</title>
</head>
<body>

<h2 style="text-align: center;">Edit Wilayah Penjualan</h2>

<form method="POST" style="text-align: center;">
    <table style="margin: 0 auto;">
        <tr>
            <td>Nama Wilayah:</td>
            <td><input type="text" name="nama_wilayah" value="<?php echo $row['nama_wilayah']; ?>" required></td>
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
