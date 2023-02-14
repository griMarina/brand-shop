<?php

define('ROOT', dirname(__DIR__));
define('VIEWS_DIR', ROOT . '/views/');
define('LAYOUTS_DIR', 'layouts/');

include ROOT . '/src/autoloader.php';
include ROOT . '/controllers/indexController.php';
include ROOT . '/src/render.php';
include ROOT . '/src/db.php';


spl_autoload_register('autoload');

// session_start(); // after spl_autoload_register