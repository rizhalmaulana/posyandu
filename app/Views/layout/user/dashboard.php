<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y dashboard-loader">
    <div class="row gy-4 mb-4">
        <!-- Information -->
        <div class="col-12 mb-4">
            <div class="swiper text-white" id="swiper-multiple-slides">
                <div class="swiper-wrapper">
                    <div class="swiper-slide rounded" style="background-image: url(<?= base_url('assets/img/custom/buku-bacaan-serial-posyandu.png') ?>)" data-pdf="<?= base_url('assets/file/buku-bacaan-serial-posyandu.pdf') ?>"></div>
                    <div class="swiper-slide rounded" style="background-image: url(<?= base_url('assets/img/custom/buku-pmba-rev.png') ?>)" data-pdf="<?= base_url('assets/file/buku-pmba-rev.pdf') ?>"></div>
                    <div class="swiper-slide rounded" style="background-image: url(<?= base_url('assets/img/custom/buku-kia-2023.png') ?>)" data-pdf="<?= base_url('assets/file/buku-kia-2023.pdf') ?>"></div>
                    <div class="swiper-slide rounded" style="background-image: url(<?= base_url('assets/img/custom/slide4.jpeg') ?>)" data-url="https://ayosehat.kemkes.go.id/topik-penyakit/skrining-kesehatan-pada-anak/karsinoma-nasofaring-pada-anak">Karsinoma Nasofaring pada Anak</div>
                    <div class="swiper-slide rounded" style="background-image: url(<?= base_url('assets/img/custom/slide5.jpeg') ?>)" data-url="https://ayosehat.kemkes.go.id/topik-usia/bayi-dan-balita/lingkungan-sehat-dan-aman-bayi-dan-balita">Lingkungan Sehat dan Aman Bayi dan Balita</div>
                    <div class="swiper-slide rounded" style="background-image: url(<?= base_url('assets/img/custom/slide6.jpeg') ?>)" data-url="https://ayosehat.kemkes.go.id/teknologi-wolbachia-dalam-pengendalian-demam-berdarah-di-indonesia">Teknologi Wolbachia dalam Pengendalian Demam Berdarah di Indonesia</div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
            <!--/ Information -->

            <!-- Total Record Per Month -->
            <div class="col-lg-12 col-md-6 col-12 mt-4">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h5 class="mb-1">Ringkasan Grafik Bulanan</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="weeklyOverviewChart"></div>
                    </div>
                </div>
            </div>
            <!--/ Total Record Per Month -->

            <!-- Sales This Months -->
            <div class="col-lg-12 col-sm-12 mt-4">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h5 class="mb-2">Ringkasan Pengguna</h5>
                            <div class="dropdown">
                                <button class="btn p-0" type="button" id="salesOverview" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="mdi mdi-dots-vertical mdi-24px"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="salesOverview">
                                    <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body d-flex justify-content-between flex-wrap gap-3">
                        <div class="d-flex gap-3">
                            <div class="avatar">
                                <div class="avatar-initial bg-label-primary rounded">
                                    <i class="mdi mdi-account-outline mdi-24px"></i>
                                </div>
                            </div>
                            <div class="card-info">
                                <h5 class="mb-0"><?= $totalbalita; ?></h5>
                                <small class="text-muted">Total Balita Yang Terdaftar di
                                    Posyandu</small>
                            </div>
                        </div>
                        <div class="d-flex gap-3">
                            <div class="avatar">
                                <div class="avatar-initial bg-label-warning rounded">
                                    <i class="mdi mdi-poll mdi-24px"></i>
                                </div>
                            </div>
                            <div class="card-info">
                                <h5 class="mb-0"><?= $totalkunjungan; ?> anak</h5>
                                <small class="text-muted">Total Balita yang Sudah Tercatat
                                    Bulan Ini</small>
                            </div>
                        </div>
                        <div class="d-flex gap-3">
                            <div class="avatar">
                                <div class="avatar-initial bg-label-info rounded">
                                    <i class="mdi mdi-trending-up mdi-24px"></i>
                                </div>
                            </div>
                            <div class="card-info">
                                <h5 class="mb-0">0 %</h5>
                                <small class="text-muted">Persentase Kenaikan BB (N) Pada Bulan Kemarin</small>
                            </div>
                        </div>
                        <div class="d-flex gap-3">
                            <div class="avatar">
                                <div class="avatar-initial bg-label-success rounded">
                                    <i class="mdi mdi-check-decagram-outline mdi-24px"></i>
                                </div>
                            </div>
                            <div class="card-info">
                                <h5 class="mb-0">0</h5>
                                <small class="text-muted">Balita Yang Sudah Lulus</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Sales This Months -->
        </div>

        <div class="col-lg-12 col-sm-6">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-9">
                            <h5 class="mb-2">Daftar Balita</h5>
                        </div>
                        <div class="col-lg-3">
                            <form class="d-flex">
                                <input class="form-control me-1" type="search" placeholder="cari balita ..."
                                    aria-label="Search">
                                <button class="btn btn-primary" type="submit">Cari</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-body d-flex justify-content-between flex-wrap gap-3">
                    <div class="col-lg-12 mt-4">
                        <div class="row g-4">
                            <?php 
                            setlocale(LC_TIME, 'id_ID.utf8');
                            $bulanSaatIni = strftime('%B');

                            if (isset($listBalita) && !empty($listBalita)):
                                foreach($listBalita as $index => $balita):
                                    if (isset($kunjunganBalita[$index]) && !empty($kunjunganBalita[$index])):
                                        if ($kunjunganBalita[$index]['status_kunjungan'] == "Hadir" && $kunjunganBalita[$index]['bulan_kunjungan'] == $bulanSaatIni):
                                            if ($balita['jenis_kelamin'] == "Laki-laki"): $textcolor = 'info';
                                            else : $textcolor = 'primary';
                                            endif;
                                            ?><div class="col-lg-3">
                                                <div class="card">
                                                    <div class="card-body text-center">
                                                        <div class="mx-auto mb-4">
                                                            <img src="<?= base_url('assets/img/avatars/user.png'); ?>"
                                                                alt="Avatar Image" class="rounded-circle w-px-100" />
                                                        </div>
                                                        <h5 class="mb-1 card-title"><?= $balita['nama_lengkap'] ?></h5>
                                                        <span class="text-muted text-small"><?= $balita['tanggal_lahir'] ?></span>
                                                        <div class="d-flex align-items-center justify-content-center my-4 gap-2">
                                                            <a href="javascript:;" class="me-1"><span
                                                                    class="badge bg-label-<?= $textcolor; ?> rounded-pill"><?= $balita['jenis_kelamin'] ?></span></a>
                                                        </div>
                                                        <div class="d-flex align-items-center justify-content-center">
                                                            <button type="button" class="btn btn-secondary" id="info-balita-disable-kunjungan"><i class="mdi mdi-account-check-outline me-1"></i>Periksa</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><?php
                                        endif;
                                    else:
                                        if ($balita['jenis_kelamin'] == "Laki-laki"): $textcolor = 'info';
                                        else : $textcolor = 'primary';
                                        endif;
                                        ?><div class="col-lg-3">
                                            <div class="card">
                                                <div class="card-body text-center">
                                                    <div class="mx-auto mb-4">
                                                        <img src="<?= base_url('assets/img/avatars/user.png'); ?>"
                                                            alt="Avatar Image" class="rounded-circle w-px-100" />
                                                    </div>
                                                    <h5 class="mb-1 card-title"><?= $balita['nama_lengkap'] ?></h5>
                                                    <span class="text-muted text-small"><?= $balita['tanggal_lahir'] ?></span>
                                                    <div class="d-flex align-items-center justify-content-center my-4 gap-2">
                                                        <a href="javascript:;" class="me-1"><span
                                                                class="badge bg-label-<?= $textcolor; ?> rounded-pill"><?= $balita['jenis_kelamin'] ?></span></a>
                                                    </div>
                                                    <?php 
                                                        if ($balita['status_balita'] == 'B') :
                                                    ?>
                                                    <div class="d-flex align-items-center justify-content-center">
                                                        <button type="button" class="btn btn-primary" id="info-balita-pendaftar-baru" value="<?= $balita['id']; ?>"><i class="mdi mdi-account-check-outline me-1"></i>Periksa</button>
                                                    </div>
                                                    <?php
                                                        else:
                                                    ?>
                                                    <div class="d-flex align-items-center justify-content-center">
                                                        <a href="<?= base_url('dashboard/periksa/'. $balita['id']); ?>"
                                                            id="btnPeriksaBalita"
                                                            class="btn btn-primary d-flex align-items-center me-3">
                                                            <i class="mdi mdi-account-check-outline me-1"></i>Periksa
                                                        </a>
                                                    </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div><?php
                                    endif;
                                endforeach;
                            else:
                                ?><div class="col-xl-12 col-lg-6 col-md-6 misc-wrapper">
                                <h4 class="mb-2 mx-2">Belum ada data balita</h4>
                                <p class="mb-4 mx-2">Silahkan input terlebih dahulu! di menu <a
                                        href="<?= base_url('dashboard/tambah-balita') ?>">Tambah Balita</a></p>
                            </div><?php
                            endif;
                        ?>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <?= $pager->links('tbl_balita', 'balita_pagination'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ Content -->