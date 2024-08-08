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
    $unit = $_POST['unit'];

    $sql = "INSERT INTO guestbook_entries (nama_lengkap, kantor_instansi, alamat, nomor_telepon, keperluan, unit )
            VALUES ('$nama_lengkap', '$kantor_instansi', '$alamat', '$nomor_telepon', '$keperluan', '$unit')";

    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil disimpan.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Mengambil data dari tabel
$sql = "SELECT * FROM pengunjung";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Buku Tamu Digital BBMKG Wilayah III</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Aplikasi Buku Tamu Digital BBMKG Wilayah III</h1>
        <form action="" method="post">
            <div class="form-group">
                <label for="nama_lengkap">Nama Lengkap *</label>
                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" required>
            </div>
            <div class="form-group">
                <label for="kantor_instansi">Kantor/Instansi/Perusahaan</label>
                <input type="text" class="form-control" id="kantor_instansi" name="kantor_instansi">
            </div>
            <div class="form-group">
                <label for="alamat">Alamat Kantor/Rumah *</label>
                <input type="text" class="form-control" id="alamat" name="alamat" required>
            </div>
            <div class="form-group">
                <label for="nomor_telepon">No Telepon *</label>
                <input type="text" class="form-control" id="nomor_telepon" name="nomor_telepon" required>
            </div>
            <div class="form-group">
                <label for="keperluan">Keperluan</label>
                <select class="form-control" id="keperluan" name="keperluan" required>
                    <option value="Wawancara tentang Cuaca">Wawancara tentang Cuaca</option>
                    <option value="Konsultasi">Konsultasi</option>
                    <option value="Lainnya">Lainnya</option>
                </select>
            </div>
            <div class="form-group">
                <label for="unit_ruang">Unit/Ruang yang dituju</label>
                <select class="form-control" id="unit_ruang" name="unit_ruang">
                    <option value="-">-</option>
                    <option value="Ruang A">Ruang A</option>
                    <option value="Ruang B">Ruang B</option>
                    <option value="Ruang C">Ruang C</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Data</button>
        </form>
        <h2 class="mt-5">Data Buku Tamu</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Lengkap</th>
                    <th>Kantor/Instansi/Perusahaan</th>
                    <th>Alamat Kantor/Rumah</th>
                    <th>Nomor Telepon</th>
                    <th>Keperluan</th>
                    <th>Unit/Ruang yang dituju</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['id']}</td>
                                <td>{$row['nama_lengkap']}</td>
                                <td>{$row['kantor_instansi']}</td>
                                <td>{$row['alamat']}</td>
                                <td>{$row['nomor_telepon']}</td>
                                <td>{$row['keperluan']}</td>
                                <td>{$row['unit_ruang']}</td>
                                <td>{$row['tanggal']}</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='8'>No records found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<?php
$conn->close();
?>
