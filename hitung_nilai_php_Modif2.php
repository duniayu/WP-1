<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data</title>
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
        <form method="POST" action="hitung_nilai_Output_Modif2.php">
            <input type="text" name="nama" placeholder="Masukkan Nama" required>
            <input type="text" name="nim" placeholder="Masukkan NIM" required>
            <input type="number" name="nilai_project" placeholder="Masukkan Nilai Project" required>
            <input type="number" name="nilai_tugas" placeholder="Masukkan Nilai Tugas" required>
            <input type="number" name="nilai_absensi" placeholder="Masukkan Nilai Absensi" required>
            <button type="submit">Hitung Hasil Akhir</button>
        </form>
    </div>
</body>
</html>