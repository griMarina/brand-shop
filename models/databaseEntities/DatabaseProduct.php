<?php

class DatabaseProduct
{
    public function __construct(
        private PDO $pdo
    ) {
    }

    public function get_product(string $id): ?Product
    {
        $stmt = $this->pdo->prepare(
            'SELECT id, title, `desc`, price, colour, section_id, category_id, main_img_id
            FROM `product`
            WHERE product.id = :id'
        );

        $stmt->execute([
            ':id' => (string) $id
        ]);

        return $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Product')[0] ?? null;
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

    public function get_categories(): array
    {
        $stmt = $this->pdo->prepare(
            'SELECT category.id, category.title, section.title AS section 
            FROM `category`
            LEFT JOIN `section`
            ON category.section_id = section.id'
        );

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function add_product(Product $product): void
    {

        $stmt = $this->pdo->prepare(
            "INSERT INTO `product` (id, title, `desc`, price, colour, section_id, category_id, main_img_id) 
            VALUES (:id, :title, :desc, :price, :colour, :section_id, :category_id, :main_img_id)"
        );

        $stmt->execute([
            ':id' => (string) $product->get_id(),
            ':title' => (string) $product->get_title(),
            ':desc' => (string) $product->get_desc(),
            ':price' => (float) $product->get_price(),
            ':colour' => (string) $product->get_colour(),
            ':section_id' => (int) $product->get_section_id(),
            ':category_id' => (int) $product->get_category_id(),
            ':main_img_id' => (string) $product->get_main_img_id()
        ]);
    }

    // public function add_img(string $product_id): void
    // {

    //     $stmt = $this->pdo->prepare(
    //         "UPDATE `product` SET main_img_id = :img_id WHERE id = :product_id"
    //     );

    //     $stmt->execute([
    //         ':img_id' => (int) $iamge_id,
    //         ':product_id' => (string) $product_id
    //     ]);
    // }
}
