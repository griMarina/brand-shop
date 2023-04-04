<?php

class CartController
{
    public static function prepare_variables(array $params): array
    {
        // get an id for the current session
        $session_id = session_id();
        // get JSON data from the request body and decodes it into $data array.
        $data = json_decode(file_get_contents('php://input'), true);

        // check a 'cart' session variable. If it is set, unserialize it, if not, create a new Cart object
        if (isset($_SESSION['cart'])) {
            $cart = unserialize($_SESSION['cart']);
        } else {
            $cart = new Cart($session_id);
        }

        // check if any action is done on the cart page
        if (isset($data['action'])) {
            // get a product id from the $data array or set an empty string 
            $product_id = $data['product_id'] ?? '';

            switch ($data['action']) {
                case 'add':
                    if ($cart->is_product_exists($product_id)) {
                        // if product already is in the cart, increase the quantity of this product
                        $cart->set_product_quantity($product_id, 'increase');
                    } else {
                        // get Product and Image objects from the $_SESSION, create a new CartProduct object and add it to the $cart_products array
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

                    // assign $cart object to the key 'json' of the $params array
                    $params['json'] = $cart;
                    // delete 'products' key in the $_SESSION array, removing all products from the user's session
                    unset($_SESSION['products']);
                    break;

                case 'increase':
                    // increase the quantity of a product in the cart
                    $cart->set_product_quantity($product_id, 'increase');
                    $params['json'] = $cart;
                    break;

                case 'decrease':
                    // decrease the quantity of a product in the cart
                    $cart->set_product_quantity($product_id, 'decrease');
                    $params['json'] = $cart;
                    break;

                case 'delete':
                    // delete a produt from the cart
                    $cart->remove_product($product_id);
                    $params['json'] = $cart;
                    break;

                case 'clear':
                    // delete all products from the cart
                    $cart->clear_cart();
                    $params['json'] = $cart;
                    break;

                default:
                    exit();
            }
        }

        // serialize the $cart object and store it in the 'cart' key of the $_SESSION array
        $_SESSION['cart'] = serialize($cart);
        $params['title'] = 'Cart';
        // add $cart object to the $params array
        $params['cart'] = $cart;

        return $params;
    }
}
