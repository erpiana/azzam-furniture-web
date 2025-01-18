<?php
// Memasukkan file koneksi database
include('database_project.php');

// Menghapus data bahan baku berdasarkan ID
if (isset($_GET['id'])) {
    $id_bahan = $_GET['id'];
    $sql = "DELETE FROM bahan_baku WHERE id_bahan = '$id_bahan'";

    if ($conn->query($sql) === TRUE) {
        // Mengalihkan setelah berhasil menghapus
        header("Location: bahan_baku.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Menutup koneksi
$conn->close();
?>
