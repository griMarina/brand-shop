<?php

class AdminController
{
    public static function prepare_variables(array $params): array
    {




        $params['title'] = 'Admin panel';

        return $params;
    }
}
