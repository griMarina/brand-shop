<?php

class Auth
{
    public function __construct(
        private PDO $pdo
    ) {
    }

    public function user_exists(): ?User
    {
        if (isset($_SESSION['username'])) {
            $db_user = new DatabaseUser($this->pdo);
            $user = $db_user->get_user($_SESSION['username']);
            return $user;
        } else {
            return null;
        }
    }

    public function is_admin(): bool
    {
        return $_SESSION['username'] == 'admin@admin.com';
    }

    public function auth(string $username, string $password): bool
    {
        $db_user = new DatabaseUser($this->pdo);
        $user = $db_user->get_user($username);

        if (isset($user) && password_verify($password, $user->get_pass_hash())) {
            $_SESSION['username'] = $user->get_username();
            return true;
        } else {
            return false;
        }
    }
}
