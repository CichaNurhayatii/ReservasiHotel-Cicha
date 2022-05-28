<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

     // routes untuk menu home //

$routes->get('/', 'Home::index');
$routes->get('/Kamar', 'Home::Kamar');
$routes->get('/fasilitas', 'Home::fasilitas');
$routes->get('/reservasi', 'Home::reservasi');
$routes->post('/reservasi', 'Home::reservasi');
$routes->get('/reservasi/print', 'Home::print');
$routes->get('/inv/(:num)', 'Home::invoice/$1');
$routes->get('/cek', 'Home::cari');
$routes->post('/cek', 'Home::cari');

// petugas//

$routes->get('/petugas', 'PetugasController::index');
$routes->post('/login', 'PetugasController::login');
$routes->get('/logout', 'PetugasController::logout');
$routes->get('/petugas/dashboard', 'Dashboardpetugas::index', ['filter' => 'otentifikasi']);

// route Reservasi Petugas//

$routes->get('/reservasi/petugas', 'ReservasiController::index',['filter'=>'otentifikasi']);
$routes->post('/reservasi/petugas', 'ReservasiController::index',['filter'=>'otentifikasi']);
//$routes->get('/reservasi/edit/(:num)', 'ReservasiController::edit/$1',['filter'=>'otentifikasi']);
$routes->get('/reservasi/in/(:num)', 'ReservasiController::in/$1',['filter'=>'otentifikasi']);
$routes->get('/reservasi/out/(:num)', 'ReservasiController::out/$1',['filter'=>'otentifikasi']);
$routes->post('/reservasi/out', 'ReservasiController::out',['filter'=>'otentifikasi']);



// route CRUD Kamar

$routes->get('/kamar', 'KamarController::index',['filter'=>'otentifikasi']);
$routes->get('/kamar/tambah', 'KamarController::tambahKamar',['filter'=>'otentifikasi']);
$routes->post('/kamar/tambah', 'KamarController::TambahKamar',['filter'=>'otentifikasi']);
$routes->get('/kamar/edit/(:num)', 'KamarController::editKamar/$1',['filter'=>'otentifikasi']);
$routes->post('/kamar/edit', 'KamarController::editKamar',['filter'=>'otentifikasi']);
$routes->get('/kamar/hapus/(:num)', 'KamarController::hapusKamar/$1',['filter'=>'otentifikasi']);

// route CRUD Fasilitas Kamar

$routes->get('/fkamar', 'FasilitasKamarController::index',['filter' => 'otentifikasi']);
$routes->get('/fkamar/tambah', 'FasilitasKamarController::tambahFasilitasKamar',['filter' => 'otentifikasi']);
$routes->post('/fkamar/simpan', 'FasilitasKamarController::simpanFasilitasKamar',['filter' => 'otentifikasi']);
$routes->get('/fkamar/edit/(:num)', 'FasilitasKamarController::editFasilitasKamar/$1',['filter' => 'otentifikasi']);
$routes->post('/fkamar/update', 'FasilitasKamarController::updateFasilitasKamar',['filter' => 'otentifikasi']);
$routes->get('/fkamar/hapus/(:num)', 'FasilitasKamarController::hapusFasilitasKamar/$1',['filter' => 'otentifikasi']);

// route CRUD Fasilitas Hotel

$routes->get('/fhotel', 'FasilitasHotelController::index',['filter' => 'otentifikasi']);
$routes->get('/fhotel/tambah', 'FasilitasHotelController::tambahFasilitasHotel',['filter' => 'otentifikasi']);
$routes->post('/fhotel/simpan', 'FasilitasHotelController::simpanFasilitasHotel',['filter' => 'otentifikasi']);
$routes->get('/fhotel/edit/(:num)', 'FasilitasHotelController::editFasilitasHotel/$1',['filter' => 'otentifikasi']);
//$routes->get('/fhotel/edit/(:num)', 'FasilitasHotelController::editFoto/$1',['filter' => 'otentifikasi']);
$routes->post('/fhotel/update', 'FasilitasHotelController::updateFasilitasHotel',['filter' => 'otentifikasi']);
$routes->post('/fhotel/update', 'FasilitasHotelController::updateFoto',['filter' => 'otentifikasi']);
$routes->get('/fhotel/hapus/(:num)', 'FasilitasHotelController::hapusFasilitasHotel/$1',['filter' => 'otentifikasi']);



/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
