<?php

class CartController
{
    public static function prepare_variables(array $params): array
    {
        $session = session_id();
        $pdo = connection();
        $data = json_decode(file_get_contents('php://input'), true);
        $db_cart = new DatabaseCart($pdo);

        if (isset($data['product_id'])) {
            $product_id = $data['product_id'];
            $cart_product = new CartProduct($product_id, $session);
            $db_cart->add_to_cart($cart_product);
        }

        $params['title'] = 'Cart';
        $params['cart'] = $db_cart->get_cart($session);

        return $params;
    }
}
