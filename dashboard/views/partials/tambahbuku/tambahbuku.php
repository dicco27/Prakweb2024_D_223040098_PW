<section class="container-fluid p-5">
  <div class="container p-3">
    <div class="mx-auto p-3 bg-primary rounded-3 w-50">
      <form>
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
        <button type="submit" class="btn btn-light">Tambah</button>
      </form>
    </div>
  </div>
</section>