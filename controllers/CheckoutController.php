<?php

class CheckoutController
{
    public static function prepare_variables(array $params): array
    {
        $pdo = connection();
        $auth = new Auth($pdo);
        $user = $auth->user_exists();

        if (isset($_POST['action']) && $_POST['action'] == 'submit_order') {
            // create an Order object with user details, cart price, and session id and add the order to the db
            $session_id = session_id();
            $cart = unserialize($_SESSION['cart']);
            $user_id = ($user) ? $user->get_id() : null;

            $order = new Order(
                $_POST['first_name'],
                $_POST['last_name'],
                $_POST['phone'],
                $_POST['email'],
                $_POST['address'],
                $cart->get_cart_price(),
                $user_id,
                $session_id
            );

            $db_order = new DatabaseOrder($pdo);
            $db_order->add_order($order);
            // add cart details to the db
            $db_cart = new DatabaseCart($pdo);
            $db_cart->add_cart($cart);

            // remove cart details from the user's session
            unset($_SESSION['cart']);
            session_regenerate_id();
            header('Location: /checkout/?status=ok');
            exit();
        }

        $params['status'] = $_GET['status'] ?? '';
        $params['title'] = 'Checkout';
        $params['user'] = $user;

        return $params;
    }
}
