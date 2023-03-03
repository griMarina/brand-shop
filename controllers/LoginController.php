<?php

class LoginController
{
    public static function prepare_variables(array $params): array
    {
        $data = json_decode(file_get_contents('php://input'), true);
        if (isset($data['action']) == 'add_cart') {
            $cart = unserialize($_SESSION['cart']);
            $pdo = connection();
            $db_cart = new DatabaseCart($pdo);
            $db_cart->add_cart($cart);
            session_regenerate_id();
            setcookie('PHPSESSID', session_id(), time() + 3600, '/');
            unset($_SESSION['cart']);
        }

        $params['title'] = 'Login';

        return $params;
    }
}
