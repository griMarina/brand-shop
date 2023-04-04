<?php

class AdminController
{
    public static function prepare_variables(array $params)
    {
        // create PDO connection and an Auth object
        $pdo = connection();
        $auth = new Auth($pdo);

        // if user is not the admin, redirect to the login page and terminate the script execution
        if (!$auth->is_admin()) {
            header('Location: /login');
            http_response_code(403);
            exit();
        }

        // get the current tab name
        $url_array = explode('/', $_SERVER['REQUEST_URI']);
        $tab = $url_array[2] ?? '';

        switch ($tab) {
            case 'products':
                // get an array of all products from the db and add it to the $params array
                $db_product = new DatabaseProduct($pdo);
                $products = $db_product->get_products();
                $params['products'] = $products;
                break;

            case 'product':
                // create DatabaseProduct and DatabaseImage objects
                $db_product = new DatabaseProduct($pdo);
                $db_image = new DatabaseImage($pdo);

                if (isset($_POST['action'])) {
                    // if admin edited product info, update a product in the db with a new data from the $_POST array and redirect to the admin page with an appropriate message
                    if ($_POST['action'] == 'edit') {
                        $db_product->update_product(
                            $_POST['id'],
                            $_POST['title'],
                            $_POST['price'],
                            $_POST['desc']
                        );
                        header('Location: /admin/?status=product-updated');
                        exit();
                    } elseif ($_POST['action'] == 'delete') {
                        // if admin deleted the product, remove the product with the given ID from the db and redirect to the admin page with an appropriate message
                        $id = htmlspecialchars(strip_tags($_POST['id']));
                        $db_product->delete_product($id);
                        header('Location: /admin/?status=product-deleted');
                        exit();
                    }
                }

                // get the product id from $_GET or $_POST and sanitaze it 
                $id = htmlspecialchars(strip_tags($_GET['id'] ?? $_POST['id']));

                $product = $db_product->get_product($id);
                $image = $db_image->get_image($product->get_main_img_id());

                // add Product and User objects to the $params array
                $params['product'] = $product;
                $params['image'] = $image;
                break;

            case 'add-product':
                $db_product = new DatabaseProduct($pdo);
                $db_image = new DatabaseImage($pdo);

                if (isset($_POST['action']) && $_POST['action'] == 'add') {
                    // if admin adds a new product, retrieve the image title from the $_FILES array. If no image is uploaded, set 'no-img' as the default
                    $image_title = !empty($_FILES['new_img']['name']) ? $_FILES['new_img']['name'] : 'no-img';
                    // generate unique ids for an image and a product
                    $image_id = UUID::uuid();
                    $product_id = UUID::uuid();

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
                        intval($_POST['section_id']),
                        intval($_POST['category_id']),
                        $image_id
                    );

                    // add Image and Product objects to the db and redirect to the admin page with an appropriate message
                    $db_product->add_product($product);
                    $db_image->add_image($image);
                    header('Location: /admin/?status=product-added');
                }

                // get an array of categories from the db and add it to the $params array
                $categories = $db_product->get_categories();
                $params['categories'] = $categories;
                break;

            case 'users':
                // get an array of users from the db and add it to the $params array
                $db_user = new DatabaseUser($pdo);
                $users = $db_user->get_users();
                $params['users'] = $users;
                break;

            case 'user':
                // get a user id from $_GET or $_POST and sanitaze it
                $id = htmlspecialchars(strip_tags($_GET['user_id'] ?? $_POST['user_id']));

                // check user id and get a User object from the db
                if (preg_match('/^[0-9a-f]{8}-[0-9a-f]{4}-4[0-9a-f]{3}-[8|9|aA|bB][0-9a-f]{3}-[0-9a-f]{12}$/i', $id)) {
                    $db_user = new DatabaseUser($pdo);
                    $user = $db_user->get_user_by_id($id);
                } else {
                    // redirect to the error page if user's id isn't correct
                    header('Location: /oops');
                    exit();
                }

                if (isset($_POST['action'])) {
                    if ($_POST['action'] == 'edit') {

                        // loop through the $_POST array and check if a property with the name of the key exists in the $user object, call the appropriate setter method to update the $user object with the new value
                        foreach ($_POST as $key => $value) {
                            if (property_exists($user, $key)) {
                                $setter_name = 'set_' . ($key);
                                $user->$setter_name($value);
                            }
                        }

                        // update user's info in the db and redirect to the admin page with an appropriate message
                        $db_user->update_info($user);
                        header('Location: /admin/?status=user-updated');
                        exit();
                    } elseif ($_POST['action'] == 'delete') {
                        //delete the user from the db and redirect to a page with an appropriate message
                        $db_user->delete_user($id);
                        header('Location: /admin/?status=user-deleted');
                        exit();
                    }
                }

                // add the User object to the $params array
                $params['user'] = $user;
                break;

            case 'orders':
                // get an array of all orders from the db and add it to the $params array
                $db_order = new DatabaseOrder($pdo);
                $orders = $db_order->get_orders();
                $params['orders'] = $orders;
                break;

            case 'order':
                // get an order id from $_GET or $_POST and cast it to an integer
                $id = $_GET['id'] ?? $_POST['id'];
                $id = intval($id);

                $db_order = new DatabaseOrder($pdo);

                if (isset($_POST['action'])) {
                    if ($_POST['action'] == 'update-status') {
                        // update the status of the order in the db and redirect to the same page
                        $status = $_POST['status'];
                        $db_order->update_status($id, $status);
                        header('Location: /admin/order/?id=' . $id);
                        exit();
                    } elseif ($_POST['action'] == 'delete') {
                        //delete the order from the db and redirect to a page with an appropriate message
                        $db_order->delete_order($id);
                        header('Location: /admin/?status=order-deleted');
                        exit();
                    }
                }
                // get an Order object from the db and add it to the $params array
                $order = $db_order->get_order($id);
                $params['order'] = $order;

                // get an array of cart products from the db and add it to the $params array
                $db_cart = new DatabaseCart($pdo);
                $cart = $db_cart->get_cart($order->get_session_id());
                $params['cart'] = $cart;
                break;
        }

        if (isset($_GET['action']) && $_GET['action'] == 'logout') {
            // if admin is logged out, regenerate the session id, destroy the session data and redirect to the login page 
            session_regenerate_id();
            session_destroy();
            header('Location: /login');
            exit();
        }

        $params['title'] = 'Admin panel';
        // add the current tab name to the $params array
        $params['tab'] = $tab;
        // get a status from $_GET array or an empty string and add it to the $params array
        $params['status'] = $_GET['status'] ?? '';

        return $params;
    }
}
