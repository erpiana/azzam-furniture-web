<?php
// Memasukkan file koneksi database
include('database_project.php');

// Menghapus data gaji berdasarkan ID
if (isset($_GET['id'])) {
    $id_gaji = $_GET['id'];
    $sql = "DELETE FROM gaji WHERE id_gaji = '$id_gaji'";

    if ($conn->query($sql) === TRUE) {
        header("Location: gaji.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Menutup koneksi
$conn->close();
?>
