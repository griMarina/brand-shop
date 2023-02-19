<?php

class ProductController
{
    public static function prepare_variables(array $params): array
    {
        $pdo = connection();

        $id = (int)$_GET['id'];

        $db_product = new DatabaseProduct($pdo);
        $product = $db_product->get_product($id);
        $params['product'] = $product;
        $params['title'] = $product['title'];
        $crumbs = [$product['section'], $product['category'], $product['title']];
        $params['breadcrumbs'] = Breadcrumb::get_breadcrumbs($crumbs);
        $params['products'] = $db_product->get_products_by_limit(3);

        return $params;
    }
}
