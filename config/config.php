<?php

define('ROOT', dirname(__DIR__));
define('VIEWS_DIR', ROOT . '/views/');
define('LAYOUTS_DIR', 'layouts/');

include ROOT . '/controllers/indexController.php';
include ROOT . '/src/render.php';
include ROOT . '/src/db.php';
