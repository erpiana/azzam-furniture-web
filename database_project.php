<?php
// database_project.php
$servername = "localhost";
$username = "erpiana24";
$password = "pia123";
$dbname = "projectpbd_pia";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
