<?php

class Order
{
    public function __construct(
        private int $id,
        private string $first_name,
        private string $last_name,
        private string $phone,
        private string $email,
        private string $address,
        private string $status,
        private DateTime $date,
        private User $user,
        private string $session_id
    ) {
    }
}
