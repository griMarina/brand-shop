<?php

class OopsController
{
    public static function prepare_variables(array $params): array
    {
        $params['title'] = 'Oops';
        $params['text'] = 'Page not found';

        return $params;
    }
}
