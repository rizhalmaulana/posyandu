<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="<?= base_url('assets/'); ?>" data-template="horizontal-menu-template">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title><?= $title; ?></title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?= base_url('assets/img/favicon/favicon.ico'); ?>" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap"
        rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="<?= base_url('assets/vendor/fonts/materialdesignicons.css'); ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/vendor/fonts/fontawesome.css'); ?>" />
    <!-- Menu waves for no-customizer fix -->
    <link rel="stylesheet" href="<?= base_url('assets/vendor/libs/node-waves/node-waves.css'); ?>" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/vendor/css/rtl/core.css'); ?>"
        class="template-customizer-core-css" />
    <link rel="stylesheet" href="<?= base_url('assets/vendor/css/rtl/theme-default.css'); ?>"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="<?= base_url('assets/css/demo.css'); ?>" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css'); ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/vendor/libs/typeahead-js/typeahead.css'); ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css'); ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.css'); ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/vendor/libs/apex-charts/apex-charts.css'); ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/vendor/libs/swiper/swiper.css'); ?>" />

    <!-- Page CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/vendor/css/pages/cards-statistics.css'); ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/vendor/css/pages/cards-analytics.css'); ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/vendor/css/pages/ui-carousel.css'); ?>" />
    <!-- Helpers -->
    <script src="<?= base_url('assets/vendor/js/helpers.js'); ?>"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="<?= base_url('assets/vendor/js/template-customizer.js'); ?>"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="<?= base_url('assets/js/config.js'); ?>"></script>

</head>

