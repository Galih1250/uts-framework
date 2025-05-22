<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');   // Tampilkan halaman utama

// Routing untuk CRUD tugas
$routes->get('/tugas', 'Tugas::index');
$routes->get('tugas/tambah', 'Tugas::tambah');
$routes->post('tugas/tambah', 'Tugas::tambah');
$routes->get('/tugas/edit/(:num)', 'Tugas::edit/$1');
$routes->post('/tugas/edit/(:num)', 'Tugas::edit/$1');
$routes->get('/tugas/hapus/(:num)', 'Tugas::hapus/$1');
