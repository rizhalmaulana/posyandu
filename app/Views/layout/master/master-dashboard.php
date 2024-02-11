<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row gy-4 mb-4">
        <!-- Congratulations card -->
        <div class="col-lg-12 col-md-12 col-sm-8 col-12">
            <div class="card h-100">
                <div class="card-body text-nowrap">
                    <h4 class="card-title mb-1 d-flex gap-2 flex-wrap">
                        Selamat Datang <strong><?= $session['nama_lengkap']; ?>!</strong> 🎉
                    </h4>
                    <p class="pb-0">ada yang bisa kami bantu?</p>
                    <h4 class="text-primary mb-1">250 Orang</h4>
                    <p class="mb-2 pb-1">Jumlah Pengguna Tembang Santri 🚀</p>
                </div>
                <img src="<?= base_url(); ?>assets/img/illustrations/trophy.png"
                    class="position-absolute bottom-0 end-0 me-3" height="140" alt="view sales" />
            </div>
        </div>
        <!--/ Congratulations card -->
    </div>

</div>
<!--/ Content -->