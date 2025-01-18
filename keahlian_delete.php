<?php
// Memasukkan file koneksi database
include('database_project.php');

// Menghapus data keahlian berdasarkan ID
if (isset($_GET['id'])) {
    $id_keahlian = $_GET['id'];
    $sql = "DELETE FROM keahlian WHERE id_keahlian = '$id_keahlian'";

    if ($conn->query($sql) === TRUE) {
        // Mengalihkan setelah berhasil menghapus
        header("Location: keahlian.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Menutup koneksi
$conn->close();
?>
