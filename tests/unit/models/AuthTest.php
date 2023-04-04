<?php

require_once './config/config.php';

use PHPUnit\Framework\TestCase;

class AuthTest extends TestCase
{
    private PDO $pdo;
    private Auth $auth;

    // initialize the test database connection
    protected function setUp(): void
    {
        $this->pdo = new PDO('sqlite::memory:');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $this->createSchema();

        $this->auth = new Auth($this->pdo);
    }

    private function createSchema(): void
    {
        $this->pdo->exec('
            CREATE TABLE `user` (
                `id` TEXT NOT NULL,
                `username` TEXT NOT NULL,
                `pass_hash` TEXT NOT NULL,
                `first_name` TEXT NOT NULL,
                `last_name` TEXT NOT NULL,
                `phone` TEXT NOT NULL,
                `address` TEXT NOT NULL
            )
        ');

        $stmt = $this->pdo->prepare('
            INSERT INTO `user` (id, username, pass_hash, first_name, last_name, phone, `address`) 
            VALUES (:id, :username, :pass_hash, :first_name, :last_name, :phone, :address)
        ');

        $stmt->execute([
            ':id' => '1',
            ':username' => 'user@test.com',
            ':pass_hash' => '$2y$10$nXBCQqejRpgSAt9nR3la.eI9Y8fVEtJY9usfXm/LaYSMoaUggwH0y',
            ':first_name' => 'Test',
            ':last_name' => 'User',
            ':phone' => '111-111',
            ':address' => 'Test address 12'
        ]);
    }

    public function testUserExistsWithNoSession()
    {
        $this->assertNull($this->auth->user_exists());
    }

    public function testUserExistsWithSession()
    {
        $this->auth->auth('user@test.com', 'password');
        $this->assertInstanceOf(User::class, $this->auth->user_exists());
    }

    public function testAuthWithValidCredentials()
    {
        $this->assertTrue($this->auth->auth('user@test.com', 'password'));
        $this->assertInstanceOf(User::class, $this->auth->user_exists());
    }

    public function testAuthWithInvalidCredentials()
    {
        $this->assertFalse($this->auth->auth('user@test.com', 'wrongpassword'));
    }

    // drop the user table after the tests have run
    protected function tearDown(): void
    {
        $this->pdo->exec('DROP TABLE `user`');
    }
}
