<?php

class AccountController
{
    public static function prepare_variables(array $params): array
    {

        $pdo = connection();
        $auth = new Auth($pdo);
        $user = $auth->user_exists();

        $tab = basename($_SERVER['REQUEST_URI']);

        if (!isset($user)) {
            header('Location: /login');
            die();
        }

        if (isset($_GET['action']) == 'logout') {
            session_regenerate_id();
            session_destroy();
            header('Location: /login');
            die();
        }

        $params['title'] = 'Account';
        $params['tab'] = $tab;
        $params['user'] = $user;

        return $params;
    }
}
