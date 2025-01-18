<?php
// Memasukkan file koneksi database
include('database_project.php');

// Mengambil data kategori gaji berdasarkan ID
if (isset($_GET['id'])) {
    $id_kategori_gaji = $_GET['id'];
    $sql = "SELECT * FROM kategori_gaji WHERE id_kategori_gaji = '$id_kategori_gaji'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}

// Proses jika form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $kategori_sales = $_POST['kategori_sales'];

    // Menyimpan perubahan ke database
    $sql = "UPDATE kategori_gaji SET kategori_sales='$kategori_sales' WHERE id_kategori_gaji='$id_kategori_gaji'";

    if ($conn->query($sql) === TRUE) {
        // Mengalihkan setelah berhasil mengedit
        header("Location: kategori_gaji.php");
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
    <title>Edit Kategori Gaji - Azzam Furniture</title>
</head>
<body>

<h2 style="text-align: center;">Edit Kategori Gaji</h2>

<form method="POST" style="text-align: center;">
    <table style="margin: 0 auto;">
        <tr>
            <td>Kategori Sales:</td>
            <td><input type="text" name="kategori_sales" value="<?php echo $row['kategori_sales']; ?>" required></td>
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
