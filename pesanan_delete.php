<?php
// Memasukkan file koneksi database
include('database_project.php');

// Menghapus data pesanan berdasarkan ID
if (isset($_GET['id'])) {
    $id_pesanan = $_GET['id'];
    $sql = "DELETE FROM pesanan WHERE id_pesanan = '$id_pesanan'";

    if ($conn->query($sql) === TRUE) {
        // Mengalihkan setelah berhasil menghapus
        header("Location: pesanan.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Menutup koneksi
$conn->close();
?>
