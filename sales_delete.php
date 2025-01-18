<?php
// Memasukkan file koneksi database
include('database_project.php');

// Menghapus data sales berdasarkan ID
if (isset($_GET['id'])) {
    $id_sales = $_GET['id'];
    $sql = "DELETE FROM sales WHERE id_sales = '$id_sales'";

    if ($conn->query($sql) === TRUE) {
        // Mengalihkan setelah berhasil menghapus
        header("Location: sales.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Menutup koneksi
$conn->close();
?>
