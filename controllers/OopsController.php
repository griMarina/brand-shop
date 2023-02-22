<?php

class OopsController
{
    public static function prepare_variables(array $params): array
    {
        $params['title'] = 'Oops';

        return $params;
    }
}