<body>

    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-navbar-full layout-horizontal layout-without-menu">
        <div class="layout-container">
            <!-- Navbar -->

            <nav class="layout-navbar navbar navbar-expand-xl align-items-center bg-navbar-theme" id="layout-navbar">
                <div class="container-xxl">
                    <div class="navbar-brand app-brand demo d-none d-xl-flex py-0 me-4">
                        <a href="index.html" class="app-brand-link gap-2">
                            <span class="app-brand-logo demo">
                                <span style="color: #666cff">
                                    <img src="<?= base_url('assets/img/custom/icons-mommy-and-me.png') ?>"
                                        alt="Icon Posyandu" width="50" height="50">
                                </span>
                            </span>
                            <span class="app-brand-text menu-text fw-semibold">Tembang Santri</span>
                        </a>

                        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-xl-none">
                            <i class="mdi mdi-close align-middle"></i>
                        </a>
                    </div>

                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                            <i class="mdi mdi-menu mdi-24px"></i>
                        </a>
                    </div>

                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                        <ul class="navbar-nav flex-row align-items-center ms-auto">

                            <!-- Style Switcher -->
                            <li class="nav-item me-1 me-xl-0">
                                <a class="nav-link btn btn-text-secondary rounded-pill btn-icon style-switcher-toggle hide-arrow"
                                    href="javascript:void(0);">
                                    <i class="mdi mdi-24px"></i>
                                </a>
                            </li>
                            <!--/ Style Switcher -->

                            <!-- Notification -->
                            <li class="nav-item dropdown-notifications navbar-dropdown dropdown me-2 me-xl-1">
                                <a class="nav-link btn btn-text-secondary rounded-pill btn-icon dropdown-toggle hide-arrow"
                                    href="javascript:void(0);" data-bs-toggle="dropdown" data-bs-auto-close="outside"
                                    aria-expanded="false">
                                    <i class="mdi mdi-bell-outline mdi-24px"></i>
                                    <span
                                        class="position-absolute top-0 start-50 translate-middle-y badge badge-dot bg-danger mt-2 border"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end py-0">
                                    <li class="dropdown-menu-header border-bottom">
                                        <div class="dropdown-header d-flex align-items-center py-3">
                                            <h6 class="mb-0 me-auto">Notifikasi</h6>
                                            <span class="badge rounded-pill bg-label-primary">1 Baru</span>
                                        </div>
                                    </li>
                                    <li class="dropdown-notifications-list scrollable-container">
                                        <ul class="list-group list-group-flush">
                                            <li
                                                class="list-group-item list-group-item-action dropdown-notifications-item">
                                                <div class="d-flex gap-2">
                                                    <div class="flex-shrink-0">
                                                        <div class="avatar me-1">
                                                            <img src="<?= base_url('assets/img/avatars/user.png'); ?>"
                                                                alt class="w-px-40 h-auto rounded-circle" />
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="d-flex flex-column flex-grow-1 overflow-hidden w-px-200">
                                                        <h6 class="mb-1 text-warning">Peringatan!</h6>
                                                        <small class="text-truncate text-body">Nama Balita 15 melewati
                                                            pemeriksaan 2 bulan beturut-turut</small>
                                                    </div>
                                                    <div class="flex-shrink-0 dropdown-notifications-actions">
                                                        <small class="text-muted">1jam lalu</small>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="dropdown-menu-footer border-top p-2">
                                        <a href="javascript:void(0);"
                                            class="btn btn-primary d-flex justify-content-center">
                                            Lihat semua notifikasi
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!--/ Notification -->

                            <!-- User -->
                            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                                    data-bs-toggle="dropdown">
                                    <div class="avatar avatar-online">
                                        <img src="<?= base_url('assets/img/avatars/user.png'); ?>" alt
                                            class="w-px-40 h-auto rounded-circle" />
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="pages-account-settings-account.html">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar avatar-online">
                                                        <img src="<?= base_url('assets/img/avatars/user.png'); ?>" alt
                                                            class="w-px-40 h-auto rounded-circle" />
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <span class="fw-semibold d-block"><?= $session['nama_lengkap']; ?></span>
                                                    <small class="text-muted"><?= $session['username']; ?></small>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="pages-profile-user.html">
                                            <i class="mdi mdi-account-outline me-2"></i>
                                            <span class="align-middle">Profil Ku</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="pages-account-settings-account.html">
                                            <i class="mdi mdi-cog-outline me-2"></i>
                                            <span class="align-middle">Pengaturan</span>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="<?= site_url('logout'); ?>">
                                            <i class="mdi mdi-logout me-2"></i>
                                            <span class="align-middle">Keluar</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!--/ User -->
                        </ul>
                    </div>
                </div>
            </nav>

            <!-- / Navbar -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Menu -->
                    <aside id="layout-menu"
                        class="layout-menu-horizontal menu-horizontal menu bg-menu-theme flex-grow-0">
                        <div class="container-xxl d-flex h-100">
                            <ul class="menu-inner">
                                <!-- Dashboards -->
                                <?php
                                    $status_menu = $status_active_menu;
                                    $status_submenu = $status_active_submenu;

                                    $active_menu_dashboard = "";
                                    $active_submenu_monitoring = "";

                                    $active_menu_masterbalita = "";
                                    $active_submenu_databalita = "";
                                    $active_submenu_tambahbalita = "";

                                    $active_menu_mastergizi = "";
                                    $active_submenu_statusgizi = "";

                                    if ($status_menu == "dashboard" && $status_submenu == "monitoring") {
                                        $active_menu_dashboard = "active";
                                        $active_submenu_monitoring = "active";
                                    } else if ($status_menu == "masterbalita" && $status_submenu == "databalita") {
                                        $active_menu_masterbalita = "active";
                                        $active_submenu_databalita = "active";
                                    } else if ($status_menu == "masterbalita" && $status_submenu == "tambahbalita") {
                                        $active_menu_masterbalita = "active";
                                        $active_submenu_tambahbalita = "active";
                                    } else if ($status_menu == "masterrekap" && $status_submenu == "hasilrekap") {
                                        $active_menu_mastergizi = "active";
                                        $active_submenu_statusgizi = "active";
                                    }

                                ?>
                                <li class="menu-item <?= $active_menu_dashboard; ?>">
                                    <a href="javascript:void(0)" class="menu-link menu-toggle">
                                        <i class="menu-icon tf-icons mdi mdi-home-outline"></i>
                                        <div data-i18n="Dashboards">Dashboards</div>
                                    </a>
                                    <ul class="menu-sub">
                                        <li class="menu-item <?= $active_submenu_monitoring; ?>">
                                            <a href="<?= base_url('dashboard') ?>" class="menu-link">
                                                <i class="menu-icon tf-icons mdi mdi-chart-timeline-variant"></i>
                                                <div data-i18n="Monitoring Balita">Monitoring Balita</div>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <!-- Pages -->
                                <li class="menu-item <?= $active_menu_masterbalita; ?>">
                                    <a href="javascript:void(0)" class="menu-link menu-toggle">
                                        <i class="menu-icon tf-icons mdi mdi-file-document-outline"></i>
                                        <div data-i18n="Menu">Menu</div>
                                    </a>
                                    <ul class="menu-sub">
                                        <li class="menu-item <?= $active_menu_masterbalita; ?>">
                                            <a href="javascript:void(0);" class="menu-link menu-toggle">
                                                <i class="menu-icon tf-icons mdi mdi-card-account-details-outline"></i>
                                                <div data-i18n="Master Balita">Master Balita</div>
                                            </a>
                                            <ul class="menu-sub">
                                                <li class="menu-item" <?= $active_submenu_databalita; ?>>
                                                    <a href="<?= base_url('dashboard/menu/data-balita'); ?>" class="menu-link">
                                                        <i class="menu-icon tf-icons mdi mdi-circle-medium"></i>
                                                        <div data-i18n="Data Balita">Data Balita</div>
                                                    </a>
                                                </li>
                                                <li class="menu-item <?= $active_submenu_tambahbalita; ?>">
                                                    <a href="<?= base_url('dashboard/menu/tambah-balita'); ?>" class="menu-link">
                                                        <i class="menu-icon tf-icons mdi mdi-circle-medium"></i>
                                                        <div data-i18n="Tambah Balita">Tambah Balita</div>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="menu-item <?= $active_menu_mastergizi; ?>">
                                            <a href="javascript:void(0);" class="menu-link menu-toggle">
                                                <i class="menu-icon tf-icons mdi mdi mdi-mother-nurse"></i>
                                                <div data-i18n="Master Rekap">Master Rekap</div>
                                            </a>
                                            <ul class="menu-sub">
                                                <li class="menu-item" <?= $active_submenu_statusgizi; ?>>
                                                    <a href="<?= base_url('dashboard/menu/rekap-pemeriksaan'); ?>" class="menu-link">
                                                        <i class="menu-icon tf-icons mdi mdi-circle-medium"></i>
                                                        <div data-i18n="Hasil Rekap Pemeriksaan">Hasil Rekap Pemeriksaan</div>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </aside>
                    <!-- / Menu -->