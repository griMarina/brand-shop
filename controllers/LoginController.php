<?php

class LoginController
{
    public static function prepare_variables(array $params): array
    {
        $pdo = connection();
        $auth = new Auth($pdo);
        $user = $auth->user_exists();

        if (isset($user)) {
            // if user is the admin, redirect to the admin page
            if ($auth->is_admin()) {
                header('Location: /admin');
                die();
            }
            // 
            if (isset($_GET['action']) == 'checkout') {
                // if the order has been checked out, redirect to the page with delivery details 
                header('Location: /checkout');
            } else {
                // if user is logged in, redirect to the account page
                header('Location: /account');
            }
            die();
        }

        // check if user has logged in
        if (isset($_POST['action']) == 'login' || isset($_POST['action']) == 'login_checkout') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            // check username and password
            if ($auth->auth($username, $password)) {

                if ($auth->is_admin()) {
                    header('Location: /admin');
                    die();
                }

                if ($_POST['action'] == 'login_checkout') {
                    // if the order has been checked out, redirect to the page with delivery details 
                    header('Location: /checkout');
                } else {
                    // if user is logged in, redirect to the account page
                    header('Location: /account');
                }
            } else {
                header('Location: /login/?status=login_error');
            }
            die();
        }

        $params['action'] = $_GET['action'] ?? '';
        $params['status'] = $_GET['status'] ?? '';
        $params['title'] = 'Login';

        return $params;
    }
}
