<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <div id="tambahBalitaValidation">
        <div class="row">
            <?= form_open_multipart('#', ['id' => 'formPemeriksaanBalita', 'onSubmit' => 'return false']) ?>
            <div class="col-md-12">
                <div class="card mb-4">
                    <h5 class="card-header">Data Sasaran Bayi, Balita dan APRAS</h5>
                    <div class="row card-body">
                        <div class="col-lg-6">
                            <p>NIK : <?= $data_balita->nik; ?></p>
                            <p>Nama Ayah : <?= $data_balita->nama_ayah; ?></p>
                            <p>Nama Ibu : <?= $data_balita->nama_ibu; ?></p>
                            <p>Tgl Lahir Balita : <?= $data_balita->tanggal_lahir; ?></p>
                        </div>
                        <div class="col-lg-6">
                            <p>Kecamatan : <?= $data_posyandu->nama_kecamatan; ?></p>
                            <p>Kelurahan : <?= $data_posyandu->nama_kelurahan; ?></p>
                            <p>Posyandu : <?= $data_posyandu->nama_posyandu; ?></p>
                        </div>
                    </div>
                    <?php if(session()->getFlashdata('msg')):?>
                    <div class="alert alert-warning">
                        <?= session()->getFlashdata('msg') ?>
                    </div>
                    <?php endif;?>
                    <div class="card-body pt-2">
                        <div class="row gy-4">
                            <div class="col-md-4">
                                <div class="form-floating form-floating-outline">
                                    <input class="form-control" type="text" id="firstName" name="fullName"
                                        value="<?= $data_balita->nama_lengkap; ?>" autocomplete="off" disabled />
                                    <label for="fullName">Nama Bayi/Balita/APRAS</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating form-floating-outline">
                                    <input class="form-control" type="text" id="firstName" name="fullName"
                                        value="<?= $umur_bayi_saat_ini['umur_tahun']; ?> Tahun <?= $umur_bayi_saat_ini['umur_bulan']; ?> Bulan <?= $umur_bayi_saat_ini['umur_hari']; ?> Hari"
                                        autocomplete="off" disabled />
                                    <label for="fullName">Umur Bayi/Balita/APRAS Saat Ini</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating form-floating-outline">
                                    <select id="jenis_kelamin" name="jenis_kelamin" class="select2 form-select"
                                        disabled>
                                        <option value="<?= $data_balita->jenis_kelamin?>">
                                            <?= $data_balita->jenis_kelamin?></option>
                                    </select>
                                    <label for="jenis_kelamin">Jenis Kelamin</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <h5>Riwayat Kunjungan Pemeriksaan</h5>
                                <div class="card mb-4">
                                    <div class="card-datatable table-responsive">
                                        <table class="kunjungan-responsive table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Tanggal Kunjungan</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Tanggal Kunjungan</th>
                                                    <th>Status</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Account -->
                </div>
            </div>
            <div class="col-md-12">
                <div class="card mb-4">
                    <h5 class="card-header">Form Perkembangan Bayi/Balita/APRAS sesuai umur</h5>
                    <?php if(session()->getFlashdata('msg')):?>
                    <div class="alert alert-warning">
                        <?= session()->getFlashdata('msg') ?>
                    </div>
                    <?php endif;?>
                    <div class="card-body pt-2">
                        <div class="row gy-4">
                            <div class="col-md-6 mb-2">
                                <div class="form-floating form-floating-outline">
                                    <input type="text" id="bs-datepicker-format" placeholder="DD/MM/YYYY"
                                        name="tglLahir" class="form-control" autocomplete="off" />
                                    <label for="bs-datepicker-format">Tanggl Kunjungan</label>
                                </div>
                            </div>
                            <div class="col-md-6 mb-2">
                                <div class="form-floating form-floating-outline">
                                    <input class="form-control" type="text" id="firstName" name="fullName"
                                        value="<?= $umur_bayi_saat_ini['umur_bulan']; ?> Bulan" autocomplete="off"
                                        disabled />
                                    <label for="fullName">Umur Bayi/Balita/APRAS (Bulan)</label>
                                </div>
                            </div>
                        </div>
                        <div class="help-center-popular-articles py-5">
                            <div class="container-xl">
                                <h5 class="text-center my-4">Pilih dan Lengkapi Pemantauan Dibawah Ini Sesuai Umur
                                    Bayi/Balita</h5>
                                <div class="row mb-2">
                                    <div class="col-lg-12">
                                        <div class="row">
                                            <?php
                                                for ($i = 0; $i < $jumlah_pertanyaan; $i++) {
                                                    if (isset($data_jawaban) && !empty($data_jawaban)) {
                                                        if ($data_jawaban[$i]['status_jawaban'] == "Tidak Lengkap") {
                                                            ?>
                                                                <div class="col-md-4 mb-md-0 mt-4 mb-4">
                                                                    <div class="card border shadow-none">
                                                                        <span class="position-absolute top-0 start-100 translate-middle badge bg-danger text-white"><?= $data_jawaban[$i]['total_pertanyaan_belum_dijawab']; ?></span>
                                                                        <div class="card-body text-center">
                                                                            <img class="mb-3" src="<?= base_url('assets/img/icons/unicons/baby-grow.png') ?>" height="60" alt="Help center landing" />
                                                                            <h5><?= $master_pertanyaan[$i]['judul_pertanyaan']; ?></h5>
                                                                            <span class="btn btn-label-danger"><?= $data_jawaban[$i]['status_jawaban']; ?></span>
                                                                            <button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#modalPertanyaan<?= $i; ?>">Pantau Perkembangan</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <?php
                                                        } else if ($data_jawaban[$i]['status_jawaban'] == "Belum Diisi") {
                                                            if ($data_jawaban[$i]['status_akses'] == "primary") {
                                                                ?>
                                                                <div class="col-md-4 mb-md-0 mt-4 mb-4">
                                                                    <div class="card border shadow-none">
                                                                        <span class="position-absolute top-0 start-100 translate-middle badge bg-danger text-white"><?= $data_jawaban[$i]['total_pertanyaan_belum_dijawab']; ?></span>
                                                                        <div class="card-body text-center">
                                                                            <img class="mb-3" src="<?= base_url('assets/img/icons/unicons/baby-grow.png') ?>" height="60" alt="Help center landing" />
                                                                            <h5><?= $master_pertanyaan[$i]['judul_pertanyaan']; ?></h5>
                                                                            <span class="btn btn-label-danger"><?= $data_jawaban[$i]['status_jawaban']; ?></span>
                                                                            <button type="button" class="btn btn-outline-primary mt-3" data-bs-toggle="modal" data-bs-target="#modalPertanyaan<?= $i; ?>">Pantau Perkembangan</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <?php
                                                            } else {
                                                                ?>
                                                                <div class="col-md-4 mb-md-0 mt-4 mb-4">
                                                                    <div class="card border shadow-none">
                                                                        <span class="position-absolute top-0 start-100 translate-middle badge bg-secondary text-white"><?= $data_jawaban[$i]['total_pertanyaan_belum_dijawab']; ?></span>
                                                                        <div class="card-body text-center">
                                                                            <img class="mb-3" src="<?= base_url('assets/img/icons/unicons/baby-grow.png') ?>" height="60" alt="Help center landing" />
                                                                            <h5><?= $master_pertanyaan[$i]['judul_pertanyaan']; ?></h5>
                                                                            <span class="btn btn-label-secondary"><?= $data_jawaban[$i]['status_jawaban']; ?></span>
                                                                            <button type="button" class="btn btn-outline-secondary mt-3" data-bs-toggle="modal" data-bs-target="#modalScrollableDisabled">Pantau Perkembangan</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <?php
                                                            }
                                                        } else {
                                                            ?>
                                                            <div class="col-md-4 mb-md-0 mt-4 mb-4">
                                                                <div class="card border shadow-none">
                                                                    <span class="position-absolute top-0 start-100 translate-middle badge bg-success text-white"><?= $data_jawaban[$i]['total_pertanyaan_belum_dijawab']; ?></span>
                                                                    <div class="card-body text-center">
                                                                        <img class="mb-3" src="<?= base_url('assets/img/icons/unicons/baby-grow.png') ?>" height="60" alt="Help center landing" />
                                                                        <h5><?= $master_pertanyaan[$i]['judul_pertanyaan']; ?></h5>
                                                                        <span class="btn btn-label-success"><?= $data_jawaban[$i]['status_jawaban']; ?></span>
                                                                        <button type="button" class="btn btn-outline-success mt-3" data-bs-toggle="modal" data-bs-target="#modalScrollableDisabled">Pantau Perkembangan</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <?php
                                                        }
                                                    } else {

                                                    }
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Account -->
                </div>
            </div>
            <div class="col-md-12">
                <div class="card mb-4">
                    <h5 class="card-header">Form Kartu Bantu - Data Sasaran Bayi, Balita dan APRAS</h5>
                    <div class="row card-body">
                    </div>
                    <?php if(session()->getFlashdata('msg')):?>
                    <div class="alert alert-warning">
                        <?= session()->getFlashdata('msg') ?>
                    </div>
                    <?php endif;?>
                    <div class="card-body pt-2">
                        <div class="row gy-4">
                            <div class="col-md-4">
                                <h7>Berat Badan Lahir Bayi/Balita/APRAS</h7>
                                <div class="input-group input-group-merge mt-2">
                                    <input type="number" class="form-control" placeholder="Masukkan Berat Badan Lahir"
                                        aria-label="Masukkan Berat Badan Lahir" aria-describedby="basic-addon33" />
                                    <span class="input-group-text" id="basic-addon33">cm</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <h7>Panjang Badan Lahir Bayi/Balita/APRAS</h7>
                                <div class="input-group input-group-merge mt-2">
                                    <input type="number" class="form-control" placeholder="Masukkan Panjang Badan Lahir"
                                        aria-label="Masukkan Panjang Badan Lahir" aria-describedby="basic-addon33" />
                                    <span class="input-group-text" id="basic-addon33">cm</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <h7>Umur Bayi/Balita/APRAS</h7>
                                <div class="input-group input-group-merge mt-2">
                                    <input type="number" class="form-control"
                                        placeholder="Masukkan Umur Bayi/Balita/APRAS"
                                        aria-label="Masukkan Umur Bayi/Balita/APRAS" aria-describedby="basic-addon33" />
                                    <span class="input-group-text" id="basic-addon33">Bulan</span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group input-group-merge">
                                    <input type="text" class="form-control" placeholder="Masukkan Berat Bedan"
                                        aria-label="Masukkan Berat Bedan" aria-describedby="basic-addon33" />
                                    <span class="input-group-text" id="basic-addon33">kg</span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group input-group-merge">
                                    <input type="text" class="form-control" placeholder="Masukkan Panjang/Tinggi Badan"
                                        aria-label="Masukkan Panjang/Tinggi Badan" aria-describedby="basic-addon33" />
                                    <span class="input-group-text" id="basic-addon33">cm</span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group input-group-merge">
                                    <input type="text" class="form-control" placeholder="Masukkan Lingkar Kepala"
                                        aria-label="Masukkan Lingkar Kepala" aria-describedby="basic-addon33" />
                                    <span class="input-group-text" id="basic-addon33">cm</span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group input-group-merge">
                                    <input type="text" class="form-control" placeholder="Masukkan Lingkar Lengan Atas"
                                        aria-label="Masukkan Lingkar Lengan Atas" aria-describedby="basic-addon33" />
                                    <span class="input-group-text" id="basic-addon33">cm</span>
                                </div>
                            </div>
                            <div class="col-md-12 mb-2">
                                <div class="row">
                                    <h7 class="mb-2">Skrining Gejala TBC (pilih jika ada)</h7>
                                    <div class="col-md mb-md-0 mb-2">
                                        <div class="form-check custom-option custom-option-icon">
                                            <label class="form-check-label custom-option-content"
                                                for="customCheckGejala1">
                                                <span class="custom-option-body">
                                                    <img src="<?= base_url('assets/img/icons/unicons/batuk.png') ?>"
                                                        class="w-px-40 mb-2" alt="chart" />
                                                    <span class="custom-option-title">Batuk Terus Menerus</span>
                                                    <small>pilih jika ada gejala tersebut</small>
                                                </span>
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="customCheckGejala1" />
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md mb-md-0 mb-2">
                                        <div class="form-check custom-option custom-option-icon">
                                            <label class="form-check-label custom-option-content"
                                                for="customCheckGejala2">
                                                <span class="custom-option-body">
                                                    <img src="<?= base_url('assets/img/icons/unicons/demam.png') ?>"
                                                        class="w-px-40 mb-2" alt="cc-warning" />
                                                    <span class="custom-option-title">Demam Lebih dari 2 Minggu</span>
                                                    <small>pilih jika ada gejala tersebut</small>
                                                </span>
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="customCheckGejala2" />
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md">
                                        <div class="form-check custom-option custom-option-icon">
                                            <label class="form-check-label custom-option-content"
                                                for="customCheckGejala3">
                                                <span class="custom-option-body">
                                                    <img src="<?= base_url('assets/img/icons/unicons/berat-badan.png') ?>"
                                                        class="w-px-40 mb-2" alt="paypal" />
                                                    <span class="custom-option-title">BB Tidak Naik/Turun dalam 2
                                                        Bulan</span>
                                                    <small>pilih jika ada gejala tersebut</small>
                                                </span>
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="customCheckGejala3" />
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md">
                                        <div class="form-check custom-option custom-option-icon">
                                            <label class="form-check-label custom-option-content"
                                                for="customCheckGejala4">
                                                <span class="custom-option-body">
                                                    <img src="<?= base_url('assets/img/icons/unicons/kontak-erat.png') ?>"
                                                        class="w-px-40 mb-2" alt="paypal" />
                                                    <span class="custom-option-title">Kontak Erat dengan Penyakit
                                                        TBC</span>
                                                    <small>pilih jika ada gejala tersebut</small>
                                                </span>
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="customCheckGejala4" />
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-2">
                                <div class="row">
                                    <h7 class="mb-2">Bayi/Balita Mendapatkan (pilih jika ada)</h7>
                                    <div class="col-md">
                                        <div class="form-check custom-option custom-option-icon">
                                            <label class="form-check-label custom-option-content" for="customBalita1">
                                                <span class="custom-option-body">
                                                    <img src="<?= base_url('assets/img/icons/unicons/asi.png') ?>"
                                                        class="w-px-40 mb-2" alt="chart" />
                                                    <span class="custom-option-title">ASI Eksklusif</span>
                                                    <small>pilih jika ada gejala tersebut</small>
                                                </span>
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="customBalita1" />
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md">
                                        <div class="form-check custom-option custom-option-icon">
                                            <label class="form-check-label custom-option-content" for="customBalita2">
                                                <span class="custom-option-body">
                                                    <img src="<?= base_url('assets/img/icons/unicons/mp-asi.png') ?>"
                                                        class="w-px-40 mb-2" alt="cc-warning" />
                                                    <span class="custom-option-title">MP ASI*</span>
                                                    <small>pilih jika ada gejala tersebut</small>
                                                </span>
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="customBalita2" />
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md">
                                        <div class="form-check custom-option custom-option-icon">
                                            <label class="form-check-label custom-option-content" for="customBalita3">
                                                <span class="custom-option-body">
                                                    <img src="<?= base_url('assets/img/icons/unicons/imunisasi.png') ?>"
                                                        class="w-px-40 mb-2" alt="paypal" />
                                                    <span class="custom-option-title">Imunisasi**</span>
                                                    <small>pilih jika ada gejala tersebut</small>
                                                </span>
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="customBalita3" />
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md">
                                        <div class="form-check custom-option custom-option-icon">
                                            <label class="form-check-label custom-option-content" for="customBalita4">
                                                <span class="custom-option-body">
                                                    <img src="<?= base_url('assets/img/icons/unicons/vitamin.png') ?>"
                                                        class="w-px-40 mb-2" alt="paypal" />
                                                    <span class="custom-option-title">Vitamin A</span>
                                                    <small>pilih jika ada gejala tersebut</small>
                                                </span>
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="customBalita4" />
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md">
                                        <div class="form-check custom-option custom-option-icon">
                                            <label class="form-check-label custom-option-content" for="customBalita5">
                                                <span class="custom-option-body">
                                                    <img src="<?= base_url('assets/img/icons/unicons/obat-cacing.png') ?>"
                                                        class="w-px-40 mb-2" alt="paypal" />
                                                    <span class="custom-option-title">Obat Cacing</span>
                                                    <small>pilih jika ada gejala tersebut</small>
                                                </span>
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="customBalita5" />
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md">
                                        <div class="form-check custom-option custom-option-icon">
                                            <label class="form-check-label custom-option-content" for="customBalita6">
                                                <span class="custom-option-body">
                                                    <img src="<?= base_url('assets/img/icons/unicons/pangan.png') ?>"
                                                        class="w-px-40 mb-2" alt="paypal" />
                                                    <span class="custom-option-title">MP Pangan Lokal</span>
                                                    <small>pilih jika ada gejala tersebut</small>
                                                </span>
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="customBalita6" />
                                            </label>
                                        </div>
                                    </div>
                                    <small class="mb-4">(* Komposisi, jenis sesuai umur ** Lengkap sesuai umur)</small>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-floating form-floating-outline">
                                            <input class="form-control" type="text" id="firstName" name="fullName"
                                                placeholder="Isi jika mengalama gejala sakit" autocomplete="off" />
                                            <label for="fullName">Gejala Sakit</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-floating form-floating-outline">
                                            <select id="jenis_kelamin" name="jenis_kelamin" class="select2 form-select">
                                                <option value="">Tidak Ada Rujukan</option>
                                                <option value="Laki-laki">Pustu (Puskesmas Pembantu)</option>
                                                <option value="Perempuan">Puskesmas</option>
                                            </select>
                                            <label for="jenis_kelamin">Pilih Jika Harus di Rujuk</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary me-2" onclick="submitPeriksa()">Simpan</button>
                            <button type="reset" class="btn btn-outline-secondary" onclick="cancelPeriksa()">Batal</button>
                        </div>
                    </div>
                    <!-- /Account -->
                </div>
            </div>
            <?= form_close() ?>
        </div>

        <?php 
            $totalPertanyaan = 9;
            for ($i = 0; $i < $totalPertanyaan; $i++) {
                ?> 
                <!-- Modal -->
                <div class="modal fade" id="modalPertanyaan<?= $i; ?>" tabindex="-1" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h7 class="modal-title" id="modalScrollableTitle">Lakukan pemantauan perkembangan dengan ceklis dibawah ini. Centang "Iya" atau "Tidak" sesuai perkembangan bayi anda.</h7>
                            </div>
                            <hr></hr>
                            <div class="modal-body">
                                <form id="inputForm0">
                                    <div class="row">
                                        <input type="text" value="<?= $master_pertanyaan[$i]['total_pertanyaan'] ?>" id="total_pertanyaan" hidden>
                                        <input type="text" value="<?= $data_balita->id; ?>" id="id_balita" hidden>
                                        <?php
                                            if (isset($data_pertanyaan) && !empty($data_pertanyaan)) {
                                                foreach ($data_pertanyaan['pertanyaan'] as $index => $value) {
                                                    $number = $index + 1;

                                                    if ($data_jawaban[$index]['list_jawaban'][$index]['jawaban'] == '1') {
                                                        $checked = "checked";
                                                        $checkedtidak = "";
                                                    } else {
                                                        $checkedtidak = "checked";
                                                        $checked = "";
                                                    }
                                                    ?>
                                                    <div class="col-lg-8 mt-3 mb-4">
                                                        <p><?= $number ?>. <?= $value['pertanyaan'] ?></p>
                                                        <input type="text" value="<?= $value['id']; ?>" name="id_pertanyaan<?= $number; ?>" hidden>
                                                        <input type="text" value="<?= $value['id_master_pertanyaan']; ?>" name="id_master_pertanyaan<?= $number; ?>" hidden>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="col-md-12 mt-1 mb-2">
                                                            <div class="form-check custom-option custom-option-basic">
                                                                <label class="form-check-label custom-option-content">
                                                                    <input class="form-check-input" name="pertanyaan<?= $number; ?>" type="radio" <?= $checked; ?> />
                                                                    <span class="custom-option-header"><span class="h7 mb-0">Iya</span></span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 mb-4">
                                                            <div class="form-check custom-option custom-option-basic">
                                                                <label class="form-check-label custom-option-content">
                                                                    <input class="form-check-input" name="pertanyaan<?= $number; ?>" type="radio" <?= $checkedtidak; ?>/>
                                                                    <span class="custom-option-header"><span class="h7 mb-0">Tidak</span></span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr></hr>
                                                    <?php
                                                }
                                            }
                                        ?>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Tutup</button>
                                <button type="button" class="btn btn-primary" id="saveChangesBtn<?= $i; ?>">Simpan Penilaian</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal 0 -->
                <?php
            }
        ?>

        <!-- Modal Disable -->
        <div class="modal fade" id="modalScrollableDisabled" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalScrollableTitle">Maaf, Akses Ditolak!</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <p>
                                Umur bayi belum cukup untuk mengisi penilaian ini, atau perkembangan di bulan sebelumnya belum "Lengkap". 
                            </p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Mengerti</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ Content -->