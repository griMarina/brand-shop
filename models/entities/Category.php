<?php

class Category
{
    public function __construct(
        private int $id,
        private string $title,
        private int $section_id
    ) {
    }
}
