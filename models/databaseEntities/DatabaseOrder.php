<?php

class DatabaseOrder
{
    public function __construct(
        private PDO $pdo
    ) {
    }

    public function get_order(int $id): ?Order
    {
        $stmt = $this->pdo->prepare(
            'SELECT * FROM `order` WHERE id = :id'
        );

        $stmt->execute([
            ':id' => (int) $id
        ]);

        return $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Order')[0] ?? null;
    }

    public function get_orders(): array
    {
        $stmt = $this->pdo->prepare(
            'SELECT id, email, `date`, `status`, total FROM `order`'
        );

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_orders_by_user_id(string $id): array
    {
        $stmt = $this->pdo->prepare(
            'SELECT id, `status`, `date`, total
            FROM `order`
            WHERE user_id = :id'
        );

        $stmt->execute([
            ':id' => (string) $id
        ]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function add_order(Order $order): void
    {
        $stmt = $this->pdo->prepare(
            'INSERT INTO `order` (first_name, last_name, phone, email, `address`, `status`, total, user_id, session_id) 
            VALUES (:first_name, :last_name, :phone, :email, :address, :status, :total, :user_id, :session_id)'
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

    public function update_status(int $id, string $status): void
    {
        $stmt = $this->pdo->prepare(
            'UPDATE `order` SET `status` = :status WHERE id = :id'
        );

        $stmt->execute([
            ':id' => (int) $id,
            ':status' => (string) $status
        ]);
    }

    public function delete_order(int $id): void
    {
        $stmt = $this->pdo->prepare(
            'DELETE FROM `order` WHERE id = :id'
        );

        $stmt->execute([
            ':id' => (int) $id
        ]);
    }
}
