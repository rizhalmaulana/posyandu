    <div class="authentication-wrapper authentication-cover">
        <!-- Logo -->
        <a href="index.html" class="auth-cover-brand d-flex align-items-center gap-2">
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
            <!-- Left Text -->
            <div class="d-none d-lg-flex col-lg-4 align-items-center justify-content-center p-5">
                <img alt="register-multi-steps-illustration"
                    src="<?= base_url('assets/img/illustrations/misc-coming-soon-illustration.png') ?>"
                    class="h-auto mh-100 w-px-200" />
            </div>
            <!-- /Left Text -->

            <!--  Multi Steps Registration -->
            <div class="d-flex col-lg-8 align-items-center justify-content-center authentication-bg p-5">
                <div class="w-px-700">
                    <div id="multiStepsValidation" class="bs-stepper wizard-numbered">
                        <div class="bs-stepper-header border-bottom-0">
                            <div class="step" data-target="#accountDetailsValidation">
                                <button type="button" class="step-trigger">
                                    <span class="bs-stepper-circle"><i class="mdi mdi-check"></i></span>
                                    <span class="bs-stepper-label">
                                        <span class="bs-stepper-number">01</span>
                                        <span class="d-flex flex-column gap-1 ms-2">
                                            <span class="bs-stepper-title">Akun</span>
                                            <span class="bs-stepper-subtitle">Detail Akun</span>
                                        </span>
                                    </span>
                                </button>
                            </div>
                            <div class="line"></div>
                            <div class="step" data-target="#personalInfoValidation">
                                <button type="button" class="step-trigger">
                                    <span class="bs-stepper-circle"><i class="mdi mdi-check"></i></span>
                                    <span class="bs-stepper-label">
                                        <span class="bs-stepper-number">02</span>
                                        <span class="d-flex flex-column gap-1 ms-2">
                                            <span class="bs-stepper-title">Personal</span>
                                            <span class="bs-stepper-subtitle">Masukkan Informasi</span>
                                        </span>
                                    </span>
                                </button>
                            </div>
                        </div>
                        <div class="bs-stepper-content">
                            <?= form_open_multipart('#', ['id' => 'multiStepsForm', 'onSubmit' => 'return false']) ?>
                            <!-- Account Details -->
                            <div id="accountDetailsValidation" class="content">
                                <div class="content-header mb-3">
                                    <h4 class="mb-0">Informasi Akun</h4>
                                    <small>Masukkan Detail Akun Kamu</small>
                                </div>
                                <div class="row g-3">
                                    <div class="col-sm-6">
                                        <div class="form-floating form-floating-outline">
                                            <input type="text" name="multiStepsUsername" id="multiStepsUsername"
                                                class="form-control" placeholder="Masukkan Username Kamu"
                                                autocomplete="off" />
                                            <label for="multiStepsUsername">Username</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-floating form-floating-outline">
                                            <select id="selectStatus" name="selectStatus" class="select2 form-select"
                                                data-allow-clear="true">
                                                <option value="">Status</option>
                                                <option value="Master Admin">Master Admin</option>
                                                <option value="Admin">Admin</option>
                                                <option value="User">Kader Posyandu</option>
                                            </select>
                                            <label for="selectStatus">Status Izin Akses</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 form-password-toggle">
                                        <div class="input-group input-group-merge">
                                            <div class="form-floating form-floating-outline">
                                                <input type="password" id="multiStepsPass" name="multiStepsPass"
                                                    class="form-control"
                                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                                    aria-describedby="multiStepsPass2" autocomplete="off" />
                                                <label for="multiStepsPass">Password</label>
                                            </div>
                                            <span class="input-group-text cursor-pointer" id="multiStepsPass2"><i
                                                    class="mdi mdi-eye-off-outline"></i></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 form-password-toggle">
                                        <div class="input-group input-group-merge">
                                            <div class="form-floating form-floating-outline">
                                                <input type="password" id="multiStepsConfirmPass"
                                                    name="multiStepsConfirmPass" class="form-control"
                                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                                    aria-describedby="multiStepsConfirmPass2" autocomplete="off" />
                                                <label for="multiStepsConfirmPass">Konfirmasi Password</label>
                                            </div>
                                            <span class="input-group-text cursor-pointer" id="multiStepsConfirmPass2">
                                                <i class="mdi mdi-eye-off-outline"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-floating form-floating-outline">
                                            <select id="selectGender" name="selectGender" class="select2 form-select"
                                                data-allow-clear="true">
                                                <option value="">Pilih</option>
                                                <option value="Laki-laki">Laki-laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                            <label for="selectGender">Jenis Kelamin</label>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-between">
                                        <button class="btn btn-secondary btn-prev" disabled>
                                            <i class="mdi mdi-arrow-left me-sm-1 me-0"></i>
                                            <span class="align-middle d-sm-inline-block d-none">Kembali</span>
                                        </button>
                                        <button class="btn btn-primary btn-next">
                                            <span
                                                class="align-middle d-sm-inline-block d-none me-sm-1 me-0">Selanjutnya</span>
                                            <i class="mdi mdi-arrow-right"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!-- Personal Info -->
                            <div id="personalInfoValidation" class="content">
                                <div class="content-header mb-3">
                                    <h4 class="mb-0">Informasi Personal dan Alamat Posyandu</h4>
                                    <small>Silahkan Lengkapi Form Dibawah Ini.</small>
                                </div>
                                <div class="row g-3">
                                    <div class="col-sm-6">
                                        <div class="form-floating form-floating-outline">
                                            <input type="text" id="multiStepsFirstName" name="multiStepsFirstName"
                                                class="form-control" placeholder="Masukkan nama depan kamu"
                                                autocomplete="off" />
                                            <label for="multiStepsFirstName">Nama Depan</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-floating form-floating-outline">
                                            <input type="text" id="multiStepsLastName" name="multiStepsLastName"
                                                class="form-control" placeholder="Masukkan nama belakang kamu"
                                                autocomplete="off" />
                                            <label for="multiStepsLastName">Nama Akhir</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-floating form-floating-outline">
                                            <select id="selectCity" class="select2 form-select" name="selectCity"
                                                data-allow-clear="true">
                                                <option value="">Pilih Kota Asal</option>
                                                <?php 
                                                    if (isset($listKota)): 
                                                        foreach($listKota as $kota):
                                                            ?><option value="<?= $kota['id']; ?>">
                                                            <?= $kota['nama_kota']; ?></option> <?php
                                                        endforeach;
                                                    else:
                                                        ?>
                                                            <option value="0">Data Kota Kosong</option>
                                                        <?php
                                                    endif;

                                                ?>
                                            </select>
                                            <label for="selectCity">Asal Kota Posyandu</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 header-kecamatan">
                                        <div class="form-floating form-floating-outline form-select-kecamatan">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 header-kelurahan">
                                        <div class="form-floating form-floating-outline form-select-kelurahan">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 header-posyandu">
                                        <div class="form-floating form-floating-outline form-select-posyandu">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-floating form-floating-outline">
                                            <input type="text" id="multiStepsAddress" name="multiStepsAddress"
                                                class="form-control" placeholder="Address" autocomplete="off" />
                                            <label for="multiStepsAddress">Alamat Lengkap Posyandu</label>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-between">
                                        <button class="btn btn-secondary btn-prev">
                                            <i class="mdi mdi-arrow-left me-sm-1 me-0"></i>
                                            <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                        </button>
                                        <button type="submit" class="btn btn-primary btn-next btn-submit"
                                            onclick="confirmRegistration()">Submit</button>
                                    </div>
                                </div>
                            </div>
                            <?= form_close() ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- / Multi Steps Registration -->
        </div>
    </div>

    <script>
        // Check selected custom option
        window.Helpers.initCustomOptionCheck();
    </script>