<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

//$routes->get('', '::index');

// Routes Beranda
$routes->get('admin/beranda','Admin\BerandaAdminController::index');

// Routes Login
$routes->get('login','Auth\LoginController::index');
$routes->post('login/submit','Auth\LoginController::submit');
$routes->get('logout','Auth\LoginController::logout');


// Routes Pengguna
$routes->get('admin/pengguna','Admin\PenggunaController::index',['filter' => 'role:admin']);
$routes->get('admin/pengguna/tambah','Admin\PenggunaController::tambah',['filter' => 'role:admin']);
$routes->post('admin/pengguna/simpan','Admin\PenggunaController::simpan',['filter' => 'role:admin']);
$routes->get('admin/pengguna/edit/(:num)','Admin\PenggunaController::edit/$1',['filter' => 'role:admin']);
$routes->get('admin/pengguna/hapus/(:num)','Admin\PenggunaController::hapus/$1',['filter' => 'role:admin']);
$routes->post('admin/pengguna/update/(:num)','Admin\PenggunaController::update/$1',['filter' => 'role:admin']);

// Routes Kelas
$routes->get('admin/kelas','Admin\KelasController::index',['filter' => 'role:admin']);
$routes->get('admin/kelas/tambah','Admin\KelasController::tambah',['filter' => 'role:admin']);
$routes->post('admin/kelas/simpan','Admin\KelasController::simpan',['filter' => 'role:admin']);
$routes->get('admin/kelas/edit/(:num)','Admin\KelasController::edit/$1',['filter' => 'role:admin']);
$routes->get('admin/kelas/hapus/(:num)','Admin\kelasController::hapus/$1',['filter' => 'role:admin']);
$routes->post('admin/kelas/update/(:num)','Admin\kelasController::update/$1',['filter' => 'role:admin']);

// Routes Peminjaman
$routes->get('admin/peminjaman','Admin\PeminjamanController::index',['filter' => 'role:admin']);
$routes->get('admin/peminjaman/tambah','Admin\PeminjamanController::tambah',['filter' => 'role:admin']);
$routes->post('admin/peminjaman/simpan','Admin\PeminjamanController::simpan',['filter' => 'role:admin']);
$routes->get('admin/peminjaman/edit/(:num)','Admin\PeminjamanController::edit/$1',['filter' => 'role:admin']);
$routes->get('admin/peminjaman/hapus/(:num)','Admin\PeminjamanController::hapus/$1',['filter' => 'role:admin']);
$routes->post('admin/peminjaman/update/(:num)','Admin\peminjamanController::update/$1',['filter' => 'role:admin']);


// Routes Barang
$routes->get('admin/barang','Admin\BarangController::index',['filter' => 'role:admin']);
$routes->get('admin/barang/tambah','Admin\BarangController::tambah',['filter' => 'role:admin']);
$routes->post('admin/barang/simpan','Admin\BarangController::simpan',['filter' => 'role:admin']);
$routes->get('admin/barang/edit/(:num)','Admin\BarangController::edit/$1',['filter' => 'role:admin']);
$routes->get('admin/barang/hapus/(:num)','Admin\BarangController::hapus/$1',['filter' => 'role:admin']);
$routes->post('admin/barang/update/(:num)','Admin\BarangController::update/$1',['filter' => 'role:admin']);


// ROUTE UNTUK GURU
$routes->get('guru/beranda','Guru\BerandaGuruController::index',['filter' => 'role:guru']);

// Routes Peminjaman
$routes->get('guru/peminjaman','Guru\PeminjamanController::index',['filter' => 'role:guru']);
$routes->get('guru/peminjaman/tambah','Guru\PeminjamanController::tambah',['filter' => 'role:guru']);
$routes->post('guru/peminjaman/simpan','Guru\PeminjamanController::simpan',['filter' => 'role:guru']);
$routes->get('guru/peminjaman/edit/(:num)','Guru\PeminjamanController::edit/$1',['filter' => 'role:guru']);
$routes->get('guru/peminjaman/hapus/(:num)','Guru\PeminjamanController::hapus/$1',['filter' => 'role:guru']);
$routes->post('guru/peminjaman/update/(:num)','Guru\peminjamanController::update/$1',['filter' => 'role:guru']);


// ROUTE UNTUK STAFF
$routes->get('staff/beranda','Staff\BerandaStaffController::index',['filter' => 'role:staff']);

$routes->get('staff/kelola-peminjaman','Staff\KelolaPeminjamanController::index',['filter' => 'role:staff']);
$routes->get('staff/kelola-peminjaman/acc/(:num)','Staff\KelolaPeminjamanController::acc/$1',['filter' => 'role:staff']);

// ROUTE UNTUK KEPALA-SEKOLAH
$routes->get('kepala-sekolah/laporan','KepalaSekolah\laporanController::index',['filter' => 'role:kepala_sekolah']);
$routes->get('kepala-sekolah/grafik','KepalaSekolah\grafikController::index',['filter' => 'role:kepala_sekolah']);


