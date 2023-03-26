<?php

class Product
{
    public function __construct(
        private string $id = '',
        private string $title = '',
        private string $desc = '',
        private float $price = 0.0,
        private string $colour = '',
        private int $section_id = 0,
        private int $category_id = 0,
        private string $main_img_id = ''
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

    public function get_desc(): string
    {
        return $this->desc;
    }

    public function get_price(): float
    {
        return $this->price;
    }

    public function get_colour(): string
    {
        return $this->colour;
    }

    public function get_section_id(): int
    {
        return $this->section_id;
    }

    public function get_category_id(): int
    {
        return $this->category_id;
    }

    public function get_main_img_id(): string
    {
        return $this->main_img_id;
    }
}
