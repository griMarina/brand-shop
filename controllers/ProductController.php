<?php

class ProductController
{
    public static function prepare_variables(array $params): array
    {
        $pdo = connection();
        $db_product = new DatabaseProduct($pdo);

        $id = (int)$_GET['id'];
        $product = $db_product->get_product($id);
        $crumbs = [$product['section'], $product['category'], $product['title']];

        $params['product'] = $product;
        $params['title'] = $product['title'];
        $params['breadcrumbs'] = Breadcrumb::get_breadcrumbs($crumbs);
        $params['products'] = $db_product->get_products_by_limit(3);

        return $params;
    }
}
