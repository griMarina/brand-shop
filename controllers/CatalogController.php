<?php

class CatalogController
{
    public static function prepare_variables(array $params): array
    {
        $url_array = explode('/', $_SERVER['REQUEST_URI']);
        if (isset($url_array[3])) {
            $url_array[3] =  str_replace('-', ' & ', $url_array[3]);
        }
        $crumbs = array_slice($url_array, 2);

        $pdo = connection();
        $product = new DatabaseProduct($pdo);

        $params['title'] = 'Products';
        $params['breadcrumbs'] = Breadcrumb::get_breadcrumbs($crumbs);

        if (isset($url_array[2]) && !empty($url_array[2])) {
            if (isset($url_array[3]) && !empty($url_array[3])) {
                $products = $product->get_products_by_category($url_array[2], $url_array[3]);
            } else {
                $products = $product->get_products_by_section($url_array[2]);
            }
        } else {
            $products = $product->get_products_by_limit(12);
        }

        if (empty($products)) {
            header('Location: /oops');
        }

        $params['products'] = $products;

        return $params;
    }
}
