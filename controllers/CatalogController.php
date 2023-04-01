<?php

class CatalogController
{
    public static function prepare_variables(array $params): array
    {
        // get the url of the current page
        $url_array = explode('/', $_SERVER['REQUEST_URI']);
        // get section and category name
        $crumbs = array_slice($url_array, 2);

        // create PDO connection and create DatabaseProduct and DatabaseCrumbs objects
        $pdo = connection();
        $db_product = new DatabaseProduct($pdo);
        $db_crumbs = new DatabaseCrumbs($pdo);

        $params['title'] = 'Products';
        // get an array containing the breadcrumbs and assign it to the 'crumbs' of the $params array
        $params['crumbs'] = $db_crumbs->get_crumbs($crumbs);

        // check if user has selected a section or a category of products on the catalog page
        if (isset($url_array[2]) && !empty($url_array[2])) {
            if (isset($url_array[3]) && !empty($url_array[3])) {
                // if user has selected a category of products, retrieve the products that belong to the specified category and section
                $products = $db_product->get_products_by_category($url_array[2], $url_array[3]);
            } else {
                // if user has selected a section of products, retrieve the products that belong to the specified section
                $products = $db_product->get_products_by_section($url_array[2]);
            }
        } else {
            // if user has not selected a section or category of products, retrieve products with a specified limit
            $products = $db_product->get_products_by_limit(12);
        }

        // redirect to the error page if no row is returned from the db
        if (empty($products)) {
            header('Location: /oops');
        }

        // assign $products array to the key 'products' of the $params array
        $params['products'] = $products;

        return $params;
    }
}
