<?php
$success = session()->getFlashdata('success');
$error = session()->getFlashdata('error');
?>

<div class="container mt-7">
    <h1>
        <a href="#" class="btn px-4" onclick="history.back()">
            <i class="fas fa-arrow-left text-primary"></i>
        </a>
        <?= $title; ?>
    </h1>

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

    <div class="row mt-4">
        <div class="col">
            <form method="POST" action="<?= site_url('payment/upload'); ?>" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="trx_id" value="<?= session()->get('trx_id'); ?>">

                <div class="bg-info text-light p-4 mb-2">
                    <h6 class="mb-4">Silahkan Kirim ke Nomor Rekening Tujuan Berikut:</h6>
                    <p>
                        Atas Rekening: Kevin Pesik <br>
                        Bank: BRI <br>
                        Nomor Rekening: 1234567890
                    </p>
                </div>

                <div class="form-group">
                    <label for="payment_image" class="d-block">
                        Upload Bukti Bayar (jpg/png)
                    </label>
                    <input type="file" name="payment_image" id="payment-image" onchange="previewImg('#payment-image', '.img-preview')" />
                </div>
                <div class="form-group d-none" id="img-preview">
                    <img class="img-preview img-fluid" style="height: 250px;">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-info shadow mt-4 float-right px-5">
                        Upload Bukti Bayar &nbsp; <i class="fa fa-upload"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>