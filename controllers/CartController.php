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

            switch ($data['action']) {
                case 'add':
                    $cart_product = $_SESSION['products'][$product_id] ?? '';

                    if (isset($_SESSION['cart'][$product_id])) {
                        $_SESSION['cart'][$product_id]['quantity'] += 1;
                        $_SESSION['cart'][$product_id]['total_price'] = $_SESSION['cart'][$product_id]['price'] *  $_SESSION['cart'][$product_id]['quantity'];
                    } else {
                        $cart_product['quantity'] = 1;
                        $cart_product['total_price'] = $cart_product['price'];
                        $_SESSION['cart'][$product_id] = $cart_product;
                    }
                    unset($_SESSION['products']);
                    break;

                case 'increase':
                    $_SESSION['cart'][$product_id]['quantity'] += 1;
                    $_SESSION['cart'][$product_id]['total_price'] = $_SESSION['cart'][$product_id]['price'] *  $_SESSION['cart'][$product_id]['quantity'];

                    $params['json'] = [
                        'quantity' => $_SESSION['cart'][$product_id]['quantity'],
                        'total_price' => $_SESSION['cart'][$product_id]['total_price']
                    ];
                    break;

                case 'decrease':
                    $_SESSION['cart'][$product_id]['quantity'] -= 1;
                    $_SESSION['cart'][$product_id]['total_price'] = $_SESSION['cart'][$product_id]['price'] *  $_SESSION['cart'][$product_id]['quantity'];

                    $params['json'] = [
                        'quantity' => $_SESSION['cart'][$product_id]['quantity'],
                        'total_price' => $_SESSION['cart'][$product_id]['total_price']
                    ];
                    break;

                case 'delete':
                    unset($_SESSION['cart'][$product_id]);
                    $params['json'] = $_SESSION['cart'];
                    break;

                default:
                    die();
            }
        }

        // $cart_product = new CartProduct($product_id, $session);
        // $db_cart->add_to_cart($cart_product);

        $params['title'] = 'Cart';
        if (isset($_SESSION['cart'])) {
            $params['cart'] = $_SESSION['cart'];
            $total = 0;

            foreach ($params['cart'] as $product) {
                $total += $product['total_price'];
            }

            $params['total'] = $total;
        }
        return $params;
    }
}
