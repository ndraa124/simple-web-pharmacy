<?php
$success = session()->getFlashdata('success');
$error = session()->getFlashdata('error');
?>

<div class="container mt-7">
    <h1><?= $title; ?></h1>

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
        <?php if ($trx) { ?>
            <table class="table table-striped table-hover" id="mytable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>No. Invoice</th>
                        <th>Metode Pembayaran</th>
                        <th>Pelanggan</th>
                        <th>Total Transaksi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;  ?>
                    <?php foreach ($trx as $row) { ?>
                        <tr>
                            <td style="vertical-align: middle"><?= $i++; ?></td>
                            <td style="vertical-align: middle"><?= $row['trx_created_at']; ?></td>
                            <td style="vertical-align: middle"><?= $row['trx_invoice']; ?></td>
                            <td style="vertical-align: middle"><?= getPaymentMethod($row['payment_method']); ?></td>
                            <td style="vertical-align: middle"><?= $row['user_fullname']; ?></td>
                            <td style="vertical-align: middle"><?= formatRupiah($row['trx_total']); ?></td>
                            <td style="vertical-align: middle">
                                <?php if ($row['payment_method'] == 1) { ?>
                                    <a href="<?= site_url('payment/image/' . $row['trx_id']); ?>" class="btn btn-info btn-block mt-2">Lihat Bukti Bayar</a>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php } else { ?>
            <div class="col mb-4">
                <p>Tidak ada transaksi dari pelanggan</p>
            </div>
        <?php } ?>
    </div>
</div>