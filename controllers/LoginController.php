<?php

class LoginController
{
    public static function prepare_variables(array $params): array
    {
        $params['title'] = 'Login';

        return $params;
    }
}
