<?php
// Memasukkan file koneksi database
include('database_project.php');

// Menghapus data wilayah penjualan berdasarkan ID
if (isset($_GET['id'])) {
    $id_wilayah = $_GET['id'];
    $sql = "DELETE FROM wilayah_penjualan WHERE id_wilayah = '$id_wilayah'";

    if ($conn->query($sql) === TRUE) {
        // Mengalihkan setelah berhasil menghapus
        header("Location: wilayah_penjualan.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Menutup koneksi
$conn->close();
?>
