<?php
// Memasukkan file koneksi database
include('database_project.php');

// Menghapus data kategori produk berdasarkan ID
if (isset($_GET['id'])) {
    $id_kategori_produk = $_GET['id'];
    $sql = "DELETE FROM kategori_produk WHERE id_kategori_produk = '$id_kategori_produk'";

    if ($conn->query($sql) === TRUE) {
        // Mengalihkan setelah berhasil menghapus
        header("Location: kategori_produk.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Menutup koneksi
$conn->close();
?>
