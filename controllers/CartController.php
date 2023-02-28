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
            $product_id = $data['product_id'];

            switch ($data['action']) {
                case 'add':
                    if ($cart->is_product_exists($product_id)) {
                        $cart->get_product_by_id($product_id)->set_quantity('increase');
                        $cart->set_cart_total();
                    } else {
                        $product = $_SESSION['products'][$product_id] ?? '';
                        $cart_product = new CartProduct(
                            $product_id,
                            $product['title'],
                            $product['price'],
                            $product['image'],
                            $cart
                        );
                        $cart->add_product($cart_product);
                    }
                    unset($_SESSION['products']);
                    break;

                case 'increase':
                    $cart_product = $cart->get_product_by_id($product_id);
                    $cart_product->set_quantity('increase');
                    // $cart->set_cart_total();

                    $params['json'] = $cart;
                    break;

                case 'decrease':
                    $cart_product = $cart->get_product_by_id($product_id);
                    $cart_product->set_quantity('decrease');
                    // $cart->set_cart_total();

                    $params['json'] = $cart;

                    break;

                case 'delete':
                    $cart->remove_product($product_id);
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
