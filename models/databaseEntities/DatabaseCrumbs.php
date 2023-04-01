<?php

class DatabaseCrumbs
{
    public function __construct(
        private PDO $pdo
    ) {
    }

    public function get_data(string $id): array
    {
        $stmt = $this->pdo->prepare(
            'SELECT section.title AS section, category.title AS category, product.title
            FROM `product`
            LEFT JOIN `section`
            ON product.section_id = section.id
            LEFT JOIN `category`
            ON product.category_id = category.id
            WHERE product.id = :id'
        );

        $stmt->execute([
            ':id' => (string) $id
        ]);

        $array = $stmt->fetch(PDO::FETCH_ASSOC);

        return $this->get_crumbs($array);
    }

    // generate an array of breadcrumb links
    public function get_crumbs(array $array): array
    {
        $link = '';
        $result = [];

        foreach ($array as $elem) {
            $link .= '/' . $elem;
            $result += [
                ucfirst($elem) => $link
            ];
        }

        return $result;
    }
}
