<section class="container-fluid p-5">
  <div class="container p-3">
    <div class="mx-auto p-3 bg-primary rounded-3 w-50">
      <form method="POST" action="#"  enctype="multipart/form-data">
        <div class="mb-3">
            <label for="formFile" class="form-label text-light">Gambar</label>
            <input class="form-control" type="file" id="formFile" name="gambar">
        </div>
        <div class="mb-3">
          <label for="judul" class="form-label text-light">Judul</label>
          <input type="text" class="form-control" id="judul" name="judul">
        </div>
        <div class="mb-3">
          <label for="penulis" class="form-label text-light">Penulis</label>
          <input type="text" class="form-control" id="penulis" name="penulis">
        </div>
        <div class="mb-3">
          <label for="penerbit" class="form-label text-light">Penerbit</label>
          <input type="text" class="form-control" id="penerbit" name="penerbit">
        </div>
        <div class="mb-3">
          <label for="tahun_terbit" class="form-label text-white">Tahun Terbit</label>
          <input type="number" class="form-control" id="tahun_terbit" name="tahun_terbit" min="1000" max="9999" required>
        </div>
        <div class="mb-3">
          <label for="deskripsi" class="form-label text-white">Deskripsi Buku</label>
          <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" required></textarea>
        </div>
        <button type="submit" class="btn btn-light" name="submit">Tambah</button>
      </form>
      <?php
                if (isset($_POST['submit'])) {
                    include '../koneksi.php';

                    $gambar = uploadImage();
                    if ($gambar === false) {
                        // Jika upload gambar gagal, berhenti dan tidak lanjut insert ke database
                        exit;
                    }

                    $judul = htmlspecialchars($_POST['judul']);
                    $penulis = htmlspecialchars($_POST['penulis']);
                    $penerbit = htmlspecialchars($_POST['penerbit']);
                    $tahun_terbit = htmlspecialchars($_POST['tahun_terbit']);
                    $deskripsi = htmlspecialchars($_POST['deskripsi']);

                    $sql = "INSERT INTO `buku`(`gambar`, `judul`, `penulis`, `penerbit`, `tahun_terbit`, `deskripsi`) VALUES ('$gambar', '$judul', '$penulis', '$penerbit', '$tahun_terbit', '$deskripsi')";

                    if (mysqli_query($conn, $sql)) {
                        // Set pesan ke dalam variabel sesi atau gunakan echo setelah redirect
                        echo '<script>alert("Berhasil Menambahkan Buku")</script>';
                        // Redirect setelah penambahan buku berhasil
                        header("Location: pustaka.php");
                        exit;
                    } else {
                        echo '<script>alert("Menambahkan produk gagal");</script>';
                    }
                }
                ?>

    </div>
  </div>
</section>