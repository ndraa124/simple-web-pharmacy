<?php $cart = model('CartModel'); ?>

<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top shadow">
    <div class="container">
        <a class="navbar-brand" href="<?= base_url(); ?>">
            <img src="<?= base_url('images/logo.png'); ?>" alt="logo" class="d-inline-block align-top" width="140px" height="40px">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item <?= ($page == 'home-page') ? 'active font-weight-bold' : ''; ?>">
                    <a class="nav-link" href="<?= base_url(); ?>">Beranda</a>
                </li>
                <?php if (session()->get('role') == 1) { ?>
                    <li class="nav-item <?= ($page == 'trx-page') ? 'active font-weight-bold' : ''; ?>">
                        <a class="nav-link" href="<?= site_url('transaction'); ?>">Transaksi</a>
                    </li>
                    <li class="nav-item <?= ($page == 'category-page') ? 'active font-weight-bold' : ''; ?>">
                        <a class="nav-link" href="<?= site_url('category'); ?>">Kategori</a>
                    </li>
                <?php } else { ?>
                    <li class="nav-item <?= ($page == 'cart-page') ? 'active font-weight-bold' : ''; ?>">
                        <a class="nav-link" href="<?= site_url('cart'); ?>">Keranjang <div class="badge badge-info"><?= count($cart->findAll()); ?></div></a>
                    </li>
                <?php } ?>
                <li class="nav-item <?= ($page == 'product-page') ? 'active font-weight-bold' : ''; ?>">
                    <a class="nav-link" href="<?= site_url('product'); ?>">Produk</a>
                </li>
                <li class="nav-item <?= ($page == 'about-page') ? 'active font-weight-bold' : ''; ?>">
                    <a class="nav-link" href="<?= site_url('about'); ?>">Tentang Kami</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('logout'); ?>" onclick="return confirm('Apakah anda yakin ingin keluar?')">
                        <i class="fas fa-sign-out-alt text-danger"></i> Keluar
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>