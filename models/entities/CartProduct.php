<?php

class CartProduct implements JsonSerializable
{
    public function __construct(
        private string $id,
        private string $title,
        private float $price,
        private string $image,
        private int $quantity = 1,
        private float $total_price = 0.0
    ) {
        $this->set_total_price();
    }

    public function get_id(): string
    {
        return $this->id;
    }

    public function get_title(): string
    {
        return $this->title;
    }

    public function get_price(): float
    {
        return $this->price;
    }

    public function get_image(): string
    {
        return $this->image;
    }

    public function get_quantity(): int
    {
        return $this->quantity;
    }

    public function get_total_price(): float
    {
        return $this->total_price;
    }

    public function set_total_price(): void
    {
        $this->total_price = $this->quantity * $this->price;
    }

    public function increase_quantity(): void
    {
        $this->quantity += 1;
        $this->set_total_price();
    }

    public function decrease_quantity(): void
    {
        $this->quantity -= 1;
        $this->set_total_price();
    }

    public function jsonSerialize(): mixed
    {
        return  get_object_vars($this);
    }
}
