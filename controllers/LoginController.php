<?php

class LoginController
{
    public static function prepare_variables(array $params): array
    {
        if (isset($_POST['action']) == 'login') {
            $pdo = connection();
            $db_user = new DatabaseUser($pdo);
            $username = $_POST['username'];
            $user = $db_user->get_user($username);

            $password = $_POST['password'];
            $pass_hash = $user->get_pass_hash();

            if (password_verify($password, $pass_hash)) {
                $_SESSION['first_name'] = $user->get_first_name();
                header('Location: /account');
                die();
            } else {
                echo "Password is invalid.";
            }
        }

        $params['action'] = $_GET['action'] ?? '';
        $params['title'] = 'Login';

        return $params;
    }
}
