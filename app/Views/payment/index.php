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
            <form action="<?= site_url('transaction/create'); ?>" method="POST">
                <input type="hidden" name="trx_note" value="">

                <div class="custom-control custom-radio">
                    <input type="radio" id="customRadio1" name="payment_method" value="1" class="custom-control-input" required>
                    <label class="custom-control-label" for="customRadio1">Transfer Bank</label>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" id="customRadio2" name="payment_method" value="2" class="custom-control-input">
                    <label class="custom-control-label" for="customRadio2">Bayar di Kasir</label>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-info shadow mt-4 float-right px-5">
                        Upload Bukti Bayar &nbsp; <i class="fa fa-chevron-right"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>