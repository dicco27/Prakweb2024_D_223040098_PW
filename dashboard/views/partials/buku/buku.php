<?php
// Query Produk Berdasarkan kategori
// Ambil queri buku
$listbuku = query("SELECT * FROM buku ");

?>
<!-- Awal Rak Buku -->
    <section class="container-fluid" >
        <div class="container">
            <div class="mt-5">
                <div class="row mx-auto">
                    <?php foreach ($listbuku as $lb): ?>
                    <div class="col-lg-4 mt-3">
                        <div class="card mx-auto" style="width: 18rem;">
                            <img src="../img/<?= $lb['gambar']; ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h3><?= $lb['judul']; ?></h3>
                                <p class="card-text"><?= $lb['deskripsi']; ?></p>
                                <div class="mx-auto">
                                    <a href="#" class="btn btn-primary w-100">Ubah Buku</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>