<?php

class DatabaseImage
{
    public function __construct(
        private PDO $pdo
    ) {
    }

    public function get_image(string $id): ?Image
    {
        $stmt = $this->pdo->prepare(
            'SELECT id, title, product_id, `number`  
            FROM `image` 
            WHERE id = :id'
        );

        $stmt->execute([
            ':id' => (string) $id
        ]);

        return $stmt->fetchALL(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Image')[0] ?? null;
    }

    public function add_image(Image $image): void
    {
        $stmt = $this->pdo->prepare(
            'INSERT INTO `image` (id, title, product_id, `number`) 
            VALUES (:id, :title, :product_id, :number)'
        );

        $stmt->execute([
            ':id' => (string) $image->get_id(),
            ':title' => (string) $image->get_title(),
            ':product_id' => (string) $image->get_product_id(),
            ':number' => (int) $image->get_number()
        ]);
    }
}
