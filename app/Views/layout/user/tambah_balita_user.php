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
                    <!-- Account -->
                    <div class="card-body pt-2">
                        <?= form_open_multipart('#', ['id' => 'formTambahBalita', 'onSubmit' => 'return false']) ?>
                        <div class="row gy-4">
                            <div class="col-md-6">
                                <div class="form-floating form-floating-outline">
                                    <input class="form-control" type="text" id="firstName" name="fullName"
                                        placeholder="Masukkan nama lengkap balita" autofocus autocomplete="off" />
                                    <label for="fullName">Nama Lengkap</label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-floating form-floating-outline">
                                    <input type="number" name="nomor_nik" id="multiStepsUsername"
                                        class="form-control" placeholder="Masukkan Nomor NIK kamu" autocomplete="off" />
                                    <label for="multiStepsUsername">NIK</label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-floating form-floating-outline">
                                    <input type="number" name="kartu_keluarga" id="multiStepsUsername"
                                        class="form-control" placeholder="Masukkan Nomor KK kamu" autocomplete="off" />
                                    <label for="multiStepsUsername">Kartu Keluarga</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating form-floating-outline">
                                    <select id="jenis_kelamin" name="jenis_kelamin" class="select2 form-select">
                                        <option value="">Pilih Gender</option>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                    <label for="jenis_kelamin">Jenis Kelamin</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating form-floating-outline">
                                    <input type="text" id="bs-datepicker-format" placeholder="DD/MM/YYYY" name="tglLahir"
                                        class="form-control" autocomplete="off" />
                                    <label for="bs-datepicker-format">Tanggal Lahir</label>
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
                                    <label for="fullName">Nama Ibu</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating form-floating-outline">
                                    <input class="form-control" type="text" id="firstName" name="ayah"
                                        placeholder="Masukkan nama Ayah Kandung" autofocus autocomplete="off" />
                                    <label for="fullName">Nama Ayah</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating form-floating-outline mb-4">
                                    <textarea class="form-control h-px-100" id="multiStepsAddress" name="alamat" placeholder="Masukkan alamat lengkap anda..."></textarea>
                                    <label for="multiStepsAddress">Alamat</label>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary me-2" onclick="submitBalita()">Simpan</button>
                            <button type="reset" class="btn btn-outline-secondary">Batal</button>
                        </div>
                        <?= form_close() ?>
                    </div>
                    <!-- /Account -->
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ Content -->
