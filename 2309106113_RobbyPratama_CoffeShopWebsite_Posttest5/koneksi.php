<?php
// Aktifkan tampilan error (debugging)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Detail koneksi database
$server = 'localhost';
$user = 'root';
$password = '';
$dbname = 'kontak_coffe_db';

// Membuat koneksi
$conn = mysqli_connect($server, $user, $password, $dbname);

// Mengecek koneksi
if (!$conn) {
    die("Gagal terhubung ke database: " . mysqli_connect_error());
} else {
}
?>
