<?php

class CartProduct
{
    public function __construct(
        private int $id,
        private string $title,
        private float $price,
        private string $image,
        private int $quantity = 1,
        private float $total_price = $price
    ) {
    }

    public function get_id(): int
    {
        return $this->id;
    }

    public function get_title(): int
    {
        return $this->title;
    }

    public function get_price(): int
    {
        return $this->price;
    }

    public function get_image(): int
    {
        return $this->image;
    }

    public function get_quantity(): int
    {
        return $this->quantity;
    }

    public function get_total_price(): int
    {
        return $this->total_price;
    }

    public function set_quantity(string $operation): void
    {
        if ($operation == 'increase') {
            $this->quantity += 1;
        } elseif ($operation == 'decrease') {
            $this->quantity -= 1;
        }
        $this->set_total_price();
    }

    public function set_total_price(): void
    {
        $this->total_price = $this->quantity * $this->price;
    }
}
