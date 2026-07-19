<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Library & helper yang dimuat otomatis di semua halaman

$autoload['packages'] = array();

// database: query builder, session: flash message
$autoload['libraries'] = array('database', 'session');

$autoload['drivers'] = array();

// url: site_url/base_url, form: form_error/set_value
$autoload['helper'] = array('url', 'form');

$autoload['config'] = array();

$autoload['language'] = array();

$autoload['model'] = array();
