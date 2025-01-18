<?php
// Memasukkan file koneksi database
include('database_project.php');

// Mengambil data karyawan berdasarkan ID
if (isset($_GET['id'])) {
    $id_karyawan = $_GET['id'];
    $sql = "SELECT * FROM karyawan WHERE id_karyawan = '$id_karyawan'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}

// Proses jika form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_karyawan = $_POST['nama_karyawan'];
    $no_hp_karyawan = $_POST['no_hp_karyawan'];
    $alamat_karyawan = $_POST['alamat_karyawan'];

    // Query untuk memperbarui data karyawan
    $sql = "UPDATE karyawan SET nama_karyawan='$nama_karyawan', no_hp_karyawan='$no_hp_karyawan', 
            alamat_karyawan='$alamat_karyawan' WHERE id_karyawan='$id_karyawan'";

    if ($conn->query($sql) === TRUE) {
        // Redirect setelah berhasil
        header("Location: karyawan.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Karyawan - Azzam Furniture</title>
</head>
<body>

<h2 style="text-align: center;">Edit Karyawan</h2>

<form method="POST" style="text-align: center;">
    <table style="margin: 0 auto;">
        <tr>
            <td>Nama Karyawan:</td>
            <td><input type="text" name="nama_karyawan" value="<?php echo $row['nama_karyawan']; ?>" required></td>
        </tr>
        <tr>
            <td>No HP:</td>
            <td><input type="text" name="no_hp_karyawan" value="<?php echo $row['no_hp_karyawan']; ?>" required></td>
        </tr>
        <tr>
            <td>Alamat:</td>
            <td><input type="text" name="alamat_karyawan" value="<?php echo $row['alamat_karyawan']; ?>" required></td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center;">
                <input type="submit" value="Update Karyawan">
            </td>
        </tr>
    </table>
</form>

</body>
</html>
