    <!-- / Content -->

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="<?= base_url('assets/vendor/libs/jquery/jquery.js') ?>"></script>
    <script src="<?= base_url('assets/vendor/libs/popper/popper.js') ?>"></script>
    <script src="<?= base_url('assets/vendor/js/bootstrap.js') ?>"></script>
    <script src="<?= base_url('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') ?>"></script>
    <script src="<?= base_url('assets/vendor/libs/node-waves/node-waves.js') ?>"></script>

    <script src="<?= base_url('assets/vendor/libs/hammer/hammer.js') ?>"></script>
    <script src="<?= base_url('assets/vendor/libs/i18n/i18n.js') ?>"></script>
    <script src="<?= base_url('assets/vendor/libs/typeahead-js/typeahead.js') ?>"></script>

    <script src="<?= base_url('assets/vendor/js/menu.js') ?>"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="<?= base_url('assets/vendor/libs/cleavejs/cleave.js') ?>"></script>
    <script src="<?= base_url('assets/vendor/libs/cleavejs/cleave-phone.js') ?>"></script>
    <script src="<?= base_url('assets/vendor/libs/bs-stepper/bs-stepper.js') ?>"></script>
    <script src="<?= base_url('assets/vendor/libs/select2/select2.js') ?>"></script>
    <script src="<?= base_url('assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js') ?>"></script>
    <script src="<?= base_url('assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js') ?>"></script>
    <script src="<?= base_url('assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js') ?>"></script>

    <!-- Main JS -->
    <script src="<?= base_url('assets/js/main.js') ?>"></script>

    <!-- Page JS -->
    <script src="<?= base_url('assets/js/pages-auth.js') ?>"></script>

    <!-- Get Data Kecamatan -->
    <script>
        $(document).ready(function() {
            $('.header-kecamatan').hide();

            // Event listener for the first dropdown
            $('#select-city').change(function() {
                // Get the selected value
                var valueIdKota = $(this).val();
                fetchDataKecamatan(valueIdKota);
            });
        });

        function fetchDataKecamatan(idKota) {
            $.ajax({
                url: 'getkecamatan/process', // Update the URL
                type: 'POST',
                data: {
                    'idKota': idKota
                },
                success: function(data) {
                    // Update the result container with the fetched data
                    updateLayoutSelectOptionKecamatan(data);
                },
                error: function() {
                    // Handle errors if needed
                    Swal.fire({
                        title: 'Oops terjadi kesalahan!',
                        html: response.message,
                        icon: 'error'
                    });
                }
            });
        }

        function updateLayoutSelectOptionKecamatan(options) {
            $('.form-select-kecamatan').empty();

            // Create a new select element
            var select = $(
                '<select id="select-kecamatan" class="select2 form-select" name="select-kecamatan" data-allow-clear="true"><option value="">Pilih Kecamatan</option>');

            // Add options to the select element
            $.each(options.data, function(index, value) {
                select.append($('<option>', {
                    value: value.id,
                    text: value.nama_kecamatan
                }));
            });

            $('.form-select-kecamatan').append('<label for="select-kecamatan">Asal Kecamatan Posyandu</label>');
            // Append the select element to the result container
            $('.form-select-kecamatan').append(select);
            $('.header-kecamatan').show();
        }
    </script>

    <!-- Get Data Kelurahan -->
    <script>
        $(document).ready(function() {
            $('.header-kelurahan').hide();

            // Event listener for the first dropdown
            $('.form-select-kecamatan').change(function() {
                // Get the selected value
                var valueIdKecamatan = $('#select-kecamatan').val();
                fetchDataKelurahan(valueIdKecamatan);
            });
        });

        function fetchDataKelurahan(idKecamatan) {
            $.ajax({
                url: 'getkelurahan/process', // Update the URL
                type: 'POST',
                data: {
                    'idKecamatan': idKecamatan
                },
                success: function(data) {
                    // Update the result container with the fetched data
                    updateLayoutSelectOptionKelurahan(data);
                },
                error: function() {
                    // Handle errors if needed
                    Swal.fire({
                        title: 'Oops terjadi kesalahan!',
                        html: response.message,
                        icon: 'error'
                    });
                }
            });
        }

        function updateLayoutSelectOptionKelurahan(options) {
            $('.form-select-kelurahan').empty();

            // Create a new select element
            var select = $(
                '<select id="select-kelurahan" class="select2 form-select" name="select-kelurahan" data-allow-clear="true"><option value="">Pilih Kelurahan</option>');

            // Add options to the select element
            $.each(options.data, function(index, value) {
                select.append($('<option>', {
                    value: value.id,
                    text: value.nama_kelurahan
                }));
            });

            $('.form-select-kelurahan').append('<label for="select-kelurahan">Asal Kelurahan Posyandu</label>');
            // Append the select element to the result container
            $('.form-select-kelurahan').append(select);
            $('.header-kelurahan').show();
        }
    </script>

    <!-- Get Data Posyandu -->
    <script>
        $(document).ready(function() {
            $('.header-posyandu').hide();

            // Event listener for the first dropdown
            $('.form-select-kelurahan').change(function() {
                // Get the selected value
                var valueIdKota = $('#select-city').val();
                var valueIdKecamatan = $('#select-kecamatan').val();
                var valueIdKelurahan = $('#select-kelurahan').val();

                fetchDataPosyandu(valueIdKota, valueIdKecamatan, valueIdKelurahan);
            });
        });

        function fetchDataPosyandu(idKota, idKecamatan, idKelurahan) {
            $.ajax({
                url: 'getposyandu/process', // Update the URL
                type: 'POST',
                data: {
                    'idKota': idKota,
                    'idKecamatan': idKecamatan,
                    'idKelurahan': idKelurahan,
                },
                success: function(data) {
                    // Update the result container with the fetched data
                    if (data.data === null) {
                        Swal.fire({
                            title: 'Opss maaf!',
                            html: 'Terjadi kesalahan, coba lagi!',
                            icon: 'error'
                        });
                    } else if (data.data == 'tidak tersedia') {
                        Swal.fire({
                            title: 'Opss maaf!',
                            html: data.message,
                            icon: 'info'
                        });
                    } else {
                        updateLayoutSelectOptionPosyandu(data);
                    }
                },
                error: function() {
                    // Handle errors if needed
                    Swal.fire({
                        title: 'Oops terjadi kesalahan!',
                        html: response.message,
                        icon: 'error'
                    });
                }
            });
        }

        function updateLayoutSelectOptionPosyandu(options) {
            $('.form-select-posyandu').empty();

            // Create a new select element
            var select = $('<select id="select-posyandu" class="select2 form-select" name="select-posyandu" data-allow-clear="true"><option value="">Pilih Posyandu</option>');

            // Add options to the select element
            $.each(options.data, function(index, value) {
                select.append($('<option>', {
                    value: value.id,
                    text: value.nama_posyandu
                }));
            });

            $('.form-select-posyandu').append('<label for="select-posyandu">Pilih Posyandu</label>');
            // Append the select element to the result container
            $('.form-select-posyandu').append(select);
            $('.header-posyandu').show();
        }
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Show loading message
            Swal.fire({
                title: 'Loading ...',
                allowOutsideClick: false,
                showCancelButton: false,
                showConfirmButton: false,
                didOpen: () => {
                    Swal.showLoading()
                },
            });

            // Simulate a delay (adjust as needed)
            setTimeout(() => {
                // Close the loading message
                Swal.close();
            }, 3000); // 3000 milliseconds (3 seconds) delay, adjust as needed
        });
    </script>

    <!-- Post Data Register -->
    <script>
        function confirmRegistration() {
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
                    Swal.fire({
                        title: 'Tunggu sebentar ...',
                        allowOutsideClick: false,
                        showCancelButton: false,
                        showConfirmButton: false,
                        didOpen: () => {
                            Swal.showLoading()
                        },
                    });

                    submitForm();
                }
            });
        }

        function submitForm() {
            // Create a data object
            var formData = {};

            // Get values from text fields using the form's ID
            formData.username = $('#multiStepsForm [name="multiStepsUsername"]').val(); // Username
            formData.email = $('#multiStepsForm [name="multiStepsEmail"]').val(); // Email
            formData.password = $('#multiStepsForm [name="multiStepsPass"]').val(); // Password
            formData.firstname = $('#multiStepsForm [name="multiStepsFirstName"]').val(); // Nama Depan
            formData.lastname = $('#multiStepsForm [name="multiStepsLastName"]').val(); // Nama Akhir
            formData.phone = $('#multiStepsForm [name="multiStepsMobile"]').val(); // Phone
            formData.address = $('#multiStepsForm [name="multiStepsAddress"]').val(); // Alamat Sendiri

            // Get selected value from the <select> element
            formData.city = $('#select-city').val(); // Asal Kota
            formData.kecamatan = $('#select-kecamatan').val(); // Asal Kota
            formData.kelurahan = $('#select-kelurahan').val(); // Asal Kota
            formData.posyandu = $('#select-posyandu').val(); // Asal Posyandu
            formData.status =  $('#select-status').val(); // Status Akses

            $.ajax({
                type: 'POST',
                url: '<?= base_url('registration/process'); ?>', // Adjust the URL to your controller method
                data: formData,
                success: function(response) {
                    if (response.success) {
                        Swal.hideLoading()
                        // Show success message
                        Swal.fire({
                            title: 'Berhasil!',
                            text: response.message,
                            icon: 'success'
                        });

                        clearAndRedirect(1);
                    } else {
                        // Show error messages
                        Swal.hideLoading()
                        Swal.fire({
                            title: 'Gagal!',
                            html: response.message,
                            icon: 'error'
                        });

                        clearAndRedirect(0);
                    }
                },
                error: function(jqXhr, json, errorThrown) {
                    Swal.hideLoading()
                    Swal.fire({
                        title: 'Error!',
                        text: 'Terjadi kesalahan saat registrasi data.',
                        icon: 'error'
                    });

                    clearAndRedirect(0);
                }
            });
        }
    </script>

    <script>
        function clearAndRedirect(isSuccess) {
            // Clear the form
            $('#multiStepsForm')[0].reset();

            if (isSuccess) {
                // Redirect to the login page (change the URL accordingly)
                setTimeout(function() {
                    // Redirect to the login page (change the URL accordingly)
                    window.location.href = '<?= base_url('login'); ?>';
                }, 3000);
            } else {
                // Redirect to the login page (change the URL accordingly)
                setTimeout(function() {
                    // Redirect to the login page (change the URL accordingly)
                    window.location.href = '<?= base_url('registration'); ?>';
                }, 3000);
            }
        }
    </script>
    </body>

    </html>