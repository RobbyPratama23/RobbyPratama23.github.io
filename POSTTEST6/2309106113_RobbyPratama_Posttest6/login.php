<?php
session_start();
require_once 'koneksi.php'; // Koneksi ke database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['nama'];
    $password = $_POST['password'];

    $query = "SELECT id, password FROM users WHERE username = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows == 1) {
        $stmt->bind_result($id, $hashed_password);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {
            // Jika password benar, simpan sesi
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            echo "<script>
                    alert('Login Berhasil!');
                    window.location.href = 'manage_data.php';
                  </script>";
            exit;
        } else {
            $error = "Password salah.";
        }
    } else {
        $error = "Username tidak ditemukan.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan Kopi - Kopi Dua Hati</title>

    <!-- Font Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://unpkg.com/feather-icons"></script>

    <link rel="stylesheet" href="style_pesan.css">
</head>
<body>
    <!--Main Content-->
    <section class="order">
        <h2><span>Login</span> Dulu Lee...</h2>
        <p>Silakan Isi Nama dan Passwordnya lee...</p>

        <?php if (isset($error)): ?>
            <div style="color: red;"><?php echo $error; ?></div>
        <?php endif; ?>

        <form action="" method="POST">
            <div class="input-group">
                <label>Username</label><br>
                <i data-feather="user"></i>
                <input type="text" name="nama" placeholder="Nama" required>
            </div>
            <div class="input-group">
                <label>Password</label><br>
                <i data-feather="key"></i>
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <button class="btn" type="submit">Login</button>
        </form>
        <p>Belum punya akun? <a href="register.php" style="color: var(--primary); text-decoration: none;">Daftar di sini</a></p>
    </section>

    <script src="script.js"></script>
</body>
</html>
