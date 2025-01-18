<?php
// Memasukkan file koneksi database
include('database_project.php');

// Menghapus data workshop berdasarkan ID
if (isset($_GET['id'])) {
    $id_workshop = $_GET['id'];
    $sql = "DELETE FROM workshop WHERE id_workshop = '$id_workshop'";

    if ($conn->query($sql) === TRUE) {
        // Mengalihkan setelah berhasil menghapus
        header("Location: workshop.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Menutup koneksi
$conn->close();
?>
