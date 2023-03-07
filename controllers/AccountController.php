<?php

class AccountController
{
    public static function prepare_variables(array $params): array
    {
        $params['title'] = 'Account';

        return $params;
    }
}
