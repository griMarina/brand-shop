<?php

class CatalogController
{
    public static function prepare_variables(array $params): array
    {
        $url_array = explode('/', $_SERVER['REQUEST_URI']);

        $pdo = connection();

        $params['title'] = 'Products';
        $params['breadcrumbs'] = Breadcrumb::get_breadcrumbs(array_slice($url_array, 2));
        $product = new DatabaseProduct($pdo);
        $params['products'] = (isset($url_array[2]))
            ? $product->get_products_by_section($url_array[2])
            : $product->get_products_by_limit(12);

        return $params;
    }
}
