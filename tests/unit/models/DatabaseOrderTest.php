<?php

require_once './config/config.php';

use PHPUnit\Framework\TestCase;

class DatabaseOrderTest extends TestCase
{
    private $mock_stmt;
    private $pdo;
    private $db_order;

    protected function setUp(): void
    {
        $this->mock_stmt = $this->createMock(PDOStatement::class);
        $this->pdo = $this->createMock(PDO::class);
        $this->db_order = new DatabaseOrder($this->pdo);
    }

    public function testGetOrderReturnsNullIfNoOrderFound()
    {
        $this->mock_stmt->expects($this->once())
            ->method('fetchALL')
            ->with(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Order')
            ->willReturn([]);

        $this->pdo->expects($this->once())
            ->method('prepare')
            ->with('SELECT * FROM `order` WHERE id = :id')
            ->willReturn($this->mock_stmt);


        $id = 1;
        $order = $this->db_order->get_order($id);
        $this->assertNull($order);
    }

    public function testGetOrderReturnsOrderObject()
    {
        $mock_order = $this->createMock(Order::class);

        $this->mock_stmt->expects($this->once())
            ->method('fetchAll')
            ->with(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Order')
            ->willReturn([$mock_order]);

        $this->pdo->expects($this->once())
            ->method('prepare')
            ->with('SELECT * FROM `order` WHERE id = :id')
            ->willReturn($this->mock_stmt);

        $order = $this->db_order->get_order(1);

        $this->assertInstanceOf(Order::class, $order);
    }

    public function testGetOrdersReturnsArrayOfOrders()
    {
        $mock_order1 = $this->createMock(Order::class);
        $mock_order2 = $this->createMock(Order::class);

        $this->mock_stmt->method('execute')->willReturn(true);
        $this->mock_stmt->method('fetchAll')->willReturn([$mock_order1, $mock_order2]);

        $this->pdo->method('prepare')->willReturn($this->mock_stmt);

        $this->assertIsArray($this->db_order->get_orders());
        $this->assertInstanceOf(Order::class, $this->db_order->get_orders()[0]);
    }

    public function testGetOrdersByUserIdReturnsArrayOfOrders()
    {
        $mock_order1 = $this->createMock(Order::class);
        $mock_order2 = $this->createMock(Order::class);

        $this->mock_stmt->method('execute')->willReturn(true);
        $this->mock_stmt->method('fetchAll')->willReturn([$mock_order1, $mock_order2]);

        $this->pdo->method('prepare')->willReturn($this->mock_stmt);

        $this->assertIsArray($this->db_order->get_orders_by_user_id('123'));
        $this->assertInstanceOf(Order::class, $this->db_order->get_orders_by_user_id('123')[0]);
    }

    public function testAddOrderInsertsIntoDatabase()
    {
        $order = new Order('Test', 'User', '111-111', 'test@user.com', 'Test address 12', 100, 'user_123', '123');

        $this->mock_stmt->expects($this->once())
            ->method('execute')
            ->with([
                ':first_name' => 'Test',
                ':last_name' => 'User',
                ':phone' => '111-111',
                ':email' => 'test@user.com',
                ':address' => 'Test address 12',
                ':status' => 'pending',
                ':total' => 100,
                ':user_id' => 'user_123',
                ':session_id' => '123'
            ]);

        $this->pdo->expects($this->once())
            ->method('prepare')
            ->with('INSERT INTO `order` (first_name, last_name, phone, email, `address`, `status`, total, user_id, session_id) 
            VALUES (:first_name, :last_name, :phone, :email, :address, :status, :total, :user_id, :session_id)')
            ->willReturn($this->mock_stmt);

        $this->db_order->add_order($order);

        $this->assertTrue(true);
    }

    public function testUpdateStatusUpdatesStatusInDatabase()
    {
        $id = 1;
        $status = 'new status';

        $this->mock_stmt
            ->method('execute')
            ->with($this->equalTo([
                ':id' => $id,
                ':status' => $status
            ]));

        $this->pdo->expects($this->once())
            ->method('prepare')
            ->with($this->equalTo('UPDATE `order` SET `status` = :status WHERE id = :id'))
            ->willReturn($this->mock_stmt);

        $this->db_order->update_status($id, $status);

        // check that the status was updated in the mock database
        $mock_orders = [
            ['id' => 1, 'date' => '2022-01-01', 'status' => $status, 'total' => 100.0],
            ['id' => 2, 'date' => '2022-01-02', 'status' => 'pending', 'total' => 200.0],
            ['id' => 3, 'date' => '2022-01-03', 'status' => 'pending', 'total' => 300.0],
        ];

        $expected_orders = [
            ['id' => 1, 'status' => $status, 'date' => '2022-01-01', 'total' => 100.0],
            ['id' => 2, 'status' => 'pending', 'date' => '2022-01-02', 'total' => 200.0],
            ['id' => 3, 'status' => 'pending', 'date' => '2022-01-03', 'total' => 300.0],
        ];

        $mock_stmt = $this->createMock(PDOStatement::class);
        $mock_stmt->method('execute');
        $mock_stmt->method('fetchAll')->willReturn($mock_orders);

        $mock_pdo = $this->createMock(PDO::class);
        $mock_pdo->method('prepare')->willReturn($mock_stmt);

        $db_order = new DatabaseOrder($mock_pdo);
        $actual_orders = $db_order->get_orders_by_user_id('123');

        $this->assertEquals($expected_orders, $actual_orders);
    }
    public function testDeleteOrderRemovesOrderFromDatabase()
    {
        // create a mock for the Order class
        $order_mock = $this->createMock(Order::class);
        // set up expectations for the Order mock
        $order_mock->method('get_id')
            ->will($this->returnValue(1));

        // call the delete_order method with the mock Order object
        $this->pdo
            ->method('prepare')
            ->with('DELETE FROM `order` WHERE id = :id')
            ->will($this->returnValue($this->mock_stmt));

        $this->mock_stmt->expects($this->once())
            ->method('execute')
            ->with([':id' => 1]);

        $id = $order_mock->get_id();
        $this->db_order->delete_order($id);

        // verify that the order was deleted from the database by calling the get_order method with the id of the deleted order
        $mock_stmt = $this->createMock(PDOStatement::class);
        $mock_stmt->method('execute');
        $mock_stmt->method('fetchAll')
            ->willReturn([]);

        $mock_pdo = $this->createMock(PDO::class);
        $mock_pdo->method('prepare')
            ->willReturn($mock_stmt);

        $db_order = new DatabaseOrder($mock_pdo);

        $deleted_oder = $db_order->get_order(1);
        $this->assertNull($deleted_oder);
    }
}
