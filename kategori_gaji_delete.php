<?php
// Memasukkan file koneksi database
include('database_project.php');

// Menghapus data kategori gaji berdasarkan ID
if (isset($_GET['id'])) {
    $id_kategori_gaji = $_GET['id'];
    $sql = "DELETE FROM kategori_gaji WHERE id_kategori_gaji = '$id_kategori_gaji'";

    if ($conn->query($sql) === TRUE) {
        // Mengalihkan setelah berhasil menghapus
        header("Location: kategori_gaji.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Menutup koneksi
$conn->close();
?>
