<?php

require_once './config/config.php';

use PHPUnit\Framework\TestCase;

class dbTest extends TestCase
{
    public function testConnectionReturnsPdoObject()
    {
        $expected_type = PDO::class;
        $pdo = connection();
        $this->assertInstanceOf($expected_type, $pdo);
    }

    public function testConnectionIsSuccessful()
    {
        $pdo = connection();
        $this->assertInstanceOf(PDO::class, $pdo);
        $this->assertNotFalse($pdo->query('SELECT 1'));
    }

    public function testConnectionThrowsRuntimeExceptionOnFailure()
    {
        $expected_exception = RuntimeException::class;

        $this->expectException($expected_exception);
        $this->expectExceptionMessage('Failed to connect to database:');

        try {
            // Replace the database credentials with incorrect ones to trigger a connection error
            $pdo = new PDO('mysql:host=localhost;dbname=online_shop;charset=utf8', 'admin', 'invalid_password');
        } catch (PDOException $e) {
            throw new RuntimeException('Failed to connect to database: ' . $e->getMessage());
        }
    }
}
