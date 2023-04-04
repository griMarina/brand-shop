<?php

require_once './config/config.php';

use PHPUnit\Framework\TestCase;

class HomeControllerTest extends TestCase
{
    public function testPrepareVariablesReturnsArray()
    {
        $params = [];
        $result = HomeController::prepare_variables($params);
        $this->assertIsArray($result);
    }

    public function testPrepareVariablesContainsTitleKey()
    {
        $params = [];
        $result = HomeController::prepare_variables($params);
        $this->assertArrayHasKey('title', $result);
    }

    public function testPrepareVariablesContainsProductsKey()
    {
        $params = [];
        $result = HomeController::prepare_variables($params);
        $this->assertArrayHasKey('products', $result);
    }

    public function testPrepareVariablesTitleIsHome()
    {
        $params = [];
        $result = HomeController::prepare_variables($params);
        $this->assertEquals('Home', $result['title']);
    }

    public function testDatabaseProductCanBeCreated()
    {
        $pdo_stub = $this->createStub(PDO::class);
        $product = new DatabaseProduct($pdo_stub);
        $this->assertInstanceOf(DatabaseProduct::class, $product);
    }

    public function testGetProductsByLimitReturnsExpectedResult()
    {
        $pdo_stub = $this->createStub(PDO::class);
        $stmt_mock = $this->createMock(PDOStatement::class);

        $stmt_mock->method('fetchAll')->willReturn([
            ['id' => 1, 'title' => 'Product 1'],
            ['id' => 2, 'title' => 'Product 2'],
            ['id' => 3, 'title' => 'Product 3'],
        ]);

        $pdo_stub->method('prepare')->willReturn($stmt_mock);

        $expected_result = [
            ['id' => 1, 'title' => 'Product 1'],
            ['id' => 2, 'title' => 'Product 2'],
            ['id' => 3, 'title' => 'Product 3'],
        ];

        $db_product = new DatabaseProduct($pdo_stub);

        $result = $db_product->get_products_by_limit(3);
        $this->assertEquals($expected_result, $result);
    }
}
