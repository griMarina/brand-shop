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
            'SELECT id, date, status, total, session_id FROM `order` WHERE id = :id'
        );

        $stmt->execute([
            ':id' => (int) $id
        ]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function get_orders(): array
    {
        $stmt = $this->pdo->prepare(
            'SELECT id, email, date, status, total FROM `order`'
        );

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_orders_by_user_id(string $user_id): array
    {
        $stmt = $this->pdo->prepare(
            'SELECT id, status, date, total
            FROM `order`
            WHERE user_id = :user_id'
        );

        $stmt->execute([
            ':user_id' => (string) $user_id
        ]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function add_order(Order $order): void
    {

        $stmt = $this->pdo->prepare(
            "INSERT INTO `order` (first_name, last_name, phone, email, address, status, total, user_id, session_id) 
            VALUES (:first_name, :last_name, :phone, :email, :address, :status, :total, :user_id, :session_id)"
        );

        $stmt->execute([
            ':first_name' => (string) $order->get_first_name(),
            ':last_name' => (string) $order->get_last_name(),
            ':phone' => (string) $order->get_phone(),
            ':email' => (string) $order->get_email(),
            ':address' => (string) $order->get_address(),
            ':status' => (string) $order->get_status(),
            ':total' => (float) $order->get_total(),
            ':user_id' => $order->get_user_id(),
            ':session_id' => (string) $order->get_session_id()
        ]);
    }
}
