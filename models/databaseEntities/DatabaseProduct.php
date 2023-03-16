<?php

class DatabaseProduct
{
    public function __construct(
        private PDO $pdo
    ) {
    }

    public function get_product(int $id): array
    {
        $stmt = $this->pdo->prepare(
            'SELECT product.id, product.title, product.desc, product.price, section.title AS section, image.title AS `image`, category.title AS category
            FROM `product`
            LEFT JOIN `section`
            ON product.section_id = section.id
            LEFT JOIN `image`
            ON product.id = image.product_id
            LEFT JOIN `category`
            ON product.category_id = category.id
            WHERE product.id = :id AND image.number = 1'
        );

        $stmt->execute([
            ':id' => (int) $id
        ]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function get_products(): array
    {
        $stmt = $this->pdo->prepare(
            'SELECT product.id, product.title, product.price, section.title AS section, category.title AS category
            FROM `product`
            LEFT JOIN `section`
            ON product.section_id = section.id
            LEFT JOIN `category`
            ON product.category_id = category.id'
        );

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_products_by_limit(int $limit): array
    {
        $stmt = $this->pdo->prepare(
            'SELECT product.id, product.title, product.desc, product.price, image.title AS main_img
            FROM `product`
            LEFT JOIN `image`
            ON product.main_img_id = image.id
            WHERE image.number = 0
            LIMIT :limit'
        );

        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_products_by_section(string $section): array
    {
        $stmt = $this->pdo->prepare(
            'SELECT product.id, product.title, product.desc, product.price, image.title AS main_img
            FROM `product`
            LEFT JOIN `section`
            ON product.section_id = section.id
            LEFT JOIN `image`
            ON product.main_img_id = image.id
            WHERE section.title = :section AND image.number = 0'
        );

        $stmt->execute([
            ':section' => (string) $section
        ]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_products_by_category(string $section, string $category): array
    {
        $stmt = $this->pdo->prepare(
            'SELECT product.id, product.title, product.desc, product.price, image.title AS main_img
            FROM `product`
            LEFT JOIN `section`
            ON product.section_id = section.id
            LEFT JOIN `image`
            ON product.main_img_id = image.id
            LEFT JOIN `category`
            ON product.category_id = category.id
            WHERE section.title = :section AND category.title = :category AND image.number = 0'
        );

        $stmt->execute([
            ':section' => (string) $section,
            ':category' => (string) $category
        ]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
