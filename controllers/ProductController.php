<?php

class ProductController
{
    public static function prepare_variables(array $params): array
    {
        $pdo = connection();
        $db_product = new DatabaseProduct($pdo);
        $db_crumbs = new DatabaseCrumbs($pdo);
        $db_image = new DatabaseImage($pdo);

        $id = $_GET['id'];

        if (preg_match('/^product_[a-f0-9]{13}$/', $id)) {
            $product = $db_product->get_product($id);
            $image = $db_image->get_image($product->get_main_img_id());
        } else {
            header('Location: /oops');
            die();
        }

        $_SESSION['products'][$id] = $product;
        $_SESSION['images'][$id] = $image;

        $params['product'] = $product;
        $params['image'] = $image;
        $params['title'] = $product->get_title();
        $params['crumbs'] = $db_crumbs->get_data($id);
        $params['products'] = $db_product->get_products_by_limit(3);

        return $params;
    }
}
