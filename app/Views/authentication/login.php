<div class="position-relative">
    <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner py-4">
            <!-- Login -->
            <div class="card p-2">
                <!-- Logo -->
                <div class="app-brand justify-content-center mt-5">
                    <a href="#" class="app-brand-link gap-2">
                        <span class="app-brand-logo demo">
                            <span style="color: #666cff">
                                <img src="<?= base_url('assets/img/custom/icons-mommy-and-me.png') ?>"
                                    alt="Icon Posyandu" width="50" height="50">
                            </span>
                        </span>
                        <span class="app-brand-text demo text-heading fw-bold">Login Posyandu</span>
                    </a>
                </div>
                <!-- /Logo -->

                <div class="card-body mt-2">
                    <h4 class="mb-2 fw-semibold">Selamat Datang! 👋</h4>
                    <p class="mb-4">Silakan masuk ke akun Anda dan Selamat bertugas!</p>

                    <?php if(session()->getFlashdata('msg')):?>
                    <div class="alert alert-warning">
                        <?= session()->getFlashdata('msg') ?>
                    </div>
                    <?php endif;?>
                    <form id="formAuthentication" class="mb-3" action="<?= base_url('login/process'); ?>" method="POST">
                        <div class="form-floating form-floating-outline mb-3">
                            <input type="text" class="form-control" id="username" name="username"
                                placeholder="Masukkan username anda" autofocus autocomplete="off" />
                            <label for="username">Username</label>
                        </div>
                        <div class="mb-3">
                            <div class="form-password-toggle">
                                <div class="input-group input-group-merge">
                                    <div class="form-floating form-floating-outline">
                                        <input type="password" id="password" class="form-control" name="password"
                                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                            aria-describedby="password" autocomplete="off" />
                                        <label for="password">Password</label>
                                    </div>
                                    <span class="input-group-text cursor-pointer">
                                        <i class="mdi mdi-eye-off-outline"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 d-flex justify-content-between">
                            <a href="auth-forgot-password-basic.html" class="float-end mb-1">
                                <span>Lupa Password?</span>
                            </a>
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary d-grid w-100" id="submitButton" type="submit">Masuk</button>
                        </div>
                    </form>

                    <p class="text-center">
                        <span>Belum punya akun?</span>
                        <a href="https://wa.me/+6281289973003" target="_blank">
                            <span>Silahkan kontak kami</span>
                        </a>
                    </p>

                    <div class="divider my-4">
                        <div class="divider-text">or</div>
                    </div>

                    <div class="d-flex justify-content-center gap-2">
                        <a href="javascript:;" class="btn btn-icon btn-lg rounded-pill btn-text-github">
                            <i class="tf-icons mdi mdi-24px mdi-github"></i>
                        </a>

                        <a href="javascript:;" class="btn btn-icon btn-lg rounded-pill btn-text-google-plus">
                            <i class="tf-icons mdi mdi-24px mdi-google"></i>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /Login -->
            <img alt="mask" src="<?= base_url('assets/img/illustrations/auth-basic-login-mask-light.png') ?>"
                class="authentication-image d-none d-lg-block"
                data-app-light-img="illustrations/auth-basic-login-mask-light.png"
                data-app-dark-img="illustrations/auth-basic-login-mask-dark.png" />
        </div>
    </div>
</div>