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
                            $product['image']
                        );
                        $cart->add_product($cart_product);
                    }
                    unset($_SESSION['products']);
                    break;

                case 'increase':
                    $cart_product = $cart->get_product_by_id($product_id);
                    $cart_product->set_quantity('increase');
                    $cart->set_cart_total();
                    $params['json'] = [
                        'quantity' => $cart_product->get_quantity(),
                        'total_product_price' => $cart_product->get_total_price(),
                        'cart_total' => $cart->get_cart_total()
                    ];
                    break;

                case 'decrease':
                    $cart_product = $cart->get_product_by_id($product_id);
                    $cart_product->set_quantity('decrease');
                    $cart->set_cart_total();
                    $params['json'] = [
                        'quantity' => $cart_product->get_quantity(),
                        'total_product_price' => $cart_product->get_total_price(),
                        'cart_total' => $cart->get_cart_total()
                    ];
                    break;

                case 'delete':
                    $cart->remove_product($product_id);
                    $params['json'] = $cart;
                    // [
                    //     'cart' => $cart->get_cart_products(),
                    //     'cart_total' => $cart->get_cart_total()
                    // ];
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

        // if (isset($_SESSION['cart'])) {
        //     $params['cart'] = $_SESSION['cart'];
        //     $cart_total = 0;

        //     foreach ($params['cart'] as $product) {
        //         $cart_total += $product['total_product_price'];
        //     }

        //     $params['cart_total'] = $cart_total;
        // }
        return $params;
    }
}
