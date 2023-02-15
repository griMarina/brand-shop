<?php

include $_SERVER['DOCUMENT_ROOT'] . '/../config/config.php';

// define the page name from the url, by default it will be 'index'
$url_array = explode('/', $_SERVER['REQUEST_URI']);

if ($url_array[1] == '') {
    $page = 'index';
} else {
    $page = $url_array[1];
}

$params['layout'] = 'main';

// define controller
$controller = ucfirst($page) . 'Controller';

if (class_exists($controller)) {
    $params = $controller::prepare_variables($params);
    $page = 'blocks/' . $page;
    echo render($page, $params);
} else {
    die('epic fail');
}
