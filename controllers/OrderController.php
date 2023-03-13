<?php

class OrderController
{
    public static function prepare_variables(array $params): array
    {
        // $pdo = connection();
        // $db_product = new DatabaseProduct($pdo);

        // $id = (int)$_GET['id'];
        // $product = $db_product->get_product($id);
        // $_SESSION['products'][$id] = $product;
        // $crumbs = [$product['section'], $product['category'], $product['title']];

        // $params['product'] = $product;
        $params['title'] = 'Order';

        return $params;
    }
}
