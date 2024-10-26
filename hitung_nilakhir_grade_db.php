<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hitung Nilai Akhir</title>
</head>
<body>
    <h2>Formulir Penghitungan Nilai Akhir</h2>
    <form method="post" action="">
        <label for="nama">Nama:</label><br>
        <input type="text" id="nama" name="nama" required><br><br>

        <label for="nim">NIM:</label><br>
        <input type="text" id="nim" name="nim" required maxlength="8"><br><br>

        <label for="nilai_project">Nilai Project:</label><br>
        <input type="number" id="nilai_project" name="nilai_project" required><br><br>

        <label for="nilai_tugas">Nilai Tugas:</label><br>
        <input type="number" id="nilai_tugas" name="nilai_tugas" required><br><br>

        <label for="nilai_absensi">Nilai Absensi:</label><br>
        <input type="number" id="nilai_absensi" name="nilai_absensi" required><br><br>

        <input type="submit" name="simpan" value="Simpan">
        <input type="submit" name="tambah" value="Tambah">
        <input type="button" value="Batal" onclick="window.location.href='';">
        <input type="button" value="Keluar" onclick="window.close();">
    </form>

    <?php
    // Koneksi ke database
    $servername = "localhost"; // Ganti jika perlu
    $username = "root"; // Ganti jika perlu
    $password = ""; // Ganti jika perlu
    $dbname = "nilai_mahasiswa";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Cek koneksi
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        // Mengambil nilai dari form
        $nama = $_POST['nama'];
        $nim = $_POST['nim'];
        $nilai_project = $_POST['nilai_project'];
        $nilai_tugas = $_POST['nilai_tugas'];
        $nilai_absensi = $_POST['nilai_absensi'];

        // Menghitung hasil akhir
        $hasil_akhir = (0.2 * $nilai_absensi) + (0.25 * $nilai_tugas) + (0.55 * $nilai_project);

        // Menentukan grade
        if ($hasil_akhir >= 80) {
            $grade = "A";
        } elseif ($hasil_akhir >= 69) {
            $grade = "B";
        } elseif ($hasil_akhir >= 59) {
            $grade = "C";
        } elseif ($hasil_akhir >= 49) {
            $grade = "D";
        } else {
            $grade = "E";
        }

        // Simpan ke database jika tombol "Simpan" ditekan
        if (isset($_POST['simpan'])) {
            $stmt = $conn->prepare("INSERT INTO hasil_nilai (nama, nim, nilai_project, nilai_tugas, nilai_absensi, hasil_akhir, grade) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssdddds", $nama, $nim, $nilai_project, $nilai_tugas, $nilai_absensi, $hasil_akhir, $grade);

            if ($stmt->execute()) {
                echo "<h3>Data berhasil disimpan!</h3>";
            } else {
                echo "Error: " . $stmt->error;
            }
            $stmt->close();
        }
    }
        // Jika tombol "Tambah" ditekan, tampilkan form