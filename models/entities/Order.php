<?php

class Order extends Data
{
    public function __construct(
        private string $email,
        private string $status,
        private DateTime $date,
        private User $user,
        private string $session_id
    ) {
    }
}
