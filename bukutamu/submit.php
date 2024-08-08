<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bukutamu";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Menangani submit form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_lengkap = $_POST['nama_lengkap'];
    $kantor_instansi = $_POST['kantor_instansi'];
    $alamat = $_POST['alamat'];
    $nomor_telepon = $_POST['nomor_telepon'];
    $keperluan = $_POST['keperluan'];
    $unit_ruang = $_POST['unit_ruang'];

    $sql = "INSERT INTO pengunjung (nama_lengkap, kantor_instansi, alamat, nomor_telepon, keperluan, unit_ruang)
            VALUES ('$nama_lengkap', '$kantor_instansi', '$alamat', '$nomor_telepon', '$keperluan', '$unit_ruang')";

    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil disimpan.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
