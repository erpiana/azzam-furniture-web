<?php
// Memasukkan file koneksi database
include('database_project.php');

// Mengambil data pemasok berdasarkan ID
if (isset($_GET['id'])) {
    $id_pemasok = $_GET['id'];
    $sql = "SELECT * FROM pemasok WHERE id_pemasok = '$id_pemasok'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}

// Proses jika form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tgl_pemasokan = $_POST['tgl_pemasokan'];
    $harga_bahan = $_POST['harga_bahan'];
    $ketersediaan = $_POST['ketersediaan'];
    $id_bahan = $_POST['id_bahan'];
    $id_vendor = $_POST['id_vendor'];

    // Menyimpan perubahan ke database
    $sql = "UPDATE pemasok SET tgl_pemasokan='$tgl_pemasokan', harga_bahan='$harga_bahan', ketersediaan='$ketersediaan', id_bahan='$id_bahan', id_vendor='$id_vendor' WHERE id_pemasok='$id_pemasok'";

    if ($conn->query($sql) === TRUE) {
        // Mengalihkan setelah berhasil mengedit
        header("Location: pemasok.php");
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
    <title>Edit Pemasok - Azzam Furniture</title>
</head>
<body>

<h2 style="text-align: center;">Edit Pemasok</h2>

<form method="POST" style="text-align: center;">
    <table style="margin: 0 auto;">
        <tr>
            <td>Tanggal Pemasok:</td>
            <td><input type="date" name="tgl_pemasokan" value="<?php echo $row['tgl_pemasokan']; ?>" required></td>
        </tr>
        <tr>
            <td>Harga Bahan:</td>
            <td><input type="number" name="harga_bahan" value="<?php echo $row['harga_bahan']; ?>" required></td>
        </tr>
        <tr>
            <td>Ketersediaan:</td>
            <td><input type="text" name="ketersediaan" value="<?php echo $row['ketersediaan']; ?>" required></td>
        </tr>
        <tr>
            <td>ID Bahan:</td>
            <td><input type="number" name="id_bahan" value="<?php echo $row['id_bahan']; ?>" required></td>
        </tr>
        <tr>
            <td>ID Vendor:</td>
            <td><input type="number" name="id_vendor" value="<?php echo $row['id_vendor']; ?>" required></td>
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