<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hitung Hasil Akhir</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
        }
        #form-container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            border: none;
            border-radius: 5px;
            background-color: #007BFF;
            color: white;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div id="form-container">
        <form method="POST">
            <input type="text" name="nama" placeholder="Masukkan Nama" required>
            <input type="text" name="nim" placeholder="Masukkan NIM" required>
            <input type="number" name="nilai_project" placeholder="Masukkan Nilai Project" required>
            <input type="number" name="nilai_tugas" placeholder="Masukkan Nilai Tugas" required>
            <input type="number" name="nilai_absensi" placeholder="Masukkan Nilai Absensi" required>
            <button type="submit">Hitung Hasil Akhir</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Mengambil data dari formulir
            $nama = $_POST['nama'];
            $nim = $_POST['nim'];
            $nilai_project = $_POST['nilai_project'];
            $nilai_tugas = $_POST['nilai_tugas'];
            $nilai_absensi = $_POST['nilai_absensi'];

            // Menghitung hasil akhir
            $hasil_akhir = (0.2 * $nilai_absensi) + (0.25 * $nilai_tugas) + (0.55 * $nilai_project);

            // Menampilkan hasil
            echo "<h3>Hasil Akhir untuk $nama ($nim):</h3>";
            echo "<p>Nilai Project: $nilai_project</p>";
            echo "<p>Nilai Tugas: $nilai_tugas</p>";
            echo "<p>Nilai Absensi: $nilai_absensi</p>";
            echo "<p>Hasil Akhir: " . round($hasil_akhir, 2) . "</p>";
        }
        ?>
    </div>
</body>
</html>