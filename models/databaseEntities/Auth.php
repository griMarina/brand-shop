<?php

class Auth
{
    public function __construct(
        private PDO $pdo
    ) {
    }

    // check if user exists in the db and return it as an object if found, or null if not
    public function user_exists(): ?User
    {
        if (isset($_SESSION['username'])) {
            $db_user = new DatabaseUser($this->pdo);
            $user = $db_user->get_user_by_username($_SESSION['username']);
            return $user;
        } else {
            return null;
        }
    }

    public function is_admin(): bool
    {
        return isset($_SESSION['username']) && $_SESSION['username'] == 'admin@admin.com';
    }

    // authenticate user by verifying credentials against db record
    public function auth(string $username, string $password): bool
    {
        $db_user = new DatabaseUser($this->pdo);
        $user = $db_user->get_user_by_username($username);

        if (isset($user) && password_verify($password, $user->get_pass_hash())) {
            $_SESSION['username'] = $user->get_username();
            return true;
        } else {
            return false;
        }
    }
}
