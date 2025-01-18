<?php
// Memasukkan file koneksi database
include('database_project.php');

// Mengambil data bahan_produk berdasarkan ID
if (isset($_GET['id'])) {
    $id_bahan_produk = $_GET['id'];
    $sql = "SELECT * FROM bahan_produk WHERE id_bahan_produk = '$id_bahan_produk'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}

// Proses jika form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $jumlah_bahan = $_POST['jumlah_bahan'];
    $harga_bahan = $_POST['harga_bahan'];
    $id_produk = $_POST['id_produk'];
    $id_bahan = $_POST['id_bahan'];

    // Menyimpan perubahan ke database
    $sql = "UPDATE bahan_produk 
            SET jumlah_bahan='$jumlah_bahan', harga_bahan='$harga_bahan', id_produk='$id_produk', id_bahan='$id_bahan' 
            WHERE id_bahan_produk='$id_bahan_produk'";

    if ($conn->query($sql) === TRUE) {
        // Mengalihkan setelah berhasil mengedit
        header("Location: bahan_produk.php");
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
    <title>Edit Bahan Produk - Azzam Furniture</title>
</head>
<body>

<h2 style="text-align: center;">Edit Bahan Produk</h2>

<form method="POST" style="text-align: center;">
    <table style="margin: 0 auto;">
        <tr>
            <td>Jumlah Bahan:</td>
            <td><input type="number" name="jumlah_bahan" value="<?php echo $row['jumlah_bahan']; ?>" required></td>
        </tr>
        <tr>
            <td>Harga Bahan:</td>
            <td><input type="number" name="harga_bahan" value="<?php echo $row['harga_bahan']; ?>" required></td>
        </tr>
        <tr>
            <td>ID Produk:</td>
            <td><input type="text" name="id_produk" value="<?php echo $row['id_produk']; ?>" required></td>
        </tr>
        <tr>
            <td>ID Bahan:</td>
            <td><input type="text" name="id_bahan" value="<?php echo $row['id_bahan']; ?>" required></td>
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
