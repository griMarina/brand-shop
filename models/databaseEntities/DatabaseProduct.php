<?php

class DatabaseProduct
{
    public function __construct(
        private PDO $pdo
    ) {
    }

    public function get_product(int $id): array
    {
        $statement = $this->pdo->prepare(
            'SELECT product.id, product.title, product.desc, product.price, product.section, image.title AS slide, category.title AS category
            FROM product 
            LEFT JOIN `image`
            ON product.id = image.product_id
            LEFT JOIN `category`
            ON product.category_id = category.id
            WHERE product.id = :id AND image.number = 1;'
        );

        $statement->execute(
            [
                ':id' => (int) $id
            ]
        );

        return $statement->fetch(\PDO::FETCH_ASSOC);
    }

    public function get_products_by_limit(int $limit): array
    {
        $statement = $this->pdo->prepare(
            'SELECT product.id, product.title, product.desc, product.price, image.title AS main_img
            FROM product 
            LEFT JOIN `image`
            ON product.main_img_id = image.id
            WHERE image.number = 0
            LIMIT :limit;'
        );

        $statement->bindValue(':limit', $limit, PDO::PARAM_INT);

        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function get_products_by_section(string $section): array
    {
        $statement = $this->pdo->prepare(
            'SELECT product.id, product.title, product.desc, product.price, image.title AS main_img
            FROM product 
            LEFT JOIN `image`
            ON product.main_img_id = image.id
            WHERE product.section = :section AND image.number = 0;'
        );

        $statement->execute(
            [
                ':section' => (string) $section
            ]
        );

        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }
}
