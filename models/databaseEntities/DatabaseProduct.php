<?php

class DatabaseProduct
{
    public function __construct(
        private PDO $pdo
    ) {
    }

    public function get_product(int $id): array
    {
        $statemnet = $this->pdo->prepare(
            'SELECT product.id, product.title, product.desc, product.price, image.title AS main_img
            FROM product 
            LEFT JOIN `image`
            ON product.main_img_id = image.id
            WHERE product.id = :id;'
        );

        $statemnet->execute(
            [
                ':id' => (int) $id
            ]
        );

        return $statemnet->fetch(\PDO::FETCH_ASSOC);
    }

    public function get_products(int $qty): array
    {
        $statemnet = $this->pdo->prepare(
            'SELECT product.id, product.title, product.desc, product.price, image.title AS main_img
            FROM product 
            LEFT JOIN `image`
            ON product.main_img_id = image.id
            LIMIT :qty;'
        );

        $statemnet->bindValue(':qty', $qty, PDO::PARAM_INT);

        $statemnet->execute();

        return $statemnet->fetchAll(\PDO::FETCH_ASSOC);
    }
}
