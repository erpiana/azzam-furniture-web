<?php
// Memasukkan file koneksi database
include('database_project.php');

// Mengambil data pelanggan berdasarkan ID
if (isset($_GET['id'])) {
    $id_pelanggan = $_GET['id'];
    $sql = "SELECT * FROM pelanggan WHERE id_pelanggan = '$id_pelanggan'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}

// Proses jika form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_pelanggan = $_POST['nama_pelanggan'];
    $no_hp_pelanggan = $_POST['no_hp_pelanggan'];
    $alamat_pelanggan = $_POST['alamat_pelanggan'];

    // Menyimpan perubahan ke database
    $sql = "UPDATE pelanggan SET nama_pelanggan='$nama_pelanggan', no_hp_pelanggan='$no_hp_pelanggan', alamat_pelanggan='$alamat_pelanggan' WHERE id_pelanggan='$id_pelanggan'";

    if ($conn->query($sql) === TRUE) {
        // Mengalihkan setelah berhasil mengedit
        header("Location: pelanggan.php");
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
    <title>Edit Pelanggan - Azzam Furniture</title>
</head>
<body>

<h2 style="text-align: center;">Edit Pelanggan</h2>

<form method="POST" style="text-align: center;">
    <table style="margin: 0 auto;">
        <tr>
            <td>Nama Pelanggan:</td>
            <td><input type="text" name="nama_pelanggan" value="<?php echo $row['nama_pelanggan']; ?>" required></td>
        </tr>
        <tr>
            <td>No HP Pelanggan:</td>
            <td><input type="text" name="no_hp_pelanggan" value="<?php echo $row['no_hp_pelanggan']; ?>" required></td>
        </tr>
        <tr>
            <td>Alamat Pelanggan:</td>
            <td><input type="text" name="alamat_pelanggan" value="<?php echo $row['alamat_pelanggan']; ?>" required></td>
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
