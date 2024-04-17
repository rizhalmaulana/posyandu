<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <?php
            if (isset($list_data_balita) && !empty($list_data_balita)) :
                if ($list_data_balita->jenis_kelamin != 'Perempuan') :
            ?>
            <!--Grafik KBM Laki-laki -->
            <div class="col-12 mb-4">
                <div class="card">
                    <div class="card-header header-elements">
                        <div>
                            <h5 class="card-title mb-0">Grafik Kenaikan Berat Badan Minimal (KBM) | Laki-Laki</h5>
                            <small class="text-muted">Standar Berat Badan menurut Umur (BB/U) Anak Laki-Laki Umur 0-60
                                Bulan</small>
                        </div>
                    </div>
                    <div class="card-body pt-2">
                        <canvas id="lineChartBeratBadanLL" class="chartjs" data-height="500"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card mb-4">
                    <h5 class="card-header">Tabel Kartu Menuju Sehat - Interpretasi Kenaikan Berat Badan Minimal (KBM)</h5>
                    <?php if(session()->getFlashdata('msg')):?>
                    <div class="alert alert-warning">
                        <?= session()->getFlashdata('msg') ?>
                    </div>
                    <?php endif;?>
                    <hr>
                    <div class="card-body">
                        <div class="row gy-4">
                            <div class="col-md-4">
                                <div class="input-group input-group-merge">
                                    <input type="number" step="any" class="form-control" name="umur_balita_bulan"
                                        placeholder="Umur Balita (Bulan)" aria-label="Umur Balita (Bulan)"
                                        aria-describedby="basic-addon33" disabled/>
                                    <span class="input-group-text" id="basic-addon33">Bulan</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group input-group-merge">
                                    <input type="number" step="any" class="form-control" name="bulan_penimbangan"
                                        placeholder="Bulan Penimbangan" aria-label="Bulan Penimbangan" aria-describedby="basic-addon33" disabled />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group input-group-merge">
                                    <input type="number" step="any" class="form-control" name="kbm_bulan_ini"
                                        placeholder="Kenaikan Berat Badan Minimal"
                                        aria-label="Kenaikan Berat Badan Minimal" aria-describedby="basic-addon33" disabled/>
                                    <span class="input-group-text" id="basic-addon33">gr</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <h7>Berat Badan Bayi/Balita/APRAS</h7>
                                <div class="input-group input-group-merge mt-2">
                                    <input type="number" step="any" class="form-control" name="berat_badan_lahir"
                                        placeholder="Berat Badan Sekarang" aria-label="Berat Badan Sekarang"
                                        aria-describedby="basic-addon33" />
                                    <span class="input-group-text" id="basic-addon33">kg</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <h7>Status Berat Badan</h7>
                                <div class="input-group input-group-merge mt-2">
                                    <input type="text" step="any" class="form-control" name="status_naik_tidak"
                                        placeholder="Naik / Tidak"
                                        aria-label="Naik / Tidak" aria-describedby="basic-addon33" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <h7>Keterangan</h7>
                                <div class="input-group input-group-merge mt-2">
                                    <input type="text" step="any" class="form-control" name="keterangan"
                                        placeholder="Keterangan"
                                        aria-label="Keterangan" aria-describedby="basic-addon33" />
                                </div>
                            </div>
                            <hr>
                            <div class="col-md-6">
                                <h7>Panjang Badan Bayi/Balita/APRAS</h7>
                                <div class="input-group input-group-merge mt-2">
                                    <input type="number" step="any" class="form-control" name="berat_badan_lahir"
                                        placeholder="Berat Badan Sekarang" aria-label="Berat Badan Sekarang"
                                        aria-describedby="basic-addon33" />
                                    <span class="input-group-text" id="basic-addon33">kg</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h7>Keterangan</h7>
                                <div class="input-group input-group-merge mt-2">
                                    <input type="text" step="any" class="form-control" name="keterangan"
                                        placeholder="Keterangan"
                                        aria-label="Keterangan" aria-describedby="basic-addon33" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h7>Lingkar Kepala Bayi/Balita/APRAS</h7>
                                <div class="input-group input-group-merge mt-2">
                                    <input type="number" step="any" class="form-control" name="berat_badan_lahir"
                                        placeholder="Berat Badan Sekarang" aria-label="Berat Badan Sekarang"
                                        aria-describedby="basic-addon33" />
                                    <span class="input-group-text" id="basic-addon33">kg</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h7>Keterangan</h7>
                                <div class="input-group input-group-merge mt-2">
                                    <input type="text" step="any" class="form-control" name="keterangan"
                                        placeholder="Keterangan"
                                        aria-label="Keterangan" aria-describedby="basic-addon33" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h7>Lingkar Lengan Atas Bayi/Balita/APRAS</h7>
                                <div class="input-group input-group-merge mt-2">
                                    <input type="number" step="any" class="form-control" name="berat_badan_lahir"
                                        placeholder="Berat Badan Sekarang" aria-label="Berat Badan Sekarang"
                                        aria-describedby="basic-addon33" />
                                    <span class="input-group-text" id="basic-addon33">kg</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h7>Keterangan</h7>
                                <div class="input-group input-group-merge mt-2">
                                    <input type="text" step="any" class="form-control" name="keterangan"
                                        placeholder="Keterangan"
                                        aria-label="Keterangan" aria-describedby="basic-addon33" />
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary me-2" onclick="simpanHasilKBM()">Simpan</button>
                            <button type="reset" class="btn btn-outline-secondary" id="batanPeriksa">Kembali</button>
                        </div>
                    </div>
                    <!-- /Account -->
                </div>
            </div>
            <!-- Grafik KBM Laki-laki -->
            <?php 
                else : 
            ?>
            <!--Grafik KBM Perempuan -->
            <div class="col-12 mb-4">
                <div class="card">
                    <div class="card-header header-elements">
                        <div>
                            <h5 class="card-title mb-0">Grafik Kenaikan Berat Badan Minimal (KBM) | Perempuan</h5>
                            <small class="text-muted">Standar Berat Badan menurut Umur (BB/U) Anak Perempuan Umur 0-60
                                Bulan</small>
                        </div>
                    </div>
                    <div class="card-body pt-2">
                        <canvas id="lineChartBeratBadanPP" class="chartjs" data-height="500"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card mb-4">
                    <h5 class="card-header">Tabel Kartu Menuju Sehat - Interpretasi Kenaikan Berat Badan Minimal (KBM)</h5>
                    <?php if(session()->getFlashdata('msg')):?>
                    <div class="alert alert-warning">
                        <?= session()->getFlashdata('msg') ?>
                    </div>
                    <?php endif;?>
                    <hr>
                    <div class="card-body">
                        <div class="row gy-4">
                            <div class="col-md-4">
                                <h7>Umur Balita (Bulan)</h7>
                                <div class="input-group input-group-merge mt-2">
                                    <input type="number" step="any" class="form-control" name="umur_balita_bulan"
                                        placeholder="<?= $umur_balita_saat_ini['umur_tahun'] ?> Tahun <?= $umur_balita_saat_ini['umur_bulan'] ?> Bulan <?= $umur_balita_saat_ini['umur_hari'] ?> Hari" aria-label="<?= $umur_balita_saat_ini['umur_tahun'] ?> Tahun <?= $umur_balita_saat_ini['umur_bulan'] ?> Bulan <?= $umur_balita_saat_ini['umur_hari'] ?> Hari"
                                        aria-describedby="basic-addon33" disabled/>
                                    <span class="input-group-text" id="basic-addon33">Bulan</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <h7>Bulan Penimbangan</h7>
                                <div class="input-group input-group-merge mt-2">
                                    <input type="number" step="any" class="form-control" name="bulan_penimbangan"
                                        placeholder="February" aria-label="Bulan Penimbangan" aria-describedby="basic-addon33" disabled />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <h7>Kenaikan Berat Badan Minimal</h7>
                                <div class="input-group input-group-merge mt-2">
                                    <input type="number" step="any" class="form-control" name="kbm_bulan_ini"
                                        placeholder="900"
                                        aria-label="Kenaikan Berat Badan Minimal" aria-describedby="basic-addon33" disabled/>
                                    <span class="input-group-text" id="basic-addon33">gr</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <h7>Berat Badan Bayi/Balita/APRAS</h7>
                                <div class="input-group input-group-merge mt-2">
                                    <input type="number" step="any" class="form-control" name="berat_badan_lahir"
                                        placeholder="3.5" aria-label="Berat Badan Sekarang"
                                        aria-describedby="basic-addon33" disabled/>
                                    <span class="input-group-text" id="basic-addon33">kg</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <h7>Status Berat Badan</h7>
                                <div class="input-group input-group-merge mt-2">
                                    <input type="text" step="any" class="form-control" name="status_naik_tidak"
                                        placeholder="Belum Diketahui"
                                        aria-label="Naik / Tidak" aria-describedby="basic-addon33" readonly/>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <h7>Keterangan</h7>
                                <div class="input-group input-group-merge mt-2">
                                    <input type="text" step="any" class="form-control" name="keterangan"
                                        placeholder="Berat Badan Kurang"
                                        aria-label="Keterangan" aria-describedby="basic-addon33" readonly/>
                                </div>
                            </div>
                            <hr>
                            <div class="col-md-6">
                                <h7>Panjang Badan Bayi/Balita/APRAS</h7>
                                <div class="input-group input-group-merge mt-2">
                                    <input type="number" step="any" class="form-control" name="panjang_badan_lahir"
                                        placeholder="Panjang Badan Sekarang" aria-label="Panjang Badan Sekarang"
                                        aria-describedby="basic-addon33" disabled/>
                                    <span class="input-group-text" id="basic-addon33">kg</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h7>Keterangan</h7>
                                <div class="input-group input-group-merge mt-2">
                                    <input type="text" step="any" class="form-control" name="keterangan"
                                        placeholder="Keterangan"
                                        aria-label="Keterangan" aria-describedby="basic-addon33" readonly/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h7>Lingkar Kepala Bayi/Balita/APRAS</h7>
                                <div class="input-group input-group-merge mt-2">
                                    <input type="number" step="any" class="form-control" name="lingkar_kepala_lahir"
                                        placeholder="Lingkar Kepala Sekarang" aria-label="Lingkar Kepala Sekarang"
                                        aria-describedby="basic-addon33" disabled/>
                                    <span class="input-group-text" id="basic-addon33">kg</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h7>Keterangan</h7>
                                <div class="input-group input-group-merge mt-2">
                                    <input type="text" step="any" class="form-control" name="keterangan"
                                        placeholder="Keterangan"
                                        aria-label="Keterangan" aria-describedby="basic-addon33" readonly/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h7>Lingkar Lengan Atas Bayi/Balita/APRAS</h7>
                                <div class="input-group input-group-merge mt-2">
                                    <input type="number" step="any" class="form-control" name="lingkar_lengan_lahir"
                                        placeholder="Lingkar Lengan Sekarang" aria-label="Lingkar Lengan Sekarang"
                                        aria-describedby="basic-addon33" disabled/>
                                    <span class="input-group-text" id="basic-addon33">kg</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h7>Keterangan</h7>
                                <div class="input-group input-group-merge mt-2">
                                    <input type="text" step="any" class="form-control" name="keterangan"
                                        placeholder="Keterangan"
                                        aria-label="Keterangan" aria-describedby="basic-addon33" readonly/>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary me-2" onclick="simpanHasilKBM()">Simpan</button>
                            <button type="reset" class="btn btn-outline-secondary" id="batanPeriksa">Kembali</button>
                        </div>
                    </div>
                    <!-- /Account -->
                </div>
            </div>
        <!-- Grafik KBM Perempuan -->
        <?php
                endif;
            endif; 
        ?>
    </div>
</div>