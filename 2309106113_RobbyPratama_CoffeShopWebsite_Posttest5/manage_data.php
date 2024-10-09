<?php
include 'koneksi.php';  // Menghubungkan ke database

// Query untuk mendapatkan semua data
$sql = "SELECT * FROM data";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Data - Kopi Dua Hati</title>
    <link rel="stylesheet" href="style_data.css"> <!-- Pastikan ini mengarah ke file CSS Anda -->
</head>
<body>

    <div class="container">
        <h1>Kelola Data</h1>

        <table border="1">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>No HP</th>
                    <th>Pesan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['nama']}</td>
                                <td>{$row['email']}</td>
                                <td>{$row['hp']}</td>
                                <td>{$row['pesan']}</td>
                                <td>
                                    <a href='update.php?nama={$row['nama']}'>Edit</a> |
                                    <a href='delete.php?nama={$row['nama']}'>Hapus</a>
                                </td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>Tidak ada data</td></tr>";
                }
                ?>
            </tbody>
        </table>

        <div class="button-container">
            <a href="index.html" class="btn">Kembali ke Beranda</a>
        </div>
    </div>

</body>
</html>

<?php
$conn->close();  // Menutup koneksi
?>
