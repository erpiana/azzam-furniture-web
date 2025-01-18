<?php
// Memasukkan file koneksi database
include('database_project.php');

// Menghapus data vendor berdasarkan ID
if (isset($_GET['id'])) {
    $id_vendor = $_GET['id'];
    $sql = "DELETE FROM vendor WHERE id_vendor = '$id_vendor'";

    if ($conn->query($sql) === TRUE) {
        // Mengalihkan setelah berhasil menghapus
        header("Location: vendor.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Menutup koneksi
$conn->close();
?>
