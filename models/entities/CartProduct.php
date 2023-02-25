<?php

class CartProduct
{
    public function __construct(
        // private int $id,
        private int $product_id,
        private string $session_id,
        // private int $quantity = 1,
        private int $user_id = 0
    ) {
    }

    public function get_product_id(): int
    {
        return $this->product_id;
    }

    public function get_session_id(): string
    {
        return $this->session_id;
    }

    // public function get_quantity(): int
    // {
    //     return $this->quantity;
    // }

    public function get_user_id(): int
    {
        return $this->user_id;
    }
}
