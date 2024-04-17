<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <div id="tambahBalitaValidation">
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <h5 class="card-header">Tambah Data Balita</h5>
                    <?php if(session()->getFlashdata('msg')):?>
                    <div class="alert alert-warning">
                        <?= session()->getFlashdata('msg') ?>
                    </div>
                    <?php endif;?>
                    <div class="row">
                        <!-- FormValidation -->
                        <div class="col-12">
                            <div class="card">
                                <h5 class="card-header">FormValidation</h5>
                                <div class="card-body">
                                    <form id="formValidationExamples" class="row g-3">
                                        <!-- Account Details -->
                                        <div class="col-12">
                                            <h6 class="fw-semibold">1. Account Details</h6>
                                            <hr class="mt-0" />
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating form-floating-outline">
                                                <input type="text" id="formValidationName" class="form-control"
                                                    placeholder="John Doe" name="formValidationName" />
                                                <label for="formValidationName">Full Name</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating form-floating-outline">
                                                <input class="form-control" type="email" id="formValidationEmail"
                                                    name="formValidationEmail" placeholder="john.doe" />
                                                <label for="formValidationEmail">Email</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-password-toggle">
                                                <div class="input-group input-group-merge">
                                                    <div class="form-floating form-floating-outline">
                                                        <input class="form-control" type="password"
                                                            id="formValidationPass" name="formValidationPass"
                                                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                                            aria-describedby="multicol-password2" />
                                                        <label for="formValidationPass">Password</label>
                                                    </div>
                                                    <span class="input-group-text cursor-pointer"
                                                        id="multicol-password2"><i
                                                            class="mdi mdi-eye-off-outline"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-password-toggle">
                                                <div class="input-group input-group-merge">
                                                    <div class="form-floating form-floating-outline">
                                                        <input class="form-control" type="password"
                                                            id="formValidationConfirmPass"
                                                            name="formValidationConfirmPass"
                                                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                                            aria-describedby="multicol-confirm-password2" />
                                                        <label for="formValidationConfirmPass">Confirm Password</label>
                                                    </div>
                                                    <span class="input-group-text cursor-pointer"
                                                        id="multicol-confirm-password2"><i
                                                            class="mdi mdi-eye-off-outline"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Personal Info -->
                                        <div class="col-12">
                                            <h6 class="mt-2 fw-semibold">2. Personal Info</h6>
                                            <hr class="mt-0" />
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating form-floating-outline">
                                                <input class="form-control" type="file" id="formValidationFile"
                                                    name="formValidationFile" />
                                                <label for="formValidationFile">Profile Pic</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating form-floating-outline">
                                                <input type="text" class="form-control flatpickr-validation"
                                                    name="formValidationDob" id="formValidationDob"
                                                    placeholder="YYYY-MM-DD" required />
                                                <label for="formValidationDob">DOB</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating form-floating-outline">
                                                <select id="formValidationSelect2" name="formValidationSelect2"
                                                    class="form-select select2" data-allow-clear="true">
                                                    <option value="">Select</option>
                                                    <option value="Australia">Australia</option>
                                                    <option value="Bangladesh">Bangladesh</option>
                                                    <option value="Belarus">Belarus</option>
                                                    <option value="Brazil">Brazil</option>
                                                    <option value="Canada">Canada</option>
                                                    <option value="China">China</option>
                                                    <option value="France">France</option>
                                                    <option value="Germany">Germany</option>
                                                    <option value="India">India</option>
                                                    <option value="Indonesia">Indonesia</option>
                                                    <option value="Israel">Israel</option>
                                                    <option value="Italy">Italy</option>
                                                    <option value="Japan">Japan</option>
                                                    <option value="Korea">Korea, Republic of</option>
                                                    <option value="Mexico">Mexico</option>
                                                    <option value="Philippines">Philippines</option>
                                                    <option value="Russia">Russian Federation</option>
                                                    <option value="South Africa">South Africa</option>
                                                    <option value="Thailand">Thailand</option>
                                                    <option value="Turkey">Turkey</option>
                                                    <option value="Ukraine">Ukraine</option>
                                                    <option value="United Arab Emirates">United Arab Emirates</option>
                                                    <option value="United Kingdom">United Kingdom</option>
                                                    <option value="United States">United States</option>
                                                </select>
                                                <label for="formValidationSelect2">Country</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating form-floating-outline">
                                                <input type="text" value="" class="form-control"
                                                    name="formValidationLang" id="formValidationLang"
                                                    placeholder="React" />
                                                <label for="formValidationLang">Languages</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating form-floating-outline">
                                                <select class="selectpicker tech-select w-100" id="formValidationTech"
                                                    data-style="btn-default" data-icon-base="mdi"
                                                    data-tick-icon="mdi-check text-white" name="formValidationTech"
                                                    multiple>
                                                    <option>JavaScript</option>
                                                    <option>TypeScript</option>
                                                    <option>PHP</option>
                                                    <option>Python</option>
                                                    <option>Laravel</option>
                                                    <option>.NET</option>
                                                </select>
                                                <label for="formValidationTech">Tech</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating form-floating-outline">
                                                <select class="selectpicker hobbies-select w-100"
                                                    id="formValidationHobbies" data-style="btn-default"
                                                    data-icon-base="mdi" data-tick-icon="mdi-check text-white"
                                                    name="formValidationHobbies" multiple>
                                                    <option>Sports</option>
                                                    <option>Movies</option>
                                                    <option>Books</option>
                                                </select>
                                                <label for="formValidationHobbies">Hobbies</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating form-floating-outline">
                                                <textarea class="form-control h-px-100" id="formValidationBio"
                                                    name="formValidationBio" placeholder="My name is john"
                                                    rows="3"></textarea>
                                                <label for="formValidationBio">Bio</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Gender</label>
                                            <div class="form-check custom mb-2">
                                                <input type="radio" id="formValidationGender"
                                                    name="formValidationGender" class="form-check-input" />
                                                <label class="form-check-label" for="formValidationGender">Male</label>
                                            </div>
                                            <div class="form-check custom">
                                                <input type="radio" id="formValidationGender2"
                                                    name="formValidationGender" class="form-check-input" />
                                                <label class="form-check-label"
                                                    for="formValidationGender2">Female</label>
                                            </div>
                                        </div>

                                        <!-- Choose Your Plan -->

                                        <div class="col-12">
                                            <h6 class="mt-2 fw-semibold">3. Choose Your Plan</h6>
                                            <hr class="mt-0" />
                                        </div>
                                        <div class="row gy-3 mt-0">
                                            <div class="col-xl-3 col-md-5 col-sm-6 col-12">
                                                <div class="form-check custom-option custom-option-icon">
                                                    <label class="form-check-label custom-option-content"
                                                        for="basicPlanMain1">
                                                        <span class="custom-option-body">
                                                            <i class="mdi mdi-rocket-launch-outline"></i>
                                                            <span class="custom-option-title"> Starter </span>
                                                            <small> Get 5gb of space and 1 team member. </small>
                                                        </span>
                                                        <input name="formValidationPlan" class="form-check-input"
                                                            type="radio" value="" id="basicPlanMain1" checked />
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-md-5 col-sm-6 col-12">
                                                <div class="form-check custom-option custom-option-icon">
                                                    <label class="form-check-label custom-option-content"
                                                        for="basicPlanMain2">
                                                        <span class="custom-option-body">
                                                            <i class="mdi mdi-account-outline"></i>
                                                            <span class="custom-option-title"> Personal </span>
                                                            <small> Get 15gb of space and 5 team member. </small>
                                                        </span>
                                                        <input name="formValidationPlan" class="form-check-input"
                                                            type="radio" value="" id="basicPlanMain2" />
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-md-5 col-sm-6 col-12">
                                                <div class="form-check custom-option custom-option-icon">
                                                    <label class="form-check-label custom-option-content"
                                                        for="basicPlanMain3">
                                                        <span class="custom-option-body">
                                                            <i class="mdi mdi-crown-outline"></i>
                                                            <span class="custom-option-title"> Premium </span>
                                                            <small> Get 25gb of space and 15 members. </small>
                                                        </span>
                                                        <input name="formValidationPlan" class="form-check-input"
                                                            type="radio" value="" id="basicPlanMain3" />
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label class="switch switch-primary">
                                                <input type="checkbox" class="switch-input"
                                                    name="formValidationSwitch" />
                                                <span class="switch-toggle-slider">
                                                    <span class="switch-on"></span>
                                                    <span class="switch-off"></span>
                                                </span>
                                                <span class="switch-label">Send me related emails</span>
                                            </label>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input"
                                                    id="formValidationCheckbox" name="formValidationCheckbox" />
                                                <label class="form-check-label" for="formValidationCheckbox">Agree to
                                                    our terms and conditions</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" name="submitButton"
                                                class="btn btn-primary">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- /FormValidation -->
                    </div>
                    <!-- Account -->
                    <!-- <div class="card-body pt-2">
                        <?= form_open_multipart('#', ['id' => 'formTambahBalita', 'onSubmit' => 'return false']) ?>
                        <div class="row gy-4">
                            <div class="col-md-6">
                                <div class="form-floating form-floating-outline">
                                    <input class="form-control" type="text" id="fullName" name="fullName"
                                        placeholder="Masukkan nama lengkap balita" autofocus autocomplete="off" />
                                    <label for="fullName">Nama Lengkap*</label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-floating form-floating-outline">
                                    <input type="number" name="nomor_nik" id="nomor_nik"
                                        class="form-control" placeholder="Masukkan Nomor NIK kamu" autocomplete="off" />
                                    <label for="nomor_nik">NIK (opsional)</label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-floating form-floating-outline">
                                    <input type="number" name="kartu_keluarga" id="kartu_keluarga"
                                        class="form-control" placeholder="Masukkan Nomor KK kamu" autocomplete="off" />
                                    <label for="kartu_keluarga">Kartu Keluarga (opsional)</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating form-floating-outline">
                                    <select id="jenis_kelamin" name="jenis_kelamin" class="select2 form-select">
                                        <option value="">Pilih Gender</option>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                    <label for="jenis_kelamin">Jenis Kelamin*</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating form-floating-outline">
                                    <input type="text" id="bs-datepicker-format" placeholder="DD/MM/YYYY" name="tglLahir"
                                        class="form-control" autocomplete="off" />
                                    <label for="bs-datepicker-format">Tanggal Lahir*</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating form-floating-outline">
                                    <select id="posyandu" name="posyandu" class="select2 form-select" disabled>
                                        <?php
                                                if (!empty($posyanduKader)):
                                                    ?><option value="<?= $posyanduKader->id ?>">
                                            <?= $posyanduKader->nama_posyandu ?>
                                        </option><?php
                                                else:
                                                    ?>
                                        <option value="0">Data Posyandu Kosong</option>
                                        <?php
                                                endif;
                                            ?>
                                    </select>
                                    <label for="posyandu" name="posyandu">Posyandu</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating form-floating-outline">
                                    <input class="form-control" type="text" id="firstName" name="ibu"
                                        placeholder="Masukkan nama Ibu Kandung" autofocus autocomplete="off" />
                                    <label for="fullName">Nama Ibu*</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating form-floating-outline">
                                    <input class="form-control" type="text" id="firstName" name="ayah"
                                        placeholder="Masukkan nama Ayah Kandung" autofocus autocomplete="off" />
                                    <label for="fullName">Nama Ayah*</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating form-floating-outline mb-4">
                                    <textarea class="form-control h-px-100" id="multiStepsAddress" name="alamat" placeholder="Masukkan alamat lengkap anda..."></textarea>
                                    <label for="multiStepsAddress">Alamat (opsional)</label>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary me-2" onclick="submitBalita()">Simpan</button>
                            <button type="reset" class="btn btn-outline-secondary">Batal</button>
                        </div>
                        <?= form_close() ?>
                    </div> -->
                    <!-- /Account -->
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ Content -->