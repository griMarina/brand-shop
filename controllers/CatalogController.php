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

        // check if a section or a category of products is selected 
        if (isset($url_array[2]) && !empty($url_array[2])) {
            if (isset($url_array[3]) && !empty($url_array[3])) {
                // if category of products is selected, retrieve the products that belong to the specified category and section
                $products = $db_product->get_products_by_category($url_array[2], $url_array[3]);
            } else {
                // if a section of products is selected, retrieve the products that belong to the specified section
                $products = $db_product->get_products_by_section($url_array[2]);
            }
        } else {
            // retrieve products with a specified limit
            $products = $db_product->get_products();
        }

        // redirect to the error page if no row is returned from the db
        if (empty($products)) {
            header('Location: /oops');
        }

        // add $products array to the $params array
        $params['products'] = $products;

        return $params;
    }
}
