<?php

class Cart
{
    public function __construct(
        private int $id,
        private int $quantity,
        private User $user,
        private Product $product,
        private string $session_id
    ) {
    }
}
