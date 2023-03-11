<?php

class LoginController
{
    public static function prepare_variables(array $params): array
    {
        if (isset($_SESSION['username']) && isset($_GET['action']) == 'checkout') {
            header('Location: /checkout');
            die();
        }

        if (isset($_SESSION['username'])) {
            header('Location: /account');
            die();
        }

        if (isset($_POST['action']) == 'login' || isset($_POST['action']) == 'login_checkout') {
            $pdo = connection();
            $db_user = new DatabaseUser($pdo);
            $username = $_POST['username'];
            $password = $_POST['password'];
            $user = $db_user->get_user($username);
            // $pass_hash = $user->get_pass_hash();

            if (isset($user) && password_verify($password, $user->get_pass_hash())) {
                $_SESSION['first_name'] = $user->get_first_name();
                $_SESSION['username'] = $user->get_username();
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
