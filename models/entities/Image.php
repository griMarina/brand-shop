<?php

class Image
{
    private string $id;
    private string $title;
    private string $product_id;
    private int $number;

    public function __construct(
        string $id = '',
        string $title = '',
        string $product_id = '',
        int $number = 0
    ) {
        $this->id = $id;
        $this->title = $title;
        $this->product_id = $product_id;
        $this->number = $number;
    }

    public function get_id(): string
    {
        return $this->id;
    }

    public function get_title(): string
    {
        return $this->title;
    }

    public function get_product_id(): string
    {
        return $this->product_id;
    }

    public function get_number(): int
    {
        return $this->number;
    }
}
