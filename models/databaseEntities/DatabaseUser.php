<?php

class DatabaseUser
{
    public function __construct(
        private PDO $pdo
    ) {
    }

    public function get_user(string $username): ?User
    {
        $stmt = $this->pdo->prepare(
            'SELECT * FROM `user` WHERE username = :username'
        );

        $stmt->execute([
            ':username' => (string) $username,
        ]);

        return $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'User')[0] ?? null;
    }

    public function add_user(User $user): void
    {

        $stmt = $this->pdo->prepare(
            "INSERT INTO `user` (id, username, pass_hash, first_name, last_name, phone, address) 
            VALUES (:id, :username, :pass_hash, :first_name, :last_name, :phone, :address)"
        );

        $stmt->execute([
            ':id' => (string) $user->get_id(),
            ':username' => (string) $user->get_username(),
            ':pass_hash' => (string) $user->get_pass_hash(),
            ':first_name' => (string) $user->get_first_name(),
            ':last_name' => (string) $user->get_last_name(),
            ':phone' => (string) $user->get_phone(),
            ':address' => (string) $user->get_address(),
        ]);
    }
}
