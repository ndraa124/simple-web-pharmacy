<?php
$errLogin = session()->getFlashdata('err_login');
?>

<div class="d-flex flex-column align-items-center mb-3">
    <img src="<?= base_url('images/logo.png'); ?>" alt="logo" class="d-inline-block" width="275px" height="75px">
</div>

<div class="card shadow">
    <div class="card-header bg-transparent text-center font-weight-bold">
        Silahkan login dibawah ini
    </div>
    <div class="card-body">
        <?php if ($errLogin) { ?>
            <div class="text-danger">
                <p><?= $errLogin; ?></p>
            </div>
        <?php } ?>

        <form method="POST">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="group-icon">
                        <i class="fas fa-at fa-sm px-1" id="form-icon"></i>
                    </span>
                </div>
                <input type="text" class="form-control form-control-lg" id="username" name="username" placeholder="Username" required>
            </div>
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="group-icon">
                        <i class="fas fa-lock fa-sm px-1" id="form-icon"></i>
                    </span>
                </div>
                <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Password" required>
            </div>
            <div class="form-group text-right">
                <a href="<?= site_url('forgot-password'); ?>" class="text-info">Lupa password?</a>
            </div>
            <button type="submit" class="btn btn-info btn-block shadow mt-3" id="btn-login">Masuk</button>
        </form>
    </div>
    <div class="card-footer bg-transparent text-center">
        Belum punya akun? <a href="<?= site_url('register'); ?>" class="font-weight-bold text-info">Registrasi</a>
    </div>
</div>