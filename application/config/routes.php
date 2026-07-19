<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Konfigurasi route aplikasi

// Halaman depan website
$route['default_controller'] = 'page';
// http://localhost/kopi-profile/index.php/admin -> dashboard admin
$route['admin'] = 'admin/dashboard';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
