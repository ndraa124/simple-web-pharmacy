<?php
$error = session()->getFlashdata('error');
?>

<div class="container mt-7">
    <h1>
        <a href="<?= site_url('category'); ?>" class="btn px-4">
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

            <form method="POST" action="<?= site_url('category/update/' . $data['category_id']); ?>">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="category_id" value="<?= $data['category_id']; ?>">

                <div class="form-group">
                    <label for="category-name">Nama Produk</label>
                    <input type="text" class="form-control form-form-control-lg" id="category-name" name="category_name" value="<?= $data['category_name']; ?>" placeholder="Isi nama kategori" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary shadow mt-4 float-right px-5">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>