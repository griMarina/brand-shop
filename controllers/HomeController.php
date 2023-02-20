<?php

class HomeController
{
    public static function prepare_variables(array $params): array
    {
        $pdo = connection();
        $product = new DatabaseProduct($pdo);

        $params['title'] = 'Home';
        $params['products'] = $product->get_products_by_limit(6);

        return $params;
    }
}
