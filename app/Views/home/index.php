<?php
$success = session()->getFlashdata('success');
$error = session()->getFlashdata('error');
?>

<!-- Carousel -->
<div id="carouselExampleIndicators" class="carousel slide mt-5" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="https://picsum.photos/id/237/1200/400" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>First slide label</h5>
        <p>Some representative placeholder content for the first slide.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="https://picsum.photos/id/238/1200/400" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Second slide label</h5>
        <p>Some representative placeholder content for the second slide.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="https://picsum.photos/id/239/1200/400" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Third slide label</h5>
        <p>Some representative placeholder content for the third slide.</p>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<!-- End Carousel -->

<!-- Product Cards -->
<div class="container mt-5">
  <?php if ($success) { ?>
    <div class="alert alert-success text-center pb-0">
      <p><?= $success; ?></p>
    </div>
  <?php } ?>

  <?php if ($error) { ?>
    <div class="alert alert-danger text-center pb-0">
      <p><?= $error; ?></p>
    </div>
  <?php } ?>

  <div class="row row-cols-1 row-cols-md-3">
    <?php if ($product) { ?>
      <?php foreach ($product as $row) { ?>
        <div class="col mb-4">
          <div class="card h-100 pt-4" style="width: 22rem;">
            <?php if ($row['product_image'] != null) { ?>
              <img src="<?= base_url('uploads/product/' . $row['product_image']); ?>" class="card-img-top img-responsive w-50 mx-auto d-block" alt="<?= $row['product_name']; ?>">
            <?php } else { ?>
              <img src="https://placeholder.com/720" class="card-img-top img-responsive w-50 mx-auto d-block" alt="<?= $row['product_name']; ?>">
            <?php } ?>

            <div class="card-body">
              <h5 class="card-title"><?= $row['product_name']; ?></h5>
              <p class="card-text"><?= $row['category_name']; ?> | Stok: <?= $row['product_qty']; ?></p>
              <h2 class="card-title text-primary"><?= formatRupiah($row['product_price']); ?></h2>

              <?php if (session()->get('role') == 1) { ?>
                <a href="<?= site_url('product/update/' . $row['product_id']); ?>" class="btn btn-warning btn-block mt-2">Edit Produk</a>
                <form method="POST" action="<?= site_url('product/delete/' . $row['product_id']); ?>">
                  <input type="hidden" name="_method" value="DELETE">
                  <button type="submit" class="btn btn-danger btn-block mt-2" onclick="return confirm('Apakah anda yakin ingin menghapus produk ini?')">Hapus Produk</button>
                </form>
              <?php } else { ?>
                <form method="POST" action="<?= site_url('cart/create'); ?>">
                  <input type="hidden" name="cart_product" value="<?= $row['product_name']; ?>">
                  <input type="hidden" name="cart_price" value="<?= $row['product_price']; ?>">
                  <input type="hidden" name="cart_qty" value="1">
                  <input type="hidden" name="product_id" value="<?= $row['product_id']; ?>">
                  <button type="submit" class="btn btn-primary btn-block mt-2">Tambah ke Keranjang</button>
                </form>
              <?php } ?>
            </div>
          </div>
        </div>
      <?php } ?>
    <?php } else { ?>
      <div class="col mb-4">
        <p>Produk tidak ada.</p>
      </div>
    <?php } ?>
  </div>
</div>
<!-- End Product Cards -->