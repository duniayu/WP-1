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
        <input type="text" id="nim" name="nim" required><br><br>

        <label for="nilai_project">Nilai Project:</label><br>
        <input type="number" id="nilai_project" name="nilai_project" required><br><br>

        <label for="nilai_tugas">Nilai Tugas:</label><br>
        <input type="number" id="nilai_tugas" name="nilai_tugas" required><br><br>

        <label for="nilai_absensi">Nilai Absensi:</label><br>
        <input type="number" id="nilai_absensi" name="nilai_absensi" required><br><br>

        <input type="submit" value="Hitung">
        <input type="button" value="Hitung Ulang" onclick="window.location.href='';">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

        // Menampilkan hasil
        echo "<h3>Hasil Akhir</h3>";
        echo "Nama: " . htmlspecialchars($nama) . "<br>";
        echo "NIM: " . htmlspecialchars($nim) . "<br>";
        echo "Nilai Akhir: " . number_format($hasil_akhir, 2) . "<br>";
        echo "Grade: " . $grade;
    }
    ?>
</body>
</html>