<?php
// Memasukkan file koneksi database
include('database_project.php');

// Mengambil data bahan baku berdasarkan ID
if (isset($_GET['id'])) {
    $id_bahan = $_GET['id'];
    $sql = "SELECT * FROM bahan_baku WHERE id_bahan = '$id_bahan'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}

// Proses jika form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_bahan = $_POST['nama_bahan'];
    $satuan_ukur = $_POST['satuan_ukur'];
    $harga_unit = $_POST['harga_unit'];

    // Menyimpan perubahan ke database
    $sql = "UPDATE bahan_baku SET nama_bahan='$nama_bahan', satuan_ukur='$satuan_ukur', harga_unit='$harga_unit' WHERE id_bahan='$id_bahan'";

    if ($conn->query($sql) === TRUE) {
        // Mengalihkan setelah berhasil mengedit
        header("Location: bahan_baku.php");
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
    <title>Edit Bahan Baku - Azzam Furniture</title>
</head>
<body>

<h2 style="text-align: center;">Edit Bahan Baku</h2>

<form method="POST" style="text-align: center;">
    <table style="margin: 0 auto;">
        <tr>
            <td>Nama Bahan:</td>
            <td><input type="text" name="nama_bahan" value="<?php echo $row['nama_bahan']; ?>" required></td>
        </tr>
        <tr>
            <td>Satuan Ukur:</td>
            <td><input type="text" name="satuan_ukur" value="<?php echo $row['satuan_ukur']; ?>" required></td>
        </tr>
        <tr>
            <td>Harga Unit:</td>
            <td><input type="number" name="harga_unit" value="<?php echo $row['harga_unit']; ?>" required></td>
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
