<?php

define('ROOT', dirname(__DIR__));
define('VIEWS_DIR', ROOT . '/views/');
define('CONTROLLERS_DIR', ROOT . '/controllers/');
define('MODELS_DIR', ROOT . '/models/');
define('LAYOUTS_DIR', 'layouts/');

define('DB_HOST', 'localhost');
define('DB_NAME', 'online_shop');
define('DB_USER', 'admin');
define('DB_PASS', 'asennus');

include ROOT . '/src/autoloader.php';
include ROOT . '/src/render.php';
include ROOT . '/src/db.php';

// Development only. Remove before production.
setcookie('XDEBUG_SESSION', 'xdebug', ['SameSite' => 'Lax']);

spl_autoload_register('autoload');
ini_set('session.cookie_samesite', 'Lax');
session_start();
