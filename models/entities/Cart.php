<?php

class Cart extends Base
{
    public function __construct(
        private int $quantity,
        private User $user,
        private Product $product,
        private string $session_id
    ) {
    }
}
