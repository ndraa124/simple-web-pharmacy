<div class="d-flex flex-column align-items-center mb-3">
    <img src="<?= base_url('images/logo.png'); ?>" alt="logo" class="d-inline-block" width="275px" height="75px">
</div>

<div class="card shadow">
    <div class="card-header bg-transparent text-center font-weight-bold">
        Masukkan email anda dibawah ini
    </div>
    <div class="card-body">
        <form method="POST" action="<?= site_url('forgot-password/verify'); ?>">
            <div class="input-group mb-3">
                <span class="input-group-text" id="group-icon">
                    <i class="fas fa-envelope fa-sm" id="form-icon"></i>
                </span>
                <input type="email" class="form-control form-control-lg" id="email" placeholder="example@mail.com">
            </div>
            <button type="submit" class="btn btn-info btn-block shadow mt-3" id="btn-login">Kirim</button>
        </form>
    </div>
    <div class="card-footer bg-transparent text-center">
        <i class="fas fa-arrow-left fa-sm mr-2"></i>
        <a href="<?= site_url('login'); ?>" class="text-info">Kembali</a>
    </div>
</div>