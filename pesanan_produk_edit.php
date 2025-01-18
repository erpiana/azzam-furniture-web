<?php
// Memasukkan file koneksi database
include('database_project.php');

// Mengambil data pesanan_produk berdasarkan ID
if (isset($_GET['id'])) {
    $id_pesanan_produk = $_GET['id'];
    $sql = "SELECT * FROM pesanan_produk WHERE id_pesanan_produk = '$id_pesanan_produk'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}

// Proses jika form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $jumlah_pesanan_produk = $_POST['jumlah_pesanan_produk'];
    $harga_total = $_POST['harga_total'];
    $id_produk = $_POST['id_produk'];
    $id_pesanan = $_POST['id_pesanan'];

    // Menyimpan perubahan ke database
    $sql = "UPDATE pesanan_produk SET jumlah_pesanan_produk='$jumlah_pesanan_produk', harga_total='$harga_total', id_produk='$id_produk', id_pesanan='$id_pesanan' WHERE id_pesanan_produk='$id_pesanan_produk'";

    if ($conn->query($sql) === TRUE) {
        // Mengalihkan setelah berhasil mengedit
        header("Location: pesanan_produk.php");
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
    <title>Edit Pesanan Produk - Azzam Furniture</title>
</head>
<body>

<h2 style="text-align: center;">Edit Pesanan Produk</h2>

<form method="POST" style="text-align: center;">
    <table style="margin: 0 auto;">
        <tr>
            <td>Jumlah Pesanan:</td>
            <td><input type="number" name="jumlah_pesanan_produk" value="<?php echo $row['jumlah_pesanan_produk']; ?>" required></td>
        </tr>
        <tr>
            <td>Harga Total:</td>
            <td><input type="number" name="harga_total" value="<?php echo $row['harga_total']; ?>" required></td>
        </tr>
        <tr>
            <td>ID Produk:</td>
            <td><input type="text" name="id_produk" value="<?php echo $row['id_produk']; ?>" required></td>
        </tr>
        <tr>
            <td>ID Pesanan:</td>
            <td><input type="text" name="id_pesanan" value="<?php echo $row['id_pesanan']; ?>" required></td>
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