<?php
// Memasukkan file koneksi database
include('database_project.php');

// Mengambil data gaji berdasarkan ID
if (isset($_GET['id'])) {
    $id_gaji = $_GET['id'];
    $sql = "SELECT * FROM gaji WHERE id_gaji = '$id_gaji'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}

// Proses jika form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $jumlah_gaji = $_POST['jumlah_gaji'];
    $bonus = $_POST['bonus'];
    $id_sales = $_POST['id_sales'];
    $id_kategori_gaji = $_POST['id_kategori_gaji'];

    // Menyimpan perubahan ke database
    $sql = "UPDATE gaji SET jumlah_gaji='$jumlah_gaji', bonus='$bonus', id_sales='$id_sales', id_kategori_gaji='$id_kategori_gaji' 
            WHERE id_gaji='$id_gaji'";

    if ($conn->query($sql) === TRUE) {
        header("Location: gaji.php");
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
    <title>Edit Data Gaji</title>
</head>
<body>

<h2 style="text-align: center;">Edit Data Gaji</h2>

<form method="POST" style="text-align: center;">
    <table style="margin: 0 auto;">
        <tr>
            <td>Jumlah Gaji:</td>
            <td><input type="number" name="jumlah_gaji" value="<?php echo $row['jumlah_gaji']; ?>" required></td>
        </tr>
        <tr>
            <td>Bonus:</td>
            <td><input type="number" name="bonus" value="<?php echo $row['bonus']; ?>" required></td>
        </tr>
        <tr>
            <td>ID Sales:</td>
            <td><input type="text" name="id_sales" value="<?php echo $row['id_sales']; ?>" required></td>
        </tr>
        <tr>
            <td>ID Kategori Gaji:</td>
            <td><input type="text" name="id_kategori_gaji" value="<?php echo $row['id_kategori_gaji']; ?>" required></td>
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
