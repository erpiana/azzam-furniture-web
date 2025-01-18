<?php
// Memasukkan file koneksi database
include('database_project.php');

// Proses jika form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $kategori_sales = $_POST['kategori_sales'];

    // Menyimpan data ke database
    $sql = "INSERT INTO kategori_gaji (kategori_sales) 
            VALUES ('$kategori_sales')";

    if ($conn->query($sql) === TRUE) {
        // Mengalihkan setelah berhasil menambahkan
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
    <title>Tambah Kategori Gaji - Azzam Furniture</title>
</head>
<body>

<h2 style="text-align: center;">Tambah Kategori Gaji</h2>

<form method="POST" style="text-align: center;">
    <table style="margin: 0 auto;">
        <tr>
            <td>Kategori Sales:</td>
            <td><input type="text" name="kategori_sales" required></td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center;">
                <input type="submit" value="Tambah Kategori Gaji">
            </td>
        </tr>
    </table>
</form>

</body>
</html>
