<?php

class Image
{
    public function __construct(
        private string $id = '',
        private string $title = '',
        private string $product_id = '',
        private int $number = 0
    ) {
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
