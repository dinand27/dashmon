<?php

use CodeIgniter\Router\RouteCollection;

/***
 * @var RouteCollection $routes  
 */
$routes->get('/', 'Home::index');
$routes->get('/home', 'Home::home');
$routes->get('/tampildashboard', 'Home::tampilAll');
$routes->get('/tampildashboard/filter', 'Home::tampil_id');

$routes->get('/register', 'User::register');
$routes->get('/login', 'User::login');

$routes->post('/register', 'User::do_register');
$routes->post('/login', 'User::do_login');
$routes->get('/logout', 'User::logout');



$routes->get('/equipment', 'Equipment::index');
$routes->get('/tampildata', 'Equipment::data_dashboard');
$routes->get('/chart', 'Equipment::jum_data_status');
$routes->get('/init_data', 'Equipment::init_data');

$routes->get('/getparam', 'Param::index');
$routes->get('/tampilsemua', 'Param::tampilAll');
$routes->get('/tampilsemua/filter', 'Param::tampil_id');
$routes->get('/tampil_id', 'Param::tampil_id');
$routes->get('/tampil_uri/(:any)', 'Param::getview/$1');

// $routes->get('/tampil_project', 'Home::tampil_project');
// $routes->get('/tampil_project_detail/(:any)', 'Home::tampil_project_detail/$1');
// 
$routes->get('/project', 'Home::project');

$routes->get('/create_data', 'Equipment::create_data');
// post
$routes->post('/create_data', 'Equipment::storing');

// edit
$routes->get('equipment/edit/(:any)', 'Equipment::formEditData/$1');
$routes->post('equipment/edit/(:any)', 'Equipment::prosesdata');

// Hapus
$routes->get('equipment/delete/(:any)', 'Equipment::hapusdata/$1');

$routes->get('chart/edit/(:any)', 'Equipment::formEditchart/$1');
$routes->post('chart/edit/(:any)', 'Equipment::prosesdatachart');
$routes->get('chart/delete/(:any)', 'Equipment::hapusdatachart/$1');

$routes->get('/report', 'Report::index');
// $routes->get('/report-monthly', 'Report::monthly');
// $routes->get('/report-daily', 'Report::daily');
$routes->post('/project/(:any)', 'Report::detail/$1');
$routes->get('/project/(:any)', 'Report::detail/$1');

$routes->get('/driver', 'Operator::index');
$routes->post('/driver/simpanExcel', 'Operator::simpanExcel');
$routes->get('/report', 'Report::laporanHarian');
$routes->post('/report/simpanExcel', 'Report::simpanExcel');
$routes->get('/report-daily', 'Report::laporanHarian');
$routes->get('/report-detail', 'Report::laporandetail');
$routes->get('/report/detail', 'Report::filter');
// $routes->post('/report/detail/(:any)', 'Report::laporandetail/$1');
