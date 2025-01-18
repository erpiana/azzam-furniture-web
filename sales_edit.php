<?php
// Memasukkan file koneksi database
include('database_project.php');

// Mengambil data sales berdasarkan ID
if (isset($_GET['id'])) {
    $id_sales = $_GET['id'];
    $sql = "SELECT * FROM sales WHERE id_sales = '$id_sales'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}

// Proses jika form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_sales = $_POST['nama_sales'];
    $no_hp_sales = $_POST['no_hp_sales'];
    $fax_sales = $_POST['fax_sales'];
    $id_wilayah = $_POST['id_wilayah'];

    // Menyimpan perubahan ke database
    $sql = "UPDATE sales SET nama_sales='$nama_sales', no_hp_sales='$no_hp_sales', fax_sales='$fax_sales', id_wilayah='$id_wilayah' WHERE id_sales='$id_sales'";

    if ($conn->query($sql) === TRUE) {
        // Mengalihkan setelah berhasil mengedit
        header("Location: sales.php");
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
    <title>Edit Sales - Azzam Furniture</title>
</head>
<body>

<h2 style="text-align: center;">Edit Sales</h2>

<form method="POST" style="text-align: center;">
    <table style="margin: 0 auto;">
        <tr>
            <td>Nama Sales:</td>
            <td><input type="text" name="nama_sales" value="<?php echo $row['nama_sales']; ?>" required></td>
        </tr>
        <tr>
            <td>No. HP Sales:</td>
            <td><input type="text" name="no_hp_sales" value="<?php echo $row['no_hp_sales']; ?>" required></td>
        </tr>
        <tr>
            <td>Fax Sales:</td>
            <td><input type="text" name="fax_sales" value="<?php echo $row['fax_sales']; ?>" required></td>
        </tr>
        <tr>
            <td>ID Wilayah:</td>
            <td><input type="number" name="id_wilayah" value="<?php echo $row['id_wilayah']; ?>" required></td>
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
