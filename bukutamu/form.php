<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Tamu</title>
    <link rel="stylesheet" href="form.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
  <div class="container">
    <header>
      <div class="header-bg">
        <h1 class="text-center mb-4">BUKU Tamu Digital BBMKG Wilayah III</h1>
        </div>
    </header>
    <main>
        <form action="form.php" method="post">
            <div class="form-group">
                <label for="nama_lengkap">Nama Lengkap*</label>
                <div class="input-group">
                  <i class="fas fa-user fa-lg"></i>
                  <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" required>
                </div>
            </div>
            <div class="form-group">
                <label for="instansi">Kantor/Instansi/Perusahaan</label>
                <div class="input-group">
                <i class="fas fa-building fa-lg"></i>
                <input type="text" class="form-control" id="instansi" name="instansi">
                </div>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat Kantor/Rumah*</label>
                <div class="input-group">
                  <i class="fas fa-map-marker-alt fa-lg"></i>
                  <input type="text" class="form-control" id="alamat" name="alamat" required>
                </div>
            </div>
            <div class="form-group">
                <label for="no_telepon">No Telepon*</label>
                <div class="input-group">
                  <i class="fas fa-phone fa-lg"></i>
                  <input type="text" class="form-control" id="no_telepon" name="no_telepon" required>
                </div>
            </div>
            <div class="form-group">
                <label for="keperluan">Keperluan</label>
                <div class="input-group">
                <i class="fas fa-question-circle fa-lg"></i>
                <select class="form-control" id="keperluan" name="keperluan">
                    <option value="wawancara tentang cuaca">Wawancara tentang cuaca</option>
                    <option value="konsultasi">Konsultasi</option>
                    <option value="lainnya">Lainnya</option>
                </select>
                </div>
            </div>
            <div class="form-group">
                <label for="unit_dituju">Unit/Ruang yang Dituju</label>
                <div class="input-group">
                 <i class="fas fa-door-open fa-lg"></i>
                  <select class="form-control" id="unit_dituju" name="unit_dituju">
                    <option value="meteorologi">Meteorologi</option>
                    <option value="klimatologi">Klimatologi</option>
                    <option value="geofisika">Geofisika</option>
                </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block" name="submit">Simpan Data</button>
        </form>
    </main>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#nama_lengkap').focus();
        });
    </script>

    <footer>
        &copy; 2023 Registrasi Tamu
    </footer>

    <?php
    include 'C:\xampp\htdocs\bukutamu\koneksi.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      session_start();
        $nama_lengkap = $_POST['nama_lengkap'];
        $instansi = $_POST['instansi'];
        $alamat = $_POST['alamat'];
        $no_telepon = $_POST['no_telepon'];
        $keperluan = $_POST['keperluan'];
        $unit_dituju = $_POST['unit_dituju'];
        $created_at = date('Y-m-d H:i:s');

        $sql = "INSERT INTO buku_tamu (nama_lengkap, instansi, alamat, no_telepon, keperluan, unit_dituju, created_at)
                VALUES ('$nama_lengkap', '$instansi', '$alamat', '$no_telepon', '$keperluan', '$unit_dituju', '$created_at')";
        
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
    ?>
</body>
</html>
