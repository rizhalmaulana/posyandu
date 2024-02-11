<?php

namespace Config;
use Config\RolesConfig;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('LoginController');
$routes->setDefaultMethod('login');
$routes->setTranslateURIDashes(false);
$routes->setAutoRoute(true);
$routes->set404Override();

// Route Web Service
$routes->get('login', 'LoginController::login');
$routes->post('login/process', 'LoginController::auth_process');

$routes->get('registration', 'LoginController::registration');
$routes->post('registration/process', 'LoginController::registration_process');

$routes->post('getkecamatan/process', 'LoginController::kecamatan_process');
$routes->post('getkelurahan/process', 'LoginController::kelurahan_process');
$routes->post('getposyandu/process', 'LoginController::posyandu_process');

// Master Dashboard
$routes->get('master-dashboard', 'MasterDashboardController::index', ['filter' => 'authGuard']);
$routes->get('master-dashboard/profile', 'MasterDashboardController::profile', ['filter' => 'authGuard']);

// Admin Dashboard
$routes->get('admin-dashboard', 'AdminController::index', ['filter' => 'authGuard']);
$routes->get('admin-dashboard/profile', 'AdminController::profile', ['filter' => 'authGuard']);

// User Dashboard
$routes->get('dashboard', 'DashboardController::index', ['filter' => 'authGuard']);
$routes->get('dashboard/profile', 'DashboardController::profile', ['filter' => 'authGuard']);

$routes->get('dashboard/data-balita', 'DashboardController::data_balita_view', ['filter' => 'authGuard']);
$routes->get('dashboard/tambah-balita', 'DashboardController::tambah_balita_view', ['filter' => 'authGuard']);
$routes->get('dashboard/ubah-balita/(:segment)', 'DashboardController::ubah_balita_view/$1', ['filter' => 'authGuard']);

$routes->post('dashboard/process-tambah-balita', 'DashboardController::tambah_balita_process', ['filter' => 'authGuard']);
$routes->post('dashboard/process-ubah-balita', 'DashboardController::ubah_balita_process', ['filter' => 'authGuard']);

$routes->get('dashboard/data-kms-balita/(:segment)', 'DashboardController::data_kms_balita_view/$1', ['filter' => 'authGuard']);
$routes->get('dashboard/rekap-pemeriksaan', 'DashboardController::rekap_pemeriksaan_view', ['filter' => 'authGuard']);

$routes->get('dashboard/periksa/(:segment)', 'DashboardController::kunjungan_pemeriksaan_view/$1', ['filter' => 'authGuard']);
$routes->post('dashboard/save-data-kunjungan', 'DashboardController::save_data_kunjungan_process', ['filter' => 'authGuard']);
$routes->post('dashboard/save-pemeriksaan', 'DashboardController::save_data_pemeriksaan', ['filter' => 'authGuard']);

$routes->get('get-riwayat-kunjungan/(:segment)', 'DashboardController::get_riwayat_kunjungan/$1', ['filter' => 'authGuard']);
$routes->get('get-riwayat-kunjungan-chart', 'DashboardController::get_riwayat_kunjungan_chart', ['filter' => 'authGuard']);

$routes->get('logout', 'LoginController::logout');


// Route API Service
// $routes->post('process-tambah-balita', 'DashboardController::tambah_balita_process');