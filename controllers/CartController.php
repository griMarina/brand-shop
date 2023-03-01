<?php

class CartController
{
    public static function prepare_variables(array $params): array
    {
        $session = session_id();
        // $pdo = connection();
        $data = json_decode(file_get_contents('php://input'), true);
        // $db_cart = new DatabaseCart($pdo);
        if (isset($_SESSION['cart'])) {
            $cart = unserialize($_SESSION['cart']);
        } else {
            $cart = new Cart($session);
        }

        if (isset($data['action'])) {
            $product_id = $data['product_id'] ?? '';

            switch ($data['action']) {
                case 'add':
                    if ($cart->is_product_exists($product_id)) {
                        $cart->set_product_quantity($product_id, 'increase');
                    } else {
                        $product = $_SESSION['products'][$product_id] ?? '';
                        $cart_product = new CartProduct(
                            $product_id,
                            $product['title'],
                            $product['price'],
                            $product['image']
                        );
                        $cart->add_product($cart_product);
                    }

                    $params['json'] = $cart;
                    unset($_SESSION['products']);
                    break;

                case 'increase':
                    $cart->set_product_quantity($product_id, 'increase');
                    $params['json'] = $cart;
                    break;

                case 'decrease':
                    $cart->set_product_quantity($product_id, 'decrease');
                    $params['json'] = $cart;
                    break;

                case 'delete':
                    $cart->remove_product($product_id);
                    $params['json'] = $cart;
                    break;

                case 'clear':
                    $cart->clear_cart();
                    $params['json'] = $cart;
                    break;

                default:
                    die();
            }
        }

        // $cart_product = new CartProduct($product_id, $session);
        // $db_cart->add_to_cart($cart_product);

        $_SESSION['cart'] = serialize($cart);

        $params['title'] = 'Cart';
        $params['cart'] = $cart;

        return $params;
    }
}
