<?php

class Product extends Base
{
    public function __construct(
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
