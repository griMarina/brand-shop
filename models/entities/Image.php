<?php

class Image extends Base
{
    public function __construct(
        private string $title,
        private Product $product
    ) {
    }
}
