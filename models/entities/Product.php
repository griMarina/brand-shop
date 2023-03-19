<?php

class Product
{
    private string $id;
    private string $title;
    private string $desc;
    private float $price;
    private string $colour;
    private int $section_id;
    private int $category_id;

    public function __construct(
        string $id = '',
        string $title = '',
        string $desc = '',
        float $price = 0.0,
        string $colour = '',
        int $section_id = 0,
        int $category_id = 0
    ) {
        $this->id = $id;
        $this->title = $title;
        $this->desc = $desc;
        $this->price = $price;
        $this->colour = $colour;
        $this->section_id = $section_id;
        $this->category_id = $category_id;
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
}
