<?php
// Memasukkan file koneksi database
include('database_project.php');

// Menghapus data produk workshop berdasarkan ID
if (isset($_GET['id'])) {
    $id_produk_workshop = $_GET['id'];
    $sql = "DELETE FROM produk_workshop WHERE id_produk_workshop = '$id_produk_workshop'";

    if ($conn->query($sql) === TRUE) {
        // Mengalihkan setelah berhasil menghapus
        header("Location: produk_workshop.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Menutup koneksi
$conn->close();
?>
