<?php

class IndexController
{
    public static function prepare_variables(array $params): array
    {
        $pdo = connection();

        $params['title'] = 'Home';
        $product = new DatabaseProduct($pdo);
        $params['product'] = $product->get_product(1);

        return $params;
    }
}
