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
        <?php if ($cart) { ?>
            <table class="table table-striped table-hover" id="mytable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Jumlah</th>
                        <th>Total Harga</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;  ?>
                    <?php foreach ($cart as $row) { ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $row['cart_product']; ?></td>
                            <td>
                                <form method="POST" action="<?= site_url('cart/update/' . $row['cart_id']); ?>" class="d-inline">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="cart_qty" value="1">

                                    <button type="submit" style="border: 0; background-color: transparent;">
                                        <i class="fa fa-minus-circle text-danger"></i>
                                    </button>
                                </form>
                                <p class="mx-2 d-inline"><?= $row['cart_qty']; ?></p>
                                <form method="POST" action="<?= site_url('cart/update/' . $row['cart_id']); ?>" class="d-inline">
                                    <input type="hidden" name="_method" value="PUT">
                                    <input type="hidden" name="cart_qty" value="1">

                                    <button type="submit" style="border: 0; background-color: transparent;">
                                        <i class="fa fa-plus-circle text-primary"></i>
                                    </button>
                                </form>
                            </td>
                            <td><?= formatRupiah($row['cart_price']); ?></td>
                        </tr>
                    <?php } ?>
                    <tr>
                        <td colspan="3" class="text-right">
                            <strong>Total Bayar</strong>
                        </td>
                        <td><?= formatRupiah($cartTotal); ?></td>
                    </tr>
                </tbody>
            </table>

            <div class="col">
                <a href="<?= site_url('payment'); ?>" class="btn btn-info mt-2 px-4 float-right">
                    Pembayaran &nbsp; <i class="fa fa-chevron-right"></i>
                </a>
            </div>
        <?php } else { ?>
            <div class="col mb-4">
                <p>Keranjang anda kosong</p>
            </div>
        <?php } ?>
    </div>
</div>