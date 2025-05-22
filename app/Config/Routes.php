<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');   // Tampilkan halaman utama

// Routing untuk login dan register
$routes->get('/login', 'Auth::login');         // Tampilkan form login
$routes->post('/login', 'Auth::login');        // Proses login
$routes->get('/register', 'Auth::register');   // Tampilkan form register
$routes->post('/register', 'Auth::register');  // Proses register
$routes->get('/logout', 'Auth::logout');       // Logout user

// Routing untuk CRUD tugas
$routes->get('/tugas', 'Tugas::index');                // Tampilkan daftar tugas
$routes->get('/tugas/tambah', 'Tugas::tambah');        // Tampilkan form tambah tugas
$routes->post('/tugas/tambah', 'Tugas::tambah');       // Proses tambah tugas
$routes->get('/tugas/edit/(:num)', 'Tugas::edit/$1');  // Tampilkan form edit tugas
$routes->post('/tugas/edit/(:num)', 'Tugas::edit/$1'); // Proses edit tugas
$routes->get('/tugas/hapus/(:num)', 'Tugas::hapus/$1');// Hapus tugas berdasarkan ID