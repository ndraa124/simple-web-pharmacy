<div class="d-flex flex-column align-items-center mt-5">
  <img src="<?= base_url('images/logo.png'); ?>" alt="logo" class="d-inline-block" width="275px" height="75px">
</div>

<div class="card shadow mb-5 mt-3">
  <div class="card-header bg-transparent text-center font-weight-bold">
    Silahkan registrasi dibawah ini
  </div>
  <div class="card-body">
    <form method="POST">
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="group-icon">
            <i class="fas fa-user" id="form-icon"></i>
          </span>
        </div>
        <input type="text" class="form-control form-control-lg" id="name" name="name" placeholder="Nama Lengkap">
      </div>
      <div class="input-group mb-3">
        <span class="input-group-text" id="group-icon">
          <i class="fas fa-at fa-sm" id="form-icon"></i>
        </span>
        <input type="text" class="form-control form-control-lg" id="username" name="username" placeholder="Username">
      </div>
      <div class="input-group mb-3">
        <span class="input-group-text" id="group-icon">
          <i class="fas fa-envelope fa-sm" id="form-icon"></i>
        </span>
        <input type="email" class="form-control form-control-lg" id="email" name="email" placeholder="Email">
      </div>
      <div class="input-group mb-3">
        <span class="input-group-text" id="group-icon">
          <i class="fas fa-lock fa-sm" id="form-icon"></i>
        </span>
        <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Password">
      </div>
      <div class="input-group">
        <span class="input-group-text" id="group-icon">
          <i class="fas fa-lock fa-sm" id="form-icon"></i>
        </span>
        <input type="password" class="form-control form-control-lg" id="conf_password" name="conf_password" placeholder="Konfirmasi Password">
      </div>
      <button type="submit" class="btn btn-info btn-block shadow mt-4" id="btn-register">Daftar</button>
    </form>
  </div>
  <div class="card-footer bg-transparent text-center">
    Sudah punya akun? <a href="<?= site_url('login'); ?>" class="font-weight-bold text-info">Masuk</a>
  </div>
</div>