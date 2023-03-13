<?php

class LoginController
{
    public static function prepare_variables(array $params): array
    {
        $pdo = connection();
        $auth = new Auth($pdo);
        $user = $auth->user_exists();

        if (isset($user)) {
            if (isset($_GET['action']) == 'checkout') {
                header('Location: /checkout');
            } else {
                header('Location: /account');
            }
            die();
        }

        if (isset($_POST['action']) == 'login' || isset($_POST['action']) == 'login_checkout') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            if ($auth->auth($username, $password)) {
                if ($_POST['action'] == 'login_checkout') {
                    header('Location: /checkout');
                } else {
                    header('Location: /account');
                }
                die();
            } else {
                echo "Wrong login/password.";
            }
        }

        $params['action'] = $_GET['action'] ?? '';
        $params['title'] = 'Login';

        return $params;
    }
}
