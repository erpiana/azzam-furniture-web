<?php
// Memasukkan file koneksi database
include('database_project.php');

// Menghapus data transaksi berdasarkan ID
if (isset($_GET['id'])) {
    $id_transaksi = $_GET['id'];
    $sql = "DELETE FROM transaksi WHERE id_transaksi = '$id_transaksi'";

    if ($conn->query($sql) === TRUE) {
        // Mengalihkan setelah berhasil menghapus
        header("Location: transaksi.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Menutup koneksi
$conn->close();
?>
