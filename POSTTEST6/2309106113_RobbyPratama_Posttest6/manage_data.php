<?php
include 'koneksi.php';  // Menghubungkan ke database

// Inisialisasi variabel pencarian
$search = "";

// Jika ada input pencarian dari form
if (isset($_GET['search'])) {
    $search = $_GET['search'];
    // Query pencarian data berdasarkan nama, email, atau pesan
    $sql = "SELECT * FROM data WHERE nama LIKE '%$search%' OR email LIKE '%$search%' OR pesan LIKE '%$search%'";
} else {
    // Jika tidak ada pencarian, tampilkan semua data
    $sql = "SELECT * FROM data";
}

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Data - Kopi Dua Hati</title>
    <link rel="stylesheet" href="style_data.css">
</head>
<body>

    <div class="container">
        <h1>Kelola Data</h1>

        <!-- Formulir Pencarian -->
        <form action="" method="GET" class="search-container">
            <input type="text" name="search" placeholder="Cari berdasarkan nama, email, atau pesan" value="<?php echo $search; ?>">
            <button type="submit">Cari</button>
        </form>

        <table border="1">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>No HP</th>
                    <th>Pesan</th>
                    <th>File</th>
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
                                <td>{$row['file']}</td>
                                <td>
                                    <a href='update.php?nama={$row['nama']}'>Edit</a> |
                                    <a href='delete.php?nama={$row['nama']}'>Hapus</a>
                                </td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>Tidak ada data yang ditemukan</td></tr>";
                }
                ?>
            </tbody>
        </table>

        <div class="button-container">
            <a href="logout.php" class="btn">Logout</a>
        </div>
    </div>

</body>
</html>

<?php
$conn->close();  // Menutup koneksi
?>
