<?php
// Memasukkan file koneksi database
include('database_project.php');

// Mengambil data transaksi berdasarkan ID
if (isset($_GET['id'])) {
    $id_transaksi = $_GET['id'];
    $sql = "SELECT * FROM transaksi WHERE id_transaksi = '$id_transaksi'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}

// Proses jika form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tgl_transaksi = $_POST['tgl_transaksi'];
    $status_transaksi = $_POST['status_transaksi'];
    $id_showroom = $_POST['id_showroom'];
    $id_pelanggan = $_POST['id_pelanggan'];

    // Menyimpan perubahan ke database
    $sql = "UPDATE transaksi SET tgl_transaksi='$tgl_transaksi', status_transaksi='$status_transaksi', id_showroom='$id_showroom', id_pelanggan='$id_pelanggan' WHERE id_transaksi='$id_transaksi'";

    if ($conn->query($sql) === TRUE) {
        // Mengalihkan setelah berhasil mengedit
        header("Location: transaksi.php");
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
    <title>Edit Transaksi - Azzam Furniture</title>
</head>
<body>

<h2 style="text-align: center;">Edit Transaksi</h2>

<form method="POST" style="text-align: center;">
    <table style="margin: 0 auto;">
        <tr>
            <td>Tanggal Transaksi:</td>
            <td><input type="date" name="tgl_transaksi" value="<?php echo $row['tgl_transaksi']; ?>" required></td>
        </tr>
        <tr>
            <td>Status Transaksi:</td>
            <td>
                <select name="status_transaksi" required>
                    <option value="berhasil" <?php echo ($row['status_transaksi'] == 'berhasil') ? 'selected' : ''; ?>>Berhasil</option>
                    <option value="gagal" <?php echo ($row['status_transaksi'] == 'gagal') ? 'selected' : ''; ?>>Gagal</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>ID Showroom:</td>
            <td><input type="number" name="id_showroom" value="<?php echo $row['id_showroom']; ?>" required></td>
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
