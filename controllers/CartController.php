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
            $cart = $_SESSION['cart'];
        } else {
            $cart = new Cart($session);
        }

        // $_SESSION['cart'] = $cart;

        if (isset($data['action'])) {
            $product_id = $data['product_id'];
            if (!isset($_SESSION['cart'][$product_id])) {
                $cart_produc = $_SESSION['products'][$product_id] ?? '';
                $cart_product = new CartProduct(
                    $product_id,
                    $cart_produc['title'],
                    $cart_produc['price'],
                    $cart_produc['image']
                );
            }

            switch ($data['action']) {
                case 'add':


                    if ($cart->is_product_exists($cart_product)) {
                        $cart_product->set_quantity('increase');


                        // $_SESSION['cart'][$product_id]['quantity'] += 1;
                        // $_SESSION['cart'][$product_id]['total_price'] = $_SESSION['cart'][$product_id]['price'] *  $_SESSION['cart'][$product_id]['quantity'];
                    } else {

                        $cart->add_product($cart_product);


                        // $cart_product['quantity'] = 1;
                        // $cart_product['total_product_price'] = $cart_product['price'];

                    }
                    // $_SESSION['cart'] = $cart;
                    unset($_SESSION['products']);
                    break;

                case 'increase':
                    // $_SESSION['cart'][$product_id]['quantity'] += 1;
                    // $_SESSION['cart'][$product_id]['total_product_price'] = $_SESSION['cart'][$product_id]['price'] *  $_SESSION['cart'][$product_id]['quantity'];

                    $cart_product->set_quantity('increase');

                    $params['json'] = [
                        'quantity' => $cart_product->get_quantity(),
                        'total_product_price' => $cart_product->get_total_price()
                    ];
                    // $_SESSION['cart'] = $cart;
                    break;

                case 'decrease':
                    // $_SESSION['cart'][$product_id]['quantity'] -= 1;
                    // $_SESSION['cart'][$product_id]['total_price'] = $_SESSION['cart'][$product_id]['price'] *  $_SESSION['cart'][$product_id]['quantity'];
                    $cart_product->set_quantity('decrease');


                    $params['json'] = [
                        'quantity' => $cart_product->get_quantity(),
                        'total_product_price' => $cart_product->get_total_price()
                    ];
                    // $_SESSION['cart'] = $cart;
                    break;

                case 'delete':

                    $cart->remove_product($cart_product);

                    // unset($_SESSION['cart'][$product_id]);
                    $params['json'] = $cart;
                    break;

                default:
                    die();
            }
        }

        $_SESSION['cart'] = $cart;

        // $cart_product = new CartProduct($product_id, $session);
        // $db_cart->add_to_cart($cart_product);

        $params['title'] = 'Cart';
        $params['cart_total'] = $cart->get_cart_total();

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
