<?php
$host = 'localhost'; // Sesuaikan dengan host Anda
$db = 'perpustakaan_untad'; // Ganti dengan nama database Anda
$user = 'root'; // Username database
$pass = ''; // Password database

// Buat koneksi
$conn = new mysqli($host, $user, $pass, $db);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>