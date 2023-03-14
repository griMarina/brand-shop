<?php

class OrderController
{
    public static function prepare_variables(array $params): array
    {
        $pdo = connection();
        $auth = new Auth($pdo);
        $user = $auth->user_exists();
        // $db_user = new DatabaseUser($pdo);

        $id = (int)$_GET['id'];
        $db_orders = new DatabaseOrder($pdo);
        $order = $db_orders->get_order($id);
        // $db_cart = new DatabaseCart($pdo);
        // $cart = $db_cart->get_cart($order['session_id']);



        $params['title'] = 'Order';
        $params['user'] = $user;
        $params['order'] = $order;

        return $params;
    }
}
