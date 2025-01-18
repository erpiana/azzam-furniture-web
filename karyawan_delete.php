<?php
// Memasukkan file koneksi database
include('database_project.php');

// Mengambil ID karyawan untuk dihapus
if (isset($_GET['id'])) {
    $id_karyawan = $_GET['id'];
    
    // Query untuk menghapus data karyawan
    $sql = "DELETE FROM karyawan WHERE id_karyawan = '$id_karyawan'";

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
