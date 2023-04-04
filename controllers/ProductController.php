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

        // check product id and retrieve Product and Image objects from db
        if (preg_match('/^[0-9a-f]{8}-[0-9a-f]{4}-4[0-9a-f]{3}-[8|9|aA|bB][0-9a-f]{3}-[0-9a-f]{12}$/i', $id)) {
            $product = $db_product->get_product($id);
            $image = $db_image->get_image($product->get_main_img_id());
        } else {
            header('Location: /oops');
            exit();
        }

        // store Product and Image objects in the $_SESSION array
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
