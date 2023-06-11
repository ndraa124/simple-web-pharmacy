<?php
$success = session()->getFlashdata('success');
$error = session()->getFlashdata('error');
?>

<div class="container mt-7">
    <?php if (session()->get('role') == 1) { ?>
        <h1><?= $title; ?> <a href="<?= site_url('category/create'); ?>" class="btn btn-primary float-right px-4">Tambah Kategori</a></h1>
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
        <?php if ($category) { ?>
            <?php foreach ($category as $row) { ?>
                <div class="col mb-4">
                    <div class="card h-100" style="width: 22rem;">
                        <div class="card-body">
                            <h5 class="card-title"><?= $row['category_name']; ?></h5>

                            <a href="<?= site_url('category/update/' . $row['category_id']); ?>" class="btn btn-warning btn-block mt-2">Edit Kategori</a>
                            <form method="POST" action="<?= site_url('category/delete/' . $row['category_id']); ?>">
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger btn-block mt-2" onclick="return confirm('Apakah anda yakin ingin menghapus Kategori ini?')">Hapus Kategori</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php } ?>
        <?php } else { ?>
            <div class="col mb-4">
                <p>Tidak ada kategori.</p>
            </div>
        <?php } ?>
    </div>
</div>