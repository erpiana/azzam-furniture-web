<?php
// Memasukkan file koneksi database
include('database_project.php');

// Memeriksa apakah ID tersedia di parameter URL
if (isset($_GET['id'])) {
    $id_pesanan_produk = $_GET['id'];

    // Query untuk menghapus data berdasarkan ID
    $sql = "DELETE FROM pesanan_produk WHERE id_pesanan_produk = '$id_pesanan_produk'";

    if ($conn->query($sql) === TRUE) {
        // Redirect kembali ke halaman utama setelah berhasil menghapus
        header("Location: pesanan_produk.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Menutup koneksi
$conn->close();
?>