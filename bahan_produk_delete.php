<?php
// Memasukkan file koneksi database
include('database_project.php');

// Menghapus data bahan_produk berdasarkan ID
if (isset($_GET['id'])) {
    $id_bahan_produk = $_GET['id'];
    $sql = "DELETE FROM bahan_produk WHERE id_bahan_produk = '$id_bahan_produk'";

    if ($conn->query($sql) === TRUE) {
        // Mengalihkan setelah berhasil menghapus
        header("Location: bahan_produk.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Menutup koneksi
$conn->close();
?>
