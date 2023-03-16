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

        $tab = basename($_SERVER['REQUEST_URI']);

        $db_product = new DatabaseProduct($pdo);
        $products = $db_product->get_products();

        $db_user = new DatabaseUser($pdo);
        $users = $db_user->get_users();

        $db_order = new DatabaseOrder($pdo);
        $orders = $db_order->get_orders();

        if (isset($_GET['action']) == 'logout') {
            session_regenerate_id();
            session_destroy();
            header('Location: /login');
            die();
        }

        $params['title'] = 'Admin panel';
        $params['tab'] = $tab;
        $params['products'] = $products;
        $params['users'] = $users;
        $params['orders'] = $orders;

        return $params;
    }
}
