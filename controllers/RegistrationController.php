<?php

class RegistrationController
{
    public static function prepare_variables(array $params): array
    {
        $params['title'] = 'Registration';

        return $params;
    }
}
