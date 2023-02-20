<?php

class CatalogController
{
    public static function prepare_variables(array $params): array
    {
        $url_array = explode('/', $_SERVER['REQUEST_URI']);
        $crumbs = array_slice($url_array, 2);

        $pdo = connection();
        $product = new DatabaseProduct($pdo);

        $params['title'] = 'Products';
        $params['breadcrumbs'] = Breadcrumb::get_breadcrumbs($crumbs);

        $products = (isset($url_array[2]) && $url_array[2] !== '')
            ? $product->get_products_by_section($url_array[2])
            : $product->get_products_by_limit(12);

        if (empty($products)) {
            header('Location:/');
        }

        $params['products'] = $products;

        return $params;
    }
}
