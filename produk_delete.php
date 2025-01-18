<?php
// Memasukkan file koneksi database
include('database_project.php');

// Menghapus data produk berdasarkan ID
if (isset($_GET['id'])) {
    $id_produk = $_GET['id'];
    $sql = "DELETE FROM produk WHERE id_produk = '$id_produk'";

    if ($conn->query($sql) === TRUE) {
        // Mengalihkan setelah berhasil menghapus
        header("Location: produk.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Menutup koneksi
$conn->close();
?>
