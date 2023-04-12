<?php

require_once './config/config.php';

use PHPUnit\Framework\TestCase;

class DatabaseProductTest extends TestCase
{
    private $mock_stmt;
    private $pdo;
    private $db_product;

    public function setUp(): void
    {
        $this->mock_stmt = $this->createMock(PDOStatement::class);
        $this->pdo = $this->createMock(PDO::class);
        $this->db_product = new DatabaseProduct($this->pdo);
    }

    public function testGetProductReturnsNullWhenNoResultFound()
    {
        $this->mock_stmt->expects($this->once())
            ->method('fetchAll')
            ->with(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Product')
            ->willReturn([]);

        $this->pdo->expects($this->once())
            ->method('prepare')
            ->with('SELECT id, title, `desc`, price, colour, section_id, category_id, main_img_id
            FROM `product`
            WHERE product.id = :id')
            ->willReturn($this->mock_stmt);

        $id = 'non-existing-id';
        $this->assertNull($this->db_product->get_product($id));
    }

    public function testGetProductReturnsProductObjectWhenResultFound()
    {
        $mock_product = $this->createMock(Product::class);

        $this->mock_stmt->expects($this->once())
            ->method('fetchAll')
            ->with(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Product')
            ->willReturn([$mock_product]);

        $this->pdo->expects($this->once())
            ->method('prepare')
            ->with('SELECT id, title, `desc`, price, colour, section_id, category_id, main_img_id
            FROM `product`
            WHERE product.id = :id')
            ->willReturn($this->mock_stmt);

        $id = 'existing-id';
        $product = $this->db_product->get_product($id);
        $this->assertEquals($mock_product, $product);
    }

    public function testGetProducts()
    {
        $this->mock_stmt->expects($this->once())
            ->method('fetchAll')
            ->with(PDO::FETCH_ASSOC)
            ->willReturn([
                ['1', 'Product 1', 'desc 1', 10.0, 'Men', 'Jeans', 'image 1'],
                ['2', 'Product 2', 'desc 2', 20.0, 'Women', 'Jeans', 'image 2']
            ]);

        $this->pdo->expects($this->once())
            ->method('prepare')
            ->with('SELECT 
                product.id,
                product.title,
                product.desc,
                product.price,
                section.title AS section,
                category.title AS category,
                image.title AS main_img
            FROM `product`
            LEFT JOIN `section`
            ON product.section_id = section.id
            LEFT JOIN `category`
            ON product.category_id = category.id
            LEFT JOIN `image`
            ON product.main_img_id = image.id
            WHERE image.number = 0')
            ->willReturn($this->mock_stmt);

        $result = $this->db_product->get_products();
        $this->assertIsArray($result);
        $this->assertCount(2, $result);
    }

    public function testGetProductsByLimitReturnsExpectedProducts()
    {
        $this->mock_stmt->expects($this->once())
            ->method('fetchAll')
            ->with(PDO::FETCH_ASSOC)
            ->willReturn([
                ['1', 'Product 1', 'Product 1 description', 10.99, 'image1.jpg'],
                ['2', 'Product 2', 'Product 2 description', 11.99, 'image2.jpg'],
                ['3', 'Product 3', 'Product 3 description', 13.99, 'image3.jpg']
            ]);

        $this->pdo->expects($this->once())
            ->method('prepare')
            ->with('SELECT product.id, product.title, product.desc, product.price, image.title AS main_img
            FROM `product`
            LEFT JOIN `image`
            ON product.main_img_id = image.id
            WHERE image.number = 0
            LIMIT :limit')
            ->willReturn($this->mock_stmt);

        $this->mock_stmt->expects($this->once())
            ->method('bindValue')
            ->with(':limit', 3, PDO::PARAM_INT);

        $this->mock_stmt->expects($this->once())
            ->method('execute');

        $result = $this->db_product->get_products_by_limit(3);
        $this->assertCount(3, $result);
    }

    public function testGetCategories()
    {
        $expected_result = [
            [1, 'Category 1', 'Men'],
            [2, 'Category 2', 'Women']
        ];

        $this->mock_stmt->expects($this->once())
            ->method('fetchAll')
            ->with(PDO::FETCH_ASSOC)
            ->willReturn($expected_result);

        $this->pdo->expects($this->once())
            ->method('prepare')
            ->with('SELECT category.id, category.title, section.title AS section 
            FROM `category`
            LEFT JOIN `section`
            ON category.section_id = section.id')
            ->willReturn($this->mock_stmt);

        $result = $this->db_product->get_categories();
        $this->assertEquals($expected_result, $result);
    }
}
