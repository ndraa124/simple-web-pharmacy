<?php
$error = session()->getFlashdata('error');
?>

<div class="container mt-7">
    <h1>
        <a href="<?= site_url('product'); ?>" class="btn px-4">
            <i class="fas fa-arrow-left text-primary"></i>
        </a>
        <?= $title; ?>
    </h1>

    <div class="row mt-5">
        <div class="col">
            <?php if ($error) { ?>
                <div class="text-danger">
                    <p><?= $error; ?></p>
                </div>
            <?php } ?>

            <form method="POST" action="<?= site_url('product/create'); ?>" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="product-name">Nama Produk</label>
                    <input type="text" class="form-control form-form-control-lg" id="product-name" name="product_name" placeholder="Isi nama produk" required>
                </div>
                <div class="form-group">
                    <label for="category-id">Kategori</label>
                    <select class="form-control form-form-control-lg" id="category-id" name="category_id">
                        <option>- Pilih Kategori -</option>
                        <?php foreach ($category as $row) { ?>
                            <option value="<?= $row['category_id']; ?>"><?= $row['category_name']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="product-price">Harga</label>
                    <input type="text" class="form-control form-form-control-lg" id="product-price" name="product_price" placeholder="Isi harga produk" required>
                </div>
                <div class="form-group">
                    <label for="product-qty">Jumlah Stok</label>
                    <input type="number" class="form-control form-form-control-lg" id="product-qty" name="product_qty" placeholder="Isi jumlah produk" required>
                </div>
                <div class="form-group">
                    <label for="product-desc">Deskripsi</label>
                    <textarea class="form-control form-form-control-lg" id="product-desc" name="product_desc" placeholder="Isi deskripsi produk" rows="3" required></textarea>
                </div>
                <div class="form-group">
                    <label for="product_image" class="d-block">
                        Upload Gambar (jpg/png)
                    </label>
                    <input type="file" name="product_image" id="product-image" onchange="previewImg('#product-image', '.img-preview')" />
                </div>
                <div class="form-group d-none" id="img-preview">
                    <img class="img-preview img-fluid" style="height: 250px;">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary shadow mt-4 float-right px-5">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>