<?php

class HomeController
{
    public static function prepare_variables(array $params): array
    {
        // create PDO connection and a DatabaseProduct object
        $pdo = connection();
        $product = new DatabaseProduct($pdo);

        $params['title'] = 'Home';
        // get an array of products with a specified limit from the db and assign it to the 'products' key of the $params array
        $params['products'] = $product->get_products_by_limit(6);

        return $params;
    }
}
