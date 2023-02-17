<?php

class ProductController
{
    public static function prepare_variables(array $params): array
    {
        $pdo = connection();

        $id = (int)$_GET['id'];

        $params['title'] = 'Product';
        $product = new DatabaseProduct($pdo);
        $params['product'] = $product->get_product($id);
        $params['products'] = $product->get_products_by_limit(3);

        return $params;
    }
}
