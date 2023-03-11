<?php

class AccountController
{
    public static function prepare_variables(array $params): array
    {
        $tab = basename($_SERVER['REQUEST_URI']);

        if (!isset($_SESSION['username'])) {
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
        $params['first_name'] = $_SESSION['first_name'];

        return $params;
    }
}
