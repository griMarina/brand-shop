<?php

class CheckoutController
{
    public static function prepare_variables(array $params): array
    {
        if (isset($_POST['action']) == 'submit_order') {
            $session_id = session_id();
            $pdo = connection();

            $cart = unserialize($_SESSION['cart']);
            $db_cart = new DatabaseCart($pdo);
            $db_cart->add_cart($cart);

            $order = new Order(
                $_POST['first_name'],
                $_POST['last_name'],
                $_POST['phone'],
                $_POST['email'],
                $_POST['address'],
                $session_id
            );
            $db_order = new DatabaseOrder($pdo);
            $db_order->add_order($order);

            unset($_SESSION['cart']);
            session_regenerate_id();
            header('Location: /checkout/?status=ok');
            die();
        }

        $params['status'] = $_GET['status'] ?? '';
        $params['title'] = 'Checkout';

        return $params;
    }
}
