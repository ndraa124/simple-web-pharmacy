<div class="container mt-7">
    <h1>
        <a href="#" class="btn px-4" onclick="history.back()">
            <i class="fas fa-arrow-left text-primary"></i>
        </a>
        <?= $title; ?>
    </h1>

    <div class="row mt-4">
        <div class="col">
            <img src="<?= base_url('uploads/payment/' . $trx['payment_image']); ?>" class="img-preview img-fluid" style="height: 250px;">
        </div>
    </div>
</div>