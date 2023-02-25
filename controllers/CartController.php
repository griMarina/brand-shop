<?php

class CartController
{
    public static function prepare_variables(array $params): array
    {
        $session = session_id();
        $pdo = connection();
        $data = json_decode(file_get_contents('php://input'), true);
        $db_cart = new DatabaseCart($pdo);

        if (isset($data['action'])) {
            $product_id = $data['product_id'];
            if ($data['action'] == 'add') {
                $cart_product = $_SESSION['products'][$product_id] ?? '';
                $cart_product['quantity'] = 1;
                $_SESSION['cart'][$product_id] = $cart_product;
                unset($_SESSION['products']);
                // $cart_product = new CartProduct($product_id, $session);
                // $db_cart->add_to_cart($cart_product);

            } elseif ($data['action'] == 'decrease') {
                $_SESSION['cart'][$product_id]['quantity'] -= 1;
                $params['json'] = ['quantity' => $_SESSION['cart'][$product_id]['quantity']];
            } elseif ($data['action'] == 'increase') {
                $_SESSION['cart'][$product_id]['quantity'] += 1;
                $params['json'] = ['quantity' => $_SESSION['cart'][$product_id]['quantity']];
            }
        }

        $params['title'] = 'Cart';
        $params['cart'] = $_SESSION['cart'] ?? '';

        return $params;
    }
}
