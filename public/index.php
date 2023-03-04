<?php

include $_SERVER['DOCUMENT_ROOT'] . '/../config/config.php';

// define the page name from the url, by default it will be 'index'
$url_array = explode('/', $_SERVER['REQUEST_URI']);

if ($url_array[1] == '') {
    $page = 'home';
} else {
    $page = $url_array[1];
}

// for each page prepare an array with own set of variables to substitute them into the appropriate template
$params['layout'] = 'main';
$params['cart_qty'] = (isset($_SESSION['cart'])) ? unserialize($_SESSION['cart'])->get_cart_qty() : 0;
$params['qty_style'] = ($params['cart_qty'] == 0) ? 'none' : 'inline';

// define controller
$controller = ucfirst($page) . 'Controller';

// check if the $controller class exists. If the class exists, call the prepare_variables() method on the class and assign the result to the $params array. Then call the render() function with the updated $page and $params as arguments
if (class_exists($controller)) {
    $params = $controller::prepare_variables($params);
    $page = 'blocks/' . $page;
    echo render($page, $params);
} else {
    header('Location: /oops');
}
