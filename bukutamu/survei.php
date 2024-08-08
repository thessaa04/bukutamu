<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Form</title>
    <link rel="stylesheet" href="survei.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500&display=swap">
</head>
<body>
    <div class="container">
<header>
        <h1 class="title">Buku Tamu Digital BBMKG Wilayah III</h1>
        <h2 class="subtitle">Form Index Kepuasan Masyarakat terhadap Pelayanan BMKG</h2>
        <form id="feedback-form" class="form">
</header>
<main>
	<form action="survei.php" method="post">
            <div class="form-group">
                <label for="name" class="label">Nama Lengkap *</label>
                <input type="text" id="nama_lengkap" name="nama_lengkap" required class="input">
            </div>

            <div class="question">
                <p class="question-text">1. Bagaimana Pendapat anda tentang kesopanan dan keramahan petugas kami?</p>
                <div class="radio-group">
                    <label class="radio-label">
                        <input type="radio" name="kesopanan" value="Sangat Sopan dan Ramah" class="radio-input">
                        <span class="radio-text">Sangat Sopan dan Ramah</span>
                    </label>
                    <label class="radio-label">
                        <input type="radio" name="kesopanan" value="Sopan dan Ramah" class="radio-input">
                        <span class="radio-text">Sopan dan Ramah</span>
                    </label>
                    <label class="radio-label">
                        <input type="radio" name="kesopanan" value="Kurang Sopan dan Kurang Ramah" class="radio-input">
                        <span class="radio-text">Kurang Sopan dan Kurang Ramah</span>
                    </label>
                    <label class="radio-label">
                        <input type="radio" name="kesopanan" value="Tidak Sopan dan Tidak Ramah" class="radio-input">
                        <span class="radio-text">Tidak Sopan dan Tidak Ramah</span>
                    </label>
                </div>
            </div>

            <div class="question">
                <p class="question-text">2. Bagaimana pendapat anda tentang kecakapan petugas kami dalam mengarahkan anda sesuai kepentingan anda?</p>
                <div class="radio-group">
                    <label class="radio-label">
                        <input type="radio" name="kecakapan" value="Sangat Cakap" class="radio-input">
                        <span class="radio-text">Sangat Cakap</span>
                    </label>
                    <label class="radio-label">
                        <input type="radio" name="kecakapan" value="Cakap" class="radio-input">
                        <span class="radio-text">Cakap</span>
                    </label>
                    <label class="radio-label">
                        <input type="radio" name="kecakapan" value="Kurang Cakap" class="radio-input">
                        <span class="radio-text">Kurang Cakap</span>
                    </label>
                    <label class="radio-label">
                        <input type="radio" name="kecakapan" value="Tidak Cakap" class="radio-input">
                        <span class="radio-text">Tidak Cakap</span>
                    </label>
                </div>
            </div>

            <div class="question">
                <p class="question-text">3. Bagaimana pendapat anda terkait kenyamanan di kantor kami?</p>
                <div class="radio-group">
                    <label class="radio-label">
                        <input type="radio" name="kenyamanan" value="Sangat Nyaman" class="radio-input">
                        <span class="radio-text">Sangat Nyaman</span>
                    </label>
                    <label class="radio-label">
                        <input type="radio" name="kenyamanan" value="Nyaman" class="radio-input">
                        <span class="radio-text">Nyaman</span>
                    </label>
                    <label class="radio-label">
                        <input type="radio" name="kenyamanan" value="Kurang Nyaman" class="radio-input">
                        <span class="radio-text">Kurang Nyaman</span>
                    </label>
                    <label class="radio-label">
                        <input type="radio" name="kenyamanan" value="Tidak Nyaman" class="radio-input">
                        <span class="radio-text">Tidak Nyaman</span>
                    </label>
                </div>
            </div>

            <button type="submit" class="submit-button">Simpan</button>
        </form>
    </div>

    <script src="script.js"></script>

    <?php
include 'C:\xampp\htdocs\bukutamu\koneksi.php';

function getNamaLengkap($id_tamu) {
    $sql = "SELECT nama_lengkap FROM buku_tamu WHERE id_tamu = ?";
    $stmt =  $conn->prepare($sql);
    $stmt->bind_param("i", $id_tamu);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['nama_lengkap'];
    } else {
        return ''; // atau nilai default lainnya
    }
}

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_tamu = $_SESSION['id_tamu'];
    $kesopanan = $_POST['kesopanan'];
    var_dump($kesopanan);
    $kecakapan = $_POST['kecakapan'];
    var_dump($kecakapan);
    $kenyamanan = $_POST['kenyamanan'];
    var_dump($kenyamanan);

    // validasi input
    if (empty($id_tamu) || !is_numeric($id_tamu)) {
        throw new Exception("Invalid id_tamu");
    }

    // ambil nama lengkap dari database
    $nama_lengkap = getNamaLengkap($id_tamu);

    $sql = "INSERT INTO form_kepuasan (kesopanan, kecakapan, kenyamanan) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $kesopanan, $kecakapan, $kenyamanan);

    try {
        if ($stmt->execute()) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }

    $conn->close();
}
?>



$conn->close();
?>

</body>
</html>