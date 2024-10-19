<?php
// Query Produk Berdasarkan kategori
// Ambil queri buku
$listbuku = query("SELECT * FROM buku ");

?>

<section class="container-fluid p-5">
  <div class="container p-3">
    <div class="text-center mb-3">
        <a href="tambahbuku.php" class="btn btn-primary text-center">Tambah Buku</a>
    </div>
    <table class="table mx-auto w-75">
      <thead>
        <tr>
          <th scope="col">Id</th>
          <th scope="col">Gambar</th>
          <th scope="col">Judul</th>
          <th scope="col">Ubah</th>
          <th scope="col">Hapus</th>
        </tr>
      </thead>
      <?php $i = 1; ?>
      <?php foreach ($listbuku as $lb): ?>
      <tbody>
        <tr>
          <th scope="row"><?= $i ?></th>
          <td><img src="../img/<?= $lb['gambar']; ?>" width="30" height="40" alt="Buku"></td>
          <td><?= $lb['judul']; ?></td>
          <td><a href="ubahbuku.php?id_buku=<?= $lb["id_buku"]; ?>" class="btn btn-primary">Ubah</a></td>
          <td><a href="hapusbuku.php?id_buku=<?= $lb["id_buku"]; ?>" class="btn btn-primary">Hapus</a></td>
        </tr>
      </tbody>
      <?php $i++ ?>
      <?php endforeach; ?>
    </table>
  </div>
</section>