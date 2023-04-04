<?php

class AccountController
{
    public static function prepare_variables(array $params): array
    {
        // create PDO connection and an Auth object
        $pdo = connection();
        $auth = new Auth($pdo);
        // check if username exists in the db and return User object if found
        $user = $auth->user_exists();

        // redirect to the login page if user is not authenticated
        if (!isset($user)) {
            header('Location: /login');
            exit();
        }

        // get the current tab name (the last part of the current URL from the $_SERVER superglobal variable)
        $tab = basename($_SERVER['REQUEST_URI']);

        // check if user clicked on the update button on the personal data tab
        if (isset($_POST['action']) && $_POST['action'] == 'update_info') {
            // loop through the $_POST array and check if a property with the name of the key exists in the $user object, call the appropriate setter method to update the $user object with the new value
            foreach ($_POST as $key => $value) {
                if (property_exists($user, $key)) {
                    $setter_name = 'set_' . $key;
                    $user->$setter_name($value);
                }
            }

            // create a DatabaseUser object and update user info in the database and redirect to the account page
            $db_user = new DatabaseUser($pdo);
            $db_user->update_info($user);
            header('Location: /account');
            exit();
        }
        // if the user is logged out, regenerate the session id, destroy the session data and redirect to the login page 
        if (isset($_GET['action']) && $_GET['action'] == 'logout') {
            session_regenerate_id();
            session_destroy();
            header('Location: /login');
            exit();
        }

        // get an array of orders with the given user's id from the db
        $db_orders = new DatabaseOrder($pdo);
        $orders = $db_orders->get_orders_by_user_id($user->get_id());

        $params['title'] = 'Account';
        // assign the current tab name to the 'tab' key of the $params array
        $params['tab'] = $tab;
        // assign the User object to the 'user' key of the $params array
        $params['user'] = $user;
        // assign the array of orders to the 'orders' key of the $params array
        $params['orders'] = $orders;

        return $params;
    }
}
