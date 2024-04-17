
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
                                    by
                                    <a href="https://pixinvent.com" target="_blank"
                                        class="footer-link fw-medium">Tembang Santri</a>
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
    <script src="<?= base_url('assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js') ?>"></script>
    <script src="<?= base_url('assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js') ?>"></script>
    <script src="<?= base_url('assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js') ?>"></script>
    
    <script src="<?= base_url('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/libs/chartjs/chartjs.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/libs/apex-charts/apexcharts.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/libs/swiper/swiper.js'); ?>"></script>

    <script src="<?= base_url('assets/vendor/libs/bootstrap-select/bootstrap-select.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/libs/moment/moment.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/libs/flatpickr/flatpickr.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/libs/tagify/tagify.js'); ?>"></script>

    <!-- Main JS -->
    <script src="<?= base_url('assets/js/main.js'); ?>"></script>

    <!-- Page JS -->
    <script src="<?= base_url('assets/js/form-validation.js'); ?>"></script>
    <script src="<?= base_url('assets/js/ui-carousel.js'); ?>"></script>

    <script src="<?= base_url('assets/js/dashboards-analytics.js'); ?>"></script>
    <script src="<?= base_url('assets/dashboard/chart-dashboard.js'); ?>"></script>
    <script src="<?= base_url('assets/dashboard/datepicker-format.js'); ?>"></script>
    <script src="<?= base_url('assets/dashboard/table-datatable-balita.js'); ?>"></script>
    <script src="<?= base_url('assets/dashboard/sweetalert-ui.js'); ?>"></script>
    <script src="<?= base_url('assets/js/dashboards-ecommerce.js'); ?>"></script>

    <!-- Downlaod PDF Konten -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
        var swiperSlides = document.querySelectorAll('#swiper-multiple-slides .swiper-slide');
        swiperSlides.forEach(function(slide) {
            slide.addEventListener('click', function() {
                // Get PDF URL from data-pdf attribute
                var pdfUrl = this.getAttribute('data-pdf');
                var url = this.getAttribute('data-url');

                if (pdfUrl != null) {
                    // Trigger PDF download
                    downloadPDF(pdfUrl);
                } 
                
                if (url != null) {
                    // Redirect user to the specified URL
                    var link = document.createElement('a');
                    link.href = url;
                    link.target = '_blank';
                    // Trigger click event on the dynamically created link
                    link.click();
                }
            });
        });

        // Function to download PDF
        function downloadPDF(pdfUrl) {
            // Create temporary link element
            var link = document.createElement('a');
            link.href = pdfUrl;
            link.target = '_blank';
            link.download = 'file-downlaod-tembangsantri.pdf'; // You can customize the downloaded file name
            // Append link to body and trigger click event
            document.body.appendChild(link);
            link.click();
            // Remove link from body after download
            document.body.removeChild(link);
        }
    });
    </script>

    <!-- Modal Pertanyaan Perkembangan Usia 29 Hari - 3 Bulan -->
    <script>
        $(document).ready(function () {
            // Alternatively, you can close the modal in response to a button click
            $('#saveChangesBtn1').click(function () {
                $('#modalPertanyaan1').modal('hide');
            });

            // After the modal is hidden, initialize SweetAlert
            $('#modalPertanyaan1').on('hidden.bs.modal', function () {
                // Get the value from the input field
                var id_balita = $("#id_balita1").val();

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
                        for (var i = 1; i <= 8; i++) {
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

    <!-- Modal Pertanyaan Perkembangan Usia 3 Bulan - 6 Bulan -->
    <script>
        $(document).ready(function() {
            $('#saveChangesBtn2').click(function () {
                $('#modalPertanyaan2').modal('hide');
            });

            // After the modal is hidden, initialize SweetAlert
            $('#modalPertanyaan2').on('hidden.bs.modal', function () {
                // Get the value from the input field
                var id_balita = $("#id_balita2").val();

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
                        for (var i = 9; i <= 18; i++) {
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

    <!-- Modal Pertanyaan Perkembangan Usia 6 Bulan - 9 Bulan -->
    <script>
        $(document).ready(function() {
            $('#saveChangesBtn3').click(function () {
                $('#modalPertanyaan3').modal('hide');
            });

            // After the modal is hidden, initialize SweetAlert
            $('#modalPertanyaan3').on('hidden.bs.modal', function () {
                // Get the value from the input field
                var id_balita = $("#id_balita3").val();

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
                        for (var i = 19; i <= 29; i++) {
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

    <!-- Modal Pertanyaan Perkembangan Usia 9 Bulan - 12 Bulan -->
    <script>
        $(document).ready(function() {
            $('#saveChangesBtn4').click(function () {
                $('#modalPertanyaan4').modal('hide');
            });

            // After the modal is hidden, initialize SweetAlert
            $('#modalPertanyaan4').on('hidden.bs.modal', function () {
                // Get the value from the input field
                var id_balita = $("#id_balita4").val();

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
                        for (var i = 30; i <= 41; i++) {
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

    <!-- Modal Pertanyaan Perkembangan Usia 12 Bulan - 18 Bulan -->
    <script>
        $(document).ready(function() {
            $('#saveChangesBtn5').click(function () {
                $('#modalPertanyaan5').modal('hide');
            });

            // After the modal is hidden, initialize SweetAlert
            $('#modalPertanyaan5').on('hidden.bs.modal', function () {
                // Get the value from the input field
                var id_balita = $("#id_balita5").val();

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
                        for (var i = 42; i <= 49; i++) {
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

    <!-- Modal Pertanyaan Perkembangan Usia 18 Bulan - 24 Bulan -->
    <script>
        $(document).ready(function() {
            $('#saveChangesBtn6').click(function () {
                $('#modalPertanyaan6').modal('hide');
            });

            // After the modal is hidden, initialize SweetAlert
            $('#modalPertanyaan6').on('hidden.bs.modal', function () {
                // Get the value from the input field
                var id_balita = $("#id_balita6").val();

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
                        for (var i = 50; i <= 57; i++) {
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

    <!-- Modal Pertanyaan Perkembangan Usia 2 - 3 Tahun -->
    <script>
        $(document).ready(function() {
            $('#saveChangesBtn7').click(function () {
                $('#modalPertanyaan7').modal('hide');
            });

            // After the modal is hidden, initialize SweetAlert
            $('#modalPertanyaan7').on('hidden.bs.modal', function () {
                // Get the value from the input field
                var id_balita = $("#id_balita7").val();

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
                        for (var i = 58; i <= 66; i++) {
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

    <!-- Modal Pertanyaan Perkembangan Usia 3 - 4 Tahun -->
    <script>
        $(document).ready(function() {
            $('#saveChangesBtn8').click(function () {
                $('#modalPertanyaan8').modal('hide');
            });

            // After the modal is hidden, initialize SweetAlert
            $('#modalPertanyaan8').on('hidden.bs.modal', function () {
                // Get the value from the input field
                var id_balita = $("#id_balita8").val();

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
                        for (var i = 67; i <= 79; i++) {
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

    <!-- Modal Pertanyaan Perkembangan Usia 4 - 5 Tahun -->
    <script>
        $(document).ready(function() {
            $('#saveChangesBtn9').click(function () {
                $('#modalPertanyaan9').modal('hide');
            });

            // After the modal is hidden, initialize SweetAlert
            $('#modalPertanyaan9').on('hidden.bs.modal', function () {
                // Get the value from the input field
                var id_balita = $("#id_balita9").val();

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
                        for (var i = 80; i <= 97; i++) {
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

    <!-- Modal Proses Submit Tambah Balita -->
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
                url: '<?= base_url('dashboard/process-tambah-balita'); ?>', // Adjust the URL to your controller method
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
                                window.location.href = '<?= base_url('dashboard/data-balita'); ?>';
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
                        text: errorThrown,
                        icon: 'error'
                    });
                    $('#formTambahBalita')[0].reset();
                }
            });
        }
    </script>

    <!-- Modal Proses Skrining Gejala Balita -->
    <script>
        function updateStatusSkrining() {
            var checkboxes = document.querySelectorAll('input[name="checkboxSkrining"].skrining');
            var checkedCount = 0;

            checkboxes.forEach(function(checkbox) {
                if (checkbox.checked) {
                    checkedCount++;
                }
            });

            if (checkedCount >= 2) {
                document.getElementById('status_skrining').innerText = 'Harus di rujuk ke Pustu atau Puskesmas';
                document.getElementById('status_skrining').value = 'Harus di rujuk ke Pustu atau Puskesmas';
                document.getElementById('status_skrining').classList.remove('bg-label-success');
                document.getElementById('status_skrining').classList.add('bg-label-danger');
            } else {
                document.getElementById('status_skrining').innerText = 'Tidak ada rujukan';
                document.getElementById('status_skrining').value = 'Tidak ada rujukan';
                document.getElementById('status_skrining').classList.remove('bg-label-danger');
                document.getElementById('status_skrining').classList.add('bg-label-success');
            }
        }
    </script>

    <!-- Modal Proses Imunisasi Balita -->
    <script>
        $(document).ready(function(){
            $('#customBalita3').change(function(){
                if($(this).is(':checked')){
                $('#modalImunisasi').modal('show'); // Show the modal
                } else {
                $('#modalImunisasi').modal('hide'); // Hide the modal
                }
            });

            // Proses Simpan
            var saveBtn = document.getElementById('simpanModalImunisasi');
            var closeBtn = document.getElementById('tutupModalImunisasi');
            
            if (saveBtn) {
                saveBtn.addEventListener('click', function() {
                    // Update checkbox state (example: check the checkbox)
                    $('#customBalita3').prop('checked', true);

                    // Close the modal
                    $('#modalImunisasi').modal('hide'); // Hide the modal
                });
            }

            if (closeBtn) {
                closeBtn.addEventListener('click', function() {
                    // Update checkbox state (example: check the checkbox)
                    $('#customBalita3').prop('checked', false);

                    // Close the modal
                    $('#modalImunisasi').modal('hide'); // Hide the modal
                });
            }
        });
    </script>

    <!-- Modal Proses Submit Hasil Periksa Perkembangan Balita -->
    <script>
        function submitHasilPeriksa() {
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
            formData.idBalita   = $('#formPemeriksaanBalita [name="id_balita"]').val(); // Id Balita
            formData.idPosyandu   = $('#formPemeriksaanBalita [name="id_posyandu"]').val(); // Id Posyandu
            formData.umurBulan   = $('#formPemeriksaanBalita [name="umur_bayi_bulan"]').val(); // Umur Bulan
            formData.tglKunjungan   = $('#formPemeriksaanBalita [name="tanggal_kunjungan"]').val(); // Tanggal Kunjungan

            formData.beratBadanLahir   = $('#formPemeriksaanBalita [name="berat_badan_lahir"]').val(); // Berat Badan Lahir
            formData.panjangBadanLahir   = $('#formPemeriksaanBalita [name="panjang_badan_lahir"]').val(); // Panjang Badan Lahir

            formData.beratBadanSekarang   = $('#formPemeriksaanBalita [name="berat_badan_saat_ini"]').val(); // Berat Badan Sekarang
            formData.panjangBadanSekarang   = $('#formPemeriksaanBalita [name="panjang_badan_saat_ini"]').val(); // Panjang Badan Sekarang
            formData.lingkarKepalaSekarang   = $('#formPemeriksaanBalita [name="lingkar_kepala_saat_ini"]').val(); // Lingkar Kepala Sekarang
            formData.lingkarLenganSekarang   = $('#formPemeriksaanBalita [name="lingkar_lengan_saat_ini"]').val(); // Lingkar Kepala Sekarang

            var gejala1 = document.getElementById('customCheckGejala1');
            var gejala2 = document.getElementById('customCheckGejala2');
            var gejala3 = document.getElementById('customCheckGejala3');
            var gejala4 = document.getElementById('customCheckGejala4');

            var customBalita1 = document.getElementById('customBalita1');
            var customBalita2 = document.getElementById('customBalita2');
            var customBalita3 = document.getElementById('customBalita3');
            var customBalita4 = document.getElementById('customBalita4');
            var customBalita5 = document.getElementById('customBalita5');
            var customBalita6 = document.getElementById('customBalita6');

            if (gejala1.checked) {
                // You can also get the value of the checkbox if needed
                formData.skriningBatuk = "Iya";
            } else {
                // Checkbox is not checked
                formData.skriningBatuk = "Tidak";
            }

            if (gejala2.checked) {
                // You can also get the value of the checkbox if needed
                formData.skriningDemam = "Iya";
            } else {
                // Checkbox is not checked
                formData.skriningDemam = "Tidak";
            }

            if (gejala3.checked) {
                // You can also get the value of the checkbox if needed
                formData.skriningBBNaik = "Iya";
            } else {
                // Checkbox is not checked
                formData.skriningBBNaik = "Tidak";
            }
            
            if (gejala4.checked) {
                // You can also get the value of the checkbox if needed
                formData.skriningKontakTBC = "Iya";
            } else {
                // Checkbox is not checked
                formData.skriningKontakTBC = "Tidak";
            }

            formData.statusSkrining = $('#status_skrining').val();

            if (customBalita1.checked) {
                formData.asiEksklusif = "Iya";
            } else {
                formData.asiEksklusif = "Tidak";
            }

            if (customBalita2.checked) {
                formData.mpAsi = "Iya";
            } else {
                formData.mpAsi = "Tidak";
            }

            if (customBalita3.checked) {
                formData.imunisasi = "Iya";
            } else {
                formData.imunisasi = "Tidak";
            }

            if (customBalita4.checked) {
                formData.vitaminA = "Iya";
            } else {
                formData.vitaminA = "Tidak";
            }

            if (customBalita5.checked) {
                formData.obatCacing = "Iya";
            } else {
                formData.obatCacing = "Tidak";
            }

            if (customBalita6.checked) {
                formData.panganLokal = "Iya";
            } else {
                formData.panganLokal = "Tidak";
            }

            formData.gejalaSakit = $('#formPemeriksaanBalita [name="gejala_sakit"]').val(); // Gejala Sakit
            formData.opsiRujukan = $('#opsi_rujukan').val(); // Opsi Rujukan

            var imunisasi1 = $('input[name="imunisasi1"]:checked').val();
            var imunisasi2 = $('input[name="imunisasi2"]:checked').val();
            var imunisasi3 = $('input[name="imunisasi3"]:checked').val();
            var imunisasi4 = $('input[name="imunisasi4"]:checked').val();
            var imunisasi5 = $('input[name="imunisasi5"]:checked').val();
            var imunisasi6 = $('input[name="imunisasi6"]:checked').val();
            var imunisasi7 = $('input[name="imunisasi7"]:checked').val();
            var imunisasi8 = $('input[name="imunisasi8"]:checked').val();
            var imunisasi9 = $('input[name="imunisasi9"]:checked').val();
            var imunisasi10 = $('input[name="imunisasi10"]:checked').val();
            var imunisasi11 = $('input[name="imunisasi11"]:checked').val();
            var imunisasi12 = $('input[name="imunisasi12"]:checked').val();
            var imunisasi13 = $('input[name="imunisasi13"]:checked').val();
            var imunisasi14 = $('input[name="imunisasi14"]:checked').val();
            var imunisasi15 = $('input[name="imunisasi15"]:checked').val();
            var imunisasi16 = $('input[name="imunisasi16"]:checked').val();
            var imunisasi17 = $('input[name="imunisasi17"]:checked').val();
            var imunisasi18 = $('input[name="imunisasi18"]:checked').val();
            var imunisasi19 = $('input[name="imunisasi19"]:checked').val();
            var imunisasi20 = $('input[name="imunisasi20"]:checked').val();

            formData.imunisasi1 = imunisasi1;
            formData.imunisasi2 = imunisasi2;
            formData.imunisasi3 = imunisasi3;
            formData.imunisasi4 = imunisasi4;
            formData.imunisasi5 = imunisasi5;
            formData.imunisasi6 = imunisasi6;
            formData.imunisasi7 = imunisasi7;
            formData.imunisasi8 = imunisasi8;
            formData.imunisasi9 = imunisasi9;
            formData.imunisasi10 = imunisasi10;
            formData.imunisasi11 = imunisasi11;
            formData.imunisasi12 = imunisasi12;
            formData.imunisasi13 = imunisasi13;
            formData.imunisasi14 = imunisasi14;
            formData.imunisasi15 = imunisasi15;
            formData.imunisasi16 = imunisasi16;
            formData.imunisasi17 = imunisasi17;
            formData.imunisasi18 = imunisasi18;
            formData.imunisasi19 = imunisasi19;
            formData.imunisasi20 = imunisasi20;

            $.ajax({
                type: 'POST',
                url: '<?= base_url('dashboard/save-pemeriksaan'); ?>', // Adjust the URL to your controller method
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
                                window.location.href = '<?= base_url('dashboard'); ?>';
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
                        text: 'Terjadi kesalahan saat menyimpan data.',
                        icon: 'error'
                    });
                    $('#formPemeriksaanBalita')[0].reset();
                }
            });
        }
    </script>
    
  </body>
</html>
