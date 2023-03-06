<?php

class DatabaseOrder
{
    public function __construct(
        private PDO $pdo
    ) {
    }

    public function get_order(int $id): array
    {
        $stmt = $this->pdo->prepare(
            'SELECT cart.quantity, cart.product_id, product.title, product.price, image.title AS `image`
            FROM `cart`
            LEFT JOIN `product`
            ON cart.product_id = product.id
            LEFT JOIN `image`
            ON product.id = image.product_id
            WHERE cart.session_id = :session_id AND image.number = 0;'
        );

        $stmt->execute(
            [
                ':id' => (int) $id
            ]
        );

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function add_order(Order $order): void
    {

        $stmt = $this->pdo->prepare(
            "INSERT INTO `order` (first_name, last_name, phone, email, address, status, session_id) 
            VALUES (:first_name, :last_name, :phone, :email, :address, :status, :session_id)"
        );

        $stmt->execute(
            [
                ':first_name' => (string) $order->get_first_name(),
                ':last_name' => (string) $order->get_last_name(),
                ':phone' => (string) $order->get_phone(),
                ':email' => (string) $order->get_email(),
                ':address' => (string) $order->get_address(),
                ':session_id' => (string) $order->get_session_id(),
                ':status' => (string) $order->get_status()
            ]
        );
    }
}
