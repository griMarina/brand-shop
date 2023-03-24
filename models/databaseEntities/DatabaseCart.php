<?php

class DatabaseCart
{
    public function __construct(
        private PDO $pdo
    ) {
    }

    public function get_cart(string $session_id): array
    {
        $stmt = $this->pdo->prepare(
            'SELECT cart.quantity, cart.product_id, product.title, product.price, image.title AS `image`
            FROM `cart`
            LEFT JOIN `product`
            ON cart.product_id = product.id
            LEFT JOIN `image`
            ON product.id = image.product_id
            WHERE cart.session_id = :session_id AND image.number = 0'
        );

        $stmt->execute([
            ':session_id' => (string) $session_id
        ]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function add_cart(Cart $cart): void
    {
        $stmt = $this->pdo->prepare(
            'INSERT INTO `cart` (product_id, quantity, session_id) 
            VALUES (:product_id, :quantity, :session_id)'
        );

        $session_id = $cart->get_session_id();

        foreach ($cart->get_cart_products() as $product) {
            $stmt->execute([
                ':product_id' => (string) $product->get_id(),
                ':quantity' => (int) $product->get_quantity(),
                ':session_id' => (string) $session_id
            ]);
        }
    }
}
