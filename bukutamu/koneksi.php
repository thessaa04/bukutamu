<?php
$server = "localhost";
$user = 'root';
$pass = '';
$dbname = "buku tamu";
$port = 3306;

// Membuat koneksi
$conn = new mysqli($server, $user, $pass, $dbname, $port);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
