<?php

class AdminController
{
    public static function prepare_variables(array $params)
    {
        $tab = basename($_SERVER['REQUEST_URI']);




        $params['title'] = 'Admin panel';
        $params['tab'] = $tab;

        return $params;
    }
}
