<?php
// Memasukkan file koneksi database
include('database_project.php');

// Mengambil data produk workshop berdasarkan ID
if (isset($_GET['id'])) {
    $id_produk_workshop = $_GET['id'];
    $sql = "SELECT * FROM produk_workshop WHERE id_produk_workshop = '$id_produk_workshop'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}

// Proses jika form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tgl_pengolahan = $_POST['tgl_pengolahan'];
    $status = $_POST['status'];
    $id_produk = $_POST['id_produk'];
    $id_workshop = $_POST['id_workshop'];

    // Menyimpan perubahan ke database
    $sql = "UPDATE produk_workshop SET tgl_pengolahan='$tgl_pengolahan', status='$status', id_produk='$id_produk', id_workshop='$id_workshop' WHERE id_produk_workshop='$id_produk_workshop'";

    if ($conn->query($sql) === TRUE) {
        // Mengalihkan setelah berhasil mengedit
        header("Location: produk_workshop.php");
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
    <title>Edit Produk Workshop - Azzam Furniture</title>
</head>
<body>

<h2 style="text-align: center;">Edit Produk Workshop</h2>

<form method="POST" style="text-align: center;">
    <table style="margin: 0 auto;">
        <tr>
            <td>Tanggal Pengolahan:</td>
            <td><input type="date" name="tgl_pengolahan" value="<?php echo $row['tgl_pengolahan']; ?>" required></td>
        </tr>
        <tr>
            <td>Status:</td>
            <td>
                <select name="status" required>
                    <option value="proses" <?php echo ($row['status'] == 'proses' ? 'selected' : ''); ?>>Proses</option>
                    <option value="selesai" <?php echo ($row['status'] == 'selesai' ? 'selected' : ''); ?>>Selesai</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>ID Produk:</td>
            <td><input type="number" name="id_produk" value="<?php echo $row['id_produk']; ?>" required></td>
        </tr>
        <tr>
            <td>ID Workshop:</td>
            <td><input type="number" name="id_workshop" value="<?php echo $row['id_workshop']; ?>" required></td>
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
