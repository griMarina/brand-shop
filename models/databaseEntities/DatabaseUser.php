<?php

class DatabaseUser
{
    public function __construct(
        private PDO $pdo
    ) {
    }

    public function get_user_by_username(string $username): ?User
    {
        $stmt = $this->pdo->prepare(
            'SELECT * FROM `user` WHERE username = :username'
        );

        $stmt->execute([
            ':username' => (string) $username
        ]);

        return $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'User')[0] ?? null;
    }

    public function get_user_by_id(string $id): ?User
    {
        $stmt = $this->pdo->prepare(
            'SELECT * FROM `user` WHERE id = :id'
        );

        $stmt->execute([
            ':id' => (string) $id
        ]);

        return $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'User')[0] ?? null;
    }

    public function get_users(): array
    {
        $stmt = $this->pdo->prepare(
            'SELECT id, username, first_name, last_name FROM `user` WHERE username != :username'
        );

        $stmt->execute([
            ':username' => 'admin@admin.com',
        ]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function add_user(User $user): void
    {
        $stmt = $this->pdo->prepare(
            'INSERT INTO `user` (id, username, pass_hash, first_name, last_name, phone, `address`) 
            VALUES (:id, :username, :pass_hash, :first_name, :last_name, :phone, :address)'
        );

        $stmt->execute([
            ':id' => (string) $user->get_id(),
            ':username' => (string) $user->get_username(),
            ':pass_hash' => (string) $user->get_pass_hash(),
            ':first_name' => (string) $user->get_first_name(),
            ':last_name' => (string) $user->get_last_name(),
            ':phone' => (string) $user->get_phone(),
            ':address' => (string) $user->get_address()
        ]);
    }

    public function update_info(User $user): void
    {
        $stmt = $this->pdo->prepare(
            'UPDATE `user` SET
                first_name = :first_name,
                last_name = :last_name,
                phone = :phone,
                `address` = :address
            WHERE id = :id'
        );

        $stmt->execute([
            ':id' => (string) $user->get_id(),
            ':first_name' => (string) $user->get_first_name(),
            ':last_name' => (string) $user->get_last_name(),
            ':phone' => (string) $user->get_phone(),
            ':address' => (string) $user->get_address()
        ]);
    }

    public function delete_user(string $id): void
    {
        $stmt = $this->pdo->prepare(
            'DELETE FROM `user` WHERE id = :id'
        );

        $stmt->execute([
            ':id' => (string) $id
        ]);
    }
}
