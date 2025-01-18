<?php
// Memasukkan file koneksi database
include('database_project.php');

// Mengecek apakah parameter ID tersedia di URL
if (isset($_GET['id'])) {
    // Mengambil ID pemasok dari parameter URL
    $id_pemasok = $_GET['id'];

    // SQL untuk menghapus data pemasok
    $sql = "DELETE FROM pemasok WHERE id_pemasok = '$id_pemasok'";

    // Eksekusi query dan cek hasilnya
    if ($conn->query($sql) === TRUE) {
        // Jika berhasil, kembali ke halaman utama pemasok
        header("Location: pemasok.php");
        exit;
    } else {
        // Tampilkan pesan error jika ada masalah
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Menutup koneksi database
$conn->close();
?>
