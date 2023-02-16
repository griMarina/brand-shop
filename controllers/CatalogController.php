<?php

class CatalogController
{
    public static function prepare_variables(array $params): array
    {
        $pdo = connection();

        $params['title'] = 'Catalog';
        $product = new DatabaseProduct($pdo);
        $params['products'] = $product->get_products(12);

        return $params;
    }
}
