<?php

class Product
{
    public function __construct(
        private int $id,
        private string $title,
        private string $desc,
        private float $price,
        private string $colour,
        private string $section,
        private Image $main_img,
        private Category $category
    ) {
    }
}
