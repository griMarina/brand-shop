<?php

class OrderController
{
    public static function prepare_variables(array $params): array
    {
        $pdo = connection();
        $auth = new Auth($pdo);
        $user = $auth->user_exists();

        // check if user is logged in and order id exists
        if (!isset($user) || !isset($_GET['id'])) {
            header('Location: /login');
            exit();
        }

        // get order id from $_GET and cast it to an integer
        $id = $_GET['id'];
        $id = intval($id);

        // get an array of orders from the db
        $db_orders = new DatabaseOrder($pdo);
        $order = $db_orders->get_order($id);

        // get $cart array from the db
        $db_cart = new DatabaseCart($pdo);
        $cart = $db_cart->get_cart($order->get_session_id());

        $params['title'] = 'Order';
        $params['user'] = $user;
        $params['order'] = $order;
        $params['cart'] = $cart;

        return $params;
    }
}
