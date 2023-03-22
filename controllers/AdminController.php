<?php

class AdminController
{
    public static function prepare_variables(array $params)
    {
        $pdo = connection();
        $auth = new Auth($pdo);

        if (!$auth->is_admin()) {
            header('Location: /login');
            die();
        }

        $url_array = explode('/', $_SERVER['REQUEST_URI']);
        $tab = $url_array[2] ?? '';

        switch ($tab) {
            case 'products':
                $db_product = new DatabaseProduct($pdo);
                $products = $db_product->get_products();
                $params['products'] = $products;
                break;

            case 'product':
                $id = (string)$_GET['id'];
                $db_product = new DatabaseProduct($pdo);
                $db_image = new DatabaseImage($pdo);
                $product = $db_product->get_product($id);
                $image = $db_image->get_image($product->get_main_img_id());

                if (isset($_POST['action']) == 'edit') {
                }

                $params['product'] = $product;
                $params['image'] = $image;
                break;

            case 'add-product':
                $db_product = new DatabaseProduct($pdo);
                $db_image = new DatabaseImage($pdo);

                if (isset($_POST['action']) == 'add') {
                    $image_title = $_FILES['new_img']['name'] ?? 'no-img';
                    $image_id = uniqid('image_');
                    $product_id = uniqid('product_');

                    $image = new Image(
                        $image_id,
                        $image_title,
                        $product_id,
                    );

                    $product = new Product(
                        $product_id,
                        $_POST['title'],
                        $_POST['desc'],
                        $_POST['price'],
                        $_POST['colour'],
                        (int)$_POST['section_id'],
                        (int)$_POST['category_id'],
                        $image_id
                    );

                    $db_product->add_product($product);
                    $db_image->add_image($image);
                    // $db_product->add_img($product->get_id());
                }

                $categories = $db_product->get_categories();
                $params['categories'] = $categories;
                break;

            case 'users':
                $db_user = new DatabaseUser($pdo);
                $users = $db_user->get_users();
                $params['users'] = $users;
                break;

            case 'user':
                // $id = (string)$_GET['id'];
                // $db_user = new DatabaseUser($pdo);
                // $users = $db_user->get_user();
                // $params['users'] = $users;
                break;

            case 'add-user':

                break;

            case 'orders':
                $db_order = new DatabaseOrder($pdo);
                $orders = $db_order->get_orders();
                $params['orders'] = $orders;
                break;
            case 'order':
                $id = (int)$_GET['id'];
                $db_orders = new DatabaseOrder($pdo);
                $order = $db_orders->get_order($id);

                $db_cart = new DatabaseCart($pdo);
                $cart = $db_cart->get_cart($order['session_id']);

                $params['order'] = $order;
                $params['cart'] = $cart;
                break;
        }

        if (isset($_GET['action']) == 'logout') {
            session_regenerate_id();
            session_destroy();
            header('Location: /login');
            die();
        }

        $params['title'] = 'Admin panel';
        $params['tab'] = $tab;

        return $params;
    }
}
