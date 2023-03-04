<?php

class CheckoutController
{
    public static function prepare_variables(array $params): array
    {
        if (isset($_GET['action']) == 'add_cart') {
            $cart = unserialize($_SESSION['cart']);
            $pdo = connection();
            $db_cart = new DatabaseCart($pdo);
            $db_cart->add_cart($cart);
            // unset($_SESSION['cart']);
            // header('Location: /');
            die();
        }

        $params['title'] = 'Checkout';

        return $params;
    }
}
