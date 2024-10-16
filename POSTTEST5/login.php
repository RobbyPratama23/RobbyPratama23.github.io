<?php
session_start(); // Memulai session


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['nama'];
    $password = $_POST['password'];

    if ($username === 'ngopi' && $password === 'ngopidulule') {
        $_SESSION['loggedin'] = true; // Set session login
        header("location: manage_data.php");
        exit;
    } else {
        $error = "Username atau password salah.";
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
        <p>Username = ngopi | Password = ngopidulule</p>

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
    </section>

    <script src="script.js"></script>
</body>
</html>
