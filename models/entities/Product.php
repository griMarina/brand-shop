<?php

class Product
{
    public function __construct(
        private int $id,
        private string $title,
        private string $desc,
        private float $price,
        private string $colour,
        private int $section_id,
        private int $main_img_id,
        private int $category_id
    ) {
    }

    public function get_id(): int
    {
        return $this->id;
    }
}
