<?php

class AdminController
{
    public static function prepare_variables(array $params)
    {
        $pdo = connection();
        $auth = new Auth($pdo);

        if (!$auth->is_admin()) {
            header('Location: /login');
            die();
        }

        // $tab = basename($_SERVER['REQUEST_URI']);
        $url_array = explode('/', $_SERVER['REQUEST_URI']);
        $tab = $url_array[2] ?? '';

        switch ($tab) {
            case 'products':
                $db_product = new DatabaseProduct($pdo);
                $products = $db_product->get_products();
                $params['products'] = $products;
                break;
            case 'product':
                $id = (int)$_GET['id'];
                $db_product = new DatabaseProduct($pdo);
                $product = $db_product->get_product($id);
                $params['product'] = $product;
                break;
            case 'add-product':
                $db_product = new DatabaseProduct($pdo);

                if (isset($_POST['action']) == 'add') {
                    $product_id = uniqid('product_');

                    $product = new Product(
                        $product_id,
                        $_POST['title'],
                        $_POST['desc'],
                        $_POST['price'],
                        $_POST['colour'],
                        (int)$_POST['section_id'],
                        (int)$_POST['category_id']
                    );
                    $db_product->add_product($product);
                    $db_product->add_img($product->get_id());
                }

                $categories = $db_product->get_categories();
                $params['categories'] = $categories;
                break;
            case 'users':
                $db_user = new DatabaseUser($pdo);
                $users = $db_user->get_users();
                $params['users'] = $users;
                break;
            case 'orders':
                $db_order = new DatabaseOrder($pdo);
                $orders = $db_order->get_orders();
                $params['orders'] = $orders;
                break;
        }

        if (isset($_GET['action']) == 'logout') {
            session_regenerate_id();
            session_destroy();
            header('Location: /login');
            die();
        }

        $params['title'] = 'Admin panel';
        $params['tab'] = $tab;

        return $params;
    }
}
