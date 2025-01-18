<?php
// Memasukkan file koneksi database
include('database_project.php');

// Mengambil data pesanan berdasarkan ID
if (isset($_GET['id'])) {
    $id_pesanan = $_GET['id'];
    $sql = "SELECT * FROM pesanan WHERE id_pesanan = '$id_pesanan'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}

// Proses jika form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tanggal_pemesanan = $_POST['tanggal_pemesanan'];
    $id_pelanggan = $_POST['id_pelanggan'];

    // Menyimpan perubahan ke database
    $sql = "UPDATE pesanan SET tanggal_pemesanan='$tanggal_pemesanan', id_pelanggan='$id_pelanggan' WHERE id_pesanan='$id_pesanan'";

    if ($conn->query($sql) === TRUE) {
        // Mengalihkan setelah berhasil mengedit
        header("Location: pesanan.php");
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
    <title>Edit Pesanan - Azzam Furniture</title>
</head>
<body>

<h2 style="text-align: center;">Edit Pesanan</h2>

<form method="POST" style="text-align: center;">
    <table style="margin: 0 auto;">
        <tr>
            <td>Tanggal Pemesanan:</td>
            <td><input type="date" name="tanggal_pemesanan" value="<?php echo $row['tanggal_pemesanan']; ?>" required></td>
        </tr>
        <tr>
            <td>ID Pelanggan:</td>
            <td><input type="number" name="id_pelanggan" value="<?php echo $row['id_pelanggan']; ?>" required></td>
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
