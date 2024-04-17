    <div class="authentication-wrapper authentication-cover">
        <!-- Logo -->
        <a href="<?= base_url('login'); ?>" class="auth-cover-brand d-flex align-items-center gap-2">
            <span class="app-brand-logo demo">
                <span style="color: #666cff">
                    <img src="<?= base_url('assets/img/custom/icons-mommy-and-me.png') ?>" alt="Icon Posyandu"
                        width="50" height="50">
                </span>
            </span>
            <span class="app-brand-text demo text-heading fw-bold">Registrasi Akun</span>
        </a>
        <!-- /Logo -->
        <div class="authentication-inner row m-0">
            <!-- /Left Text -->
            <div class="d-none d-lg-flex col-lg-7 col-xl-8 align-items-center justify-content-center p-5 pb-2">
                <img src="<?= base_url('assets/img/illustrations/auth-register-illustration-light.png'); ?>"
                    class="auth-cover-illustration w-100" alt="auth-illustration"
                    data-app-light-img="illustrations/auth-register-illustration-light.png"
                    data-app-dark-img="illustrations/auth-register-illustration-dark.png" />
                <img src="<?= base_url('assets/img/illustrations/auth-cover-register-mask-light.png'); ?>"
                    class="authentication-image" alt="mask"
                    data-app-light-img="illustrations/auth-cover-register-mask-light.png"
                    data-app-dark-img="illustrations/auth-cover-register-mask-dark.png" />
            </div>
            <!-- /Left Text -->

            <!-- Register -->
            <div class="d-flex col-12 col-lg-5 col-xl-4 align-items-center authentication-bg position-relative py-sm-5 px-4 py-4">
                <div class="w-px-400 mx-auto pt-5 pt-lg-0">
                    <h4 class="mb-2 fw-semibold">Yuk Daftar Sekarang! 🚀</h4>
                    <p class="mb-4">Dan pantau perkembangan balita dengan mudah!</p>

                    <?= form_open_multipart('#', ['id' => 'formAuthentication', 'onSubmit' => 'return false']) ?>
                        <div class="form-floating form-floating-outline mb-3">
                            <input type="text" class="form-control" id="username" name="username"
                                placeholder="cth: Kader Posyandu Melati" autofocus />
                            <label for="username">Username</label>
                        </div>
                        <div class="form-floating form-floating-outline mb-3">
                            <select id="select-status" name="select-status" class="select2 form-select"
                                data-allow-clear="true">
                                <option value="">Status</option>
                                <option value="Master Admin">Master Admin</option>
                                <option value="Admin">Admin</option>
                                <option value="User">Kader Posyandu</option>
                            </select>
                            <label for="select-status">Status Izin Akses</label>
                        </div>
                        <div class="form-floating form-floating-outline mb-3">
                            <select id="select-city" class="select2 form-select" name="select-city"
                                data-allow-clear="true">
                                <option value="">Pilih Kota Asal</option>
                                <?php 
                                    if (isset($listKota)): 
                                        foreach($listKota as $kota):
                                            ?><option value="<?= $kota['id'] ?>">
                                    <?= $kota['nama_kota'] ?></option> <?php
                                        endforeach;
                                    else:
                                        ?>
                                <option value="0">Data Kota Kosong</option>
                                <?php
                                    endif;
                                ?>
                            </select>
                            <label for="select-city">Asal Kota Posyandu</label>
                        </div>
                        <div class="col-sm-12 header-kecamatan mb-3">
                            <div class="form-floating form-floating-outline form-select-kecamatan">
                            </div>
                        </div>
                        <div class="col-sm-12 header-kelurahan mb-3">
                            <div class="form-floating form-floating-outline form-select-kelurahan">
                            </div>
                        </div>
                        <div class="col-sm-12 header-posyandu mb-3">
                            <div class="form-floating form-floating-outline form-select-posyandu">
                            </div>
                        </div>
                        <div class="mb-3 form-password-toggle">
                            <div class="input-group input-group-merge">
                                <div class="form-floating form-floating-outline">
                                    <input type="password" id="password" class="form-control" name="password"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="password" />
                                    <label for="password">Password</label>
                                </div>
                                <span class="input-group-text cursor-pointer"><i
                                        class="mdi mdi-eye-off-outline"></i></span>
                            </div>
                        </div>
                        <div class="mb-3 form-password-toggle">
                            <div class="input-group input-group-merge">
                                <div class="form-floating form-floating-outline">
                                    <input type="password" id="confirm-password" name="confirm-password"
                                        class="form-control"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="confirm-password" autocomplete="off" />
                                    <label for="confirm-password">Konfirmasi Password</label>
                                </div>
                                <span class="input-group-text cursor-pointer" id="confirm-password">
                                    <i class="mdi mdi-eye-off-outline"></i>
                                </span>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary d-grid w-100 btn-submit" onclick="confirmRegistration()">Daftar Sekarang</button>
                    </form>

                    <p class="text-center mt-2">
                        <span>Sudah punya akun?</span>
                        <a href="<?= base_url('login') ?>">
                            <span>Login Yuk!</span>
                        </a>
                    </p>
                </div>
            </div>
            <!-- /Register -->
        </div>
    </div>
