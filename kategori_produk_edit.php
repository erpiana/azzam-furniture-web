<?php
// Memasukkan file koneksi database
include('database_project.php');

// Mengambil data kategori produk berdasarkan ID
if (isset($_GET['id'])) {
    $id_kategori_produk = $_GET['id'];
    $sql = "SELECT * FROM kategori_produk WHERE id_kategori_produk = '$id_kategori_produk'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}

// Proses jika form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_kategori_produk = $_POST['nama_kategori_produk'];

    // Menyimpan perubahan ke database
    $sql = "UPDATE kategori_produk SET nama_kategori_produk='$nama_kategori_produk' WHERE id_kategori_produk='$id_kategori_produk'";

    if ($conn->query($sql) === TRUE) {
        // Mengalihkan setelah berhasil mengedit
        header("Location: kategori_produk.php");
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
    <title>Edit Kategori Produk - Azzam Furniture</title>
</head>
<body>

<h2 style="text-align: center;">Edit Kategori Produk</h2>

<form method="POST" style="text-align: center;">
    <table style="margin: 0 auto;">
        <tr>
            <td>Nama Kategori Produk:</td>
            <td><input type="text" name="nama_kategori_produk" value="<?php echo $row['nama_kategori_produk']; ?>" required></td>
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
