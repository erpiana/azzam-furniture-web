<?php
// Memasukkan file koneksi database
include('database_project.php');

// Mengambil data workshop berdasarkan ID
if (isset($_GET['id'])) {
    $id_workshop = $_GET['id'];
    $sql = "SELECT * FROM workshop WHERE id_workshop = '$id_workshop'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}

// Proses jika form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $lokasi_workshop = $_POST['lokasi_workshop'];
    $no_hp_workshop = $_POST['no_hp_workshop'];

    // Menyimpan perubahan ke database
    $sql = "UPDATE workshop SET lokasi_workshop='$lokasi_workshop', no_hp_workshop='$no_hp_workshop' WHERE id_workshop='$id_workshop'";

    if ($conn->query($sql) === TRUE) {
        // Mengalihkan setelah berhasil mengedit
        header("Location: workshop.php");
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
    <title>Edit Workshop - Azzam Furniture</title>
</head>
<body>

<h2 style="text-align: center;">Edit Workshop</h2>

<form method="POST" style="text-align: center;">
    <table style="margin: 0 auto;">
        <tr>
            <td>Lokasi Workshop:</td>
            <td><input type="text" name="lokasi_workshop" value="<?php echo $row['lokasi_workshop']; ?>" required></td>
        </tr>
        <tr>
            <td>No HP Workshop:</td>
            <td><input type="text" name="no_hp_workshop" value="<?php echo $row['no_hp_workshop']; ?>" required></td>
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
