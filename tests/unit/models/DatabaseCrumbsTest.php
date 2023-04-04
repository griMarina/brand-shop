<?php

require_once './config/config.php';

use PHPUnit\Framework\TestCase;

class DatabaseCrumbsTest extends TestCase
{
    private $pdo;
    private $mock_stmt;
    private $db_crumbs;

    protected function setUp(): void
    {
        // create a mock PDO instance and mock statement object
        $this->pdo = $this->createMock(PDO::class);
        $this->mock_stmt = $this->createMock(PDOStatement::class);

        $this->db_crumbs = new DatabaseCrumbs($this->pdo);
    }

    public function testGetDataReturnsExpectedData()
    {
        $id = '1';

        // set up the expected query and parameters
        $this->mock_stmt->expects($this->once())
            ->method('execute')
            ->with([':id' => $id]);

        $this->mock_stmt->expects($this->once())
            ->method('fetch')
            ->with(PDO::FETCH_ASSOC)
            ->willReturn(['women', 't-shirts', 'Test T-shirt']);

        $this->pdo->expects($this->once())
            ->method('prepare')
            ->with('SELECT section.title AS section, category.title AS category, product.title
            FROM `product`
            LEFT JOIN `section`
            ON product.section_id = section.id
            LEFT JOIN `category`
            ON product.category_id = category.id
            WHERE product.id = :id')
            ->willReturn($this->mock_stmt);

        $result = $this->db_crumbs->get_data($id);

        $expected_result = [
            'Test T-shirt' => '/women/t-shirts/Test T-shirt',
            'Women' => '/women',
            'T-shirts' => '/women/t-shirts'
        ];

        $this->assertEquals($expected_result, $result);
    }

    public function testGetCrumbsReturnsExpectedData()
    {
        $array = ['men', 'jeans', 'Levis jeans'];

        $result = $this->db_crumbs->get_crumbs($array);

        $expected_result = [
            'Men' => '/men',
            'Jeans' => '/men/jeans',
            'Levis jeans' => '/men/jeans/Levis jeans'
        ];

        $this->assertEquals($expected_result, $result);
    }
}
