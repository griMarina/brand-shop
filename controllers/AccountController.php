<?php

class AccountController
{
    public static function prepare_variables(array $params): array
    {
        $params['title'] = 'Account';
        $params['first_name'] = $_SESSION['first_name'];

        return $params;
    }
}
