<?php
$success = session()->getFlashdata('success');
$error = session()->getFlashdata('error');
?>

<div class="container mt-7">
    <?php if (session()->get('role') == 1) { ?>
        <h1><?= $title; ?> <a href="<?= site_url('product/create'); ?>" class="btn btn-primary float-right px-4">Tambah Produk</a></h1>
    <?php } else { ?>
        <h1><?= $title; ?></h1>
    <?php } ?>

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