<?php

class RegistrationController
{
    public static function prepare_variables(array $params): array
    {
        if (isset($_POST['action']) == 'join') {
            $pdo = connection();
            $user_id = uniqid();
            $password = $_POST['password'];
            $pass_hash = password_hash($password, PASSWORD_DEFAULT);
            $user = new User(
                $user_id,
                $_POST['email'],
                $pass_hash,
                $_POST['first_name'],
                $_POST['last_name'],
                $_POST['phone'],
                $_POST['address']
            );
            $db_user = new DatabaseUser($pdo);
            $db_user->add_user($user);

            header('Location: /registration/?status=ok');
            die();
        }

        $params['status'] = $_GET['status'] ?? '';
        $params['title'] = 'Registration';

        return $params;
    }
}
