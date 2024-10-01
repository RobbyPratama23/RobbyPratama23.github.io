<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Input</title>
    <style>
        :root {
            --primary: #b6895b;
            --bg: #010101;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--bg);
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            padding: 20px;
        }

        .container {
            text-align: center;
            max-width: 800px;
            width: 100%;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            margin-bottom: 20px;
        }

        th, td {
            padding: 15px;
            text-align: left;
        }

        th {
            background: var(--primary);
            color: #fff;
        }

        td {
            color: var(--bg);
        }

        /* Menghapus garis bawah pada data */
        tr:last-child td {
            border-bottom: none; /* Menghapus garis bawah pada baris terakhir */
        }

        .button-container {
            display: flex;
            justify-content: center; /* Memposisikan tombol di tengah */
            margin-top: 10px;
        }

        button {
            padding: 10px 20px;
            background: var(--primary);
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background 0.3s;
        }

        button:hover {
            background: #9c7a4d;
        }
    </style>
</head>
<body>

<div class="container">
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = htmlspecialchars($_POST['nama']);
    $email = htmlspecialchars($_POST['email']);
    $hp = htmlspecialchars($_POST['hp']);
    $pesan = htmlspecialchars($_POST['pesan']);

    echo "<table>";
    echo "<tr><th>Hasil Input</th></tr>";
    echo "<tr><td>Nama: $nama</td></tr>";
    echo "<tr><td>Email: $email</td></tr>";
    echo "<tr><td>No. HP: $hp</td></tr>";
    echo "<tr><td>Pesan : $pesan</td></tr>";
    echo "</table>";
    echo "<div class='button-container'>";
    echo "<button onclick='window.history.back()'>Kembali</button>";
    echo "</div>";
} else {
    echo "<div>Tidak ada data</div>";
}
?>
</div>

</body>
</html>
