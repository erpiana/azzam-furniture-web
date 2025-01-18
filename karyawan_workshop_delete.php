<?php
// Memasukkan file koneksi database
include('database_project.php');

// Menghapus data karyawan workshop berdasarkan ID
if (isset($_GET['id'])) {
    $id_karyawan_workshop = $_GET['id'];
    $sql = "DELETE FROM karyawan_workshop WHERE id_karyawan_workshop = '$id_karyawan_workshop'";

    if ($conn->query($sql) === TRUE) {
        // Mengalihkan setelah berhasil menghapus
        header("Location: karyawan_workshop.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Menutup koneksi
$conn->close();
?>
