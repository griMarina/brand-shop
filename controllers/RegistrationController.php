<?php

class RegistrationController
{
    public static function prepare_variables(array $params): array
    {
        if (isset($_POST['action']) && $_POST['action'] == 'join') {
            // if user is registered, create a unique id and hash password
            $pdo = connection();
            $user_id = UUID::uuid();
            $password = $_POST['password'];
            $pass_hash = password_hash($password, PASSWORD_DEFAULT);

            // check if user with the same email already exists in the db
            $db_user = new DatabaseUser($pdo);
            $user = $db_user->get_user_by_username($_POST['email']);

            if (isset($user)) {
                header('Location: /registration/?status=error');
                exit();
            }

            // create a new user and add it to the db
            $user = new User(
                $user_id,
                $_POST['email'],
                $pass_hash,
                $_POST['first_name'],
                $_POST['last_name'],
                $_POST['phone'],
                $_POST['address']
            );
            $db_user->add_user($user);

            header('Location: /registration/?status=ok');
            exit();
        }

        $params['status'] = $_GET['status'] ?? '';
        $params['title'] = 'Registration';

        return $params;
    }
}
