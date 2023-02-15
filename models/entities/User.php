<?php

class User
{
    public function __construct(
        private int $id,
        private string $username,
        private string $hash,
        private string $first_name,
        private string $last_name,
        private string $phone,
        private string $address
    ) {
    }
}
