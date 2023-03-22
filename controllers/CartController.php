<?php

class CartController
{
    public static function prepare_variables(array $params): array
    {
        $session_id = session_id();
        $data = json_decode(file_get_contents('php://input'), true);

        if (isset($_SESSION['cart'])) {
            $cart = unserialize($_SESSION['cart']);
        } else {
            $cart = new Cart($session_id);
        }

        if (isset($data['action'])) {
            $product_id = $data['product_id'] ?? '';

            switch ($data['action']) {
                case 'add':
                    if ($cart->is_product_exists($product_id)) {
                        $cart->set_product_quantity($product_id, 'increase');
                    } else {
                        $product = $_SESSION['products'][$product_id] ?? '';
                        $image = $_SESSION['images'][$product_id] ?? '';
                        $cart_product = new CartProduct(
                            $product->get_id(),
                            $product->get_title(),
                            $product->get_price(),
                            $image->get_title()
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

        $_SESSION['cart'] = serialize($cart);
        $params['title'] = 'Cart';
        $params['cart'] = $cart;

        return $params;
    }
}
