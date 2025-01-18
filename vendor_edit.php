<?php
// Memasukkan file koneksi database
include('database_project.php');

// Mengambil data vendor berdasarkan ID
if (isset($_GET['id'])) {
    $id_vendor = $_GET['id'];
    $sql = "SELECT * FROM vendor WHERE id_vendor = '$id_vendor'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}

// Proses jika form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_vendor = $_POST['nama_vendor'];
    $no_telp_vendor = $_POST['no_telp_vendor'];
    $alamat_vendor = $_POST['alamat_vendor'];

    // Menyimpan perubahan ke database
    $sql = "UPDATE vendor SET nama_vendor='$nama_vendor', no_telp_vendor='$no_telp_vendor', alamat_vendor='$alamat_vendor' WHERE id_vendor='$id_vendor'";

    if ($conn->query($sql) === TRUE) {
        // Mengalihkan setelah berhasil mengedit
        header("Location: vendor.php");
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
    <title>Edit Vendor - Azzam Furniture</title>
</head>
<body>

<h2 style="text-align: center;">Edit Vendor</h2>

<form method="POST" style="text-align: center;">
    <table style="margin: 0 auto;">
        <tr>
            <td>Nama Vendor:</td>
            <td><input type="text" name="nama_vendor" value="<?php echo $row['nama_vendor']; ?>" required></td>
        </tr>
        <tr>
            <td>No Telepon Vendor:</td>
            <td><input type="text" name="no_telp_vendor" value="<?php echo $row['no_telp_vendor']; ?>" required></td>
        </tr>
        <tr>
            <td>Alamat Vendor:</td>
            <td><input type="text" name="alamat_vendor" value="<?php echo $row['alamat_vendor']; ?>" required></td>
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
