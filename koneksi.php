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

function query($query)
{
    global $conn;
    $hasil =  mysqli_query($conn, $query);
    $baris = [];
    while ($bari = mysqli_fetch_assoc($hasil)) {
        $baris[] = $bari;
    }
    return $baris;
}

// funsi ubah buku
function ubahbuku($databuku)
{
    global $conn;
    $id_buku = $_POST['id_buku'];
    $judul = htmlspecialchars($_POST['judul']);
    $penulis = htmlspecialchars($_POST['penulis']);
    $penerbit = htmlspecialchars($_POST['penerbit']);
    $gambarLama = htmlspecialchars($_POST['gambarLama']);
    $tahun_terbit = htmlspecialchars($_POST['tahun_terbit']);
    $deskripsi = htmlspecialchars($_POST['deskripsi']);

    // cek apakah user menambahkan gambar baru atau tidak ?
    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = uploadImage();
    }

    // Pastikan gambar_buku valid sebelum melanjutkan query
    if (!$gambar) {
        return false;
    }

    // Perbaiki query dengan menghilangkan tanda kutip pada kolom stock dan deskripsi
    $query = "UPDATE buku SET
        gambar = '$gambar',
        judul = '$judul',
        penulis = '$penulis',
        penerbit = '$penerbit',
        tahun_terbit = $tahun_terbit,
        deskripsi = '$deskripsi'
        WHERE id_buku = $id_buku";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

// Fungsi Hapus Buku
function hapus($id_buku)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM buku WHERE id_buku = $id_buku");
    return mysqli_affected_rows($conn);
}


function uploadImage()
{
    // Pastikan key 'gambar_buku' ada di $_FILES sebelum mengaksesnya
    if (!isset($_FILES['gambar'])) {
        echo "<script>alert('Tidak ada file yang diupload');</script>";
        return false;
    }

    $imageName = $_FILES['gambar']['name'];
    $imageSize = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    if ($error === 4) { // Jika tidak ada file yang diupload
        echo "<script>alert('Insert an image!');</script>";
        return false;
    }

    if ($imageSize > 5000000 || $error === 1) { // Ukuran file terlalu besar
        echo "<script>alert('Image is too big');</script>";
        return false;
    }

    if ($error !== 0) { // Jika ada error lain
        echo "<script>alert('Failed to upload an image!');</script>";
        return false;
    }

    // Validasi ekstensi file
    $validExtention = ['jpg', 'jpeg', 'png', 'webp'];
    $imageExtention = explode('.', $imageName);
    $imageExtention = strtolower(end($imageExtention));
    if (!in_array($imageExtention, $validExtention)) {
        echo "<script>alert('Not an image!');</script>";
        return false;
    }

    // Membuat nama file baru yang unik
    $newImageName = uniqid();
    $newImageName .= '.' . $imageExtention;

    // Pindahkan file ke direktori pertama (misal './img/')
    $targetDirectory1 = './img/' . $newImageName;
    if (!move_uploaded_file($tmpName, $targetDirectory1)) {
        echo "<script>alert('Failed to move file to the first directory!');</script>";
        return false;
    }

    // Menyalin file ke direktori kedua (misal '../img/')
    $targetDirectory2 = '../img/' . $newImageName;
    if (!copy($targetDirectory1, $targetDirectory2)) {
        echo "<script>alert('Failed to copy file to the second directory!');</script>";
        return false;
    }

    return $newImageName;
}
?>