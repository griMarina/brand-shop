<?php

require_once './config/config.php';

use PHPUnit\Framework\TestCase;

class DatabaseImageTest extends TestCase
{
    private $mock_stmt;
    private $pdo;
    private $db_image;

    protected function setUp(): void
    {
        $this->mock_stmt = $this->createMock(PDOStatement::class);
        $this->pdo = $this->createMock(PDO::class);
        $this->db_image = new DatabaseImage($this->pdo);
    }

    public function testGetImageReturnsNullIfNoImageFound()
    {
        $this->mock_stmt->expects($this->once())
            ->method('fetchALL')
            ->with(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Image')
            ->willReturn([]);

        $this->pdo->expects($this->once())
            ->method('prepare')
            ->with('SELECT id, title, product_id, `number`  
            FROM `image` 
            WHERE id = :id')
            ->willReturn($this->mock_stmt);

        $id = '123';
        $image = $this->db_image->get_image($id);

        $this->assertNull($image);
    }

    public function testGetImageReturnsImageObjectIfImageFound()
    {
        $this->mock_stmt->expects($this->once())
            ->method('fetchALL')
            ->with(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Image')
            ->willReturn([new Image('123', 'image1', '456', 0)]);

        $this->pdo->expects($this->once())
            ->method('prepare')
            ->with('SELECT id, title, product_id, `number`  
            FROM `image` 
            WHERE id = :id')
            ->willReturn($this->mock_stmt);

        $image = $this->db_image->get_image('123');

        $this->assertInstanceOf(Image::class, $image);
        $this->assertEquals('123', $image->get_id());
        $this->assertEquals('image1', $image->get_title());
        $this->assertEquals('456', $image->get_product_id());
        $this->assertEquals(0, $image->get_number());
    }

    public function testAddImage()
    {
        $image = new Image('123', 'image1', '456', 0);

        $this->mock_stmt->expects($this->once())
            ->method('execute')
            ->with([
                ':id' => '123',
                ':title' => 'image1',
                ':product_id' => '456',
                ':number' => 0,
            ]);

        $this->pdo->expects($this->once())
            ->method('prepare')
            ->with('INSERT INTO `image` (id, title, product_id, `number`) 
            VALUES (:id, :title, :product_id, :number)')
            ->willReturn($this->mock_stmt);

        $this->db_image->add_image($image);

        $this->assertTrue(true); // assert that the method completes without throwing an exception
    }
}
