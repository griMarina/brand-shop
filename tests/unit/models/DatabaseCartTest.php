<?php

require_once './config/config.php';

use PHPUnit\Framework\TestCase;

class DatabaseCartTest extends TestCase
{
    private $pdo;
    private $mock_stmt;
    private $db_cart;

    protected function setUp(): void
    {
        // create a mock PDO instance and mock statement object
        $this->pdo = $this->createMock(PDO::class);
        $this->mock_stmt = $this->createMock(PDOStatement::class);
        $this->db_cart = new DatabaseCart($this->pdo);
    }

    public function testGetCartReturnsExpectedData()
    {
        $session_id = '123';

        // set up the expected query and parameters
        $this->mock_stmt->expects($this->once())
            ->method('execute')
            ->with([':session_id' => $session_id]);

        $this->mock_stmt->expects($this->once())
            ->method('fetchAll')
            ->with(PDO::FETCH_ASSOC)
            ->willReturn([[
                'quantity' => 2,
                'product_id' => 1,
                'title' => 'Product 1',
                'price' => 10.0,
                'image' => 'image1.jpg'
            ], [
                'quantity' => 1,
                'product_id' => 2,
                'title' => 'Product 2',
                'price' => 5.0,
                'image' => 'image2.jpg'
            ]]);

        $this->pdo->expects($this->once())
            ->method('prepare')
            ->with('SELECT cart.quantity, cart.product_id, product.title, product.price, image.title AS `image`
            FROM `cart`
            LEFT JOIN `product`
            ON cart.product_id = product.id
            LEFT JOIN `image`
            ON product.id = image.product_id
            WHERE cart.session_id = :session_id AND image.number = 0')
            ->willReturn($this->mock_stmt);

        $result = $this->db_cart->get_cart($session_id);

        $expected_result = [[
            'quantity' => 2,
            'product_id' => 1,
            'title' => 'Product 1',
            'price' => 10.0,
            'image' => 'image1.jpg'
        ], [
            'quantity' => 1,
            'product_id' => 2,
            'title' => 'Product 2',
            'price' => 5.0,
            'image' => 'image2.jpg'
        ]];

        $this->assertEquals($expected_result, $result);
    }

    public function testAddCartInsertsExpectedData(): void
    {
        // set up the expected query and parameters
        $expected_query = 'INSERT INTO `cart` (product_id, quantity, session_id) 
            VALUES (:product_id, :quantity, :session_id)';
        $expected_params = [
            ':product_id' => '123',
            ':quantity' => 2,
            ':session_id' => 'abc123'
        ];

        // expect the prepare method to be called with the expected query and returns a mock statement object
        $this->pdo->expects($this->once())
            ->method('prepare')
            ->with($this->equalTo($expected_query))
            ->willReturn($this->mock_stmt);

        // expect the execute method to be called with the expected parameters
        $this->mock_stmt->expects($this->once())
            ->method('execute')
            ->with($this->equalTo($expected_params));

        $product = new CartProduct('123', 'Test Product', 10.0, 'test.jpg', 2);
        $cart = new Cart('abc123', [$product]);

        // call the add_cart method with the Cart object
        $this->db_cart->add_cart($cart);
    }
}
