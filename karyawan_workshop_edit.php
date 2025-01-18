<?php
// Memasukkan file koneksi database
include('database_project.php');

// Mengambil data karyawan workshop berdasarkan ID
if (isset($_GET['id'])) {
    $id_karyawan_workshop = $_GET['id'];
    $sql = "SELECT * FROM karyawan_workshop WHERE id_karyawan_workshop = '$id_karyawan_workshop'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}

// Proses jika form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tanggal_bergabung = $_POST['tanggal_bergabung'];
    $status = $_POST['status'];
    $id_workshop = $_POST['id_workshop'];
    $id_karyawan = $_POST['id_karyawan'];

    // Menyimpan perubahan ke database
    $sql = "UPDATE karyawan_workshop SET tanggal_bergabung='$tanggal_bergabung', status='$status', 
            id_workshop='$id_workshop', id_karyawan='$id_karyawan' 
            WHERE id_karyawan_workshop='$id_karyawan_workshop'";

    if ($conn->query($sql) === TRUE) {
        // Mengalihkan setelah berhasil mengedit
        header("Location: karyawan_workshop.php");
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
    <title>Edit Karyawan Workshop - Azzam Furniture</title>
</head>
<body>

<h2 style="text-align: center;">Edit Karyawan Workshop</h2>

<form method="POST" style="text-align: center;">
    <table style="margin: 0 auto;">
        <tr>
            <td>Tanggal Bergabung:</td>
            <td><input type="date" name="tanggal_bergabung" value="<?php echo $row['tanggal_bergabung']; ?>" required></td>
        </tr>
        <tr>
            <td>Status:</td>
            <td>
                <select name="status" required>
                    <option value="Tetap" <?php echo ($row['status'] == 'Tetap') ? 'selected' : ''; ?>>Tetap</option>
                    <option value="Kontrak" <?php echo ($row['status'] == 'Kontrak') ? 'selected' : ''; ?>>Kontrak</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>ID Workshop:</td>
            <td><input type="number" name="id_workshop" value="<?php echo $row['id_workshop']; ?>" required></td>
        </tr>
        <tr>
            <td>ID Karyawan:</td>
            <td><input type="number" name="id_karyawan" value="<?php echo $row['id_karyawan']; ?>" required></td>
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
