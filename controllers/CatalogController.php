<?php

class CatalogController
{
    public static function prepare_variables(array $params): array
    {
        $url_array = explode('/', $_SERVER['REQUEST_URI']);
        $section = $url_array[2] ?? '';

        $pdo = connection();

        $params['title'] = 'Catalog';
        $product = new DatabaseProduct($pdo);
        // $params['products'] = $product->get_products(12);

        $params['products'] = $product->get_products_by_section($section);

        return $params;
    }
}
