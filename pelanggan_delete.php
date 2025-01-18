<?php
// Memasukkan file koneksi database
include('database_project.php');

// Menghapus data pelanggan berdasarkan ID
if (isset($_GET['id'])) {
    $id_pelanggan = $_GET['id'];
    $sql = "DELETE FROM pelanggan WHERE id_pelanggan = '$id_pelanggan'";

    if ($conn->query($sql) === TRUE) {
        // Mengalihkan setelah berhasil menghapus
        header("Location: pelanggan.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Menutup koneksi
$conn->close();
?>
