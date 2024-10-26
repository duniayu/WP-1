<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator Sederhana dengan PHP</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
        }
        #calculator {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
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
    <div id="calculator">
        <form method="POST">
            <input type="number" name="num1" placeholder="Angka Pertama" required>
            <input type="number" name="num2" placeholder="Angka Kedua" required>
            <button type="submit" name="operation" value="+">+</button>
            <button type="submit" name="operation" value="-">-</button>
            <button type="submit" name="operation" value="*">*</button>
            <button type="submit" name="operation" value="/">/</button>
            <button type="submit" name="calculate" value="=">=</button>
        </form>

        <?php
        $result = '';

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['calculate'])) {
                $num1 = $_POST['num1'];
                $num2 = $_POST['num2'];
                $operation = $_POST['operation'];

                switch ($operation) {
                    case '+':
                        $result = $num1 + $num2;
                        break;
                    case '-':
                        $result = $num1 - $num2;
                        break;
                    case '*':
                        $result = $num1 * $num2;
                        break;
                    case '/':
                        if ($num2 != 0) {
                            $result = $num1 / $num2;
                        } else {
                            $result = 'Error: Pembagian dengan nol';
                        }
                        break;
                    default:
                        $result = 'Operasi tidak valid';
                        break;
                }
            }
        }

        // Menampilkan hasil
        if ($result !== '') {
            echo "<h3>Hasil: $result</h3>";
        }
        ?>
    </div>
</body>
</html>