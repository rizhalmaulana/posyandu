                        <!-- Footer -->
                        <footer class="content-footer footer bg-footer-theme">
                        <div class="container-xxl">
                            <div
                                class="footer-container d-flex align-items-center justify-content-between py-3 flex-md-row flex-column">
                                <div class="mb-2 mb-md-0">
                                    ©
                                    <script>
                                    document.write(new Date().getFullYear());
                                    </script>
                                    oleh
                                    <a href="https://pixinvent.com" target="_blank"
                                        class="footer-link fw-medium">Kelompok
                                        Lina</a>
                                </div>
                            </div>
                        </div>
                    </footer>
                    <!-- / Footer -->

                    <div class="content-backdrop fade"></div>
                </div>
                <!--/ Content wrapper -->
            </div>
            <!--/ Layout container -->

        </div>
    </div>
    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>

    <!-- Drag Target Area To SlideIn Menu On Small Screens -->
    <div class="drag-target"></div>

    <!--/ Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script src="<?= base_url('assets/vendor/libs/jquery/jquery.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/libs/popper/popper.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/js/bootstrap.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/libs/node-waves/node-waves.js'); ?>"></script>

    <script src="<?= base_url('assets/vendor/libs/hammer/hammer.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/libs/i18n/i18n.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/libs/typeahead-js/typeahead.js'); ?>"></script>

    <script src="<?= base_url('assets/vendor/js/menu.js'); ?>"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="<?= base_url('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/libs/chartjs/chartjs.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/libs/apex-charts/apexcharts.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/libs/swiper/swiper.js'); ?>"></script>

    <!-- Main JS -->
    <script src="<?= base_url('assets/js/main.js'); ?>"></script>

    <!-- Page JS -->
    <script src="<?= base_url('assets/js/ui-carousel.js'); ?>"></script>

    <script src="<?= base_url('assets/js/dashboards-analytics.js'); ?>"></script>
    <script src="<?= base_url('assets/dashboard/chart-dashboard.js'); ?>"></script>
    <script src="<?= base_url('assets/dashboard/datepicker-format.js'); ?>"></script>
    <script src="<?= base_url('assets/dashboard/table-datatable-balita.js'); ?>"></script>
    <script src="<?= base_url('assets/js/dashboards-ecommerce.js'); ?>"></script>

    <script>
        $(document).ready(function () {
            // Alternatively, you can close the modal in response to a button click
            $('#saveChangesBtn0').click(function () {
                $('#modalPertanyaan0').modal('hide');
            });

            // After the modal is hidden, initialize SweetAlert
            $('#modalPertanyaan0').on('hidden.bs.modal', function () {
                // Get the value from the input field
                var total_pertanyaan = $("#total_pertanyaan").val();
                var id_balita = $("#id_balita").val();

                // Array to store values
                var values_id_pertanyaans = {};
                var values_id_master_pertanyaans = {};
                var selectedValues = {};

                // Display a SweetAlert with the entered value
                Swal.fire({
                    title: 'Simpan Jawaban?',
                    text: 'Pertanyaan sudah terisi dengan lengkap?',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Simpan!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Iterate over each input and collect its value
                        var formData = {};

                        // Loop through each group
                        for (var i = 1; i <= total_pertanyaan; i++) {
                            // Get the value of the checked radio button in the current group
                            var groupName = 'pertanyaan' + i;
                            var groupNameIdPertanyaan = 'id_pertanyaan' + i;
                            var groupNameIdMasterPertanyaan = 'id_master_pertanyaan' + i;
                            var selectedValue = $('input[name="' + groupName + '"]:checked').val();
                            var value_id_pertanyaan = $('input[name="' + groupNameIdPertanyaan + '"]').val();
                            var value_id_master_pertanyaan = $('input[name="' + groupNameIdMasterPertanyaan + '"]').val();

                            // Store the selected value in the object
                            values_id_pertanyaans[groupNameIdPertanyaan] = value_id_pertanyaan;
                            values_id_master_pertanyaans[groupNameIdMasterPertanyaan] = value_id_master_pertanyaan;
                            selectedValues[groupName] = selectedValue;
                        }
                        // Get values from text fields using the form's ID
                        formData.idBalita           = id_balita
                        formData.idPertanyaan       = values_id_pertanyaans
                        formData.idMasterPertanyaan = values_id_master_pertanyaans
                        formData.jawaban            = selectedValues
                        
                        $.ajax({
                            type: 'POST',
                            url: '<?= base_url('dashboard/save-data-kunjungan'); ?>', // Adjust the URL to your controller method
                            data: formData,
                            success: function(response) {
                                if (response.success) {
                                    // Show success message
                                    Swal.fire({
                                        title: 'Berhasil simpan data!',
                                        text: response.message,
                                        icon: 'success'
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            // If user clicks "Yes," submit the form
                                            console.log("Berhasil Save Data");
                                            location.reload();
                                        }
                                    });
                                } else {
                                    // Show error messages
                                    Swal.fire({
                                        title: 'Gagal Simpan data!',
                                        html: "Yaah data kamu gagal disimpan, yo coba lagi!",
                                        icon: 'error'
                                    });
                                }
                            },
                            error: function(jqXhr, json, errorThrown) {
                                Swal.fire({
                                    title: 'Error!',
                                    text: 'Terjadi kesalahan saat simpan data.',
                                    icon: 'error'
                                });
                            }
                        });
                    }
                });
            });
        });
    </script>
    <script>
        function submitBalita() {
            Swal.fire({
                title: 'Apa kamu yakin?',
                text: 'Diharapkan data yang kamu isi sudah sesuai?.',
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yakin",
                cancelButtonText: "Batal!"
            }).then((result) => {
                if (result.isConfirmed) {
                    // If user clicks "Yes," submit the form
                    processSubmitBalita();
                }
            });
        }

        function processSubmitBalita() {
            // Create a data object
            var formData = {};

            // Get values from text fields using the form's ID
            formData.fullname   = $('#formTambahBalita [name="fullName"]').val(); // Nama Lengkap
            formData.nik        = $('#formTambahBalita [name="nomor_nik"]').val(); // NIK
            formData.kk         = $('#formTambahBalita [name="kartu_keluarga"]').val(); // KK
            formData.tglLahir   = $('#formTambahBalita [name="tglLahir"]').val(); // Tgl Lahir
            formData.ayah       = $('#formTambahBalita [name="ayah"]').val(); // Nama Ayah
            formData.ibu        = $('#formTambahBalita [name="ibu"]').val(); // Nama Lengkap
            formData.alamat     = $('#formTambahBalita [name="alamat"]').val(); // Nama Lengkap

            // Get selected value from the <select> element
            formData.gender = $('#jenis_kelamin').val(); // Jenis Kelamin
            formData.posyandu = $('#posyandu').val(); // Posyandu

            $.ajax({
                type: 'POST',
                url: '<?= base_url('dashboard/menu/process-tambah-balita'); ?>', // Adjust the URL to your controller method
                data: formData,
                success: function(response) {
                    if (response.success) {
                        // Show success message
                        Swal.fire({
                            title: 'Berhasil!',
                            text: response.message,
                            icon: 'success'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                // If user clicks "Yes," submit the form
                                window.location.href = '<?= base_url('dashboard/menu/data-balita'); ?>';
                            }
                        });
                    } else {
                        // Show error messages
                        Swal.fire({
                            title: 'Gagal!',
                            html: response.message,
                            icon: 'error'
                        });
                        $('#formTambahBalita')[0].reset();
                    }
                },
                error: function(jqXhr, json, errorThrown) {
                    Swal.fire({
                        title: 'Error!',
                        text: 'Terjadi kesalahan saat registrasi data.',
                        icon: 'error'
                    });
                    $('#formTambahBalita')[0].reset();
                }
            });
        }
    </script>

    <script>
        function submitPeriksa() {
            Swal.fire({
                title: 'Data yang di submit sudah sesuai?',
                text: 'Diharapkan data yang kamu isi sudah lengkap terisi?.',
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yakin",
                cancelButtonText: "Batal!"
            }).then((result) => {
                if (result.isConfirmed) {
                    // If user clicks "Yes," submit the form
                    processSubmitPeriksa();
                }
            });
        }

        function processSubmitPeriksa() {
            // Create a data object
            var formData = {};

            // Get values from text fields using the form's ID
            formData.fullname   = $('#formPemeriksaanBalita [name="fullName"]').val(); // Nama Lengkap
            formData.nik        = $('#formPemeriksaanBalita [name="nomor_nik"]').val(); // NIK
            formData.kk         = $('#formPemeriksaanBalita [name="kartu_keluarga"]').val(); // KK
            formData.tglLahir   = $('#formPemeriksaanBalita [name="tglLahir"]').val(); // Tgl Lahir
            formData.ayah       = $('#formPemeriksaanBalita [name="ayah"]').val(); // Nama Ayah
            formData.ibu        = $('#formPemeriksaanBalita [name="ibu"]').val(); // Nama Lengkap
            formData.alamat     = $('#formPemeriksaanBalita [name="alamat"]').val(); // Nama Lengkap

            // Get selected value from the <select> element
            formData.gender = $('#jenis_kelamin').val(); // Jenis Kelamin
            formData.posyandu = $('#posyandu').val(); // Posyandu

            $.ajax({
                type: 'POST',
                url: '<?= base_url('dashboard/menu/process-tambah-balita'); ?>', // Adjust the URL to your controller method
                data: formData,
                success: function(response) {
                    if (response.success) {
                        // Show success message
                        Swal.fire({
                            title: 'Berhasil!',
                            text: response.message,
                            icon: 'success'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                // If user clicks "Yes," submit the form
                                window.location.href = '<?= base_url('dashboard/menu/data-balita'); ?>';
                            }
                        });
                    } else {
                        // Show error messages
                        Swal.fire({
                            title: 'Gagal!',
                            html: response.message,
                            icon: 'error'
                        });
                        $('#formPemeriksaanBalita')[0].reset();
                    }
                },
                error: function(jqXhr, json, errorThrown) {
                    Swal.fire({
                        title: 'Error!',
                        text: 'Terjadi kesalahan saat registrasi data.',
                        icon: 'error'
                    });
                    $('#formPemeriksaanBalita')[0].reset();
                }
            });
        }
    </script>
  </body>
</html>
