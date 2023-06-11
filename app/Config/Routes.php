<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Auth');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// $routes->get('/', 'Auth::index');
$routes->group('/auth', static function ($routes) {
    $routes->get('/', 'Auth::index');
    $routes->post('log/in', 'Auth::login');
    $routes->get('log/out', 'Auth::logout');
});

$routes->group('/admin', static function ($routes) {
    $routes->get('beranda', 'Admin\Beranda::index');
    $routes->get('lokasi', 'Admin\Beranda::lokasi');
    // done
    $routes->group('kecamatan', static function ($routes) {
        $routes->get('/', 'Admin\Kecamatan::index');
        $routes->post('/', 'Admin\Kecamatan::save');
        $routes->get('edit/(:num)', 'Admin\Kecamatan::edit/$1');
        $routes->put('edit/(:num)', 'Admin\Kecamatan::update/$1');
        $routes->delete('(:num)', 'Admin\Kecamatan::delete/$1');
    });

    // progress
    $routes->group('kelurahan', static function ($routes) {
        $routes->get('/', 'Admin\Kelurahan::index');
        $routes->post('/', 'Admin\Kelurahan::save');
        $routes->get('edit/(:num)', 'Admin\Kelurahan::edit/$1');
        $routes->put('edit/(:num)', 'Admin\Kelurahan::update/$1');
        $routes->delete('(:num)', 'Admin\Kelurahan::delete/$1');
    });

    $routes->group('regu', static function ($routes) {
        $routes->get('/', 'Admin\Regu::index');
        $routes->post('/', 'Admin\Regu::save');
        $routes->get('edit/(:num)', 'Admin\Regu::edit/$1');
        $routes->put('edit/(:num)', 'Admin\Regu::update/$1');
        $routes->delete('(:num)', 'Admin\Regu::delete/$1');
    });

    $routes->group('jabatan', static function ($routes) {
        $routes->get('/', 'Admin\Jabatan::index');
        $routes->post('/', 'Admin\Jabatan::save');
        $routes->get('edit/(:num)', 'Admin\Jabatan::edit/$1');
        $routes->put('edit/(:num)', 'Admin\Jabatan::update/$1');
        $routes->delete('(:num)', 'Admin\Jabatan::delete/$1');
    });

    $routes->group('petugas', static function ($routes) {
        $routes->get('/', 'Admin\Petugas::index');
        $routes->post('/', 'Admin\Petugas::save');
        $routes->get('edit/(:num)', 'Admin\Petugas::edit/$1');
        $routes->put('edit/(:num)', 'Admin\Petugas::update/$1');
        $routes->delete('(:num)', 'Admin\Petugas::delete/$1');
    });

    $routes->group('kejadian', static function ($routes) {
        $routes->get('/', 'Admin\Kejadian::index');
        $routes->post('/', 'Admin\Kejadian::save');
        $routes->get('edit/(:num)', 'Admin\Kejadian::edit/$1');
        $routes->put('edit/(:num)', 'Admin\Kejadian::update/$1');
        $routes->delete('(:num)', 'Admin\Kejadian::delete/$1');

        $routes->group('penugasan', static function ($routes) {
            $routes->get('(:num)', 'Admin\Penugasan::penugasan/$1');
            $routes->post('(:num)', 'Admin\Penugasan::save/$1');
            // idKejadian/idPenugasan
            $routes->delete('(:num)', 'Admin\Penugasan::delete/$1');
        });

        $routes->group('dokumentasi', static function ($routes) {
            $routes->get('(:num)', 'Admin\Dokumentasi::dokumentasi/$1');
            $routes->post('(:num)', 'Admin\Dokumentasi::save/$1');
            $routes->delete('(:num)', 'Admin\Dokumentasi::delete/$1');
        });
    });
});

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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
