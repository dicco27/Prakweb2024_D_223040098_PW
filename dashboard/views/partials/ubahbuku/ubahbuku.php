<?php
$id_buku = $_GET["id_buku"];

// Querry berdasarkan id

$buku = query("SELECT * FROM buku WHERE id_buku = $id_buku")[0];


// Cek apakah tombol submit sudah ditekan atau belum ?
if (isset($_POST["submit"])) {

    // cek apakah data berhasil diubah atau tidak
    if (ubahbuku($_POST) > 0) {
        echo "
    <script>
    alert('data berhasil diubah!');
    document.location.href= 'pustaka.php';
    </script>
    ";
    } else {
        echo "
    <script>
    alert('data gagal diubah');
    document.location.href = 'pustaka.php';
    </script>
    ";
    }
}

?>
<section class="container-fluid p-5">
  <div class="container p-3">
    <div class="mx-auto p-3 bg-primary rounded-3 w-50">
      <form method="POST" action="#"  enctype="multipart/form-data">
        <input type="hidden" name="id_buku" value="<?= $buku["id_buku"]; ?>">
        <input type="hidden" name="gambarLama">
        <div class="mb-3">
            <label for="formFile" class="form-label text-light">Gambar</label>
            <input class="form-control" type="file" id="formFile" name="gambar">
        </div>
        <div class="mb-3">
          <label for="judul" class="form-label text-light">Judul</label>
          <input type="text" class="form-control" id="judul" name="judul" value="<?= $buku["judul"]; ?>">
        </div>
        <div class="mb-3">
          <label for="penulis" class="form-label text-light">Penulis</label>
          <input type="text" class="form-control" id="penulis" name="penulis" value="<?= $buku["penulis"]; ?>">
        </div>
        <div class="mb-3">
          <label for="penerbit" class="form-label text-light">Penerbit</label>
          <input type="text" class="form-control" id="penerbit" name="penerbit" value="<?= $buku["penerbit"]; ?>">
        </div>
        <div class="mb-3">
          <label for="tahun_terbit" class="form-label text-white">Tahun Terbit</label>
          <input type="number" class="form-control" id="tahun_terbit" name="tahun_terbit" min="1000" max="9999" value="<?= $buku["tahun_terbit"]; ?>"  required>
        </div>
        <div class="mb-3">
          <label for="deskripsi" class="form-label text-white">Deskripsi Buku</label>
          <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" value="<?= $buku["deskripsi"]; ?>" required></textarea>
        </div>
        <button type="submit" class="btn btn-light" name="submit">Ubah</button>
      </form>
    </div>
  </div>
</section>