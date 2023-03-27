<?php

class AccountController
{
    public static function prepare_variables(array $params): array
    {
        $pdo = connection();
        $auth = new Auth($pdo);
        $user = $auth->user_exists();
        $db_user = new DatabaseUser($pdo);

        if (!isset($user)) {
            header('Location: /login');
            die();
        }

        $db_orders = new DatabaseOrder($pdo);
        $orders = $db_orders->get_orders_by_user_id($user->get_id());

        $tab = basename($_SERVER['REQUEST_URI']);

        if (isset($_POST['action']) == 'update_info') {

            foreach ($_POST as $key => $value) {
                if (property_exists($user, $key)) {
                    $setter_name = 'set_' . ($key);
                    $user->$setter_name($value);
                }
            }

            $db_user->update_info($user);
            header('Location: /account');
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
        $params['orders'] = $orders;

        return $params;
    }
}
