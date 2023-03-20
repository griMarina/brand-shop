<?php

class CatalogController
{
    public static function prepare_variables(array $params): array
    {
        $url_array = explode('/', $_SERVER['REQUEST_URI']);
        $crumbs = array_slice($url_array, 2);

        $pdo = connection();
        $db_product = new DatabaseProduct($pdo);
        $db_crumbs = new DatabaseCrumbs($pdo);

        $params['title'] = 'Products';
        $params['crumbs'] = $db_crumbs->get_crumbs($crumbs);

        if (isset($url_array[2]) && !empty($url_array[2])) {
            if (isset($url_array[3]) && !empty($url_array[3])) {
                $products = $db_product->get_products_by_category($url_array[2], $url_array[3]);
            } else {
                $products = $db_product->get_products_by_section($url_array[2]);
            }
        } else {
            $products = $db_product->get_products_by_limit(12);
        }

        if (empty($products)) {
            header('Location: /oops');
        }

        $params['products'] = $products;

        return $params;
    }
}
