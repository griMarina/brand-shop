<?php

define('ROOT', dirname(__DIR__));
define('VIEWS_DIR', ROOT . '/views/');
define('LAYOUTS_DIR', 'layouts/');

define('HOST', 'localhost');
define('USER', 'admin');
define('PASS', 'asennus');
define('DB', 'online_shop');

include ROOT . '/controllers/indexController.php';
include ROOT . '/src/render.php';
