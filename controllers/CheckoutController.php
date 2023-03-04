<?php

class CheckoutController
{
    public static function prepare_variables(array $params): array
    {
        $params['title'] = 'Checkout';

        return $params;
    }
}
