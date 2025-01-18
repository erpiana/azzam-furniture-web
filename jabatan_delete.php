<?php
// Memasukkan file koneksi database
include('database_project.php');

// Menghapus data jabatan berdasarkan ID
if (isset($_GET['id'])) {
    $id_jabatan = $_GET['id'];
    $sql = "DELETE FROM jabatan WHERE id_jabatan = '$id_jabatan'";

    if ($conn->query($sql) === TRUE) {
        // Mengalihkan setelah berhasil menghapus
        header("Location: jabatan.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Menutup koneksi
$conn->close();
?>
