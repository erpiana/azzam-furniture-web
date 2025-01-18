<?php
// Memasukkan file koneksi database
include('database_project.php');

// Menghapus data showroom berdasarkan ID
if (isset($_GET['id'])) {
    $id_showroom = $_GET['id'];
    $sql = "DELETE FROM showroom WHERE id_showroom = '$id_showroom'";

    if ($conn->query($sql) === TRUE) {
        // Mengalihkan setelah berhasil menghapus
        header("Location: showroom.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Menutup koneksi
$conn->close();
?>
