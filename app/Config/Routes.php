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

// Admin Dashboard
$routes->get('admin-dashboard', 'AdminController::index', ['filter' => 'authGuard']);

// User Dashboard
$routes->get('dashboard', 'DashboardController::index', ['filter' => 'authGuard']);

$routes->get('dashboard/menu/data-balita', 'DashboardController::data_balita_view', ['filter' => 'authGuard']);

$routes->get('dashboard/menu/tambah-balita', 'DashboardController::tambah_balita_view', ['filter' => 'authGuard']);
$routes->post('dashboard/menu/process-tambah-balita', 'DashboardController::tambah_balita_process', ['filter' => 'authGuard']);

$routes->get('dashboard/menu/rekap-pemeriksaan', 'DashboardController::rekap_pemeriksaan_view', ['filter' => 'authGuard']);
$routes->get('dashboard/periksa/(:segment)', 'DashboardController::kunjungan_pemeriksaan_view/$1', ['filter' => 'authGuard']);
$routes->post('dashboard/save-data-kunjungan', 'DashboardController::save_data_kunjungan_process', ['filter' => 'authGuard']);

$routes->get('get-riwayat-kunjungan', 'DashboardController::get_riwayat_kunjungan', ['filter' => 'authGuard']);

$routes->get('logout', 'LoginController::logout');


// Route API Service
// $routes->post('process-tambah-balita', 'DashboardController::tambah_balita_process');